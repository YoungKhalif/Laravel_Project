<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

class TicketController extends Controller
{
    public function register(Request $request, Event $event)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10',
        ]);

        if ($event->available_tickets < $request->quantity) {
            return back()->with('error', 'Not enough tickets available!');
        }

        // Create event registration
        EventRegistration::create([
            'event_id' => $event->id,
            'user_id' => auth()->id(),
            'registration_date' => now(),
            'status' => 'registered',
        ]);

        return redirect()->route('tickets.purchase', [
            'event' => $event,
            'quantity' => $request->quantity
        ]);
    }

    public function purchase(Request $request, Event $event)
    {
        $quantity = $request->get('quantity', 1);
        
        if ($event->available_tickets < $quantity) {
            return redirect()->route('events.show', $event)
                           ->with('error', 'Not enough tickets available!');
        }

        $total_amount = $event->ticket_price * $quantity;

        return view('tickets.purchase', compact('event', 'quantity', 'total_amount'));
    }

    public function processPurchase(Request $request, Event $event)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|in:card,paypal,bank_transfer',
            'card_number' => 'required_if:payment_method,card',
            'card_expiry' => 'required_if:payment_method,card',
            'card_cvv' => 'required_if:payment_method,card',
        ]);

        $quantity = $request->quantity;
        $total_amount = $event->ticket_price * $quantity;

        try {
            DB::beginTransaction();

            $tickets = [];
            for ($i = 0; $i < $quantity; $i++) {
                $ticket_number = 'TKT-' . strtoupper(Str::random(8));
                $qr_code = base64_encode($ticket_number . '-' . $event->id . '-' . auth()->id());

                $ticket = Ticket::create([
                    'event_id' => $event->id,
                    'user_id' => auth()->id(),
                    'ticket_number' => $ticket_number,
                    'price' => $event->ticket_price,
                    'status' => 'confirmed',
                    'payment_status' => 'paid',
                    'payment_method' => $request->payment_method,
                    'qr_code' => $qr_code,
                    'purchased_at' => now(),
                ]);

                $tickets[] = $ticket;
            }

            DB::commit();

            // Send confirmation email (implement later)
            // $this->sendTicketConfirmation($tickets);

            return redirect()->route('tickets.confirmation', ['ticket' => $tickets[0]])
                           ->with('success', 'Tickets purchased successfully!');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Payment failed. Please try again.');
        }
    }

    public function confirmation(Ticket $ticket)
    {
        $this->authorize('view', $ticket);
        
        $related_tickets = Ticket::where('event_id', $ticket->event_id)
                                ->where('user_id', $ticket->user_id)
                                ->where('purchased_at', $ticket->purchased_at)
                                ->get();

        return view('tickets.confirmation', compact('ticket', 'related_tickets'));
    }

    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);
        return view('tickets.show', compact('ticket'));
    }

    public function downloadPdf(Ticket $ticket)
    {
        $this->authorize('view', $ticket);
        
        $pdf = Pdf::loadView('tickets.pdf', compact('ticket'));
        return $pdf->download('ticket-' . $ticket->ticket_number . '.pdf');
    }

    public function myTickets()
    {
        $tickets = auth()->user()->tickets()
                              ->with('event')
                              ->orderBy('created_at', 'desc')
                              ->paginate(10);

        return view('tickets.my-tickets', compact('tickets'));
    }

    public function checkIn(Request $request)
    {
        $request->validate([
            'qr_code' => 'required|string',
        ]);

        try {
            $decoded = base64_decode($request->qr_code);
            $parts = explode('-', $decoded);
            
            if (count($parts) !== 3) {
                return response()->json(['error' => 'Invalid QR code'], 400);
            }

            $ticket_number = $parts[0];
            $event_id = $parts[1];
            $user_id = $parts[2];

            $ticket = Ticket::where('ticket_number', $ticket_number)
                           ->where('event_id', $event_id)
                           ->where('user_id', $user_id)
                           ->first();

            if (!$ticket) {
                return response()->json(['error' => 'Ticket not found'], 404);
            }

            if ($ticket->attendance) {
                return response()->json(['error' => 'Ticket already used'], 400);
            }

            // Create attendance record
            $ticket->attendance()->create([
                'event_id' => $ticket->event_id,
                'user_id' => $ticket->user_id,
                'attended_at' => now(),
                'check_in_method' => 'qr_code',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Check-in successful',
                'ticket' => $ticket->load(['user', 'event'])
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid QR code'], 400);
        }
    }
}
