<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt - {{ $payment->transaction_id }}</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8fafc;
            line-height: 1.6;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            text-align: center;
            padding: 40px 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }
        .header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
            font-size: 16px;
        }
        .success-badge {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 8px 16px;
            display: inline-block;
            margin-top: 15px;
            font-size: 14px;
            font-weight: 600;
        }
        .content {
            padding: 40px 30px;
        }
        .success-box {
            background-color: #f0fff4;
            border: 1px solid #9ae6b4;
            border-radius: 12px;
            padding: 20px;
            margin: 30px 0;
            border-left: 4px solid #48bb78;
            text-align: center;
        }
        .success-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }
        .success-title {
            color: #276749;
            font-size: 20px;
            font-weight: 700;
            margin: 0 0 10px 0;
        }
        .success-message {
            color: #2f855a;
            margin: 0;
        }
        .receipt-section {
            background-color: #f7fafc;
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
            border-left: 4px solid #4a5568;
        }
        .receipt-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #e2e8f0;
        }
        .receipt-title {
            font-size: 24px;
            font-weight: 700;
            color: #1a202c;
            margin: 0;
        }
        .receipt-number {
            background-color: #667eea;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
        }
        .payment-details {
            display: table;
            width: 100%;
            margin: 20px 0;
        }
        .detail-row {
            display: table-row;
        }
        .detail-label {
            display: table-cell;
            font-weight: 600;
            color: #4a5568;
            padding: 12px 20px 12px 0;
            width: 140px;
            vertical-align: top;
        }
        .detail-value {
            display: table-cell;
            color: #2d3748;
            padding: 12px 0;
            vertical-align: top;
        }
        .event-info {
            background-color: #edf2f7;
            border-radius: 8px;
            padding: 25px;
            margin: 25px 0;
        }
        .event-title {
            font-size: 20px;
            font-weight: 700;
            color: #1a202c;
            margin: 0 0 15px 0;
        }
        .billing-summary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
        }
        .billing-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }
        .billing-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        .billing-item:last-child {
            border-bottom: none;
            font-size: 18px;
            font-weight: 700;
            margin-top: 10px;
            padding-top: 15px;
            border-top: 2px solid rgba(255, 255, 255, 0.3);
        }
        .amount {
            font-weight: 600;
        }
        .ticket-info {
            background-color: #fff5f5;
            border: 1px solid #fed7d7;
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
        }
        .ticket-title {
            color: #c53030;
            font-size: 18px;
            font-weight: 600;
            margin: 0 0 15px 0;
        }
        .qr-section {
            text-align: center;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            margin: 20px 0;
        }
        .qr-placeholder {
            width: 150px;
            height: 150px;
            background-color: #f7fafc;
            border: 2px dashed #cbd5e0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 14px;
            color: #4a5568;
            margin: 10px 0;
        }
        .download-section {
            background-color: #ebf8ff;
            border: 1px solid #90cdf4;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            text-align: center;
        }
        .cta-section {
            text-align: center;
            margin: 40px 0;
        }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            margin: 10px;
            transition: transform 0.2s ease;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .btn-success {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
        }
        .btn-outline {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }
        .support-info {
            background-color: #f0fff4;
            border: 1px solid #9ae6b4;
            border-radius: 8px;
            padding: 20px;
            margin: 30px 0;
        }
        .support-info h3 {
            color: #276749;
            margin: 0 0 10px 0;
            font-size: 16px;
        }
        .footer {
            background-color: #2d3748;
            color: #a0aec0;
            padding: 40px 30px;
            text-align: center;
        }
        .footer h3 {
            color: white;
            margin: 0 0 20px 0;
        }
        .footer p {
            margin: 10px 0;
            font-size: 14px;
        }
        .social-links {
            margin: 20px 0;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #a0aec0;
            text-decoration: none;
        }
        .unsubscribe {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #4a5568;
            font-size: 12px;
        }
        .unsubscribe a {
            color: #81e6d9;
            text-decoration: none;
        }

        @media only screen and (max-width: 600px) {
            .content {
                padding: 20px 15px;
            }
            .receipt-section, .billing-summary {
                padding: 20px;
            }
            .receipt-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            .btn {
                display: block;
                margin: 10px 0;
            }
            .detail-row {
                display: block;
            }
            .detail-label {
                display: block;
                font-weight: 600;
                margin-bottom: 5px;
            }
            .detail-value {
                display: block;
                margin-bottom: 15px;
            }
            .billing-item {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>✅ Payment Successful</h1>
            <p>Your payment has been processed successfully</p>
            <div class="success-badge">
                💳 Processed on {{ now()->format('M j, Y \a\t g:i A') }}
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Dear {{ $user->name }},</p>

            <!-- Success Confirmation -->
            <div class="success-box">
                <div class="success-icon">🎉</div>
                <div class="success-title">Payment Confirmed!</div>
                <p class="success-message">
                    Your payment has been successfully processed and your event registration is now complete.
                </p>
            </div>

            <!-- Receipt Section -->
            <div class="receipt-section">
                <div class="receipt-header">
                    <h2 class="receipt-title">Payment Receipt</h2>
                    <div class="receipt-number">#{{ $payment->transaction_id }}</div>
                </div>

                <div class="payment-details">
                    <div class="detail-row">
                        <div class="detail-label">📅 Payment Date:</div>
                        <div class="detail-value">{{ $payment->created_at->format('l, F j, Y \a\t g:i A') }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">💳 Payment Method:</div>
                        <div class="detail-value">{{ ucfirst($payment->payment_method) }} ending in {{ $payment->last_four ?? '****' }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">🆔 Transaction ID:</div>
                        <div class="detail-value">{{ $payment->transaction_id }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">✅ Status:</div>
                        <div class="detail-value">
                            <span style="background-color: #48bb78; color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px; font-weight: 600;">
                                {{ ucfirst($payment->status) }}
                            </span>
                        </div>
                    </div>
                    @if(isset($payment->gateway_transaction_id))
                    <div class="detail-row">
                        <div class="detail-label">🔗 Gateway Ref:</div>
                        <div class="detail-value">{{ $payment->gateway_transaction_id }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Event Information -->
            <div class="event-info">
                <h3 class="event-title">📅 Event Details</h3>

                <div class="payment-details">
                    <div class="detail-row">
                        <div class="detail-label">Event:</div>
                        <div class="detail-value"><strong>{{ $event->title }}</strong></div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Date & Time:</div>
                        <div class="detail-value">{{ $event->start_date->format('l, F j, Y \a\t g:i A') }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Location:</div>
                        <div class="detail-value">{{ $event->location }}</div>
                    </div>
                    @if($event->organizer)
                    <div class="detail-row">
                        <div class="detail-label">Organizer:</div>
                        <div class="detail-value">{{ $event->organizer->name }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Billing Summary -->
            <div class="billing-summary">
                <div class="billing-title">💰 Billing Summary</div>

                @foreach($tickets as $ticket)
                <div class="billing-item">
                    <span>{{ $ticket->ticket_type }} Ticket × {{ $ticket->quantity }}</span>
                    <span class="amount">${{ number_format($ticket->unit_price * $ticket->quantity, 2) }}</span>
                </div>
                @endforeach

                @if(isset($payment->discount_amount) && $payment->discount_amount > 0)
                <div class="billing-item">
                    <span>🎟️ Discount Applied</span>
                    <span class="amount">-${{ number_format($payment->discount_amount, 2) }}</span>
                </div>
                @endif

                @if(isset($payment->tax_amount) && $payment->tax_amount > 0)
                <div class="billing-item">
                    <span>📊 Tax ({{ $payment->tax_rate ?? '8.5' }}%)</span>
                    <span class="amount">${{ number_format($payment->tax_amount, 2) }}</span>
                </div>
                @endif

                @if(isset($payment->service_fee) && $payment->service_fee > 0)
                <div class="billing-item">
                    <span>⚙️ Service Fee</span>
                    <span class="amount">${{ number_format($payment->service_fee, 2) }}</span>
                </div>
                @endif

                <div class="billing-item">
                    <span><strong>Total Paid</strong></span>
                    <span class="amount"><strong>${{ number_format($payment->total_amount, 2) }}</strong></span>
                </div>
            </div>

            <!-- Ticket Information -->
            <div class="ticket-info">
                <div class="ticket-title">🎫 Your Digital Tickets</div>
                <p>Your tickets have been generated and are ready for use. Present the QR code below at the event entrance.</p>

                <div class="qr-section">
                    <p><strong>Event Entry QR Code</strong></p>
                    <div class="qr-placeholder">
                        📱 QR Code<br>
                        {{ $ticket->ticket_number ?? 'TKT-' . strtoupper(substr(md5($payment->id), 0, 8)) }}
                    </div>
                    <p><small>Ticket #{{ $ticket->ticket_number ?? 'TKT-' . strtoupper(substr(md5($payment->id), 0, 8)) }}</small></p>
                </div>

                <div class="download-section">
                    <p><strong>📱 Add to Mobile Wallet</strong></p>
                    <p>Save your tickets to your mobile wallet for easy access at the event.</p>
                    <a href="{{ url('/tickets/download/' . $ticket->id) }}" class="btn btn-success">Download Tickets</a>
                </div>
            </div>

            <!-- Important Information -->
            <div class="support-info">
                <h3>📋 Important Information</h3>
                <ul style="margin: 10px 0; padding-left: 20px; color: #2f855a;">
                    <li>Please arrive 30 minutes before the event starts</li>
                    <li>Bring a valid photo ID along with your ticket</li>
                    <li>Screenshots of QR codes are acceptable for entry</li>
                    <li>Tickets are non-transferable unless otherwise specified</li>
                    <li>Check event-specific guidelines for any additional requirements</li>
                </ul>
            </div>

            <!-- Call to Action -->
            <div class="cta-section">
                <a href="{{ url('/tickets') }}" class="btn">View My Tickets</a>
                <a href="{{ url('/events/' . $event->id) }}" class="btn btn-outline">Event Details</a>
                <a href="{{ url('/calendar/add/' . $event->id) }}" class="btn btn-success">Add to Calendar</a>
            </div>

            <p>Thank you for choosing EventSmart! We hope you have a wonderful time at the event.</p>

            <p>If you need to make any changes to your registration or have questions, please don't hesitate to contact our support team.</p>

            <p>Best regards,<br>
            <strong>The EventSmart Team</strong></p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <h3>EventSmart</h3>
            <p>Making events memorable, one ticket at a time.</p>

            <div class="social-links">
                <a href="#">Facebook</a> |
                <a href="#">Twitter</a> |
                <a href="#">Instagram</a> |
                <a href="#">LinkedIn</a>
            </div>

            <p>📧 support@eventsmart.com | 📞 (800) 123-4567</p>
            <p>123 Tech Boulevard, San Francisco, CA 94105</p>

            <div class="unsubscribe">
                <p>
                    You received this email as a receipt for your event registration.<br>
                    <a href="{{ url('/notification-preferences') }}">Manage email preferences</a> |
                    <a href="{{ url('/receipts/' . $payment->id) }}">View online receipt</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
