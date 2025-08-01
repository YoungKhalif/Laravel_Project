<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the user's tickets.
     */
    public function index()
    {
        $registrations = EventRegistration::where('user_id', Auth::id())
            ->with(['event', 'ticket'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('tickets.index', compact('registrations'));
    }

    /**
     * Show the form for purchasing tickets.
     */
    public function purchase(Event $event)
    {
        // Load the event's ticket information
        $event->load('ticket');

        if (!$event->ticket || $event->ticket->available <= 0) {
            return redirect()->route('events.show', $event->id)
                ->with('error', 'Sorry, tickets are no longer available for this event.');
        }

        return view('tickets.purchase', compact('event'));
    }

    /**
     * Process the ticket purchase.
     */
    public function processPurchase(Request $request, Event $event)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'agree_to_terms' => 'required|accepted',
        ]);

        // Check if enough tickets are available
        if ($event->ticket->available < $request->quantity) {
            return back()->with('error', 'Sorry, not enough tickets available.')
                        ->withInput();
        }

        // Calculate total amount
        $totalAmount = $event->ticket->price * $request->quantity;

        // For now, we'll create a registration without actual payment
        // Later we'll add payment processing
        $registration = EventRegistration::create([
            'event_id' => $event->id,
            'user_id' => Auth::id(),
            'ticket_id' => $event->ticket->id,
            'amount_paid' => $totalAmount,
            'payment_status' => 'pending',
            'registration_number' => EventRegistration::generateRegistrationNumber(),
            'status' => 'registered',
        ]);

        // Reduce available tickets
        $event->ticket->decrementAvailable($request->quantity);

        // Redirect to payment page
        return redirect()->route('payments.show', $registration->id);
    }

    /**
     * Display the ticket confirmation.
     */
    public function confirmation(EventRegistration $registration)
    {
        // Check that the current user owns this registration
        if (Auth::id() !== $registration->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $registration->load(['event', 'ticket', 'user']);

        // Check payment status and display appropriate message
        if ($registration->payment_status === 'paid') {
            $paymentMessage = 'Your payment has been processed successfully!';
        } else {
            $paymentMessage = 'Your payment is currently being processed.';
        }

        return view('tickets.confirmation', compact('registration', 'paymentMessage'));
    }

    /**
     * Show a specific ticket.
     */
    public function show(EventRegistration $registration)
    {
        // Check that the current user owns this registration
        if (Auth::id() !== $registration->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $registration->load(['event', 'ticket', 'user']);

        return view('tickets.show', compact('registration'));
    }

    /**
     * Generate QR code for ticket.
     */
    public function generateQR(EventRegistration $registration)
    {
        // Check that the current user owns this registration
        if (Auth::id() !== $registration->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // The QR code will simply contain the registration number for now
        // We'll implement actual QR code generation later
        $qrData = $registration->registration_number;

        return response()->json(['qr_data' => $qrData]);
=======
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
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    }
}
