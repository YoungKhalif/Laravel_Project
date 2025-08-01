<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Exception\ApiErrorException;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set Stripe API key
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    /**
     * Show the payment form.
     */
    public function show(EventRegistration $registration)
    {
        // Check that the current user owns this registration
        if (Auth::id() !== $registration->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Load related models
        $registration->load(['event', 'ticket']);

        // Create a payment intent with Stripe
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $registration->amount_paid * 100, // Convert to cents
                'currency' => 'usd',
                'metadata' => [
                    'registration_id' => $registration->id,
                    'event_id' => $registration->event_id,
                    'user_id' => $registration->user_id,
                ],
            ]);

            // Get the client secret from the payment intent
            $clientSecret = $paymentIntent->client_secret;
        } catch (ApiErrorException $e) {
            Log::error('Stripe error: ' . $e->getMessage());
            return back()->with('error', 'Payment service unavailable. Please try again later.');
        }

        return view('payments.show', compact('registration', 'clientSecret'));
    }

    /**
     * Process the payment.
     */
    public function process(Request $request, EventRegistration $registration)
    {
        // Check that the current user owns this registration
        if (Auth::id() !== $registration->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Validate the payment form data
        $request->validate([
            'payment_intent_id' => 'required|string',
            'payment_intent_client_secret' => 'required|string',
            'payment_method_id' => 'required|string',
        ]);

        try {
            // Retrieve the payment intent
            $paymentIntent = PaymentIntent::retrieve($request->payment_intent_id);

            // Confirm it's associated with this registration
            if (!isset($paymentIntent->metadata->registration_id) ||
                $paymentIntent->metadata->registration_id != $registration->id) {
                throw new \Exception('Invalid payment intent for this registration');
            }

            // Check if payment was successful
            if ($paymentIntent->status === 'succeeded') {
                // Update registration status
                $registration->update([
                    'payment_status' => 'paid',
                    'payment_id' => $paymentIntent->id,
                ]);

                // Send notification (email/SMS)
                // We'll implement this in the notification section

                return redirect()->route('tickets.confirmation', $registration->id)
                    ->with('success', 'Payment processed successfully! Your tickets are now ready.');
            } else {
                return back()->with('error', 'Payment was not completed successfully. Please try again.')
                            ->withInput();
            }

        } catch (\Exception $e) {
            // Log the error
            Log::error('Payment processing failed: ' . $e->getMessage());

            return back()->with('error', 'Payment processing failed. Please try again.')
                        ->withInput();
        }
    }

    /**
     * Handle payment webhook (for real payment gateways).
     */
    public function webhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $webhookSecret = config('services.stripe.webhook_secret');

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sigHeader, $webhookSecret
            );

            // Handle the event
            switch ($event->type) {
                case 'payment_intent.succeeded':
                    $paymentIntent = $event->data->object;
                    $this->handleSuccessfulPayment($paymentIntent);
                    break;
                case 'payment_intent.payment_failed':
                    $paymentIntent = $event->data->object;
                    $this->handleFailedPayment($paymentIntent);
                    break;
                default:
                    Log::info('Unhandled event type: ' . $event->type);
            }

            return response()->json(['status' => 'success']);
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            Log::error('Webhook error: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            Log::error('Webhook signature verification failed: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid signature'], 400);
        }
    }

    /**
     * Handle successful payment webhook
     */
    private function handleSuccessfulPayment($paymentIntent)
    {
        if (!isset($paymentIntent->metadata->registration_id)) {
            Log::error('Missing registration_id in payment intent metadata');
            return;
        }

        $registrationId = $paymentIntent->metadata->registration_id;
        $registration = EventRegistration::find($registrationId);

        if (!$registration) {
            Log::error('Registration not found: ' . $registrationId);
            return;
        }

        // Update registration status if not already paid
        if ($registration->payment_status !== 'paid') {
            $registration->update([
                'payment_status' => 'paid',
                'payment_id' => $paymentIntent->id,
            ]);

            // Send notification (email/SMS)
            // We'll implement this in the notification section
        }
    }

    /**
     * Handle failed payment webhook
     */
    private function handleFailedPayment($paymentIntent)
    {
        if (!isset($paymentIntent->metadata->registration_id)) {
            Log::error('Missing registration_id in payment intent metadata');
            return;
        }

        $registrationId = $paymentIntent->metadata->registration_id;
        $registration = EventRegistration::find($registrationId);

        if (!$registration) {
            Log::error('Registration not found: ' . $registrationId);
            return;
        }

        // Update registration status
        $registration->update([
            'payment_status' => 'failed',
        ]);

        // Send notification about failed payment
        // We'll implement this in the notification section
    }
}
