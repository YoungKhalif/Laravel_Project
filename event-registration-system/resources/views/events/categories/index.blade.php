@extends('layouts.app')

@section('title', 'Browse Events by Category - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-purple-600 via-blue-600 to-purple-800 text-white py-16">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Browse by Category</h1>
            <p class="text-xl mb-8 max-w-3xl mx-auto opacity-90">
                Discover events that match your interests and passions
            </p>

            <!-- Search Bar -->
            <div class="max-w-2xl mx-auto">
                <div class="relative">
                    <input type="text" id="searchInput" placeholder="Search events, organizers, or keywords..."
                           class="w-full px-6 py-4 pl-12 text-gray-900 rounded-full border-0 focus:ring-4 focus:ring-white focus:ring-opacity-30">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-purple-600 text-white px-6 py-2 rounded-full hover:bg-purple-700 transition-colors">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-6 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="flex items-center space-x-4">
                    <span class="font-semibold text-gray-700">Filter by:</span>
                    <select id="locationFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <option value="">All Locations</option>
                        <option value="online">Online Events</option>
                        <option value="san-francisco">San Francisco</option>
                        <option value="new-york">New York</option>
                        <option value="los-angeles">Los Angeles</option>
                        <option value="chicago">Chicago</option>
                    </select>
                    <select id="dateFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <option value="">Any Date</option>
                        <option value="today">Today</option>
                        <option value="tomorrow">Tomorrow</option>
                        <option value="this-week">This Week</option>
                        <option value="next-week">Next Week</option>
                        <option value="this-month">This Month</option>
                    </select>
                    <select id="priceFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <option value="">Any Price</option>
                        <option value="free">Free Events</option>
                        <option value="0-50">$0 - $50</option>
                        <option value="50-100">$50 - $100</option>
                        <option value="100+">$100+</option>
                    </select>
                </div>

                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Sort by:</span>
                    <select id="sortFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                        <option value="date">Date</option>
                        <option value="popularity">Popularity</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="name">Name A-Z</option>
                    </select>

                    <div class="flex bg-gray-100 rounded-lg p-1">
                        <button id="gridView" class="view-toggle active p-2 rounded transition-all">
                            <i class="fas fa-th-large"></i>
                        </button>
                        <button id="listView" class="view-toggle p-2 rounded transition-all">
                            <i class="fas fa-list"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Grid -->
    <div class="container mx-auto px-6 py-8">
        <!-- Featured Categories -->
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Popular Categories</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="category-card group cursor-pointer" data-category="conference">
                    <div class="bg-gradient-to-br from-purple-500 to-blue-600 rounded-2xl p-8 text-white text-center transform transition-all duration-300 group-hover:scale-105 group-hover:shadow-xl">
                        <i class="fas fa-users text-4xl mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">Conferences</h3>
                        <p class="text-purple-100 mb-4">Professional conferences and summits</p>
                        <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm font-semibold">25 Events</span>
                    </div>
                </div>

                <div class="category-card group cursor-pointer" data-category="workshop">
                    <div class="bg-gradient-to-br from-green-500 to-teal-600 rounded-2xl p-8 text-white text-center transform transition-all duration-300 group-hover:scale-105 group-hover:shadow-xl">
                        <i class="fas fa-tools text-4xl mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">Workshops</h3>
                        <p class="text-green-100 mb-4">Hands-on learning experiences</p>
                        <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm font-semibold">18 Events</span>
                    </div>
                </div>

                <div class="category-card group cursor-pointer" data-category="networking">
                    <div class="bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl p-8 text-white text-center transform transition-all duration-300 group-hover:scale-105 group-hover:shadow-xl">
                        <i class="fas fa-handshake text-4xl mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">Networking</h3>
                        <p class="text-yellow-100 mb-4">Connect with like-minded professionals</p>
                        <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm font-semibold">12 Events</span>
                    </div>
                </div>

                <div class="category-card group cursor-pointer" data-category="webinar">
                    <div class="bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl p-8 text-white text-center transform transition-all duration-300 group-hover:scale-105 group-hover:shadow-xl">
                        <i class="fas fa-video text-4xl mb-4"></i>
                        <h3 class="text-xl font-bold mb-2">Webinars</h3>
                        <p class="text-red-100 mb-4">Online learning sessions</p>
                        <span class="bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm font-semibold">30 Events</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- All Categories -->
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">All Categories</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
                <button class="category-filter active bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors" data-category="">
                    All Events
                </button>
                <button class="category-filter bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors" data-category="conference">
                    Conference
                </button>
                <button class="category-filter bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors" data-category="workshop">
                    Workshop
                </button>
                <button class="category-filter bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors" data-category="networking">
                    Networking
                </button>
                <button class="category-filter bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors" data-category="webinar">
                    Webinar
                </button>
                <button class="category-filter bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors" data-category="seminar">
                    Seminar
                </button>
                <button class="category-filter bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors" data-category="social">
                    Social
                </button>
                <button class="category-filter bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors" data-category="sports">
                    Sports
                </button>
            </div>
        </div>

        <!-- Results Section -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-xl font-semibold text-gray-900">
                <span id="resultsCount">48</span> Events Found
                <span id="selectedCategory" class="text-purple-600"></span>
            </h3>
            <button id="clearFilters" class="text-purple-600 hover:text-purple-700 font-semibold">
                Clear All Filters
            </button>
        </div>

        <!-- Events Grid/List -->
        <div id="eventsContainer">
            <!-- Grid View -->
            <div id="gridViewContainer" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Events will be populated by JavaScript -->
            </div>

            <!-- List View -->
            <div id="listViewContainer" class="hidden space-y-4">
                <!-- Events will be populated by JavaScript -->
            </div>
        </div>

        <!-- Load More Button -->
        <div class="text-center mt-12">
            <button id="loadMoreBtn" class="bg-purple-600 text-white px-8 py-3 rounded-lg hover:bg-purple-700 transition-colors font-semibold">
                Load More Events
            </button>
        </div>

        <!-- No Results -->
        <div id="noResults" class="hidden text-center py-16">
            <i class="fas fa-search text-6xl text-gray-300 mb-6"></i>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">No Events Found</h3>
            <p class="text-gray-600 mb-6">Try adjusting your filters or search terms</p>
            <button id="resetFilters" class="bg-purple-600 text-white px-6 py-3 rounded-lg hover:bg-purple-700 transition-colors">
                Reset Filters
            </button>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sample events data
    const allEvents = [
        {
            id: 1,
            title: 'Tech Innovation Summit 2025',
            category: 'conference',
            date: '2025-08-15',
            time: '09:00',
            location: 'San Francisco',
            price: 299,
            image: 'https://via.placeholder.com/400x200/667eea/ffffff?text=Tech+Summit',
            organizer: 'TechCorp Inc.',
            attendees: 1250,
            rating: 4.8,
            tags: ['Technology', 'Innovation', 'Networking']
        },
        {
            id: 2,
            title: 'UI/UX Design Workshop',
            category: 'workshop',
            date: '2025-08-10',
            time: '14:00',
            location: 'Online',
            price: 0,
            image: 'https://via.placeholder.com/400x200/48bb78/ffffff?text=Design+Workshop',
            organizer: 'Design Academy',
            attendees: 45,
            rating: 4.9,
            tags: ['Design', 'UI/UX', 'Creative']
        },
        {
            id: 3,
            title: 'Startup Networking Happy Hour',
            category: 'networking',
            date: '2025-08-05',
            time: '18:00',
            location: 'New York',
            price: 25,
            image: 'https://via.placeholder.com/400x200/f59e0b/ffffff?text=Networking',
            organizer: 'Startup NYC',
            attendees: 85,
            rating: 4.6,
            tags: ['Startup', 'Networking', 'Business']
        },
        {
            id: 4,
            title: 'Digital Marketing Masterclass',
            category: 'webinar',
            date: '2025-08-20',
            time: '15:00',
            location: 'Online',
            price: 99,
            image: 'https://via.placeholder.com/400x200/ef4444/ffffff?text=Marketing+Webinar',
            organizer: 'Marketing Pro',
            attendees: 350,
            rating: 4.7,
            tags: ['Marketing', 'Digital', 'Strategy']
        },
        {
            id: 5,
            title: 'Leadership in Tech Seminar',
            category: 'seminar',
            date: '2025-08-12',
            time: '10:00',
            location: 'Chicago',
            price: 150,
            image: 'https://via.placeholder.com/400x200/8b5cf6/ffffff?text=Leadership+Seminar',
            organizer: 'Tech Leaders',
            attendees: 120,
            rating: 4.8,
            tags: ['Leadership', 'Management', 'Technology']
        },
        {
            id: 6,
            title: 'Community BBQ & Social',
            category: 'social',
            date: '2025-08-08',
            time: '16:00',
            location: 'Los Angeles',
            price: 0,
            image: 'https://via.placeholder.com/400x200/10b981/ffffff?text=Community+BBQ',
            organizer: 'LA Community',
            attendees: 200,
            rating: 4.5,
            tags: ['Community', 'Social', 'Food']
        }
    ];

    let filteredEvents = [...allEvents];
    let currentView = 'grid';
    let currentCategory = '';
    let displayedCount = 6;

    // Initialize page
    function init() {
        renderEvents();
        updateResultsCount();
    }

    // Render events based on current view
    function renderEvents() {
        if (currentView === 'grid') {
            renderGridView();
        } else {
            renderListView();
        }
    }

    // Render grid view
    function renderGridView() {
        const container = document.getElementById('gridViewContainer');
        container.innerHTML = '';

        const eventsToShow = filteredEvents.slice(0, displayedCount);

        eventsToShow.forEach(event => {
            const eventCard = createEventCard(event);
            container.appendChild(eventCard);
        });

        // Show/hide load more button
        document.getElementById('loadMoreBtn').style.display =
            filteredEvents.length > displayedCount ? 'block' : 'none';
    }

    // Create event card
    function createEventCard(event) {
        const card = document.createElement('div');
        card.className = 'bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden group cursor-pointer';
        card.addEventListener('click', () => {
            window.location.href = `/events/${event.id}`;
        });

        card.innerHTML = `
            <div class="relative">
                <img src="${event.image}" alt="${event.title}" class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="absolute top-4 left-4">
                    <span class="bg-white bg-opacity-90 text-purple-600 px-3 py-1 rounded-full text-sm font-semibold capitalize">
                        ${event.category}
                    </span>
                </div>
                <div class="absolute top-4 right-4">
                    <span class="bg-white bg-opacity-90 text-gray-700 px-3 py-1 rounded-full text-sm font-semibold">
                        ${event.price === 0 ? 'Free' : `$${event.price}`}
                    </span>
                </div>
            </div>

            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">
                    ${event.title}
                </h3>

                <div class="space-y-2 mb-4">
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-calendar-alt mr-2 w-4"></i>
                        <span class="text-sm">${new Date(event.date).toLocaleDateString('en-US', {
                            weekday: 'short',
                            month: 'short',
                            day: 'numeric'
                        })} at ${event.time}</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-map-marker-alt mr-2 w-4"></i>
                        <span class="text-sm">${event.location}</span>
                    </div>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-user mr-2 w-4"></i>
                        <span class="text-sm">${event.organizer}</span>
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

                <div class="flex flex-wrap gap-1 mb-4">
                    ${event.tags.slice(0, 3).map(tag =>
                        `<span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-xs">${tag}</span>`
                    ).join('')}
                </div>

                <button class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700 transition-colors font-semibold">
                    View Details
                </button>
            </div>
        `;

        return card;
    }

    // Render list view
    function renderListView() {
        const container = document.getElementById('listViewContainer');
        container.innerHTML = '';

        const eventsToShow = filteredEvents.slice(0, displayedCount);

        eventsToShow.forEach(event => {
            const eventRow = createEventRow(event);
            container.appendChild(eventRow);
        });

        // Show/hide load more button
        document.getElementById('loadMoreBtn').style.display =
            filteredEvents.length > displayedCount ? 'block' : 'none';
    }

    // Create event row for list view
    function createEventRow(event) {
        const row = document.createElement('div');
        row.className = 'bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 p-6 cursor-pointer';
        row.addEventListener('click', () => {
            window.location.href = `/events/${event.id}`;
        });

        row.innerHTML = `
            <div class="flex items-center space-x-6">
                <img src="${event.image}" alt="${event.title}" class="w-24 h-24 object-cover rounded-lg">

                <div class="flex-1">
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2 hover:text-purple-600 transition-colors">
                                ${event.title}
                            </h3>
                            <div class="space-y-1 mb-3">
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-calendar-alt mr-2 w-4"></i>
                                    <span class="text-sm">${new Date(event.date).toLocaleDateString('en-US', {
                                        weekday: 'long',
                                        month: 'long',
                                        day: 'numeric'
                                    })} at ${event.time}</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-map-marker-alt mr-2 w-4"></i>
                                    <span class="text-sm">${event.location}</span>
                                </div>
                                <div class="flex items-center text-gray-600">
                                    <i class="fas fa-user mr-2 w-4"></i>
                                    <span class="text-sm">${event.organizer}</span>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-1">
                                ${event.tags.map(tag =>
                                    `<span class="bg-gray-100 text-gray-600 px-2 py-1 rounded-full text-xs">${tag}</span>`
                                ).join('')}
                            </div>
                        </div>

                        <div class="text-right">
                            <div class="text-2xl font-bold text-gray-900 mb-2">
                                ${event.price === 0 ? 'Free' : `$${event.price}`}
                            </div>
                            <div class="flex items-center mb-2">
                                <div class="flex text-yellow-400 text-sm">
                                    ${Array(5).fill().map((_, i) =>
                                        `<i class="fas fa-star ${i < Math.floor(event.rating) ? '' : 'text-gray-300'}"></i>`
                                    ).join('')}
                                </div>
                                <span class="ml-1 text-sm text-gray-600">${event.rating}</span>
                            </div>
                            <div class="text-sm text-gray-600 mb-3">${event.attendees} attending</div>
                            <button class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition-colors font-semibold">
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        return row;
    }

    // Update results count
    function updateResultsCount() {
        document.getElementById('resultsCount').textContent = filteredEvents.length;
        document.getElementById('selectedCategory').textContent =
            currentCategory ? `in ${currentCategory.charAt(0).toUpperCase() + currentCategory.slice(1)}` : '';

        // Show/hide no results
        if (filteredEvents.length === 0) {
            document.getElementById('eventsContainer').classList.add('hidden');
            document.getElementById('noResults').classList.remove('hidden');
            document.getElementById('loadMoreBtn').style.display = 'none';
        } else {
            document.getElementById('eventsContainer').classList.remove('hidden');
            document.getElementById('noResults').classList.add('hidden');
        }
    }

    // Filter events
    function filterEvents() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const location = document.getElementById('locationFilter').value;
        const date = document.getElementById('dateFilter').value;
        const price = document.getElementById('priceFilter').value;
        const sort = document.getElementById('sortFilter').value;

        filteredEvents = allEvents.filter(event => {
            let matches = true;

            // Category filter
            if (currentCategory && event.category !== currentCategory) matches = false;

            // Search filter
            if (searchTerm && !event.title.toLowerCase().includes(searchTerm) &&
                !event.organizer.toLowerCase().includes(searchTerm) &&
                !event.tags.some(tag => tag.toLowerCase().includes(searchTerm))) {
                matches = false;
            }

            // Location filter
            if (location) {
                if (location === 'online' && event.location !== 'Online') matches = false;
                if (location !== 'online' && event.location.toLowerCase().replace(' ', '-') !== location) matches = false;
            }

            // Price filter
            if (price) {
                if (price === 'free' && event.price !== 0) matches = false;
                if (price === '0-50' && (event.price < 0 || event.price > 50)) matches = false;
                if (price === '50-100' && (event.price < 50 || event.price > 100)) matches = false;
                if (price === '100+' && event.price < 100) matches = false;
            }

            return matches;
        });

        // Sort events
        filteredEvents.sort((a, b) => {
            switch (sort) {
                case 'popularity':
                    return b.attendees - a.attendees;
                case 'price-low':
                    return a.price - b.price;
                case 'price-high':
                    return b.price - a.price;
                case 'name':
                    return a.title.localeCompare(b.title);
                case 'date':
                default:
                    return new Date(a.date) - new Date(b.date);
            }
        });

        displayedCount = 6;
        renderEvents();
        updateResultsCount();
    }

    // Event listeners
    document.querySelectorAll('.category-card').forEach(card => {
        card.addEventListener('click', function() {
            const category = this.dataset.category;
            currentCategory = category;

            // Update category filters
            document.querySelectorAll('.category-filter').forEach(btn => btn.classList.remove('active'));
            document.querySelector(`[data-category="${category}"]`).classList.add('active');

            filterEvents();
        });
    });

    document.querySelectorAll('.category-filter').forEach(btn => {
        btn.addEventListener('click', function() {
            currentCategory = this.dataset.category;

            document.querySelectorAll('.category-filter').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            filterEvents();
        });
    });

    // View toggles
    document.querySelectorAll('.view-toggle').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.view-toggle').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            currentView = this.id.replace('View', '').toLowerCase();

            if (currentView === 'grid') {
                document.getElementById('gridViewContainer').classList.remove('hidden');
                document.getElementById('listViewContainer').classList.add('hidden');
            } else {
                document.getElementById('gridViewContainer').classList.add('hidden');
                document.getElementById('listViewContainer').classList.remove('hidden');
            }

            renderEvents();
        });
    });

    // Filter event listeners
    document.getElementById('searchInput').addEventListener('input', filterEvents);
    document.getElementById('locationFilter').addEventListener('change', filterEvents);
    document.getElementById('dateFilter').addEventListener('change', filterEvents);
    document.getElementById('priceFilter').addEventListener('change', filterEvents);
    document.getElementById('sortFilter').addEventListener('change', filterEvents);

    // Load more
    document.getElementById('loadMoreBtn').addEventListener('click', () => {
        displayedCount += 6;
        renderEvents();
    });

    // Clear/Reset filters
    document.getElementById('clearFilters').addEventListener('click', () => {
        document.getElementById('searchInput').value = '';
        document.getElementById('locationFilter').value = '';
        document.getElementById('dateFilter').value = '';
        document.getElementById('priceFilter').value = '';
        document.getElementById('sortFilter').value = 'date';
        currentCategory = '';

        document.querySelectorAll('.category-filter').forEach(btn => btn.classList.remove('active'));
        document.querySelector('[data-category=""]').classList.add('active');

        filterEvents();
    });

    document.getElementById('resetFilters').addEventListener('click', () => {
        document.getElementById('clearFilters').click();
    });

    // Initialize
    init();
});
</script>

<style>
.view-toggle.active {
    background-color: #7c3aed;
    color: white;
}

.category-filter.active {
    background-color: #7c3aed;
    color: white;
}
</style>
@endpush
