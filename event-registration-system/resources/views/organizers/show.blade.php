@extends('layouts.app')

@section('title', 'TechCorp Inc. - Organizer Profile - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Organizer Hero Section -->
    <div class="relative bg-gradient-to-br from-purple-600 via-blue-600 to-purple-800 text-white">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="relative container mx-auto px-6 py-16">
            <div class="flex flex-col lg:flex-row items-center lg:items-start space-y-8 lg:space-y-0 lg:space-x-8">
                <!-- Organizer Avatar -->
                <div class="flex-shrink-0">
                    <img src="https://via.placeholder.com/200x200/667eea/ffffff?text=TC"
                         alt="TechCorp Inc."
                         class="w-32 h-32 lg:w-48 lg:h-48 rounded-full border-4 border-white shadow-xl">
                </div>

                <!-- Organizer Info -->
                <div class="flex-1 text-center lg:text-left">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <h1 class="text-4xl lg:text-5xl font-bold mb-4">TechCorp Inc.</h1>
                            <p class="text-xl mb-6 opacity-90 max-w-3xl">
                                Leading technology conferences and innovation events worldwide.
                                Connecting tech professionals since 2015.
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4 mt-4 lg:mt-0">
                            <button id="followBtn" class="bg-white text-purple-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                                <i class="fas fa-plus mr-2"></i>Follow
                            </button>
                            <button class="bg-purple-700 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-800 transition-colors">
                                <i class="fas fa-envelope mr-2"></i>Contact
                            </button>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold">45</div>
                            <div class="text-purple-200">Total Events</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold">12.5K</div>
                            <div class="text-purple-200">Followers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold">8.2K</div>
                            <div class="text-purple-200">Total Attendees</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold">4.8</div>
                            <div class="text-purple-200">Avg Rating</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-6">
            <nav class="flex space-x-8 overflow-x-auto">
                <button class="tab-btn active py-4 px-2 text-purple-600 border-b-2 border-purple-600 font-semibold whitespace-nowrap" data-tab="events">
                    Events
                </button>
                <button class="tab-btn py-4 px-2 text-gray-600 hover:text-purple-600 font-semibold whitespace-nowrap" data-tab="about">
                    About
                </button>
                <button class="tab-btn py-4 px-2 text-gray-600 hover:text-purple-600 font-semibold whitespace-nowrap" data-tab="reviews">
                    Reviews (127)
                </button>
                <button class="tab-btn py-4 px-2 text-gray-600 hover:text-purple-600 font-semibold whitespace-nowrap" data-tab="gallery">
                    Gallery
                </button>
                <button class="tab-btn py-4 px-2 text-gray-600 hover:text-purple-600 font-semibold whitespace-nowrap" data-tab="team">
                    Team
                </button>
            </nav>
        </div>
    </div>

    <div class="container mx-auto px-6 py-8">
        <!-- Events Tab -->
        <div id="eventsTab" class="tab-content">
            <!-- Filter Bar -->
            <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <span class="font-semibold text-gray-700">Filter events:</span>
                        <select id="eventStatus" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">All Events</option>
                            <option value="upcoming">Upcoming</option>
                            <option value="past">Past Events</option>
                            <option value="live">Live Now</option>
                        </select>
                        <select id="eventCategory" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">All Categories</option>
                            <option value="conference">Conference</option>
                            <option value="workshop">Workshop</option>
                            <option value="webinar">Webinar</option>
                        </select>
                    </div>

                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">Sort by:</span>
                        <select id="eventSort" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="date">Date</option>
                            <option value="popularity">Popularity</option>
                            <option value="rating">Rating</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Events Grid -->
            <div id="eventsGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Events will be populated by JavaScript -->
            </div>

            <!-- Load More Events -->
            <div class="text-center mt-8">
                <button id="loadMoreEvents" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-colors font-semibold">
                    Load More Events
                </button>
            </div>
        </div>

        <!-- About Tab -->
        <div id="aboutTab" class="tab-content hidden">
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-sm p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">About TechCorp Inc.</h2>

                        <div class="prose max-w-none">
                            <p class="text-gray-600 mb-4">
                                TechCorp Inc. is a leading event management company specializing in technology conferences,
                                innovation summits, and professional development workshops. Founded in 2015, we've been at
                                the forefront of bringing together tech professionals, thought leaders, and innovators.
                            </p>

                            <p class="text-gray-600 mb-6">
                                Our mission is to create meaningful connections and foster knowledge sharing within the
                                technology community. We believe that great ideas emerge when brilliant minds come together
                                in the right environment.
                            </p>

                            <h3 class="text-xl font-bold text-gray-900 mb-4">What We Do</h3>
                            <ul class="list-disc list-inside text-gray-600 space-y-2 mb-6">
                                <li>Technology conferences and summits</li>
                                <li>Professional development workshops</li>
                                <li>Networking events and meetups</li>
                                <li>Virtual and hybrid events</li>
                                <li>Corporate training programs</li>
                            </ul>

                            <h3 class="text-xl font-bold text-gray-900 mb-4">Our Values</h3>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="bg-purple-50 p-4 rounded-lg">
                                    <h4 class="font-semibold text-purple-800 mb-2">Innovation</h4>
                                    <p class="text-purple-600 text-sm">Embracing cutting-edge technologies and creative solutions</p>
                                </div>
                                <div class="bg-blue-50 p-4 rounded-lg">
                                    <h4 class="font-semibold text-blue-800 mb-2">Community</h4>
                                    <p class="text-blue-600 text-sm">Building strong, supportive professional networks</p>
                                </div>
                                <div class="bg-green-50 p-4 rounded-lg">
                                    <h4 class="font-semibold text-green-800 mb-2">Excellence</h4>
                                    <p class="text-green-600 text-sm">Delivering exceptional experiences at every event</p>
                                </div>
                                <div class="bg-yellow-50 p-4 rounded-lg">
                                    <h4 class="font-semibold text-yellow-800 mb-2">Growth</h4>
                                    <p class="text-yellow-600 text-sm">Empowering personal and professional development</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <!-- Contact Info -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Contact Information</h3>
                        <div class="space-y-3">
                            <div class="flex items-center">
                                <i class="fas fa-envelope text-purple-600 mr-3 w-5"></i>
                                <span class="text-gray-600">contact@techcorp.com</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone text-purple-600 mr-3 w-5"></i>
                                <span class="text-gray-600">+1 (555) 123-4567</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt text-purple-600 mr-3 w-5"></i>
                                <span class="text-gray-600">San Francisco, CA</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-globe text-purple-600 mr-3 w-5"></i>
                                <a href="#" class="text-purple-600 hover:underline">www.techcorp.com</a>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Follow Us</h3>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="#" class="flex items-center justify-center bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition-colors">
                                <i class="fab fa-twitter mr-2"></i>Twitter
                            </a>
                            <a href="#" class="flex items-center justify-center bg-blue-800 text-white p-3 rounded-lg hover:bg-blue-900 transition-colors">
                                <i class="fab fa-linkedin mr-2"></i>LinkedIn
                            </a>
                            <a href="#" class="flex items-center justify-center bg-gray-800 text-white p-3 rounded-lg hover:bg-gray-900 transition-colors">
                                <i class="fab fa-github mr-2"></i>GitHub
                            </a>
                            <a href="#" class="flex items-center justify-center bg-red-600 text-white p-3 rounded-lg hover:bg-red-700 transition-colors">
                                <i class="fab fa-youtube mr-2"></i>YouTube
                            </a>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Quick Stats</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Founded</span>
                                <span class="font-semibold">2015</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Team Size</span>
                                <span class="font-semibold">25+</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Events Hosted</span>
                                <span class="font-semibold">200+</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Total Attendees</span>
                                <span class="font-semibold">50K+</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Tab -->
        <div id="reviewsTab" class="tab-content hidden">
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <!-- Review Summary -->
                    <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-gray-900">Reviews & Ratings</h2>
                            <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                                Write Review
                            </button>
                        </div>

                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="text-center">
                                <div class="text-6xl font-bold text-purple-600 mb-2">4.8</div>
                                <div class="flex justify-center text-yellow-400 text-xl mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <p class="text-gray-600">Based on 127 reviews</p>
                            </div>

                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <span class="w-8 text-sm">5★</span>
                                    <div class="flex-1 bg-gray-200 rounded-full h-2 mx-3">
                                        <div class="bg-yellow-400 h-2 rounded-full" style="width: 78%"></div>
                                    </div>
                                    <span class="w-8 text-sm text-gray-600">78%</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-8 text-sm">4★</span>
                                    <div class="flex-1 bg-gray-200 rounded-full h-2 mx-3">
                                        <div class="bg-yellow-400 h-2 rounded-full" style="width: 15%"></div>
                                    </div>
                                    <span class="w-8 text-sm text-gray-600">15%</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-8 text-sm">3★</span>
                                    <div class="flex-1 bg-gray-200 rounded-full h-2 mx-3">
                                        <div class="bg-yellow-400 h-2 rounded-full" style="width: 5%"></div>
                                    </div>
                                    <span class="w-8 text-sm text-gray-600">5%</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-8 text-sm">2★</span>
                                    <div class="flex-1 bg-gray-200 rounded-full h-2 mx-3">
                                        <div class="bg-yellow-400 h-2 rounded-full" style="width: 1%"></div>
                                    </div>
                                    <span class="w-8 text-sm text-gray-600">1%</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-8 text-sm">1★</span>
                                    <div class="flex-1 bg-gray-200 rounded-full h-2 mx-3">
                                        <div class="bg-yellow-400 h-2 rounded-full" style="width: 1%"></div>
                                    </div>
                                    <span class="w-8 text-sm text-gray-600">1%</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Individual Reviews -->
                    <div class="space-y-6" id="reviewsList">
                        <!-- Reviews will be populated by JavaScript -->
                    </div>
                </div>

                <div>
                    <!-- Review Filters -->
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Filter Reviews</h3>
                        <div class="space-y-3">
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                <option>All Ratings</option>
                                <option>5 Stars</option>
                                <option>4 Stars</option>
                                <option>3 Stars</option>
                                <option>2 Stars</option>
                                <option>1 Star</option>
                            </select>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                <option>All Events</option>
                                <option>Tech Innovation Summit</option>
                                <option>AI Workshop Series</option>
                                <option>Developer Conference</option>
                            </select>
                            <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                                <option>Newest First</option>
                                <option>Oldest First</option>
                                <option>Highest Rating</option>
                                <option>Lowest Rating</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gallery Tab -->
        <div id="galleryTab" class="tab-content hidden">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4" id="galleryGrid">
                <!-- Gallery items will be populated by JavaScript -->
            </div>
        </div>

        <!-- Team Tab -->
        <div id="teamTab" class="tab-content hidden">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6" id="teamGrid">
                <!-- Team members will be populated by JavaScript -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sample data
    const organizerEvents = [
        {
            id: 1,
            title: 'Tech Innovation Summit 2025',
            category: 'conference',
            status: 'upcoming',
            date: '2025-08-15',
            time: '09:00',
            location: 'San Francisco',
            price: 299,
            image: 'https://via.placeholder.com/400x200/667eea/ffffff?text=Tech+Summit',
            attendees: 1250,
            rating: 4.8,
            popularity: 95
        },
        {
            id: 2,
            title: 'AI & Machine Learning Workshop',
            category: 'workshop',
            status: 'upcoming',
            date: '2025-08-22',
            time: '14:00',
            location: 'Online',
            price: 149,
            image: 'https://via.placeholder.com/400x200/48bb78/ffffff?text=AI+Workshop',
            attendees: 450,
            rating: 4.9,
            popularity: 88
        },
        {
            id: 3,
            title: 'Developer Conference 2025',
            category: 'conference',
            status: 'past',
            date: '2025-07-10',
            time: '10:00',
            location: 'New York',
            price: 199,
            image: 'https://via.placeholder.com/400x200/f59e0b/ffffff?text=Dev+Conference',
            attendees: 890,
            rating: 4.7,
            popularity: 82
        }
    ];

    const reviews = [
        {
            id: 1,
            name: 'Sarah Johnson',
            avatar: 'https://via.placeholder.com/50x50/667eea/ffffff?text=SJ',
            rating: 5,
            date: '2 days ago',
            event: 'Tech Innovation Summit',
            comment: 'Absolutely fantastic event! The speakers were top-notch and the networking opportunities were incredible. TechCorp really knows how to organize a professional conference.'
        },
        {
            id: 2,
            name: 'Michael Chen',
            avatar: 'https://via.placeholder.com/50x50/48bb78/ffffff?text=MC',
            rating: 5,
            date: '1 week ago',
            event: 'AI Workshop Series',
            comment: 'Great hands-on experience with AI tools. The instructors were knowledgeable and the content was very practical. Highly recommend!'
        },
        {
            id: 3,
            name: 'Emily Rodriguez',
            avatar: 'https://via.placeholder.com/50x50/f59e0b/ffffff?text=ER',
            rating: 4,
            date: '2 weeks ago',
            event: 'Developer Conference',
            comment: 'Well organized event with good content. The venue was perfect and the schedule was well planned. Looking forward to next year!'
        }
    ];

    const galleryImages = [
        { src: 'https://via.placeholder.com/400x300/667eea/ffffff?text=Conference+Hall', alt: 'Conference Hall' },
        { src: 'https://via.placeholder.com/400x300/48bb78/ffffff?text=Networking+Event', alt: 'Networking Event' },
        { src: 'https://via.placeholder.com/400x300/f59e0b/ffffff?text=Workshop+Session', alt: 'Workshop Session' },
        { src: 'https://via.placeholder.com/400x300/ef4444/ffffff?text=Keynote+Speaker', alt: 'Keynote Speaker' },
        { src: 'https://via.placeholder.com/400x300/8b5cf6/ffffff?text=Panel+Discussion', alt: 'Panel Discussion' },
        { src: 'https://via.placeholder.com/400x300/10b981/ffffff?text=Tech+Demo', alt: 'Tech Demo' },
        { src: 'https://via.placeholder.com/400x300/f59e0b/ffffff?text=Awards+Ceremony', alt: 'Awards Ceremony' },
        { src: 'https://via.placeholder.com/400x300/667eea/ffffff?text=Team+Building', alt: 'Team Building' }
    ];

    const teamMembers = [
        {
            name: 'Alex Thompson',
            position: 'CEO & Founder',
            avatar: 'https://via.placeholder.com/150x150/667eea/ffffff?text=AT',
            bio: 'Tech industry veteran with 15+ years of experience in event management and community building.'
        },
        {
            name: 'Jessica Parker',
            position: 'Head of Operations',
            avatar: 'https://via.placeholder.com/150x150/48bb78/ffffff?text=JP',
            bio: 'Operations expert ensuring seamless event experiences for all attendees and organizers.'
        },
        {
            name: 'David Kim',
            position: 'Technical Director',
            avatar: 'https://via.placeholder.com/150x150/f59e0b/ffffff?text=DK',
            bio: 'Leading our technical infrastructure and platform development initiatives.'
        },
        {
            name: 'Maria Santos',
            position: 'Marketing Manager',
            avatar: 'https://via.placeholder.com/150x150/ef4444/ffffff?text=MS',
            bio: 'Creative marketing strategist building connections between events and audiences.'
        },
        {
            name: 'Ryan Foster',
            position: 'Community Manager',
            avatar: 'https://via.placeholder.com/150x150/8b5cf6/ffffff?text=RF',
            bio: 'Passionate about building and nurturing our vibrant tech community.'
        },
        {
            name: 'Lisa Wong',
            position: 'Event Coordinator',
            avatar: 'https://via.placeholder.com/150x150/10b981/ffffff?text=LW',
            bio: 'Detail-oriented coordinator ensuring every event runs smoothly from start to finish.'
        }
    ];

    let currentEvents = [...organizerEvents];
    let displayedEventCount = 6;

    // Initialize page
    function init() {
        renderEvents();
        renderReviews();
        renderGallery();
        renderTeam();
    }

    // Tab switching
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const tabName = this.dataset.tab;

            // Update active tab
            document.querySelectorAll('.tab-btn').forEach(b => {
                b.classList.remove('active', 'text-purple-600', 'border-b-2', 'border-purple-600');
                b.classList.add('text-gray-600');
            });
            this.classList.add('active', 'text-purple-600', 'border-b-2', 'border-purple-600');
            this.classList.remove('text-gray-600');

            // Show/hide content
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            document.getElementById(tabName + 'Tab').classList.remove('hidden');
        });
    });

    // Render events
    function renderEvents() {
        const container = document.getElementById('eventsGrid');
        container.innerHTML = '';

        const eventsToShow = currentEvents.slice(0, displayedEventCount);

        eventsToShow.forEach(event => {
            const eventCard = createEventCard(event);
            container.appendChild(eventCard);
        });

        // Show/hide load more button
        document.getElementById('loadMoreEvents').style.display =
            currentEvents.length > displayedEventCount ? 'block' : 'none';
    }

    // Create event card
    function createEventCard(event) {
        const card = document.createElement('div');
        card.className = 'bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden cursor-pointer';

        const statusBadge = event.status === 'upcoming' ?
            '<span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold">Upcoming</span>' :
            event.status === 'past' ?
            '<span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs font-semibold">Past</span>' :
            '<span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-semibold">Live</span>';

        card.innerHTML = `
            <div class="relative">
                <img src="${event.image}" alt="${event.title}" class="w-full h-48 object-cover">
                <div class="absolute top-4 left-4">
                    ${statusBadge}
                </div>
                <div class="absolute top-4 right-4">
                    <span class="bg-white bg-opacity-90 text-gray-700 px-3 py-1 rounded-full text-sm font-semibold">
                        $${event.price}
                    </span>
                </div>
            </div>

            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-purple-600 transition-colors">
                    ${event.title}
                </h3>

                <div class="space-y-2 mb-4">
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-calendar-alt mr-2 w-4"></i>
                        <span class="text-sm">${new Date(event.date).toLocaleDateString()} at ${event.time}</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-map-marker-alt mr-2 w-4"></i>
                        <span class="text-sm">${event.location}</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-tag mr-2 w-4"></i>
                        <span class="text-sm capitalize">${event.category}</span>
                    </div>
                </div>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="flex text-yellow-400">
                            ${Array(5).fill().map((_, i) =>
                                `<i class="fas fa-star ${i < Math.floor(event.rating) ? '' : 'text-gray-300'}"></i>`
                            ).join('')}
                        </div>
                        <span class="ml-2 text-sm text-gray-600">${event.rating}</span>
                    </div>
                    <span class="text-sm text-gray-600">${event.attendees} attending</span>
                </div>

                <button class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-colors font-semibold">
                    View Event
                </button>
            </div>
        `;

        card.addEventListener('click', () => {
            window.location.href = `/events/${event.id}`;
        });

        return card;
    }

    // Render reviews
    function renderReviews() {
        const container = document.getElementById('reviewsList');
        container.innerHTML = '';

        reviews.forEach(review => {
            const reviewCard = document.createElement('div');
            reviewCard.className = 'bg-white rounded-xl shadow-sm p-6';

            reviewCard.innerHTML = `
                <div class="flex items-start space-x-4">
                    <img src="${review.avatar}" alt="${review.name}" class="w-12 h-12 rounded-full">
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-2">
                            <div>
                                <h4 class="font-semibold text-gray-900">${review.name}</h4>
                                <p class="text-sm text-gray-600">${review.event} • ${review.date}</p>
                            </div>
                            <div class="flex text-yellow-400">
                                ${Array(5).fill().map((_, i) =>
                                    `<i class="fas fa-star ${i < review.rating ? '' : 'text-gray-300'}"></i>`
                                ).join('')}
                            </div>
                        </div>
                        <p class="text-gray-600">${review.comment}</p>
                        <div class="flex items-center space-x-4 mt-4 text-sm text-gray-500">
                            <button class="hover:text-purple-600 transition-colors">
                                <i class="fas fa-thumbs-up mr-1"></i>Helpful (12)
                            </button>
                            <button class="hover:text-purple-600 transition-colors">
                                <i class="fas fa-reply mr-1"></i>Reply
                            </button>
                        </div>
                    </div>
                </div>
            `;

            container.appendChild(reviewCard);
        });
    }

    // Render gallery
    function renderGallery() {
        const container = document.getElementById('galleryGrid');
        container.innerHTML = '';

        galleryImages.forEach((image, index) => {
            const imageCard = document.createElement('div');
            imageCard.className = 'relative group cursor-pointer overflow-hidden rounded-lg';

            imageCard.innerHTML = `
                <img src="${image.src}" alt="${image.alt}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300 flex items-center justify-center">
                    <i class="fas fa-expand text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-2xl"></i>
                </div>
            `;

            imageCard.addEventListener('click', () => {
                // Open lightbox/modal for image viewing
                console.log('Open image:', image.alt);
            });

            container.appendChild(imageCard);
        });
    }

    // Render team
    function renderTeam() {
        const container = document.getElementById('teamGrid');
        container.innerHTML = '';

        teamMembers.forEach(member => {
            const memberCard = document.createElement('div');
            memberCard.className = 'bg-white rounded-xl shadow-sm p-6 text-center hover:shadow-lg transition-shadow duration-300';

            memberCard.innerHTML = `
                <img src="${member.avatar}" alt="${member.name}" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h3 class="text-xl font-bold text-gray-900 mb-1">${member.name}</h3>
                <p class="text-purple-600 font-semibold mb-3">${member.position}</p>
                <p class="text-gray-600 text-sm">${member.bio}</p>
                <div class="flex justify-center space-x-3 mt-4">
                    <a href="#" class="text-gray-400 hover:text-blue-600 transition-colors">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition-colors">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-purple-600 transition-colors">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
            `;

            container.appendChild(memberCard);
        });
    }

    // Event filtering
    function filterEvents() {
        const status = document.getElementById('eventStatus').value;
        const category = document.getElementById('eventCategory').value;
        const sort = document.getElementById('eventSort').value;

        currentEvents = organizerEvents.filter(event => {
            let matches = true;

            if (status && event.status !== status) matches = false;
            if (category && event.category !== category) matches = false;

            return matches;
        });

        // Sort events
        currentEvents.sort((a, b) => {
            switch (sort) {
                case 'popularity':
                    return b.popularity - a.popularity;
                case 'rating':
                    return b.rating - a.rating;
                case 'date':
                default:
                    return new Date(a.date) - new Date(b.date);
            }
        });

        displayedEventCount = 6;
        renderEvents();
    }

    // Event listeners
    document.getElementById('eventStatus').addEventListener('change', filterEvents);
    document.getElementById('eventCategory').addEventListener('change', filterEvents);
    document.getElementById('eventSort').addEventListener('change', filterEvents);

    document.getElementById('loadMoreEvents').addEventListener('click', () => {
        displayedEventCount += 6;
        renderEvents();
    });

    // Follow button
    document.getElementById('followBtn').addEventListener('click', function() {
        if (this.textContent.trim().startsWith('Follow')) {
            this.innerHTML = '<i class="fas fa-check mr-2"></i>Following';
            this.classList.remove('bg-white', 'text-purple-600', 'hover:bg-gray-100');
            this.classList.add('bg-green-600', 'text-white', 'hover:bg-green-700');
        } else {
            this.innerHTML = '<i class="fas fa-plus mr-2"></i>Follow';
            this.classList.remove('bg-green-600', 'text-white', 'hover:bg-green-700');
            this.classList.add('bg-white', 'text-purple-600', 'hover:bg-gray-100');
        }
    });

    // Initialize
    init();
});
</script>

<style>
.tab-btn.active {
    color: #7c3aed;
    border-bottom: 2px solid #7c3aed;
}
</style>
@endpush
