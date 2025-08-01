@extends('layouts.app')

@section('title', 'Event Reviews - EventSmart')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Event Header -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-gray-900">Reviews for {{ $event->title }}</h1>
                        <div class="mt-2 flex items-center">
                            <div class="flex items-center">
                                <span class="text-4xl font-bold text-gray-900">{{ number_format($event->average_rating, 1) }}</span>
                                <div class="ml-4">
                                    <div class="flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star {{ $i <= round($event->average_rating) ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                                        @endfor
                                    </div>
                                    <p class="text-sm text-gray-500">Based on {{ $event->reviews_count }} reviews</p>
                                </div>
                            </div>
                            <div class="ml-auto">
                                @if(auth()->user()->can('review', $event))
                                    <a href="{{ route('reviews.create', $event) }}"
                                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700">
                                        <i class="fas fa-star mr-2"></i>
                                        Write a Review
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rating Distribution -->
                <div class="mt-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Star Distribution -->
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Rating Distribution</h3>
                            <div class="mt-2 space-y-2">
                                @foreach(range(5, 1) as $rating)
                                    <div class="flex items-center">
                                        <div class="w-12 text-sm text-gray-600">{{ $rating }} star</div>
                                        <div class="flex-1 ml-4">
                                            <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="h-full bg-yellow-400"
                                                    style="width: {{ ($event->rating_distribution[$rating] ?? 0) / max($event->reviews_count, 1) * 100 }}%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-16 text-sm text-gray-600 text-right">
                                            {{ $event->rating_distribution[$rating] ?? 0 }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Category Ratings -->
                        <div>
                            <h3 class="text-sm font-medium text-gray-900">Category Ratings</h3>
                            <div class="mt-2 space-y-3">
                                @foreach(['Organization', 'Value', 'Venue', 'Staff'] as $category)
                                    <div>
                                        <div class="flex items-center justify-between">
                                            <span class="text-sm text-gray-600">{{ $category }}</span>
                                            <span class="text-sm font-medium text-gray-900">
                                                {{ number_format($event->category_ratings[strtolower($category)] ?? 0, 1) }}/5
                                            </span>
                                        </div>
                                        <div class="mt-1 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="h-full bg-purple-500"
                                                style="width: {{ (($event->category_ratings[strtolower($category)] ?? 0) / 5) * 100 }}%">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews List -->
        <div class="space-y-6">
            <!-- Filters -->
            <div class="bg-white rounded-lg shadow-sm p-4">
                <div class="flex flex-wrap items-center gap-4">
                    <div class="flex-1">
                        <input type="text" placeholder="Search reviews..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div class="flex items-center space-x-4">
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="">All Ratings</option>
                            @foreach(range(5, 1) as $rating)
                                <option value="{{ $rating }}">{{ $rating }} Stars</option>
                            @endforeach
                        </select>
                        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500">
                            <option value="newest">Newest First</option>
                            <option value="oldest">Oldest First</option>
                            <option value="highest">Highest Rated</option>
                            <option value="lowest">Lowest Rated</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Reviews -->
            @forelse($reviews as $review)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                    src="{{ $review->user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($review->user->name) }}"
                                    alt="{{ $review->user->name }}">
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">{{ $review->user->name }}</h4>
                                        <div class="mt-1 flex items-center">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }} text-sm"></i>
                                            @endfor
                                            <span class="ml-2 text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    @if($review->user_id === auth()->id() || auth()->user()->isAdmin())
                                        <div class="flex items-center space-x-2">
                                            <button class="text-gray-400 hover:text-gray-600">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="text-gray-400 hover:text-red-600">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                <h5 class="mt-3 text-base font-medium text-gray-900">{{ $review->title }}</h5>
                                <p class="mt-2 text-sm text-gray-600">{{ $review->content }}</p>

                                @if($review->photos->count() > 0)
                                    <div class="mt-4 flex space-x-2">
                                        @foreach($review->photos as $photo)
                                            <a href="{{ $photo->url }}" class="block" target="_blank">
                                                <img src="{{ $photo->thumbnail }}" alt="Review photo"
                                                    class="h-20 w-20 object-cover rounded-lg">
                                            </a>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="mt-4 flex items-center space-x-4">
                                    <button class="text-sm text-gray-500 hover:text-gray-700">
                                        <i class="far fa-thumbs-up mr-1"></i>
                                        Helpful ({{ $review->helpful_count }})
                                    </button>
                                    <button class="text-sm text-gray-500 hover:text-gray-700">
                                        <i class="far fa-comment mr-1"></i>
                                        Reply
                                    </button>
                                    <button class="text-sm text-gray-500 hover:text-gray-700">
                                        <i class="far fa-flag mr-1"></i>
                                        Report
                                    </button>
                                </div>

                                @if($review->replies->count() > 0)
                                    <div class="mt-4 pl-4 border-l-2 border-gray-200">
                                        @foreach($review->replies as $reply)
                                            <div class="mt-3">
                                                <div class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <img class="h-8 w-8 rounded-full"
                                                            src="{{ $reply->user->avatar }}"
                                                            alt="{{ $reply->user->name }}">
                                                    </div>
                                                    <div class="ml-3">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $reply->user->name }}
                                                            @if($reply->user->id === $event->organizer_id)
                                                                <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                                    Organizer
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="mt-1 text-sm text-gray-600">
                                                            {{ $reply->content }}
                                                        </div>
                                                        <div class="mt-2 text-xs text-gray-500">
                                                            {{ $reply->created_at->diffForHumans() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                    <i class="fas fa-star text-gray-400 text-4xl mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900">No Reviews Yet</h3>
                    <p class="mt-1 text-gray-500">Be the first to review this event!</p>
                    @if(auth()->user()->can('review', $event))
                        <a href="{{ route('reviews.create', $event) }}"
                            class="mt-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700">
                            <i class="fas fa-star mr-2"></i>
                            Write a Review
                        </a>
                    @endif
                </div>
            @endforelse

            <!-- Pagination -->
            @if($reviews->hasPages())
                <div class="mt-6">
                    {{ $reviews->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Search functionality
    const searchInput = document.querySelector('input[type="text"]');
    searchInput.addEventListener('input', debounce(function(e) {
        // Implement search logic
    }, 300));

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
</script>
@endpush
