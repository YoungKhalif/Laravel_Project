<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
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
    }
}
