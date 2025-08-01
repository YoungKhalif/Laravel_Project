@push('styles')
<style>
    .cta-section {
        padding: 6rem 0;
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 25% 25%, rgba(59, 130, 246, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 75% 75%, rgba(139, 92, 246, 0.15) 0%, transparent 50%),
            radial-gradient(circle at 50% 0%, rgba(236, 72, 153, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }

    .cta-section::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image:
            url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='m36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        opacity: 0.5;
        pointer-events: none;
    }

    .cta-container {
        position: relative;
        z-index: 10;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .cta-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 2rem;
        animation: float 3s ease-in-out infinite;
    }

    .cta-badge i {
        color: #60a5fa;
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-5px); }
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    .cta-title {
        font-size: clamp(2.5rem, 5vw, 4rem);
        font-weight: 800;
        color: white;
        margin-bottom: 1.5rem;
        line-height: 1.1;
        text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
    }

    .cta-title .gradient-text {
        background: linear-gradient(135deg, #60a5fa, #a855f7, #ec4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradientShift 3s ease-in-out infinite;
    }

    @keyframes gradientShift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .cta-description {
        font-size: 1.25rem;
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.6;
        margin-bottom: 3rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .cta-buttons {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 4rem;
    }

    .cta-btn-primary {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        padding: 1rem 2.5rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.1rem;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: none;
        cursor: pointer;
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
    }

    .cta-btn-primary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #1d4ed8, #7c3aed);
        transition: left 0.3s ease;
        z-index: -1;
    }

    .cta-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(59, 130, 246, 0.4);
        color: white;
    }

    .cta-btn-primary:hover::before {
        left: 0;
    }

    .cta-btn-secondary {
        background: transparent;
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
        padding: 1rem 2.5rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.1rem;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(20px);
    }

    .cta-btn-secondary:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: white;
        transform: translateY(-3px);
        color: white;
        box-shadow: 0 10px 30px rgba(255, 255, 255, 0.1);
    }

    .cta-features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin-top: 4rem;
    }

    .cta-feature {
        text-align: center;
        padding: 1.5rem;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }

    .cta-feature:hover {
        background: rgba(255, 255, 255, 0.1);
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .cta-feature-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 1rem;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }

    .cta-feature h4 {
        color: white;
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .cta-feature p {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9rem;
        margin: 0;
        line-height: 1.5;
    }

    /* Floating particles animation */
    .particle {
        position: absolute;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.8) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
        animation: float-particle 8s ease-in-out infinite;
    }

    @keyframes float-particle {
        0%, 100% {
            transform: translateY(0px) translateX(0px) rotate(0deg);
            opacity: 0;
        }
        10%, 90% {
            opacity: 1;
        }
        50% {
            transform: translateY(-100px) translateX(50px) rotate(180deg);
        }
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

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .cta-section {
            padding: 4rem 0;
        }

        .cta-title {
            font-size: 2.5rem;
        }

        .cta-description {
            font-size: 1.1rem;
        }

        .cta-buttons {
            flex-direction: column;
            gap: 1rem;
        }

        .cta-btn-primary,
        .cta-btn-secondary {
            width: 100%;
            justify-content: center;
        }

        .cta-features {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
    }

    @media (max-width: 576px) {
        .cta-title {
            font-size: 2rem;
        }

        .cta-btn-primary,
        .cta-btn-secondary {
            padding: 0.875rem 2rem;
            font-size: 1rem;
        }

        .cta-feature {
            padding: 1.25rem;
        }

        .cta-feature-icon {
            width: 50px;
            height: 50px;
            font-size: 1.25rem;
        }
    }
</style>
@endpush

<!-- CTA Section -->
<section class="cta-section">
    <div class="container-xl">
        <div class="cta-container">
            <div class="cta-badge fade-in-up">
                <i class="fas fa-rocket"></i>
                <span>Start Your Journey Today</span>
            </div>

            <h2 class="cta-title fade-in-up stagger-1">
                Ready to <span class="gradient-text">Transform</span><br>
                Your Events?
            </h2>

            <p class="cta-description fade-in-up stagger-2">
                Join thousands of successful event organizers who trust our platform to create
                memorable experiences. From small workshops to large conferences, we've got you covered.
            </p>

            <div class="cta-buttons fade-in-up stagger-3">
                <a href="{{ route('register') }}" class="cta-btn-primary">
                    Get Started Free <i class="fas fa-arrow-right"></i>
                </a>
                <a href="{{ route('events.index') }}" class="cta-btn-secondary">
                    Explore Events <i class="fas fa-search"></i>
                </a>
            </div>

            <div class="cta-features fade-in-up stagger-4">
                <div class="cta-feature">
                    <div class="cta-feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>Quick Setup</h4>
                    <p>Create your first event in minutes with our intuitive interface</p>
                </div>

                <div class="cta-feature">
                    <div class="cta-feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Secure Payments</h4>
                    <p>PCI-compliant payment processing with fraud protection</p>
                </div>

                <div class="cta-feature">
                    <div class="cta-feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Real-time Analytics</h4>
                    <p>Track registrations, revenue, and attendee engagement</p>
                </div>

                <div class="cta-feature">
                    <div class="cta-feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h4>24/7 Support</h4>
                    <p>Get help whenever you need it from our expert team</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating particles -->
    <div class="particle" style="width: 4px; height: 4px; top: 20%; left: 10%; animation-delay: 0s;"></div>
    <div class="particle" style="width: 6px; height: 6px; top: 40%; left: 20%; animation-delay: 2s;"></div>
    <div class="particle" style="width: 3px; height: 3px; top: 60%; left: 80%; animation-delay: 4s;"></div>
    <div class="particle" style="width: 5px; height: 5px; top: 30%; left: 90%; animation-delay: 6s;"></div>
    <div class="particle" style="width: 4px; height: 4px; top: 70%; left: 15%; animation-delay: 1s;"></div>
    <div class="particle" style="width: 3px; height: 3px; top: 10%; left: 70%; animation-delay: 3s;"></div>
    <div class="particle" style="width: 6px; height: 6px; top: 80%; left: 60%; animation-delay: 5s;"></div>
    <div class="particle" style="width: 4px; height: 4px; top: 50%; left: 5%; animation-delay: 7s;"></div>
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

    // Enhanced button hover effects
    document.querySelectorAll('.cta-btn-primary, .cta-btn-secondary').forEach(button => {
        button.addEventListener('mouseenter', function() {
            // Create ripple effect
            const ripple = document.createElement('div');
            ripple.style.position = 'absolute';
            ripple.style.width = '20px';
            ripple.style.height = '20px';
            ripple.style.background = 'rgba(255, 255, 255, 0.3)';
            ripple.style.borderRadius = '50%';
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'ripple 0.6s linear';
            ripple.style.pointerEvents = 'none';

            const rect = this.getBoundingClientRect();
            ripple.style.left = '50%';
            ripple.style.top = '50%';
            ripple.style.transform = 'translate(-50%, -50%) scale(0)';

            this.style.position = 'relative';
            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // Add ripple animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: translate(-50%, -50%) scale(4);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);

    // Parallax effect for background
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const section = document.querySelector('.cta-section');

        if (section) {
            const rate = scrolled * 0.3;
            section.style.backgroundPosition = `center ${rate}px`;
        }
    });

    // Dynamic particle generation
    function createParticle() {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.width = Math.random() * 6 + 2 + 'px';
        particle.style.height = particle.style.width;
        particle.style.left = Math.random() * 100 + '%';
        particle.style.top = '100%';
        particle.style.animationDelay = '0s';
        particle.style.animationDuration = Math.random() * 4 + 6 + 's';

        document.querySelector('.cta-section').appendChild(particle);

        // Remove particle after animation
        setTimeout(() => {
            if (particle.parentNode) {
                particle.parentNode.removeChild(particle);
            }
        }, 10000);
    }

    // Create particles periodically
    setInterval(createParticle, 2000);

    // Gradient text animation enhancement
    const gradientText = document.querySelector('.gradient-text');
    if (gradientText) {
        gradientText.style.backgroundSize = '200% 200%';

        let angle = 0;
        setInterval(() => {
            angle += 2;
            gradientText.style.background = `linear-gradient(${angle}deg, #60a5fa, #a855f7, #ec4899)`;
        }, 100);
    }

    // Feature card interaction
    document.querySelectorAll('.cta-feature').forEach(feature => {
        feature.addEventListener('mouseenter', function() {
            const icon = this.querySelector('.cta-feature-icon');
            if (icon) {
                icon.style.transform = 'scale(1.1) rotate(5deg)';
                icon.style.boxShadow = '0 10px 30px rgba(59, 130, 246, 0.3)';
            }
        });

        feature.addEventListener('mouseleave', function() {
            const icon = this.querySelector('.cta-feature-icon');
            if (icon) {
                icon.style.transform = 'scale(1) rotate(0deg)';
                icon.style.boxShadow = 'none';
            }
        });
    });

    // Typing effect for the title (optional enhancement)
    function typeWriter(element, text, speed = 100) {
        let i = 0;
        element.innerHTML = '';

        function type() {
            if (i < text.length) {
                element.innerHTML += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }

        type();
    }

    // Mouse move effect for buttons
    document.querySelectorAll('.cta-btn-primary, .cta-btn-secondary').forEach(button => {
        button.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const deltaX = (x - centerX) / centerX;
            const deltaY = (y - centerY) / centerY;

            this.style.transform = `translateY(-3px) rotateX(${deltaY * 10}deg) rotateY(${deltaX * 10}deg)`;
        });

        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) rotateX(0) rotateY(0)';
        });
    });

    // Performance optimization: pause animations when not visible
    const sectionObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            const particles = entry.target.querySelectorAll('.particle');
            if (entry.isIntersecting) {
                particles.forEach(particle => {
                    particle.style.animationPlayState = 'running';
                });
            } else {
                particles.forEach(particle => {
                    particle.style.animationPlayState = 'paused';
                });
            }
        });
    }, { threshold: 0.1 });

    sectionObserver.observe(document.querySelector('.cta-section'));
});
</script>
@endpush
