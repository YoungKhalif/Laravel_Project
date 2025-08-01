@push('styles')
<style>
    .features-section {
        padding: 5rem 0;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        position: relative;
        overflow: hidden;
    }

    .features-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 20%, rgba(59, 130, 246, 0.05) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(139, 92, 246, 0.05) 0%, transparent 50%);
        pointer-events: none;
    }

    .features-header {
        text-align: center;
        margin-bottom: 4rem;
        position: relative;
        z-index: 10;
    }

    .features-title {
        font-size: clamp(2.5rem, 4vw, 3.5rem);
        font-weight: 800;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .features-subtitle {
        font-size: 1.25rem;
        color: #64748b;
        font-weight: 500;
        max-width: 600px;
        margin: 0 auto;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        position: relative;
        z-index: 10;
    }

    .feature-card {
        background: white;
        border-radius: 24px;
        padding: 2.5rem;
        border: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        transform: scaleX(0);
        transition: transform 0.4s ease;
        transform-origin: left;
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
    }

    .feature-card:hover::before {
        transform: scaleX(1);
    }

    .feature-icon-container {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        position: relative;
        transition: all 0.4s ease;
    }

    .feature-card:hover .feature-icon-container {
        transform: scale(1.1) rotate(5deg);
    }

    .feature-icon {
        font-size: 2rem;
        color: white;
        transition: all 0.4s ease;
    }

    .feature-card:hover .feature-icon {
        transform: scale(1.1);
    }

    /* Different colors for each feature */
    .feature-card:nth-child(1) .feature-icon-container {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    }

    .feature-card:nth-child(2) .feature-icon-container {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .feature-card:nth-child(3) .feature-icon-container {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .feature-card:nth-child(4) .feature-icon-container {
        background: linear-gradient(135deg, #06b6d4, #0891b2);
    }

    .feature-card:nth-child(5) .feature-icon-container {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }

    .feature-card:nth-child(6) .feature-icon-container {
        background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    }

    .feature-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 1rem;
        line-height: 1.3;
    }

    .feature-description {
        font-size: 1rem;
        color: #64748b;
        line-height: 1.6;
        flex-grow: 1;
    }

    .feature-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--primary-color);
        font-weight: 600;
        text-decoration: none;
        margin-top: 1.5rem;
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(10px);
    }

    .feature-card:hover .feature-link {
        opacity: 1;
        transform: translateY(0);
    }

    .feature-link:hover {
        color: var(--primary-dark);
        transform: translateX(5px);
    }

    /* Animation classes */
    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    .stagger-1 { animation-delay: 0.1s; }
    .stagger-2 { animation-delay: 0.2s; }
    .stagger-3 { animation-delay: 0.3s; }
    .stagger-4 { animation-delay: 0.4s; }
    .stagger-5 { animation-delay: 0.5s; }
    .stagger-6 { animation-delay: 0.6s; }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .features-section {
            padding: 3rem 0;
        }

        .features-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .feature-card {
            padding: 2rem;
        }

        .features-header {
            margin-bottom: 3rem;
        }

        .features-title {
            font-size: 2.5rem;
        }

        .features-subtitle {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 576px) {
        .feature-card {
            padding: 1.5rem;
        }

        .feature-icon-container {
            width: 70px;
            height: 70px;
        }

        .feature-icon {
            font-size: 1.75rem;
        }

        .feature-title {
            font-size: 1.25rem;
        }
    }
</style>
@endpush

<!-- Features Section -->
<section class="features-section">
    <div class="container-xl">
        <div class="features-header fade-in-up">
            <h2 class="features-title">Why Choose EventPro?</h2>
            <p class="features-subtitle">Comprehensive event management made simple and efficient</p>
        </div>

        <div class="features-grid">
            <!-- Feature 1: Easy Event Creation -->
            <div class="feature-card fade-in-up stagger-1">
                <div class="feature-icon-container">
                    <i class="fas fa-calendar-plus feature-icon"></i>
                </div>
                <h3 class="feature-title">Easy Event Creation</h3>
                <p class="feature-description">
                    Create and manage events with our intuitive interface. Add details, set pricing,
                    and publish in minutes with our streamlined workflow.
                </p>
                <a href="#" class="feature-link">
                    Learn more <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Feature 2: QR Code Tickets -->
            <div class="feature-card fade-in-up stagger-2">
                <div class="feature-icon-container">
                    <i class="fas fa-qrcode feature-icon"></i>
                </div>
                <h3 class="feature-title">QR Code Tickets</h3>
                <p class="feature-description">
                    Generate secure QR code tickets automatically. Easy check-in process and
                    real-time attendance tracking for seamless event management.
                </p>
                <a href="#" class="feature-link">
                    Learn more <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Feature 3: Secure Payments -->
            <div class="feature-card fade-in-up stagger-3">
                <div class="feature-icon-container">
                    <i class="fas fa-credit-card feature-icon"></i>
                </div>
                <h3 class="feature-title">Secure Payments</h3>
                <p class="feature-description">
                    Integrated payment system with multiple payment options. Secure, fast,
                    and reliable transactions with industry-standard encryption.
                </p>
                <a href="#" class="feature-link">
                    Learn more <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Feature 4: Smart Notifications -->
            <div class="feature-card fade-in-up stagger-4">
                <div class="feature-icon-container">
                    <i class="fas fa-bell feature-icon"></i>
                </div>
                <h3 class="feature-title">Smart Notifications</h3>
                <p class="feature-description">
                    Email and SMS notifications for registrations, reminders, and updates.
                    Keep everyone informed with automated communication workflows.
                </p>
                <a href="#" class="feature-link">
                    Learn more <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Feature 5: Analytics & Reports -->
            <div class="feature-card fade-in-up stagger-5">
                <div class="feature-icon-container">
                    <i class="fas fa-chart-line feature-icon"></i>
                </div>
                <h3 class="feature-title">Analytics & Reports</h3>
                <p class="feature-description">
                    Detailed analytics and reports. Track attendance, revenue, and performance
                    metrics with comprehensive data visualization tools.
                </p>
                <a href="#" class="feature-link">
                    Learn more <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Feature 6: User Management -->
            <div class="feature-card fade-in-up stagger-6">
                <div class="feature-icon-container">
                    <i class="fas fa-users feature-icon"></i>
                </div>
                <h3 class="feature-title">User Management</h3>
                <p class="feature-description">
                    Comprehensive user and company registration system. Manage attendees
                    and organizers efficiently with role-based access control.
                </p>
                <a href="#" class="feature-link">
                    Learn more <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe all animated elements
    document.querySelectorAll('.fade-in-up').forEach(el => {
        el.style.animationPlayState = 'paused';
        observer.observe(el);
    });

    // Add hover effects for feature cards
    document.querySelectorAll('.feature-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // Parallax effect for icons
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        document.querySelectorAll('.feature-icon-container').forEach((icon, index) => {
            const speed = 0.5 + (index * 0.1);
            const yPos = -(scrolled * speed / 10);
            icon.style.transform = `translateY(${yPos}px)`;
        });
    });
});
</script>
@endpush
