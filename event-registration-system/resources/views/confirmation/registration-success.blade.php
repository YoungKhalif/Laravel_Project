@extends('layouts.app')

@section('title', 'Registration Confirmed - EventPro')

@section('content')
<x-confirmation-page
    type="success"
    title="Registration Confirmed!"
    subtitle="You're all set for the event"
    message="Thank you for registering. Your tickets have been sent to your email."
    :details="[
        'Event' => 'Tech Conference 2025',
        'Date' => 'August 15-17, 2025',
        'Ticket Type' => 'VIP Pass',
        'Quantity' => '2',
        'Order ID' => '#ORD-' . rand(10000, 99999),
        'Amount Paid' => '$' . number_format(299.99, 2)
    ]"
    detailsTitle="Registration Details"
    additionalInfo="Please arrive 30 minutes before the event starts for a smooth check-in experience. Don't forget to bring your ID and the QR code from the email."
    primaryButtonText="View My Tickets"
    primaryButtonUrl="{{ route('tickets.index') }}"
    primaryButtonIcon="fas fa-ticket-alt"
    secondaryButtonText="Add to Calendar"
    secondaryButtonUrl="#"
    secondaryButtonIcon="fas fa-calendar-plus"
    tertiaryButtonText="Return to Homepage"
    tertiaryButtonUrl="{{ route('home') }}"
    tertiaryButtonIcon="fas fa-home"
    footerText="A confirmation email has been sent to your registered email address"
    :showSocialSharing="true"
/>
@endsection
