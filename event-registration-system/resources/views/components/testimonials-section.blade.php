@push('styles')
<style>
    .testimonials-section {
        padding: 5rem 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        position: relative;
        overflow: hidden;
    }

    .testimonials-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 70% 80%, rgba(255, 255, 255, 0.08) 0%, transparent 50%);
        pointer-events: none;
    }

    .testimonials-header {
        text-align: center;
        margin-bottom: 4rem;
        position: relative;
        z-index: 10;
    }

    .testimonials-title {
        font-size: clamp(2.5rem, 4vw, 3.5rem);
        font-weight: 800;
        color: white;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    .testimonials-subtitle {
        font-size: 1.25rem;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
        max-width: 600px;
        margin: 0 auto;
    }

    .testimonials-container {
        position: relative;
        z-index: 10;
    }

    .testimonials-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .testimonial-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 2.5rem;
        position: relative;
        transition: all 0.4s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    }

    .testimonial-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        background: white;
    }

    .testimonial-card::before {
        content: '';
        position: absolute;
        top: -2px;
        left: -2px;
        right: -2px;
        bottom: -2px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.3), rgba(255, 255, 255, 0.1));
        border-radius: 26px;
        z-index: -1;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .testimonial-card:hover::before {
        opacity: 1;
    }

    .quote-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        position: relative;
    }

    .quote-icon i {
        color: white;
        font-size: 1.25rem;
    }

    .quote-icon::after {
        content: '';
        position: absolute;
        inset: -4px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        z-index: -1;
        opacity: 0.3;
        filter: blur(8px);
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 0.3; }
        50% { transform: scale(1.1); opacity: 0.5; }
    }

    .testimonial-text {
        font-size: 1.1rem;
        line-height: 1.7;
        color: #374151;
        margin-bottom: 2rem;
        font-style: italic;
        position: relative;
    }

    .testimonial-text::before {
        content: '"';
        font-size: 4rem;
        color: var(--primary-color);
        opacity: 0.2;
        position: absolute;
        top: -1rem;
        left: -0.5rem;
        font-family: 'Times New Roman', serif;
    }

    .testimonial-author {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .author-avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid rgba(59, 130, 246, 0.2);
        transition: all 0.3s ease;
    }

    .testimonial-card:hover .author-avatar {
        border-color: var(--primary-color);
        transform: scale(1.05);
    }

    .author-info h4 {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 0.25rem;
    }

    .author-info p {
        font-size: 0.9rem;
        color: #64748b;
        margin: 0;
    }

    .star-rating {
        display: flex;
        gap: 0.25rem;
        margin-top: 0.5rem;
    }

    .star-rating i {
        color: #fbbf24;
        font-size: 1rem;
        animation: starTwinkle 2s ease-in-out infinite;
    }

    .star-rating i:nth-child(2) { animation-delay: 0.2s; }
    .star-rating i:nth-child(3) { animation-delay: 0.4s; }
    .star-rating i:nth-child(4) { animation-delay: 0.6s; }
    .star-rating i:nth-child(5) { animation-delay: 0.8s; }

    @keyframes starTwinkle {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.2); }
    }

    .testimonials-stats {
        display: flex;
        justify-content: center;
        gap: 3rem;
        margin-top: 3rem;
        flex-wrap: wrap;
    }

    .stat-item {
        text-align: center;
        color: white;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        display: block;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }

    .stat-label {
        font-size: 1rem;
        opacity: 0.9;
        font-weight: 500;
    }

    /* Carousel Navigation */
    .testimonials-nav {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-top: 2rem;
    }

    .nav-dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.4);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .nav-dot.active,
    .nav-dot:hover {
        background: white;
        transform: scale(1.2);
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

    /* Counter animation */
    .counter {
        opacity: 0;
    }

    .counter.animate {
        animation: countUp 2s ease-out forwards;
    }

    @keyframes countUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .testimonials-section {
            padding: 3rem 0;
        }

        .testimonials-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .testimonial-card {
            padding: 2rem;
        }

        .testimonials-header {
            margin-bottom: 3rem;
        }

        .testimonials-title {
            font-size: 2.5rem;
        }

        .testimonials-subtitle {
            font-size: 1.1rem;
        }

        .testimonials-stats {
            gap: 2rem;
        }

        .stat-number {
            font-size: 2rem;
        }
    }

    @media (max-width: 576px) {
        .testimonial-card {
            padding: 1.5rem;
        }

        .testimonial-text {
            font-size: 1rem;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
        }

        .testimonials-stats {
            flex-direction: column;
            gap: 1.5rem;
        }
    }
</style>
@endpush

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container-xl">
        <div class="testimonials-header fade-in-up">
            <h2 class="testimonials-title">What Our Users Say</h2>
            <p class="testimonials-subtitle">
                Discover why thousands of event organizers and attendees trust our platform
            </p>
        </div>

        <div class="testimonials-container">
            <div class="testimonials-grid">
                <!-- Testimonial 1 -->
                <div class="testimonial-card fade-in-up stagger-1">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <div class="testimonial-text">
                        This platform transformed how we manage our tech conferences. The registration process is seamless,
                        and the analytics help us understand our audience better. Absolutely recommend it!
                    </div>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                             alt="Sarah Johnson" class="author-avatar">
                        <div class="author-info">
                            <h4>Sarah Johnson</h4>
                            <p>Event Director, TechCorp</p>
                            <div class="star-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="testimonial-card fade-in-up stagger-2">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <div class="testimonial-text">
                        As a frequent event attendee, I love how easy it is to discover new events and manage my tickets.
                        The mobile experience is fantastic, and I never miss important updates.
                    </div>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b4e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                             alt="Emily Chen" class="author-avatar">
                        <div class="author-info">
                            <h4>Emily Chen</h4>
                            <p>Marketing Professional</p>
                            <div class="star-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="testimonial-card fade-in-up stagger-3">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <div class="testimonial-text">
                        The customer support is outstanding! When we had a last-minute venue change,
                        the team helped us notify all attendees instantly. Professional and reliable service.
                    </div>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                             alt="Michael Rodriguez" class="author-avatar">
                        <div class="author-info">
                            <h4>Michael Rodriguez</h4>
                            <p>Startup Founder</p>
                            <div class="star-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="testimonial-card fade-in-up stagger-4">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <div class="testimonial-text">
                        We've been using this platform for our music festivals for two years now.
                        The ticketing system is robust, secure, and handles thousands of registrations without any issues.
                    </div>
                    <div class="testimonial-author">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=150&q=80"
                             alt="Lisa Thompson" class="author-avatar">
                        <div class="author-info">
                            <h4>Lisa Thompson</h4>
                            <p>Festival Organizer</p>
                            <div class="star-rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Dots -->
            <div class="testimonials-nav">
                <div class="nav-dot active"></div>
                <div class="nav-dot"></div>
                <div class="nav-dot"></div>
            </div>
        </div>

        <!-- Statistics -->
        <div class="testimonials-stats fade-in-up">
            <div class="stat-item">
                <span class="stat-number counter" data-count="50000">0</span>
                <span class="stat-label">Happy Users</span>
            </div>
            <div class="stat-item">
                <span class="stat-number counter" data-count="10000">0</span>
                <span class="stat-label">Events Hosted</span>
            </div>
            <div class="stat-item">
                <span class="stat-number counter" data-count="95">0</span>
                <span class="stat-label">% Satisfaction Rate</span>
            </div>
            <div class="stat-item">
                <span class="stat-number counter" data-count="1000000">0</span>
                <span class="stat-label">Tickets Sold</span>
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

    // Counter animation
    function animateCounter(element) {
        const target = parseInt(element.getAttribute('data-count'));
        const duration = 2000; // 2 seconds
        const increment = target / (duration / 16); // 60fps
        let current = 0;

        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }

            // Format numbers with commas
            const formatted = Math.floor(current).toLocaleString();
            element.textContent = target === 95 ? Math.floor(current) + '%' : formatted;
        }, 16);
    }

    // Observe counters
    const counterObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                setTimeout(() => animateCounter(entry.target), 500);
                counterObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.counter').forEach(counter => {
        counterObserver.observe(counter);
    });

    // Testimonial carousel functionality
    let currentSlide = 0;
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    const navDots = document.querySelectorAll('.nav-dot');
    const totalSlides = Math.ceil(testimonialCards.length / getVisibleCards());

    function getVisibleCards() {
        return window.innerWidth <= 768 ? 1 :
               window.innerWidth <= 1200 ? 2 : 3;
    }

    function updateCarousel() {
        const visibleCards = getVisibleCards();
        const offset = currentSlide * visibleCards;

        testimonialCards.forEach((card, index) => {
            card.style.display = 'none';
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';

            if (index >= offset && index < offset + visibleCards) {
                card.style.display = 'block';
                setTimeout(() => {
                    card.style.transition = 'all 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 50 * (index - offset));
            }
        });

        navDots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
    }

    // Navigation dot click handlers
    navDots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            updateCarousel();
        });
    });

    // Auto-advance carousel
    setInterval(() => {
        if (document.visibilityState === 'visible') {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateCarousel();
        }
    }, 5000);

    // Resize handler
    window.addEventListener('resize', () => {
        const newTotalSlides = Math.ceil(testimonialCards.length / getVisibleCards());
        if (currentSlide >= newTotalSlides) {
            currentSlide = 0;
        }
        updateCarousel();
    });

    // Initialize carousel
    updateCarousel();

    // Enhanced hover effects for testimonial cards
    testimonialCards.forEach((card, index) => {
        card.addEventListener('mouseenter', function() {
            // Add tilt effect
            const rect = this.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;

            this.addEventListener('mousemove', function(e) {
                const deltaX = (e.clientX - centerX) / rect.width;
                const deltaY = (e.clientY - centerY) / rect.height;

                this.style.transform = `translateY(-8px) scale(1.02)
                                       rotateX(${deltaY * 10}deg)
                                       rotateY(${deltaX * 10}deg)`;
            });
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1) rotateX(0) rotateY(0)';
            this.removeEventListener('mousemove', arguments.callee);
        });
    });

    // Parallax effect for background
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const section = document.querySelector('.testimonials-section');

        if (section) {
            const rate = scrolled * -0.3;
            section.style.backgroundPosition = `center ${rate}px`;
        }
    });

    // Add floating animation to quote icons
    document.querySelectorAll('.quote-icon').forEach((icon, index) => {
        setTimeout(() => {
            icon.style.animation = `float 3s ease-in-out infinite`;
            icon.style.animationDelay = `${index * 0.5}s`;
        }, 1000);
    });

    // Define float animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    `;
    document.head.appendChild(style);
});
</script>
@endpush
