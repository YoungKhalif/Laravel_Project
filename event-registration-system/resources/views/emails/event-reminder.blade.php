<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Reminder - {{ $event->title }}</title>
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
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
        .reminder-badge {
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
        .event-info {
            background-color: #f8fafc;
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
            border-left: 4px solid #667eea;
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
        .countdown-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            margin: 30px 0;
        }
        .countdown-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .countdown-timer {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }
        .countdown-unit {
            text-align: center;
        }
        .countdown-number {
            font-size: 32px;
            font-weight: 700;
            display: block;
            line-height: 1;
        }
        .countdown-label {
            font-size: 12px;
            opacity: 0.8;
            text-transform: uppercase;
            letter-spacing: 1px;
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
        .btn-outline {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }
        .ticket-info {
            background-color: #e6fffa;
            border: 1px solid #81e6d9;
            border-radius: 8px;
            padding: 20px;
            margin: 30px 0;
        }
        .ticket-info h3 {
            color: #234e52;
            margin: 0 0 10px 0;
            font-size: 18px;
        }
        .qr-section {
            text-align: center;
            margin: 30px 0;
            padding: 20px;
            background-color: #f7fafc;
            border-radius: 8px;
        }
        .important-info {
            background-color: #fef5e7;
            border: 1px solid #f6ad55;
            border-radius: 8px;
            padding: 20px;
            margin: 30px 0;
        }
        .important-info h3 {
            color: #c05621;
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
            .event-info {
                padding: 20px;
            }
            .countdown-timer {
                gap: 10px;
            }
            .countdown-number {
                font-size: 24px;
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
            <h1>🗓️ Event Reminder</h1>
            <p>Don't miss out on your upcoming event!</p>
            <div class="reminder-badge">
                📍 Event starts {{ $event->start_date->format('M j, Y \a\t g:i A') }}
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Hi {{ $user->name }},</p>

            <p>This is a friendly reminder that you're registered for an exciting event that's coming up soon!</p>

            <!-- Event Information -->
            <div class="event-info">
                <h2 class="event-title">{{ $event->title }}</h2>

                <div class="event-details">
                    <div class="detail-row">
                        <div class="detail-label">📅 Date:</div>
                        <div class="detail-value">{{ $event->start_date->format('l, F j, Y') }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">🕐 Time:</div>
                        <div class="detail-value">{{ $event->start_date->format('g:i A') }} - {{ $event->end_date->format('g:i A') }}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">📍 Location:</div>
                        <div class="detail-value">
                            {{ $event->location }}<br>
                            @if($event->address)
                                <small>{{ $event->address }}</small>
                            @endif
                        </div>
                    </div>
                    @if($event->organizer)
                    <div class="detail-row">
                        <div class="detail-label">👤 Organizer:</div>
                        <div class="detail-value">{{ $event->organizer->name }}</div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Countdown Timer -->
            <div class="countdown-section">
                <div class="countdown-title">Event starts in:</div>
                <div class="countdown-timer">
                    <div class="countdown-unit">
                        <span class="countdown-number" id="days">{{ $event->start_date->diffInDays(now()) }}</span>
                        <span class="countdown-label">Days</span>
                    </div>
                    <div class="countdown-unit">
                        <span class="countdown-number" id="hours">{{ $event->start_date->diffInHours(now()) % 24 }}</span>
                        <span class="countdown-label">Hours</span>
                    </div>
                    <div class="countdown-unit">
                        <span class="countdown-number" id="minutes">{{ $event->start_date->diffInMinutes(now()) % 60 }}</span>
                        <span class="countdown-label">Minutes</span>
                    </div>
                </div>
                <p>Mark your calendar and set your alarms! ⏰</p>
            </div>

            <!-- Ticket Information -->
            <div class="ticket-info">
                <h3>🎫 Your Ticket Information</h3>
                <p><strong>Ticket Type:</strong> {{ $ticket->type ?? 'General Admission' }}</p>
                <p><strong>Ticket ID:</strong> #{{ $ticket->id ?? 'TK-' . strtoupper(uniqid()) }}</p>
                <p><strong>Order Number:</strong> #{{ $ticket->order_number ?? 'ORD-' . strtoupper(uniqid()) }}</p>
            </div>

            <!-- QR Code Section -->
            <div class="qr-section">
                <h3>📱 Your Digital Ticket</h3>
                <p>Present this QR code at the event entrance:</p>
                @if(isset($ticket->qr_code))
                    <img src="{{ $ticket->qr_code }}" alt="Ticket QR Code" style="max-width: 200px; margin: 20px 0;">
                @else
                    <div style="width: 200px; height: 200px; background-color: #e2e8f0; margin: 20px auto; display: flex; align-items: center; justify-content: center; border-radius: 8px;">
                        <span style="color: #64748b;">QR Code</span>
                    </div>
                @endif
                <p><small>Save this email or download the EventSmart app for easy access to your ticket.</small></p>
            </div>

            <!-- Important Information -->
            <div class="important-info">
                <h3>⚠️ Important Reminders</h3>
                <ul style="margin: 10px 0; padding-left: 20px;">
                    <li>Arrive 15-30 minutes early for check-in</li>
                    <li>Bring a valid ID if required</li>
                    <li>Check the weather and dress appropriately</li>
                    @if($event->requirements)
                        <li>{{ $event->requirements }}</li>
                    @endif
                </ul>
            </div>

            <!-- Call to Action -->
            <div class="cta-section">
                <a href="{{ url('/events/' . $event->id) }}" class="btn">View Event Details</a>
                <a href="{{ url('/tickets/' . ($ticket->id ?? '1')) }}" class="btn btn-outline">View My Ticket</a>
            </div>

            <p>We're excited to see you at the event! If you have any questions or need assistance, please don't hesitate to reach out to our support team.</p>

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
                    You received this email because you're registered for this event.<br>
                    <a href="{{ url('/unsubscribe') }}">Unsubscribe from event reminders</a> |
                    <a href="{{ url('/notification-preferences') }}">Manage email preferences</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
