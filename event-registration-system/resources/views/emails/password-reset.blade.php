<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password - EventSmart</title>
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
        .security-badge {
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
        .security-alert {
            background-color: #fef5e7;
            border: 1px solid #f6e05e;
            border-radius: 12px;
            padding: 20px;
            margin: 30px 0;
            border-left: 4px solid #ecc94b;
        }
        .alert-title {
            color: #b7791f;
            font-size: 18px;
            font-weight: 700;
            margin: 0 0 10px 0;
        }
        .alert-message {
            color: #975a16;
            margin: 0;
        }
        .reset-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 12px;
            padding: 40px 30px;
            text-align: center;
            margin: 30px 0;
        }
        .reset-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .reset-description {
            font-size: 16px;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        .reset-button {
            display: inline-block;
            background-color: white;
            color: #667eea;
            padding: 18px 40px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 18px;
            margin: 20px 0;
            transition: transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .reset-button:hover {
            transform: translateY(-2px);
        }
        .expiry-notice {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
            font-size: 14px;
        }
        .manual-link-section {
            background-color: #f7fafc;
            border-radius: 8px;
            padding: 25px;
            margin: 30px 0;
        }
        .manual-link-title {
            color: #4a5568;
            font-size: 16px;
            font-weight: 600;
            margin: 0 0 15px 0;
        }
        .manual-link {
            background-color: white;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 15px;
            word-break: break-all;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            color: #667eea;
            margin: 10px 0;
        }
        .security-tips {
            background-color: #edf2f7;
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
        }
        .security-tips h3 {
            color: #2d3748;
            margin: 0 0 15px 0;
            font-size: 18px;
        }
        .security-tips ul {
            margin: 10px 0;
            padding-left: 20px;
            color: #4a5568;
        }
        .security-tips li {
            margin: 8px 0;
        }
        .troubleshooting {
            background-color: #f0fff4;
            border: 1px solid #9ae6b4;
            border-radius: 8px;
            padding: 20px;
            margin: 30px 0;
        }
        .troubleshooting h3 {
            color: #276749;
            margin: 0 0 10px 0;
            font-size: 16px;
        }
        .contact-info {
            background-color: #fed7e2;
            border: 1px solid #fbb6ce;
            border-radius: 8px;
            padding: 20px;
            margin: 30px 0;
        }
        .contact-info h3 {
            color: #97266d;
            margin: 0 0 10px 0;
            font-size: 16px;
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
            .reset-section {
                padding: 25px 20px;
            }
            .reset-button {
                display: block;
                padding: 15px 20px;
                font-size: 16px;
            }
            .manual-link {
                font-size: 12px;
                padding: 10px;
            }
            .btn {
                display: block;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>🔐 Password Reset</h1>
            <p>Secure password reset for your EventSmart account</p>
            <div class="security-badge">
                🛡️ Security Request from {{ request()->ip() }}
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <p>Hello {{ $user->name }},</p>

            <!-- Security Alert -->
            <div class="security-alert">
                <div class="alert-title">🔒 Password Reset Requested</div>
                <p class="alert-message">
                    We received a request to reset the password for your EventSmart account. If you didn't make this request, please ignore this email and your password will remain unchanged.
                </p>
            </div>

            <!-- Reset Section -->
            <div class="reset-section">
                <div class="reset-title">🚀 Reset Your Password</div>
                <p class="reset-description">
                    Click the button below to create a new password for your account. This link is secure and will expire in 60 minutes for your protection.
                </p>

                <a href="{{ $actionUrl }}" class="reset-button">
                    Reset My Password
                </a>

                <div class="expiry-notice">
                    ⏰ <strong>Important:</strong> This reset link expires in 60 minutes<br>
                    <small>Generated on {{ now()->format('M j, Y \a\t g:i A T') }}</small>
                </div>
            </div>

            <!-- Manual Link Section -->
            <div class="manual-link-section">
                <div class="manual-link-title">🔗 Can't click the button?</div>
                <p>Copy and paste this link into your browser:</p>
                <div class="manual-link">{{ $actionUrl }}</div>
                <p><small>This link will take you to a secure page where you can create your new password.</small></p>
            </div>

            <!-- Security Tips -->
            <div class="security-tips">
                <h3>🛡️ Security Best Practices</h3>
                <ul>
                    <li><strong>Use a strong password:</strong> At least 8 characters with numbers, symbols, and mixed case letters</li>
                    <li><strong>Make it unique:</strong> Don't reuse passwords from other accounts</li>
                    <li><strong>Keep it private:</strong> Never share your password with anyone</li>
                    <li><strong>Enable 2FA:</strong> Add an extra layer of security to your account</li>
                    <li><strong>Regular updates:</strong> Change your password periodically</li>
                </ul>
            </div>

            <!-- Troubleshooting -->
            <div class="troubleshooting">
                <h3>❓ Troubleshooting</h3>
                <p><strong>Link not working?</strong></p>
                <ul style="margin: 10px 0; padding-left: 20px; color: #2f855a;">
                    <li>Make sure you're using the most recent reset email</li>
                    <li>Check that the link hasn't expired (60-minute limit)</li>
                    <li>Try copying and pasting the full URL</li>
                    <li>Clear your browser cache and cookies</li>
                    <li>Try using a different browser or incognito mode</li>
                </ul>
            </div>

            <!-- Contact Information -->
            <div class="contact-info">
                <h3>🤝 Need Help?</h3>
                <p>If you're having trouble resetting your password or didn't request this reset, our support team is here to help:</p>
                <ul style="margin: 10px 0; padding-left: 20px; color: #97266d;">
                    <li><strong>Email:</strong> security@eventsmart.com</li>
                    <li><strong>Phone:</strong> (800) 123-4567</li>
                    <li><strong>Live Chat:</strong> Available 24/7 on our website</li>
                    <li><strong>Security Center:</strong> eventsmart.com/security</li>
                </ul>
            </div>

            <!-- Call to Action -->
            <div class="cta-section">
                <a href="{{ $actionUrl }}" class="btn">Reset Password Now</a>
                <a href="{{ url('/support/security') }}" class="btn btn-outline">Security Help</a>
            </div>

            <!-- Request Details -->
            <div style="background-color: #f7fafc; border-radius: 8px; padding: 20px; margin: 30px 0; font-size: 14px; color: #4a5568;">
                <h4 style="margin: 0 0 10px 0; color: #2d3748;">📋 Request Details</h4>
                <p style="margin: 5px 0;"><strong>Time:</strong> {{ now()->format('l, F j, Y \a\t g:i A T') }}</p>
                <p style="margin: 5px 0;"><strong>IP Address:</strong> {{ request()->ip() }}</p>
                <p style="margin: 5px 0;"><strong>User Agent:</strong> {{ substr(request()->userAgent(), 0, 100) }}{{ strlen(request()->userAgent()) > 100 ? '...' : '' }}</p>
                <p style="margin: 5px 0;"><strong>Token ID:</strong> {{ substr($token, 0, 8) }}...</p>
            </div>

            <p><strong>Important Security Note:</strong> If you did not request this password reset, someone may be trying to access your account. Please contact our security team immediately and do not click the reset link.</p>

            <p>Stay secure,<br>
            <strong>The EventSmart Security Team</strong></p>
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
                    This is a security-related email that cannot be unsubscribed from.<br>
                    <a href="{{ url('/privacy-policy') }}">Privacy Policy</a> |
                    <a href="{{ url('/security-policy') }}">Security Policy</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
