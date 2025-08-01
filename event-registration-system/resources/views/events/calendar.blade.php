@extends('layouts.app')

@section('title', 'Event Calendar - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header Section -->
    <div class="bg-white shadow-sm border-b">
        <div class="container mx-auto px-6 py-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Event Calendar</h1>
                    <p class="text-gray-600 mt-1">Discover events happening around you</p>
                </div>

                <!-- View Toggle -->
                <div class="flex items-center space-x-4">
                    <div class="bg-gray-100 rounded-lg p-1 flex">
                        <button id="monthView" class="view-toggle active px-4 py-2 rounded-md font-semibold transition-all">
                            <i class="fas fa-calendar-alt mr-2"></i>Month
                        </button>
                        <button id="weekView" class="view-toggle px-4 py-2 rounded-md font-semibold transition-all">
                            <i class="fas fa-calendar-week mr-2"></i>Week
                        </button>
                        <button id="listView" class="view-toggle px-4 py-2 rounded-md font-semibold transition-all">
                            <i class="fas fa-list mr-2"></i>List
                        </button>
                    </div>

                    <!-- Filter Button -->
                    <button id="filterBtn" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                        <i class="fas fa-filter mr-2"></i>Filters
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Panel (Hidden by default) -->
    <div id="filterPanel" class="bg-white shadow-lg border-b hidden">
        <div class="container mx-auto px-6 py-6">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Category Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select id="categoryFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">All Categories</option>
                        <option value="conference">Conference</option>
                        <option value="workshop">Workshop</option>
                        <option value="networking">Networking</option>
                        <option value="seminar">Seminar</option>
                        <option value="webinar">Webinar</option>
                        <option value="social">Social</option>
                        <option value="sports">Sports</option>
                        <option value="arts">Arts & Culture</option>
                    </select>
                </div>

                <!-- Location Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                    <select id="locationFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">All Locations</option>
                        <option value="online">Online Events</option>
                        <option value="san-francisco">San Francisco</option>
                        <option value="new-york">New York</option>
                        <option value="los-angeles">Los Angeles</option>
                        <option value="chicago">Chicago</option>
                    </select>
                </div>

                <!-- Price Filter -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Price Range</label>
                    <select id="priceFilter" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">Any Price</option>
                        <option value="free">Free Events</option>
                        <option value="0-50">$0 - $50</option>
                        <option value="50-100">$50 - $100</option>
                        <option value="100-500">$100 - $500</option>
                        <option value="500+">$500+</option>
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-end space-x-2">
                    <button id="applyFilters" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition-colors flex-1">
                        Apply
                    </button>
                    <button id="clearFilters" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                        Clear
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Calendar Navigation -->
    <div class="bg-white border-b">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <button id="prevMonth" class="p-2 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button id="nextMonth" class="p-2 rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    <button id="todayBtn" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                        Today
                    </button>
                </div>

                <h2 id="currentMonth" class="text-2xl font-bold text-gray-900">
                    July 2025
                </h2>

                <div class="flex items-center space-x-2">
                    <div class="flex items-center text-sm text-gray-600">
                        <div class="w-3 h-3 bg-purple-500 rounded mr-2"></div>
                        <span class="mr-4">Your Events</span>
                        <div class="w-3 h-3 bg-blue-500 rounded mr-2"></div>
                        <span class="mr-4">Public Events</span>
                        <div class="w-3 h-3 bg-green-500 rounded mr-2"></div>
                        <span>Free Events</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Calendar Content -->
    <div class="container mx-auto px-6 py-6">
        <!-- Month View -->
        <div id="monthViewContent" class="calendar-view">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <!-- Days of Week Header -->
                <div class="grid grid-cols-7 bg-gray-50">
                    <div class="p-4 text-center font-semibold text-gray-700 border-r border-gray-200">Sun</div>
                    <div class="p-4 text-center font-semibold text-gray-700 border-r border-gray-200">Mon</div>
                    <div class="p-4 text-center font-semibold text-gray-700 border-r border-gray-200">Tue</div>
                    <div class="p-4 text-center font-semibold text-gray-700 border-r border-gray-200">Wed</div>
                    <div class="p-4 text-center font-semibold text-gray-700 border-r border-gray-200">Thu</div>
                    <div class="p-4 text-center font-semibold text-gray-700 border-r border-gray-200">Fri</div>
                    <div class="p-4 text-center font-semibold text-gray-700">Sat</div>
                </div>

                <!-- Calendar Grid -->
                <div id="calendarGrid" class="grid grid-cols-7">
                    <!-- Calendar days will be generated by JavaScript -->
                </div>
            </div>
        </div>

        <!-- Week View -->
        <div id="weekViewContent" class="calendar-view hidden">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="grid grid-cols-8 border-b">
                    <div class="p-4 bg-gray-50"></div>
                    <div class="p-4 text-center font-semibold text-gray-700 bg-gray-50">Sun</div>
                    <div class="p-4 text-center font-semibold text-gray-700 bg-gray-50">Mon</div>
                    <div class="p-4 text-center font-semibold text-gray-700 bg-gray-50">Tue</div>
                    <div class="p-4 text-center font-semibold text-gray-700 bg-gray-50">Wed</div>
                    <div class="p-4 text-center font-semibold text-gray-700 bg-gray-50">Thu</div>
                    <div class="p-4 text-center font-semibold text-gray-700 bg-gray-50">Fri</div>
                    <div class="p-4 text-center font-semibold text-gray-700 bg-gray-50">Sat</div>
                </div>
                <div id="weekGrid" class="grid grid-cols-8">
                    <!-- Week view will be generated by JavaScript -->
                </div>
            </div>
        </div>

        <!-- List View -->
        <div id="listViewContent" class="calendar-view hidden">
            <div class="space-y-6">
                <!-- Upcoming Events List -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Upcoming Events</h3>
                    <div id="eventsList" class="space-y-4">
                        <!-- Events will be populated by JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Quick View Modal -->
    <div id="eventModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 id="modalTitle" class="text-2xl font-bold text-gray-900"></h3>
                    <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <div id="modalContent">
                    <!-- Event details will be populated here -->
                </div>

                <div class="flex space-x-4 mt-6">
                    <button id="viewEventBtn" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition-colors flex-1">
                        View Full Details
                    </button>
                    <button id="registerBtn" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors flex-1">
                        Register Now
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Creation FAB -->
    <div class="fixed bottom-6 right-6 z-40">
        <a href="{{ route('events.create') }}" class="bg-purple-600 text-white p-4 rounded-full shadow-lg hover:bg-purple-700 transition-all hover:scale-110 group">
            <i class="fas fa-plus text-xl"></i>
            <span class="absolute right-full mr-3 top-1/2 transform -translate-y-1/2 bg-gray-900 text-white px-3 py-1 rounded text-sm opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                Create Event
            </span>
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sample event data
    const sampleEvents = [
        {
            id: 1,
            title: 'Tech Innovation Summit 2025',
            date: '2025-07-30',
            time: '09:00',
            category: 'conference',
            location: 'San Francisco',
            price: 299,
            type: 'public',
            description: 'Join industry leaders for the biggest tech event of the year.',
            organizer: 'TechCorp Inc.',
            attendees: 1250
        },
        {
            id: 2,
            title: 'UI/UX Design Workshop',
            date: '2025-08-02',
            time: '14:00',
            category: 'workshop',
            location: 'Online',
            price: 0,
            type: 'free',
            description: 'Learn the latest design trends and tools from expert designers.',
            organizer: 'Design Academy',
            attendees: 45
        },
        {
            id: 3,
            title: 'Networking Happy Hour',
            date: '2025-08-05',
            time: '18:00',
            category: 'networking',
            location: 'New York',
            price: 25,
            type: 'public',
            description: 'Connect with professionals in a relaxed atmosphere.',
            organizer: 'Professional Network',
            attendees: 85
        },
        {
            id: 4,
            title: 'Digital Marketing Masterclass',
            date: '2025-08-10',
            time: '10:00',
            category: 'seminar',
            location: 'Los Angeles',
            price: 150,
            type: 'public',
            description: 'Master the art of digital marketing with proven strategies.',
            organizer: 'Marketing Pro',
            attendees: 200
        },
        {
            id: 5,
            title: 'Product Launch Event',
            date: '2025-08-15',
            time: '16:00',
            category: 'conference',
            location: 'Chicago',
            price: 0,
            type: 'user',
            description: 'Exclusive preview of our latest product innovations.',
            organizer: 'InnovateTech',
            attendees: 150
        }
    ];

    let currentDate = new Date();
    let currentView = 'month';
    let filteredEvents = [...sampleEvents];

    // Initialize calendar
    function initCalendar() {
        updateCalendarHeader();
        if (currentView === 'month') {
            renderMonthView();
        } else if (currentView === 'week') {
            renderWeekView();
        } else {
            renderListView();
        }
    }

    // Update calendar header
    function updateCalendarHeader() {
        const monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        document.getElementById('currentMonth').textContent =
            `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
    }

    // Render month view
    function renderMonthView() {
        const grid = document.getElementById('calendarGrid');
        grid.innerHTML = '';

        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const startDate = new Date(firstDay);
        startDate.setDate(startDate.getDate() - firstDay.getDay());

        for (let i = 0; i < 42; i++) {
            const cellDate = new Date(startDate);
            cellDate.setDate(startDate.getDate() + i);

            const dayEvents = filteredEvents.filter(event => {
                const eventDate = new Date(event.date);
                return eventDate.toDateString() === cellDate.toDateString();
            });

            const cell = createDayCell(cellDate, dayEvents, month);
            grid.appendChild(cell);
        }
    }

    // Create day cell
    function createDayCell(date, events, currentMonth) {
        const cell = document.createElement('div');
        cell.className = `min-h-32 p-2 border border-gray-200 ${
            date.getMonth() !== currentMonth ? 'bg-gray-50 text-gray-400' : 'bg-white'
        } ${date.toDateString() === new Date().toDateString() ? 'bg-blue-50' : ''}`;

        const dayNumber = document.createElement('div');
        dayNumber.className = `font-semibold text-sm mb-1 ${
            date.toDateString() === new Date().toDateString() ? 'text-blue-600' : ''
        }`;
        dayNumber.textContent = date.getDate();
        cell.appendChild(dayNumber);

        events.slice(0, 3).forEach(event => {
            const eventElement = document.createElement('div');
            eventElement.className = `text-xs p-1 mb-1 rounded cursor-pointer truncate ${
                event.type === 'user' ? 'bg-purple-100 text-purple-800' :
                event.price === 0 ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800'
            }`;
            eventElement.textContent = event.title;
            eventElement.addEventListener('click', () => showEventModal(event));
            cell.appendChild(eventElement);
        });

        if (events.length > 3) {
            const moreElement = document.createElement('div');
            moreElement.className = 'text-xs text-gray-600 cursor-pointer';
            moreElement.textContent = `+${events.length - 3} more`;
            moreElement.addEventListener('click', () => showDayEvents(date, events));
            cell.appendChild(moreElement);
        }

        return cell;
    }

    // Render list view
    function renderListView() {
        const container = document.getElementById('eventsList');
        container.innerHTML = '';

        if (filteredEvents.length === 0) {
            container.innerHTML = `
                <div class="text-center py-12">
                    <i class="fas fa-calendar-times text-4xl text-gray-400 mb-4"></i>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">No Events Found</h3>
                    <p class="text-gray-600">Try adjusting your filters or browse other dates.</p>
                </div>
            `;
            return;
        }

        // Group events by date
        const groupedEvents = {};
        filteredEvents.forEach(event => {
            const dateKey = new Date(event.date).toDateString();
            if (!groupedEvents[dateKey]) {
                groupedEvents[dateKey] = [];
            }
            groupedEvents[dateKey].push(event);
        });

        // Sort dates
        const sortedDates = Object.keys(groupedEvents).sort((a, b) => new Date(a) - new Date(b));

        sortedDates.forEach(dateKey => {
            const events = groupedEvents[dateKey];
            const date = new Date(dateKey);

            // Date header
            const dateHeader = document.createElement('div');
            dateHeader.className = 'font-semibold text-lg text-gray-900 mb-3 border-b pb-2';
            dateHeader.textContent = date.toLocaleDateString('en-US', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });
            container.appendChild(dateHeader);

            // Events for this date
            events.forEach(event => {
                const eventElement = createListEventElement(event);
                container.appendChild(eventElement);
            });
        });
    }

    // Create list event element
    function createListEventElement(event) {
        const element = document.createElement('div');
        element.className = 'flex items-center justify-between p-4 border border-gray-200 rounded-lg hover:shadow-md transition-shadow cursor-pointer mb-3';
        element.addEventListener('click', () => showEventModal(event));

        element.innerHTML = `
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 ${
                    event.type === 'user' ? 'bg-purple-100 text-purple-600' :
                    event.price === 0 ? 'bg-green-100 text-green-600' : 'bg-blue-100 text-blue-600'
                } rounded-lg flex items-center justify-center">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900">${event.title}</h4>
                    <p class="text-sm text-gray-600">${event.time} • ${event.location}</p>
                    <p class="text-sm text-gray-500">${event.organizer} • ${event.attendees} attendees</p>
                </div>
            </div>
            <div class="text-right">
                <div class="font-semibold text-gray-900">
                    ${event.price === 0 ? 'Free' : `$${event.price}`}
                </div>
                <div class="text-sm text-gray-600 capitalize">${event.category}</div>
            </div>
        `;

        return element;
    }

    // Show event modal
    function showEventModal(event) {
        const modal = document.getElementById('eventModal');
        const title = document.getElementById('modalTitle');
        const content = document.getElementById('modalContent');

        title.textContent = event.title;
        content.innerHTML = `
            <div class="space-y-4">
                <div class="flex items-center text-gray-600">
                    <i class="fas fa-calendar mr-3 w-5"></i>
                    <span>${new Date(event.date).toLocaleDateString('en-US', {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    })} at ${event.time}</span>
                </div>
                <div class="flex items-center text-gray-600">
                    <i class="fas fa-map-marker-alt mr-3 w-5"></i>
                    <span>${event.location}</span>
                </div>
                <div class="flex items-center text-gray-600">
                    <i class="fas fa-user mr-3 w-5"></i>
                    <span>${event.organizer}</span>
                </div>
                <div class="flex items-center text-gray-600">
                    <i class="fas fa-users mr-3 w-5"></i>
                    <span>${event.attendees} attendees</span>
                </div>
                <div class="flex items-center text-gray-600">
                    <i class="fas fa-tag mr-3 w-5"></i>
                    <span class="capitalize">${event.category}</span>
                </div>
                <div class="flex items-center text-gray-600">
                    <i class="fas fa-dollar-sign mr-3 w-5"></i>
                    <span>${event.price === 0 ? 'Free Event' : `$${event.price}`}</span>
                </div>
                <div class="pt-4 border-t">
                    <p class="text-gray-700">${event.description}</p>
                </div>
            </div>
        `;

        document.getElementById('viewEventBtn').onclick = () => {
            window.location.href = `/events/${event.id}`;
        };

        document.getElementById('registerBtn').onclick = () => {
            window.location.href = `/events/${event.id}/register`;
        };

        modal.classList.remove('hidden');
    }

    // View toggles
    document.querySelectorAll('.view-toggle').forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelectorAll('.view-toggle').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            currentView = this.id.replace('View', '').toLowerCase();

            document.querySelectorAll('.calendar-view').forEach(view => view.classList.add('hidden'));
            document.getElementById(this.id + 'Content').classList.remove('hidden');

            initCalendar();
        });
    });

    // Navigation
    document.getElementById('prevMonth').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        initCalendar();
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        initCalendar();
    });

    document.getElementById('todayBtn').addEventListener('click', () => {
        currentDate = new Date();
        initCalendar();
    });

    // Filter functionality
    document.getElementById('filterBtn').addEventListener('click', () => {
        const panel = document.getElementById('filterPanel');
        panel.classList.toggle('hidden');
    });

    document.getElementById('applyFilters').addEventListener('click', () => {
        const category = document.getElementById('categoryFilter').value;
        const location = document.getElementById('locationFilter').value;
        const price = document.getElementById('priceFilter').value;

        filteredEvents = sampleEvents.filter(event => {
            let matches = true;

            if (category && event.category !== category) matches = false;
            if (location && location !== 'online' && event.location.toLowerCase().replace(' ', '-') !== location) matches = false;
            if (location === 'online' && event.location !== 'Online') matches = false;

            if (price) {
                if (price === 'free' && event.price !== 0) matches = false;
                if (price === '0-50' && (event.price < 0 || event.price > 50)) matches = false;
                if (price === '50-100' && (event.price < 50 || event.price > 100)) matches = false;
                if (price === '100-500' && (event.price < 100 || event.price > 500)) matches = false;
                if (price === '500+' && event.price < 500) matches = false;
            }

            return matches;
        });

        initCalendar();
        document.getElementById('filterPanel').classList.add('hidden');
    });

    document.getElementById('clearFilters').addEventListener('click', () => {
        document.getElementById('categoryFilter').value = '';
        document.getElementById('locationFilter').value = '';
        document.getElementById('priceFilter').value = '';
        filteredEvents = [...sampleEvents];
        initCalendar();
    });

    // Modal close
    document.getElementById('closeModal').addEventListener('click', () => {
        document.getElementById('eventModal').classList.add('hidden');
    });

    document.getElementById('eventModal').addEventListener('click', (e) => {
        if (e.target === document.getElementById('eventModal')) {
            document.getElementById('eventModal').classList.add('hidden');
        }
    });

    // Initialize
    initCalendar();
});
</script>

<style>
.view-toggle.active {
    background-color: #7c3aed;
    color: white;
}

.view-toggle:not(.active) {
    color: #6b7280;
}

.view-toggle:not(.active):hover {
    background-color: #f3f4f6;
}

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
}

.day-cell {
    min-height: 120px;
    border: 1px solid #e5e7eb;
}

.event-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
    margin-right: 8px;
}
</style>
@endpush
