<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticket Confirmation - EventSmart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px 10px 0 0;
        }
        .content {
            background: #fff;
            padding: 30px;
            border: 1px solid #ddd;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-radius: 0 0 10px 10px;
            border: 1px solid #ddd;
            border-top: none;
        }
        .ticket-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .qr-code {
            text-align: center;
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 5px;
        }
        .btn-success {
            background: #28a745;
        }
        .social-links {
            margin: 20px 0;
        }
        .social-links a {
            margin: 0 10px;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎟️ Ticket Confirmation</h1>
        <p>Your ticket has been confirmed!</p>
    </div>

    <div class="content">
        <p>Dear {{ $ticket->user->name }},</p>
        
        <p>Thank you for your purchase! Your ticket for <strong>{{ $ticket->event->title }}</strong> has been confirmed.</p>

        <div class="ticket-info">
            <h3>Event Details</h3>
            <p><strong>Event:</strong> {{ $ticket->event->title }}</p>
            <p><strong>Date:</strong> {{ $ticket->event->start_date->format('F j, Y') }}</p>
            <p><strong>Time:</strong> {{ $ticket->event->start_time->format('g:i A') }}</p>
            <p><strong>Venue:</strong> {{ $ticket->event->venue }}</p>
            <p><strong>Address:</strong> {{ $ticket->event->address }}, {{ $ticket->event->city }}</p>
            
            <hr>
            
            <h3>Ticket Information</h3>
            <p><strong>Ticket Number:</strong> {{ $ticket->ticket_number }}</p>
            <p><strong>Price:</strong> ${{ number_format($ticket->price, 2) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($ticket->status) }}</p>
        </div>

        <div class="qr-code">
            <h3>Your QR Code</h3>
            <p>Present this QR code at the event entrance:</p>
            <!-- QR Code would be generated here -->
            <div style="background: #f0f0f0; padding: 20px; display: inline-block; border-radius: 5px;">
                <div style="width: 150px; height: 150px; background: white; border: 2px solid #ddd; display: flex; align-items: center; justify-content: center;">
                    QR CODE<br>{{ $ticket->ticket_number }}
                </div>
            </div>
        </div>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ route('tickets.show', $ticket) }}" class="btn">View Full Ticket</a>
            <a href="{{ route('tickets.download', $ticket) }}" class="btn btn-success">Download PDF</a>
        </div>

        <h3>Important Reminders</h3>
        <ul>
            <li>Please arrive at least 30 minutes before the event starts</li>
            <li>Bring a valid photo ID for verification</li>
            <li>Keep this email or download the PDF for entry</li>
            <li>This ticket is non-transferable and non-refundable</li>
        </ul>

        <p>If you have any questions, please contact us at <a href="mailto:support@eventpro.com">support@eventpro.com</a> or call us at +1 (555) 123-4567.</p>

        <p>We look forward to seeing you at the event!</p>
        
        <p>Best regards,<br>The EventPro Team</p>
    </div>

    <div class="footer">
        <p><strong>EventPro</strong> - Your Premier Event Management Platform</p>
        
        <div class="social-links">
            <a href="#">📘 Facebook</a>
            <a href="#">🐦 Twitter</a>
            <a href="#">📷 Instagram</a>
            <a href="#">💼 LinkedIn</a>
        </div>
        
        <p style="font-size: 12px; color: #6c757d; margin-top: 20px;">
            This email was sent to {{ $ticket->user->email }}.<br>
            If you no longer wish to receive these emails, you can 
            <a href="#" style="color: #6c757d;">unsubscribe here</a>.
        </p>
    </div>
</body>
</html>
