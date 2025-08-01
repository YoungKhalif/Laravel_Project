<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to EventSmart - {{ $user->name }}</title>
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
            padding: 50px 20px;
        }
        .welcome-icon {
            font-size: 64px;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
        }
        .header p {
            margin: 15px 0 0 0;
            opacity: 0.9;
            font-size: 18px;
        }
        .welcome-badge {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            padding: 10px 20px;
            display: inline-block;
            margin-top: 20px;
            font-size: 14px;
            font-weight: 600;
        }
        .content {
            padding: 40px 30px;
        }
        .welcome-message {
            text-align: center;
            background: linear-gradient(135deg, #f0fff4 0%, #c6f6d5 100%);
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
        }
        .welcome-title {
            color: #276749;
            font-size: 24px;
            font-weight: 700;
            margin: 0 0 15px 0;
        }
        .welcome-text {
            color: #2f855a;
            font-size: 16px;
            margin: 0;
        }
        .getting-started {
            background-color: #f7fafc;
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
        }
        .getting-started h3 {
            color: #2d3748;
            font-size: 20px;
            font-weight: 600;
            margin: 0 0 20px 0;
        }
        .step-item {
            display: flex;
            align-items: flex-start;
            margin: 20px 0;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        .step-number {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            margin-right: 15px;
            flex-shrink: 0;
        }
        .step-content h4 {
            margin: 0 0 8px 0;
            color: #2d3748;
            font-size: 16px;
            font-weight: 600;
        }
        .step-content p {
            margin: 0;
            color: #4a5568;
            font-size: 14px;
        }
        .features-section {
            background: linear-gradient(135deg, #edf2f7 0%, #e2e8f0 100%);
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
        }
        .features-title {
            text-align: center;
            color: #2d3748;
            font-size: 22px;
            font-weight: 600;
            margin: 0 0 25px 0;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin: 20px 0;
        }
        .feature-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .feature-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }
        .feature-card h4 {
            color: #2d3748;
            margin: 10px 0;
            font-size: 16px;
            font-weight: 600;
        }
        .feature-card p {
            color: #4a5568;
            margin: 0;
            font-size: 14px;
        }
        .popular-events {
            background-color: #fff5f5;
            border: 1px solid #fed7d7;
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
        }
        .popular-events h3 {
            color: #c53030;
            font-size: 20px;
            font-weight: 600;
            margin: 0 0 20px 0;
            text-align: center;
        }
        .event-preview {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin: 15px 0;
            border: 1px solid #feb2b2;
        }
        .event-preview h4 {
            color: #2d3748;
            margin: 0 0 10px 0;
            font-size: 16px;
        }
        .event-meta {
            color: #4a5568;
            font-size: 14px;
            margin: 5px 0;
        }
        .event-price {
            color: #c53030;
            font-weight: 600;
            font-size: 16px;
            margin: 10px 0;
        }
        .cta-section {
            text-align: center;
            margin: 40px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 12px;
            padding: 40px 30px;
        }
        .cta-title {
            font-size: 24px;
            font-weight: 600;
            margin: 0 0 20px 0;
        }
        .cta-description {
            font-size: 16px;
            margin: 0 0 30px 0;
            opacity: 0.9;
        }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            background-color: white;
            color: #667eea;
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
            color: white;
            border: 2px solid white;
        }
        .social-proof {
            background-color: #f0f7ff;
            border: 1px solid #bee3f8;
            border-radius: 8px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
        }
        .social-proof h3 {
            color: #2b6cb0;
            margin: 0 0 15px 0;
            font-size: 18px;
        }
        .stats-row {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }
        .stat-item {
            text-align: center;
        }
        .stat-number {
            font-size: 24px;
            font-weight: 700;
            color: #2b6cb0;
            margin: 0;
        }
        .stat-label {
            font-size: 12px;
            color: #4a5568;
            margin: 5px 0 0 0;
        }
        .support-section {
            background-color: #f0fff4;
            border: 1px solid #9ae6b4;
            border-radius: 8px;
            padding: 25px;
            margin: 30px 0;
        }
        .support-section h3 {
            color: #276749;
            margin: 0 0 15px 0;
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
            padding: 10px;
            background-color: #4a5568;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            text-align: center;
            line-height: 20px;
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
            .features-grid {
                grid-template-columns: 1fr;
            }
            .step-item {
                flex-direction: column;
                text-align: center;
            }
            .step-number {
                margin-right: 0;
                margin-bottom: 10px;
            }
            .stats-row {
                flex-direction: column;
                gap: 15px;
            }
            .btn {
                display: block;
                margin: 10px 0;
            }
            .cta-section {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="welcome-icon">🎉</div>
            <h1>Welcome to EventSmart!</h1>
            <p>Your journey to amazing events starts here</p>
            <div class="welcome-badge">
                ✨ Account created on {{ now()->format('M j, Y') }}
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Welcome Message -->
            <div class="welcome-message">
                <div class="welcome-title">🚀 Hello {{ $user->name }}!</div>
                <p class="welcome-text">
                    Welcome to EventSmart, where discovering and attending amazing events has never been easier. We're thrilled to have you join our community of event enthusiasts!
                </p>
            </div>

            <!-- Getting Started -->
            <div class="getting-started">
                <h3>🎯 Let's Get You Started</h3>

                <div class="step-item">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <h4>Complete Your Profile</h4>
                        <p>Add your interests, location, and preferences to get personalized event recommendations tailored just for you.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <h4>Browse Events</h4>
                        <p>Explore thousands of events in your area or worldwide. From conferences to concerts, there's something for everyone.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <h4>Book Your First Event</h4>
                        <p>Found something interesting? Book your tickets securely and get instant confirmation with QR codes for easy entry.</p>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-number">4</div>
                    <div class="step-content">
                        <h4>Enjoy & Share</h4>
                        <p>Attend amazing events, meet new people, and share your experiences with the EventSmart community.</p>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="features-section">
                <div class="features-title">🌟 What Makes EventSmart Special</div>

                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">🎫</div>
                        <h4>Instant Tickets</h4>
                        <p>Get digital tickets instantly with QR codes for seamless entry</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">🔍</div>
                        <h4>Smart Search</h4>
                        <p>Find events by location, date, category, or interests</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">💰</div>
                        <h4>Secure Payments</h4>
                        <p>Safe and secure payment processing with multiple options</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">📱</div>
                        <h4>Mobile Friendly</h4>
                        <p>Access everything from any device, anywhere, anytime</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">🤝</div>
                        <h4>24/7 Support</h4>
                        <p>Our support team is always here to help you</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">🏆</div>
                        <h4>Best Events</h4>
                        <p>Curated selection of the best events in your area</p>
                    </div>
                </div>
            </div>

            <!-- Popular Events -->
            <div class="popular-events">
                <h3>🔥 Popular Events This Week</h3>

                <div class="event-preview">
                    <h4>Tech Innovation Summit 2024</h4>
                    <div class="event-meta">📅 December 15, 2024 • 🕐 9:00 AM - 6:00 PM</div>
                    <div class="event-meta">📍 San Francisco Convention Center</div>
                    <div class="event-price">From $299</div>
                </div>

                <div class="event-preview">
                    <h4>Jazz Under the Stars</h4>
                    <div class="event-meta">📅 December 18, 2024 • 🕐 7:30 PM - 11:00 PM</div>
                    <div class="event-meta">📍 Golden Gate Park Amphitheater</div>
                    <div class="event-price">From $45</div>
                </div>

                <div class="event-preview">
                    <h4>Digital Marketing Masterclass</h4>
                    <div class="event-meta">📅 December 20, 2024 • 🕐 2:00 PM - 5:00 PM</div>
                    <div class="event-meta">📍 Online Event</div>
                    <div class="event-price">FREE</div>
                </div>
            </div>

            <!-- Social Proof -->
            <div class="social-proof">
                <h3>📊 Join Our Growing Community</h3>
                <p>See what our members are saying about EventSmart:</p>

                <div class="stats-row">
                    <div class="stat-item">
                        <div class="stat-number">50K+</div>
                        <div class="stat-label">Happy Users</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div class="stat-label">Events Listed</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label">Cities Covered</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">4.9★</div>
                        <div class="stat-label">User Rating</div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="cta-section">
                <div class="cta-title">🎊 Ready to Discover Amazing Events?</div>
                <p class="cta-description">
                    Start exploring thousands of events and find your next unforgettable experience.
                </p>
                <a href="{{ url('/events') }}" class="btn">Browse Events</a>
                <a href="{{ url('/profile/edit') }}" class="btn btn-outline">Complete Profile</a>
            </div>

            <!-- Support Section -->
            <div class="support-section">
                <h3>🤝 We're Here to Help</h3>
                <p>Have questions or need assistance? Our friendly support team is available 24/7:</p>
                <ul style="margin: 15px 0; padding-left: 20px; color: #2f855a;">
                    <li><strong>📧 Email:</strong> support@eventsmart.com</li>
                    <li><strong>📞 Phone:</strong> (800) 123-4567</li>
                    <li><strong>💬 Live Chat:</strong> Available on our website</li>
                    <li><strong>📚 Help Center:</strong> eventsmart.com/help</li>
                    <li><strong>📖 Getting Started Guide:</strong> eventsmart.com/guide</li>
                </ul>
            </div>

            <p>Thank you for choosing EventSmart. We can't wait to help you discover amazing events and create unforgettable memories!</p>

            <p>Welcome to the community!<br>
            <strong>The EventSmart Team</strong></p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <h3>EventSmart</h3>
            <p>Making events memorable, one ticket at a time.</p>

            <div class="social-links">
                <a href="#" title="Facebook">📘</a>
                <a href="#" title="Twitter">🐦</a>
                <a href="#" title="Instagram">📷</a>
                <a href="#" title="LinkedIn">💼</a>
                <a href="#" title="YouTube">📺</a>
            </div>

            <p>📧 support@eventsmart.com | 📞 (800) 123-4567</p>
            <p>123 Tech Boulevard, San Francisco, CA 94105</p>

            <div class="unsubscribe">
                <p>
                    You received this welcome email because you created an EventSmart account.<br>
                    <a href="{{ url('/notification-preferences') }}">Manage email preferences</a> |
                    <a href="{{ url('/help/getting-started') }}">Getting Started Guide</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
