@push('styles')
<style>
    .hero-section {
        min-height: 80vh;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%);
        pointer-events: none;
    }

    .hero-floating-elements {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        pointer-events: none;
    }

    .floating-element {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 50%;
        animation: heroFloat 8s ease-in-out infinite;
    }

    .floating-element:nth-child(1) {
        width: 100px;
        height: 100px;
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }

    .floating-element:nth-child(2) {
        width: 150px;
        height: 150px;
        top: 60%;
        right: 15%;
        animation-delay: 3s;
    }

    .floating-element:nth-child(3) {
        width: 80px;
        height: 80px;
        bottom: 30%;
        left: 70%;
        animation-delay: 6s;
    }

    .floating-element:nth-child(4) {
        width: 120px;
        height: 120px;
        top: 10%;
        right: 30%;
        animation-delay: 2s;
    }

    @keyframes heroFloat {
        0%, 100% {
            transform: translateY(0px) rotate(0deg);
            opacity: 0.7;
        }
        33% {
            transform: translateY(-30px) rotate(120deg);
            opacity: 1;
        }
        66% {
            transform: translateY(15px) rotate(240deg);
            opacity: 0.8;
        }
    }

    .hero-content {
        position: relative;
        z-index: 10;
    }

    .hero-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        line-height: 1.1;
        margin-bottom: 1.5rem;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .hero-highlight {
        background: linear-gradient(135deg, #ffd700, #ffed4e);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        position: relative;
    }

    .hero-highlight::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(135deg, #ffd700, #ffed4e);
        border-radius: 2px;
        opacity: 0.6;
    }

    .hero-description {
        font-size: 1.25rem;
        line-height: 1.6;
        margin-bottom: 2rem;
        color: rgba(255, 255, 255, 0.9);
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .hero-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 3rem;
    }

    .btn-hero-primary {
        background: linear-gradient(135deg, #ffffff, #f8fafc);
        color: #1e293b;
        border: none;
        font-weight: 700;
        padding: 16px 32px;
        border-radius: 50px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }

    .btn-hero-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .btn-hero-primary:hover::before {
        left: 100%;
    }

    .btn-hero-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(255, 255, 255, 0.3);
        color: #1e293b;
    }

    .btn-hero-secondary {
        background: transparent;
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
        font-weight: 600;
        padding: 14px 30px;
        border-radius: 50px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .btn-hero-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.5);
        transform: translateY(-3px);
        color: white;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }

    .hero-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        margin-top: 3rem;
    }

    .stat-item {
        text-align: center;
        position: relative;
        padding: 1.5rem;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .stat-item:hover {
        transform: translateY(-5px);
        background: rgba(255, 255, 255, 0.15);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: #ffd700;
        line-height: 1;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .stat-label {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.8);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .hero-image-container {
        position: relative;
        z-index: 5;
    }

    .hero-image {
        border-radius: 25px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
        transition: all 0.5s ease;
        transform: perspective(1000px) rotateY(-5deg) rotateX(5deg);
    }

    .hero-image:hover {
        transform: perspective(1000px) rotateY(0deg) rotateX(0deg) scale(1.02);
        box-shadow: 0 35px 80px rgba(0, 0, 0, 0.4);
    }

    .hero-image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.2), rgba(118, 75, 162, 0.2));
        border-radius: 25px;
        pointer-events: none;
    }

    /* Animation delays for text elements */
    .animate-delay-1 {
        animation-delay: 0.2s;
    }

    .animate-delay-2 {
        animation-delay: 0.4s;
    }

    .animate-delay-3 {
        animation-delay: 0.6s;
    }

    .animate-delay-4 {
        animation-delay: 0.8s;
    }

    /* Fade in up animation */
    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-section {
            min-height: 70vh;
            text-align: center;
        }

        .hero-stats {
            grid-template-columns: 1fr;
            gap: 1rem;
            margin-top: 2rem;
        }

        .hero-buttons {
            justify-content: center;
        }

        .btn-hero-primary,
        .btn-hero-secondary {
            width: 100%;
            max-width: 280px;
        }

        .stat-number {
            font-size: 2rem;
        }

        .hero-image {
            transform: none;
            margin-top: 2rem;
        }
    }

    @media (max-width: 576px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-description {
            font-size: 1.1rem;
        }

        .hero-stats {
            margin-top: 1.5rem;
        }

        .stat-item {
            padding: 1rem;
        }
    }
</style>
@endpush

<!-- Hero Section -->
<section class="hero-section">
    <div class="hero-floating-elements">
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
        <div class="floating-element"></div>
    </div>

    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="hero-title fade-in-up animate-delay-1">
                        Smart Event Registration &
                        <span class="hero-highlight">Ticketing System</span>
                    </h1>

                    <p class="hero-description fade-in-up animate-delay-2">
                        Discover, register, and manage events seamlessly. From corporate conferences to entertainment shows,
                        find your next amazing experience with our intelligent ticketing platform.
                    </p>

                    <div class="hero-buttons fade-in-up animate-delay-3">
                        <a href="{{ route('events.index') }}" class="btn btn-hero-primary">
                            <i class="fas fa-search me-2"></i>Explore Events
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-hero-secondary">
                            <i class="fas fa-user-plus me-2"></i>Get Started
                        </a>
                    </div>

                    <!-- Stats -->
                    <div class="hero-stats fade-in-up animate-delay-4">
                        <div class="stat-item">
                            <div class="stat-number">50K+</div>
                            <div class="stat-label">Events Hosted</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">2M+</div>
                            <div class="stat-label">Tickets Sold</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">Companies</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="hero-image-container fade-in-up animate-delay-3">
                    <div class="hero-image-overlay"></div>
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80"
                         alt="Event Management Platform"
                         class="hero-image img-fluid"
                         style="max-height: 500px; width: 100%; object-fit: cover;">
                </div>
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
            }
        });
    }, observerOptions);

    // Observe all animated elements
    document.querySelectorAll('.fade-in-up').forEach(el => {
        el.style.animationPlayState = 'paused';
        observer.observe(el);
    });

    // Parallax effect for floating elements
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;

        document.querySelectorAll('.floating-element').forEach((element, index) => {
            const speed = (index + 1) * 0.3;
            element.style.transform = `translateY(${rate * speed}px) rotate(${scrolled * 0.1}deg)`;
        });
    });

    // Hero image hover effect
    const heroImage = document.querySelector('.hero-image');
    if (heroImage) {
        heroImage.addEventListener('mouseenter', function() {
            this.style.filter = 'brightness(1.1) saturate(1.1)';
        });

        heroImage.addEventListener('mouseleave', function() {
            this.style.filter = 'brightness(1) saturate(1)';
        });
    }

    // Counter animation
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }

            if (target >= 1000000) {
                element.textContent = (current / 1000000).toFixed(1) + 'M+';
            } else if (target >= 1000) {
                element.textContent = (current / 1000).toFixed(0) + 'K+';
            } else {
                element.textContent = Math.floor(current) + '+';
            }
        }, 20);
    }

    // Trigger counter animation when stats come into view
    const statsObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const numbers = entry.target.querySelectorAll('.stat-number');
                numbers.forEach(number => {
                    const text = number.textContent;
                    let target = parseInt(text.replace(/[^\d]/g, ''));

                    if (text.includes('M')) target *= 1000000;
                    else if (text.includes('K')) target *= 1000;

                    animateCounter(number, target);
                });
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    const statsSection = document.querySelector('.hero-stats');
    if (statsSection) {
        statsObserver.observe(statsSection);
    }
});
</script>
@endpush
