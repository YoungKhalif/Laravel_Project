<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Cancelled - {{ $event->title }}</title>
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
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
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
        .cancellation-badge {
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
        .alert-box {
            background-color: #fed7d7;
            border: 1px solid #feb2b2;
            border-radius: 12px;
            padding: 20px;
            margin: 30px 0;
            border-left: 4px solid #f56565;
        }
        .alert-title {
            color: #c53030;
            font-size: 18px;
            font-weight: 700;
            margin: 0 0 10px 0;
        }
        .alert-message {
            color: #742a2a;
            margin: 0;
        }
        .event-info {
            background-color: #f7fafc;
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
            border-left: 4px solid #4a5568;
        }
        .event-title {
            font-size: 24px;
            font-weight: 700;
            color: #1a202c;
            margin: 0 0 15px 0;
        }
        .event-details {
            display: table;
            width: 100%;
        }
        .detail-row {
            display: table-row;
        }
        .detail-label {
            display: table-cell;
            font-weight: 600;
            color: #4a5568;
            padding: 8px 20px 8px 0;
            width: 120px;
            vertical-align: top;
        }
        .detail-value {
            display: table-cell;
            color: #2d3748;
            padding: 8px 0;
            vertical-align: top;
        }
        .refund-section {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            margin: 30px 0;
        }
        .refund-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .refund-amount {
            font-size: 32px;
            font-weight: 700;
            margin: 15px 0;
        }
        .refund-timeline {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
        }
        .alternatives-section {
            background-color: #ebf8ff;
            border: 1px solid #90cdf4;
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
        }
        .alternatives-title {
            color: #2b6cb0;
            font-size: 20px;
            font-weight: 600;
            margin: 0 0 20px 0;
        }
        .alternative-event {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin: 15px 0;
            border: 1px solid #bee3f8;
        }
        .alternative-event h4 {
            color: #2b6cb0;
            margin: 0 0 10px 0;
            font-size: 16px;
        }
        .alternative-event p {
            margin: 5px 0;
            color: #4a5568;
            font-size: 14px;
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
            font-size: 18px;
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
            .event-info, .alternatives-section {
                padding: 20px;
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
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>❌ Event Cancelled</h1>
            <p>We regret to inform you about this cancellation</p>
            <div class="cancellation-badge">
                📅 Originally scheduled for {{ $event->start_date->format('M j, Y') }}
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Dear {{ $user->name }},</p>

            <!-- Cancellation Alert -->
            <div class="alert-box">
                <div class="alert-title">🚨 Event Cancellation Notice</div>
                <p class="alert-message">
                    We regret to inform you that the following event has been cancelled and will not take place as originally scheduled.
                </p>
            </div>

            <!-- Event Information -->
            <div class="event-info">
                <h2 class="event-title">{{ $event->title }}</h2>

                <div class="event-details">
                    <div class="detail-row">
                        <div class="detail-label">📅 Original Date:</div>
                        <div class="detail-value">{{ $event->start_date->format('l, F j, Y') }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">🕐 Original Time:</div>
                        <div class="detail-value">{{ $event->start_date->format('g:i A') }} - {{ $event->end_date->format('g:i A') }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">📍 Location:</div>
                        <div class="detail-value">{{ $event->location }}</div>
                    </div>
                    @if($event->organizer)
                    <div class="detail-row">
                        <div class="detail-label">👤 Organizer:</div>
                        <div class="detail-value">{{ $event->organizer->name }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Cancellation Reason -->
            @if(isset($cancellation_reason))
            <div class="event-info">
                <h3 style="color: #4a5568; margin-bottom: 15px;">📝 Reason for Cancellation</h3>
                <p style="color: #2d3748; margin: 0;">{{ $cancellation_reason }}</p>
            </div>
            @endif

            <!-- Refund Information -->
            @if(isset($ticket) && $ticket->amount > 0)
            <div class="refund-section">
                <div class="refund-title">💰 Automatic Refund Processing</div>
                <p>We're processing your full refund automatically. No action required on your part.</p>

                <div class="refund-amount">${{ number_format($ticket->amount, 2) }}</div>

                <div class="refund-timeline">
                    <p><strong>Refund Timeline:</strong></p>
                    <p>• Credit Card: 5-7 business days</p>
                    <p>• PayPal: 3-5 business days</p>
                    <p>• Bank Transfer: 7-10 business days</p>
                </div>

                <p><small>You'll receive a separate email confirmation once the refund is processed.</small></p>
            </div>
            @else
            <div class="refund-section">
                <div class="refund-title">🎫 Free Event Cancellation</div>
                <p>Since this was a free event, no refund processing is necessary.</p>
                <p>We apologize for any inconvenience this cancellation may have caused.</p>
            </div>
            @endif

            <!-- Alternative Events -->
            @if(isset($alternative_events) && count($alternative_events) > 0)
            <div class="alternatives-section">
                <div class="alternatives-title">🔄 Similar Events You Might Like</div>
                <p>We've found some similar events that might interest you:</p>

                @foreach($alternative_events as $alt_event)
                <div class="alternative-event">
                    <h4>{{ $alt_event->title }}</h4>
                    <p><strong>Date:</strong> {{ $alt_event->start_date->format('M j, Y \a\t g:i A') }}</p>
                    <p><strong>Location:</strong> {{ $alt_event->location }}</p>
                    <p><strong>Price:</strong> ${{ number_format($alt_event->price, 2) }}</p>
                    <a href="{{ url('/events/' . $alt_event->id) }}" style="color: #2b6cb0; text-decoration: none; font-weight: 600;">View Event Details →</a>
                </div>
                @endforeach
            </div>
            @endif

            <!-- Support Information -->
            <div class="support-info">
                <h3>🤝 We're Here to Help</h3>
                <p>If you have any questions about this cancellation or need assistance finding alternative events, our support team is ready to help.</p>
                <ul style="margin: 10px 0; padding-left: 20px;">
                    <li>Email: support@eventsmart.com</li>
                    <li>Phone: (800) 123-4567</li>
                    <li>Live Chat: Available 24/7 on our website</li>
                </ul>
            </div>

            <!-- Call to Action -->
            <div class="cta-section">
                <a href="{{ url('/events') }}" class="btn">Browse Other Events</a>
                <a href="{{ url('/support') }}" class="btn btn-outline">Contact Support</a>
                @if(isset($ticket) && $ticket->amount > 0)
                <a href="{{ url('/refunds/' . $ticket->id) }}" class="btn btn-success">Track Refund Status</a>
                @endif
            </div>

            <p>We sincerely apologize for any inconvenience this cancellation may have caused. We appreciate your understanding and look forward to serving you at future events.</p>

            <p>Thank you for choosing EventSmart.</p>

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
                    You received this email because you were registered for this event.<br>
                    <a href="{{ url('/notification-preferences') }}">Manage email preferences</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
