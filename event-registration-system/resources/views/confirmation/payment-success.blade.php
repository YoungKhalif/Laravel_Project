@extends('layouts.app')

@section('title', 'Payment Successful - EventPro')

@section('content')
<x-confirmation-page
    type="success"
    title="Payment Successful!"
    subtitle="Thank you for your purchase"
    message="Your payment has been successfully processed and your tickets are now confirmed."
    :details="[
        'Transaction ID' => 'TXN-' . rand(100000, 999999),
        'Payment Method' => 'Credit Card (****' . rand(1000, 9999) . ')',
        'Amount' => '$' . number_format(299.99, 2),
        'Date & Time' => now()->format('F j, Y - g:i A')
    ]"
    detailsTitle="Payment Details"
    additionalInfo="A receipt has been sent to your email address. If you have any questions about your purchase, please contact our support team."
    primaryButtonText="View My Tickets"
    primaryButtonUrl="{{ route('tickets.index') }}"
    primaryButtonIcon="fas fa-ticket-alt"
    secondaryButtonText="Continue Shopping"
    secondaryButtonUrl="{{ route('events.index') }}"
    secondaryButtonIcon="fas fa-search"
    footerText="This transaction appears as 'EventPro Inc.' on your bank statement"
/>
@endsection
