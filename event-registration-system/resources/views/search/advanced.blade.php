@extends('layouts.app')

@section('title', 'Advanced Search - EventSmart')

@push('styles')
<style>
    .filter-group {
        transition: max-height 0.3s ease-out;
        overflow: hidden;
    }
    .filter-group.collapsed {
        max-height: 0;
    }
    .custom-range::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 16px;
        height: 16px;
        background: #7C3AED;
        border-radius: 50%;
        cursor: pointer;
    }
    .custom-range::-moz-range-thumb {
        width: 16px;
        height: 16px;
        background: #7C3AED;
        border-radius: 50%;
        cursor: pointer;
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Filters Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Filters</h2>
                        <form action="{{ route('search.advanced') }}" method="GET">
                            <!-- Date Range -->
                            <div class="mb-6">
                                <h3 class="text-sm font-medium text-gray-900 mb-3">Date Range</h3>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-sm text-gray-600 mb-1">From</label>
                                        <input type="date" name="date_from"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500"
                                            value="{{ request('date_from') }}">
                                    </div>
                                    <div>
                                        <label class="block text-sm text-gray-600 mb-1">To</label>
                                        <input type="date" name="date_to"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500"
                                            value="{{ request('date_to') }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Price Range -->
                            <div class="mb-6">
                                <h3 class="text-sm font-medium text-gray-900 mb-3">Price Range</h3>
                                <div class="space-y-4">
                                    <input type="range"
                                        class="custom-range w-full h-1 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                                        min="0" max="1000" step="10"
                                        value="{{ request('max_price', 500) }}"
                                        oninput="this.nextElementSibling.value = this.value">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-600">$0</span>
                                        <output class="text-sm font-medium text-purple-600">$500</output>
                                        <span class="text-sm text-gray-600">$1000+</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Categories -->
                            <div class="mb-6">
                                <h3 class="text-sm font-medium text-gray-900 mb-3">Categories</h3>
                                <div class="space-y-2 max-h-48 overflow-y-auto">
                                    @foreach($categories as $category)
                                        <label class="flex items-center">
                                            <input type="checkbox" name="categories[]"
                                                value="{{ $category->id }}"
                                                {{ in_array($category->id, request('categories', [])) ? 'checked' : '' }}
                                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                            <span class="ml-2 text-sm text-gray-600">{{ $category->name }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Event Type -->
                            <div class="mb-6">
                                <h3 class="text-sm font-medium text-gray-900 mb-3">Event Type</h3>
                                <div class="space-y-2">
                                    @foreach(['In Person', 'Virtual', 'Hybrid'] as $type)
                                        <label class="flex items-center">
                                            <input type="radio" name="event_type"
                                                value="{{ strtolower($type) }}"
                                                {{ request('event_type') === strtolower($type) ? 'checked' : '' }}
                                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300">
                                            <span class="ml-2 text-sm text-gray-600">{{ $type }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="mb-6">
                                <h3 class="text-sm font-medium text-gray-900 mb-3">Location</h3>
                                <div class="space-y-3">
                                    <div>
                                        <input type="text" name="location"
                                            placeholder="City, State, or Zip"
                                            value="{{ request('location') }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500">
                                    </div>
                                    <div>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="online_only"
                                                {{ request('online_only') ? 'checked' : '' }}
                                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                            <span class="ml-2 text-sm text-gray-600">Online events only</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Filters -->
                            <div class="mb-6">
                                <h3 class="text-sm font-medium text-gray-900 mb-3">Additional Filters</h3>
                                <div class="space-y-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="accessible"
                                            {{ request('accessible') ? 'checked' : '' }}
                                            class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                        <span class="ml-2 text-sm text-gray-600">Wheelchair accessible</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="free"
                                            {{ request('free') ? 'checked' : '' }}
                                            class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                        <span class="ml-2 text-sm text-gray-600">Free events only</span>
                                    </label>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="available"
                                            {{ request('available') ? 'checked' : '' }}
                                            class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                        <span class="ml-2 text-sm text-gray-600">Available tickets only</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Rating -->
                            <div class="mb-6">
                                <h3 class="text-sm font-medium text-gray-900 mb-3">Minimum Rating</h3>
                                <div class="flex items-center space-x-2">
                                    @foreach(range(5, 1) as $rating)
                                        <label class="cursor-pointer">
                                            <input type="radio" name="min_rating"
                                                value="{{ $rating }}"
                                                {{ request('min_rating') == $rating ? 'checked' : '' }}
                                                class="sr-only peer">
                                            <div class="h-8 w-8 flex items-center justify-center rounded border border-gray-300 peer-checked:bg-purple-600 peer-checked:text-white hover:bg-purple-50">
                                                {{ $rating }}
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t">
                                <button type="reset" class="text-sm text-gray-600 hover:text-gray-900">
                                    Clear All
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                    Apply Filters
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Results -->
            <div class="lg:col-span-3">
                <!-- Search Stats -->
                <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Search Results</h2>
                            <p class="text-sm text-gray-600 mt-1">
                                Found {{ $events->total() }} events matching your criteria
                            </p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <label class="text-sm text-gray-600">Sort by:</label>
                            <select name="sort"
                                class="pl-3 pr-10 py-2 text-sm border border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500">
                                <option value="relevance" {{ request('sort') === 'relevance' ? 'selected' : '' }}>Relevance</option>
                                <option value="date" {{ request('sort') === 'date' ? 'selected' : '' }}>Date</option>
                                <option value="price_low" {{ request('sort') === 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high" {{ request('sort') === 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="rating" {{ request('sort') === 'rating' ? 'selected' : '' }}>Rating</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Event Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($events as $event)
                        <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                            <div class="relative">
                                <img src="{{ $event->cover_image }}" alt="{{ $event->title }}"
                                    class="w-full h-48 object-cover">
                                <div class="absolute top-4 right-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $event->is_featured ? 'bg-yellow-100 text-yellow-800' : 'bg-purple-100 text-purple-800' }}">
                                        {{ $event->is_featured ? 'Featured' : $event->category->name }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-2">
                                    <div class="flex items-center">
                                        <i class="far fa-calendar text-gray-400 mr-2"></i>
                                        <span class="text-sm text-gray-600">
                                            {{ $event->start_date->format('M d, Y') }}
                                        </span>
                                    </div>
                                    <div class="flex items-center">
                                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                                        <span class="text-sm font-medium text-gray-900">
                                            {{ number_format($event->average_rating, 1) }}
                                        </span>
                                    </div>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                    <a href="{{ route('events.show', $event) }}" class="hover:text-purple-600">
                                        {{ $event->title }}
                                    </a>
                                </h3>
                                <p class="text-sm text-gray-600 mb-4">{{ Str::limit($event->description, 100) }}</p>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-map-marker-alt text-gray-400"></i>
                                        <span class="text-sm text-gray-600">
                                            {{ $event->location ?? 'Online Event' }}
                                        </span>
                                    </div>
                                    <div>
                                        <span class="text-lg font-bold text-purple-600">
                                            ${{ number_format($event->price, 2) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-2 bg-white rounded-xl shadow-sm p-8 text-center">
                            <i class="fas fa-search text-gray-400 text-4xl mb-4"></i>
                            <h3 class="text-lg font-medium text-gray-900">No events found</h3>
                            <p class="mt-1 text-gray-500">Try adjusting your search filters</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($events->hasPages())
                    <div class="mt-6">
                        {{ $events->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Handle form reset
    document.querySelector('button[type="reset"]').addEventListener('click', function(e) {
        e.preventDefault();
        const form = this.closest('form');
        form.reset();
        form.submit();
    });

    // Handle sort change
    document.querySelector('select[name="sort"]').addEventListener('change', function() {
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('sort', this.value);
        window.location.search = urlParams.toString();
    });
</script>
@endpush
