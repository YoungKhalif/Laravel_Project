@push('styles')
<style>
    .how-it-works-section {
        padding: 5rem 0;
        background: white;
        position: relative;
        overflow: hidden;
    }

    .how-it-works-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 25% 25%, rgba(59, 130, 246, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 75% 75%, rgba(139, 92, 246, 0.03) 0%, transparent 50%);
        pointer-events: none;
    }

    .how-it-works-header {
        text-align: center;
        margin-bottom: 4rem;
        position: relative;
        z-index: 10;
    }

    .how-it-works-title {
        font-size: clamp(2.5rem, 4vw, 3.5rem);
        font-weight: 800;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .how-it-works-subtitle {
        font-size: 1.25rem;
        color: #64748b;
        font-weight: 500;
        max-width: 600px;
        margin: 0 auto;
    }

    .steps-container {
        position: relative;
        z-index: 10;
    }

    .steps-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        position: relative;
    }

    .step-card {
        text-align: center;
        position: relative;
        padding: 2rem 1.5rem;
        background: white;
        border-radius: 24px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
        transition: all 0.4s ease;
        overflow: hidden;
    }

    .step-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.02), rgba(139, 92, 246, 0.02));
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .step-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
    }

    .step-card:hover::before {
        opacity: 1;
    }

    .step-number-container {
        position: relative;
        margin-bottom: 2rem;
        display: inline-block;
    }

    .step-number {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        font-weight: 800;
        color: white;
        position: relative;
        transition: all 0.4s ease;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .step-card:hover .step-number {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }

    /* Different colors for each step */
    .step-card:nth-child(1) .step-number {
        background: linear-gradient(135deg, #3b82f6, #1d4ed8);
    }

    .step-card:nth-child(2) .step-number {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .step-card:nth-child(3) .step-number {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .step-card:nth-child(4) .step-number {
        background: linear-gradient(135deg, #06b6d4, #0891b2);
    }

    .step-number::after {
        content: '';
        position: absolute;
        inset: -4px;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(139, 92, 246, 0.2));
        z-index: -1;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .step-card:hover .step-number::after {
        opacity: 1;
    }

    .step-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 1rem;
        line-height: 1.3;
    }

    .step-description {
        font-size: 1rem;
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .step-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--primary-color);
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        opacity: 0;
        transform: translateY(10px);
    }

    .step-card:hover .step-link {
        opacity: 1;
        transform: translateY(0);
    }

    .step-link:hover {
        color: var(--primary-dark);
        transform: translateX(5px);
    }

    /* Connection lines between steps (desktop only) */
    .step-connector {
        position: absolute;
        top: 50%;
        left: 50%;
        width: calc(100% - 160px);
        height: 2px;
        background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
        transform: translateY(-50%);
        z-index: -1;
    }

    .step-connector::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        transform: translateY(-50%);
        transition: width 2s ease;
    }

    .step-connector.animate::before {
        width: 100%;
    }

    /* Floating icons animation */
    .step-icon {
        position: absolute;
        top: -10px;
        right: -10px;
        width: 30px;
        height: 30px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 14px;
        opacity: 0;
        transform: scale(0);
        transition: all 0.4s ease;
    }

    .step-card:hover .step-icon {
        opacity: 1;
        transform: scale(1);
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

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .step-connector {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .how-it-works-section {
            padding: 3rem 0;
        }

        .steps-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .step-card {
            padding: 1.5rem;
        }

        .how-it-works-header {
            margin-bottom: 3rem;
        }

        .how-it-works-title {
            font-size: 2.5rem;
        }

        .how-it-works-subtitle {
            font-size: 1.1rem;
        }
    }

    @media (max-width: 576px) {
        .step-number {
            width: 70px;
            height: 70px;
            font-size: 1.75rem;
        }

        .step-title {
            font-size: 1.25rem;
        }

        .step-card {
            padding: 1.25rem;
        }
    }
</style>
@endpush

<!-- How It Works Section -->
<section class="how-it-works-section">
    <div class="container-xl">
        <div class="how-it-works-header fade-in-up">
            <h2 class="how-it-works-title">How It Works</h2>
            <p class="how-it-works-subtitle">Simple steps to get started with your event journey</p>
        </div>

        <div class="steps-container">
            <div class="steps-grid">
                <!-- Step 1: Create Account -->
                <div class="step-card fade-in-up stagger-1">
                    <div class="step-number-container">
                        <div class="step-number">1</div>
                        <div class="step-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                    <h3 class="step-title">Create Account</h3>
                    <p class="step-description">
                        Sign up as an individual or register your company to start managing events.
                        Choose from our flexible account types.
                    </p>
                    <a href="{{ route('register') }}" class="step-link">
                        Get started <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Step 2: Discover Events -->
                <div class="step-card fade-in-up stagger-2">
                    <div class="step-number-container">
                        <div class="step-number">2</div>
                        <div class="step-icon">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                    <h3 class="step-title">Discover Events</h3>
                    <p class="step-description">
                        Browse through amazing events or create your own. Set preferences
                        and get personalized recommendations.
                    </p>
                    <a href="{{ route('events.index') }}" class="step-link">
                        Browse events <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Step 3: Book & Pay -->
                <div class="step-card fade-in-up stagger-3">
                    <div class="step-number-container">
                        <div class="step-number">3</div>
                        <div class="step-icon">
                            <i class="fas fa-credit-card"></i>
                        </div>
                    </div>
                    <h3 class="step-title">Book & Pay</h3>
                    <p class="step-description">
                        Register for events and make secure payments. Get instant
                        confirmation and digital tickets delivered immediately.
                    </p>
                    <a href="#" class="step-link">
                        Learn more <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Step 4: Attend & Enjoy -->
                <div class="step-card fade-in-up stagger-4">
                    <div class="step-number-container">
                        <div class="step-number">4</div>
                        <div class="step-icon">
                            <i class="fas fa-qrcode"></i>
                        </div>
                    </div>
                    <h3 class="step-title">Attend & Enjoy</h3>
                    <p class="step-description">
                        Show your QR code ticket at the event. Enjoy seamless check-in
                        and great experiences with fellow attendees.
                    </p>
                    <a href="#" class="step-link">
                        See how <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Connection line (hidden on mobile) -->
            <div class="step-connector"></div>
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

    // Animate connection line
    const connectorObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('animate');
                }, 1000);
                connectorObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    const connector = document.querySelector('.step-connector');
    if (connector && window.innerWidth > 992) {
        connectorObserver.observe(connector);
    }

    // Add enhanced hover effects
    document.querySelectorAll('.step-card').forEach((card, index) => {
        card.addEventListener('mouseenter', function() {
            // Scale effect
            this.style.transform = 'translateY(-8px) scale(1.02)';

            // Add glow effect
            const number = this.querySelector('.step-number');
            if (number) {
                number.style.boxShadow = '0 15px 35px rgba(0, 0, 0, 0.2), 0 0 30px rgba(59, 130, 246, 0.3)';
            }
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';

            const number = this.querySelector('.step-number');
            if (number) {
                number.style.boxShadow = '0 8px 25px rgba(0, 0, 0, 0.15)';
            }
        });
    });

    // Parallax effect for step numbers
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        document.querySelectorAll('.step-number').forEach((number, index) => {
            const speed = 0.3 + (index * 0.1);
            const yPos = -(scrolled * speed / 20);
            number.style.transform = `translateY(${yPos}px)`;
        });
    });

    // Counter animation for step numbers
    function animateStepNumbers() {
        document.querySelectorAll('.step-number').forEach((number, index) => {
            setTimeout(() => {
                number.style.transform = 'scale(0)';
                number.style.opacity = '0';

                setTimeout(() => {
                    number.style.transition = 'all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
                    number.style.transform = 'scale(1)';
                    number.style.opacity = '1';
                }, 100);
            }, index * 200);
        });
    }

    // Trigger animation when section comes into view
    const sectionObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                setTimeout(animateStepNumbers, 500);
                sectionObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    const section = document.querySelector('.how-it-works-section');
    if (section) {
        sectionObserver.observe(section);
    }
});
</script>
@endpush
