@push('styles')
<style>
    .featured-events-section {
        padding: 5rem 0;
        background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        position: relative;
        overflow: hidden;
    }

    .featured-events-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 30%, rgba(59, 130, 246, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(139, 92, 246, 0.08) 0%, transparent 50%);
        pointer-events: none;
    }

    .featured-events-header {
        text-align: center;
        margin-bottom: 4rem;
        position: relative;
        z-index: 10;
    }

    .featured-events-title {
        font-size: clamp(2.5rem, 4vw, 3.5rem);
        font-weight: 800;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .featured-events-subtitle {
        font-size: 1.25rem;
        color: #64748b;
        font-weight: 500;
        max-width: 700px;
        margin: 0 auto 2rem;
    }

    .featured-events-nav {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 3rem;
        flex-wrap: wrap;
    }

    .event-filter-btn {
        padding: 0.75rem 1.5rem;
        border: 2px solid transparent;
        background: white;
        color: #64748b;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .event-filter-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        transition: left 0.3s ease;
        z-index: -1;
    }

    .event-filter-btn:hover,
    .event-filter-btn.active {
        color: white;
        border-color: var(--primary-color);
        transform: translateY(-2px);
    }

    .event-filter-btn:hover::before,
    .event-filter-btn.active::before {
        left: 0;
    }

    .events-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        position: relative;
        z-index: 10;
    }

    .event-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        position: relative;
        border: 1px solid rgba(0, 0, 0, 0.05);
    }

    .event-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
    }

    .event-image-container {
        position: relative;
        height: 220px;
        overflow: hidden;
    }

    .event-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .event-card:hover .event-image {
        transform: scale(1.05);
    }

    .event-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
        z-index: 10;
    }

    .event-favorite {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .event-favorite:hover {
        background: white;
        transform: scale(1.1);
    }

    .event-favorite i {
        color: #ff6b6b;
        transition: all 0.3s ease;
    }

    .event-favorite:hover i {
        transform: scale(1.2);
    }

    .event-content {
        padding: 2rem;
    }

    .event-meta {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
        font-size: 0.875rem;
        color: #64748b;
    }

    .event-meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .event-meta i {
        color: var(--primary-color);
    }

    .event-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--dark-color);
        margin-bottom: 1rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .event-description {
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .event-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 1rem;
        border-top: 1px solid #f1f5f9;
    }

    .event-price {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary-color);
    }

    .event-price .currency {
        font-size: 1rem;
        opacity: 0.8;
    }

    .event-btn {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .event-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        color: white;
    }

    .view-all-section {
        text-align: center;
        margin-top: 4rem;
    }

    .view-all-btn {
        background: white;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
        padding: 1rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        position: relative;
        overflow: hidden;
    }

    .view-all-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        transition: left 0.3s ease;
        z-index: -1;
    }

    .view-all-btn:hover {
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
    }

    .view-all-btn:hover::before {
        left: 0;
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
        .featured-events-section {
            padding: 3rem 0;
        }

        .events-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .event-content {
            padding: 1.5rem;
        }

        .featured-events-header {
            margin-bottom: 3rem;
        }

        .featured-events-title {
            font-size: 2.5rem;
        }

        .featured-events-subtitle {
            font-size: 1.1rem;
        }

        .featured-events-nav {
            gap: 0.5rem;
        }

        .event-filter-btn {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 576px) {
        .event-image-container {
            height: 200px;
        }

        .event-title {
            font-size: 1.25rem;
        }

        .event-footer {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }

        .event-btn {
            justify-content: center;
        }
    }
</style>
@endpush

<!-- Featured Events Section -->
<section class="featured-events-section">
    <div class="container-xl">
        <div class="featured-events-header fade-in-up">
            <h2 class="featured-events-title">Featured Events</h2>
            <p class="featured-events-subtitle">
                Discover amazing events happening near you. From conferences to concerts,
                find experiences that inspire and connect you with like-minded people.
            </p>

            <!-- Event Filter Navigation -->
            <div class="featured-events-nav">
                <button class="event-filter-btn active" data-filter="all">All Events</button>
                <button class="event-filter-btn" data-filter="conference">Conferences</button>
                <button class="event-filter-btn" data-filter="workshop">Workshops</button>
                <button class="event-filter-btn" data-filter="networking">Networking</button>
                <button class="event-filter-btn" data-filter="music">Music</button>
            </div>
        </div>

        <div class="events-grid">
            <!-- Event Card 1 -->
            <div class="event-card fade-in-up stagger-1" data-category="conference">
                <div class="event-image-container">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                         alt="Tech Conference 2024" class="event-image">
                    <div class="event-badge">Featured</div>
                    <div class="event-favorite">
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="event-content">
                    <div class="event-meta">
                        <div class="event-meta-item">
                            <i class="fas fa-calendar"></i>
                            <span>Mar 15, 2024</span>
                        </div>
                        <div class="event-meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>San Francisco</span>
                        </div>
                    </div>
                    <h3 class="event-title">Global Tech Conference 2024</h3>
                    <p class="event-description">
                        Join industry leaders and innovators for three days of cutting-edge technology insights,
                        networking opportunities, and hands-on workshops.
                    </p>
                    <div class="event-footer">
                        <div class="event-price">
                            <span class="currency">$</span>299
                        </div>
                        <a href="#" class="event-btn">
                            Book Now <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Event Card 2 -->
            <div class="event-card fade-in-up stagger-2" data-category="workshop">
                <div class="event-image-container">
                    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                         alt="Design Workshop" class="event-image">
                    <div class="event-badge">Workshop</div>
                    <div class="event-favorite">
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="event-content">
                    <div class="event-meta">
                        <div class="event-meta-item">
                            <i class="fas fa-calendar"></i>
                            <span>Mar 22, 2024</span>
                        </div>
                        <div class="event-meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>New York</span>
                        </div>
                    </div>
                    <h3 class="event-title">UI/UX Design Masterclass</h3>
                    <p class="event-description">
                        Learn from top designers and master the latest design trends, tools, and techniques
                        in this intensive hands-on workshop.
                    </p>
                    <div class="event-footer">
                        <div class="event-price">
                            <span class="currency">$</span>149
                        </div>
                        <a href="#" class="event-btn">
                            Book Now <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Event Card 3 -->
            <div class="event-card fade-in-up stagger-3" data-category="music">
                <div class="event-image-container">
                    <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                         alt="Music Festival" class="event-image">
                    <div class="event-badge">Festival</div>
                    <div class="event-favorite">
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="event-content">
                    <div class="event-meta">
                        <div class="event-meta-item">
                            <i class="fas fa-calendar"></i>
                            <span>Apr 5-7, 2024</span>
                        </div>
                        <div class="event-meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Austin</span>
                        </div>
                    </div>
                    <h3 class="event-title">Spring Music Festival</h3>
                    <p class="event-description">
                        Three days of incredible music featuring top artists, emerging talents,
                        food trucks, and an unforgettable atmosphere.
                    </p>
                    <div class="event-footer">
                        <div class="event-price">
                            <span class="currency">$</span>89
                        </div>
                        <a href="#" class="event-btn">
                            Book Now <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Event Card 4 -->
            <div class="event-card fade-in-up stagger-4" data-category="networking">
                <div class="event-image-container">
                    <img src="https://images.unsplash.com/photo-1515187029135-18ee286d815b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                         alt="Networking Event" class="event-image">
                    <div class="event-badge">Networking</div>
                    <div class="event-favorite">
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="event-content">
                    <div class="event-meta">
                        <div class="event-meta-item">
                            <i class="fas fa-calendar"></i>
                            <span>Mar 28, 2024</span>
                        </div>
                        <div class="event-meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Los Angeles</span>
                        </div>
                    </div>
                    <h3 class="event-title">Startup Networking Night</h3>
                    <p class="event-description">
                        Connect with entrepreneurs, investors, and innovators in the startup ecosystem.
                        Perfect for building meaningful business relationships.
                    </p>
                    <div class="event-footer">
                        <div class="event-price">
                            <span class="currency">$</span>25
                        </div>
                        <a href="#" class="event-btn">
                            Book Now <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Event Card 5 -->
            <div class="event-card fade-in-up stagger-5" data-category="conference">
                <div class="event-image-container">
                    <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                         alt="Marketing Summit" class="event-image">
                    <div class="event-badge">Summit</div>
                    <div class="event-favorite">
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="event-content">
                    <div class="event-meta">
                        <div class="event-meta-item">
                            <i class="fas fa-calendar"></i>
                            <span>Apr 12, 2024</span>
                        </div>
                        <div class="event-meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Chicago</span>
                        </div>
                    </div>
                    <h3 class="event-title">Digital Marketing Summit</h3>
                    <p class="event-description">
                        Discover the latest digital marketing strategies, tools, and trends from
                        industry experts and successful practitioners.
                    </p>
                    <div class="event-footer">
                        <div class="event-price">
                            <span class="currency">$</span>199
                        </div>
                        <a href="#" class="event-btn">
                            Book Now <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Event Card 6 -->
            <div class="event-card fade-in-up stagger-6" data-category="workshop">
                <div class="event-image-container">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                         alt="Coding Bootcamp" class="event-image">
                    <div class="event-badge">Bootcamp</div>
                    <div class="event-favorite">
                        <i class="far fa-heart"></i>
                    </div>
                </div>
                <div class="event-content">
                    <div class="event-meta">
                        <div class="event-meta-item">
                            <i class="fas fa-calendar"></i>
                            <span>Apr 20-22, 2024</span>
                        </div>
                        <div class="event-meta-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Seattle</span>
                        </div>
                    </div>
                    <h3 class="event-title">Full-Stack Coding Bootcamp</h3>
                    <p class="event-description">
                        Intensive three-day bootcamp covering modern web development technologies,
                        frameworks, and best practices for aspiring developers.
                    </p>
                    <div class="event-footer">
                        <div class="event-price">
                            <span class="currency">$</span>499
                        </div>
                        <a href="#" class="event-btn">
                            Book Now <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- View All Section -->
        <div class="view-all-section fade-in-up">
            <a href="{{ route('events.index') }}" class="view-all-btn">
                View All Events <i class="fas fa-arrow-right"></i>
            </a>
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

    // Event filtering functionality
    const filterButtons = document.querySelectorAll('.event-filter-btn');
    const eventCards = document.querySelectorAll('.event-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');

            // Filter event cards with animation
            eventCards.forEach((card, index) => {
                const category = card.getAttribute('data-category');

                if (filter === 'all' || category === filter) {
                    setTimeout(() => {
                        card.style.display = 'block';
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';

                        setTimeout(() => {
                            card.style.transition = 'all 0.4s ease';
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 50);
                    }, index * 50);
                } else {
                    card.style.transition = 'all 0.3s ease';
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(-20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // Favorite button functionality
    document.querySelectorAll('.event-favorite').forEach(favorite => {
        favorite.addEventListener('click', function() {
            const icon = this.querySelector('i');

            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
                this.style.background = '#ff6b6b';
                icon.style.color = 'white';

                // Add animation
                this.style.transform = 'scale(1.3)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
                this.style.background = 'rgba(255, 255, 255, 0.9)';
                icon.style.color = '#ff6b6b';
            }
        });
    });

    // Enhanced hover effects for event cards
    document.querySelectorAll('.event-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            const image = this.querySelector('.event-image');
            const badge = this.querySelector('.event-badge');

            // Add extra scaling to image
            if (image) {
                image.style.transform = 'scale(1.1) rotate(1deg)';
            }

            // Animate badge
            if (badge) {
                badge.style.transform = 'scale(1.05)';
            }
        });

        card.addEventListener('mouseleave', function() {
            const image = this.querySelector('.event-image');
            const badge = this.querySelector('.event-badge');

            if (image) {
                image.style.transform = 'scale(1) rotate(0deg)';
            }

            if (badge) {
                badge.style.transform = 'scale(1)';
            }
        });
    });

    // Parallax effect for event cards
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;

        document.querySelectorAll('.event-card').forEach((card, index) => {
            const speed = 0.05 + (index % 3) * 0.02;
            const yPos = -(scrolled * speed);
            card.style.transform = `translateY(${yPos}px)`;
        });
    });

    // Auto-play event filter demonstration (optional)
    let autoFilterIndex = 0;
    const autoFilterCategories = ['all', 'conference', 'workshop', 'networking', 'music'];

    // Uncomment to enable auto-filter demo
    /*
    setInterval(() => {
        if (document.visibilityState === 'visible') {
            autoFilterIndex = (autoFilterIndex + 1) % autoFilterCategories.length;
            const filterBtn = document.querySelector(`[data-filter="${autoFilterCategories[autoFilterIndex]}"]`);
            if (filterBtn) {
                filterBtn.click();
            }
        }
    }, 5000);
    */
});
</script>
@endpush
