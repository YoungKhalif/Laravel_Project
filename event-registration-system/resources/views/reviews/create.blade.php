@extends('layouts.app')

@section('title', 'Leave a Review - EventSmart')

@push('styles')
<style>
    .star-rating input {
        display: none;
    }
    .star-rating label {
        cursor: pointer;
        width: 2rem;
        font-size: 2rem;
        padding: 0 0.1em;
        color: #ddd;
    }
    .star-rating input:checked ~ label {
        color: #ffd700;
    }
    .star-rating label:hover,
    .star-rating label:hover ~ label {
        color: #ffed4a;
    }
    .emoji-rating {
        transition: all 0.3s ease;
    }
    .emoji-rating:hover {
        transform: scale(1.2);
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="p-6 sm:p-8">
                <div class="flex items-center mb-6">
                    <div class="flex-1">
                        <h1 class="text-2xl font-bold text-gray-900">Leave a Review</h1>
                        <p class="mt-1 text-gray-600">Share your experience about {{ $event->title }}</p>
                    </div>
                    <div class="flex-shrink-0">
                        <img src="{{ $event->image_url ?? asset('images/default-event.jpg') }}"
                            alt="{{ $event->title }}"
                            class="h-16 w-16 object-cover rounded-lg shadow-sm">
                    </div>
                </div>

                @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-green-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-green-700">{{ session('success') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('reviews.store', $event) }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="event_id" value="{{ $event->id }}">

                    <!-- Overall Rating -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-4">Overall Rating</label>
                        <div class="star-rating flex justify-center text-2xl">
                            @for($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} required>
                                <label for="star{{ $i }}" title="{{ $i }} stars">
                                    <i class="fas fa-star"></i>
                                </label>
                            @endfor
                        </div>
                        @error('rating')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Experience Rating -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">How was your experience?</label>
                        <div class="flex justify-center space-x-6">
                            @foreach(['😍' => 'Loved it!', '😊' => 'Good', '😐' => 'Okay', '😕' => 'Poor', '😢' => 'Terrible'] as $emoji => $label)
                                <div class="text-center">
                                    <button type="button"
                                        class="emoji-rating text-3xl focus:outline-none p-2 rounded-full hover:bg-gray-100"
                                        onclick="document.getElementById('experience').value = '{{ $label }}'">
                                        {{ $emoji }}
                                    </button>
                                    <div class="text-xs text-gray-600 mt-1">{{ $label }}</div>
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="experience" id="experience" value="{{ old('experience') }}">
                    </div>

                    <!-- Review Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Review Title</label>
                        <input type="text" name="title" id="title"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            value="{{ old('title') }}"
                            placeholder="Sum up your experience in a few words"
                            required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Detailed Review -->
                    <div>
                        <label for="content" class="block text-sm font-medium text-gray-700">
                            Detailed Review
                            <span class="text-gray-400">({{ old('content') ? strlen(old('content')) : '0' }}/1000)</span>
                        </label>
                        <textarea name="content" id="content" rows="6"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500"
                            placeholder="Tell others about your experience at this event..."
                            maxlength="1000"
                            required>{{ old('content') }}</textarea>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Specific Ratings -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach(['Organization' => 'How well was the event organized?',
                                'Value' => 'Was it worth the price?',
                                'Venue' => 'How was the venue?',
                                'Staff' => 'How helpful was the staff?'] as $category => $question)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">{{ $category }}</label>
                                <p class="text-xs text-gray-500 mb-2">{{ $question }}</p>
                                <div class="flex items-center space-x-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        <button type="button"
                                            class="w-8 h-8 rounded-full border-2 border-gray-300 focus:outline-none focus:border-purple-500 hover:bg-purple-50"
                                            onclick="setRating('{{ strtolower($category) }}', {{ $i }})">
                                            {{ $i }}
                                        </button>
                                    @endfor
                                    <input type="hidden" name="ratings[{{ strtolower($category) }}]"
                                        id="rating_{{ strtolower($category) }}"
                                        value="{{ old('ratings.' . strtolower($category)) }}">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Would Recommend -->
                    <div class="border-t pt-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="would_recommend" id="would_recommend"
                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded"
                                {{ old('would_recommend') ? 'checked' : '' }}>
                            <label for="would_recommend" class="ml-2 block text-sm text-gray-700">
                                I would recommend this event to others
                            </label>
                        </div>
                    </div>

                    <!-- Photo Upload -->
                    <div class="border-t pt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Add Photos (Optional)</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <i class="fas fa-camera text-gray-400 text-3xl mb-3"></i>
                                <div class="flex text-sm text-gray-600">
                                    <label for="photos" class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500">
                                        <span>Upload photos</span>
                                        <input id="photos" name="photos[]" type="file" class="sr-only" multiple accept="image/*">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB each</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t">
                        <button type="button" onclick="window.history.back()"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Go Back
                        </button>
                        <button type="submit"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Submit Review
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function setRating(category, value) {
        document.getElementById('rating_' + category).value = value;
        const buttons = document.querySelectorAll(`button[onclick^="setRating('${category}'"]`);
        buttons.forEach((btn, index) => {
            if (index < value) {
                btn.classList.add('bg-purple-500', 'text-white');
                btn.classList.remove('border-gray-300');
            } else {
                btn.classList.remove('bg-purple-500', 'text-white');
                btn.classList.add('border-gray-300');
            }
        });
    }

    // Character counter for review content
    document.getElementById('content').addEventListener('input', function() {
        const length = this.value.length;
        this.previousElementSibling.querySelector('span').textContent = `(${length}/1000)`;
    });

    // File upload preview
    const photoInput = document.getElementById('photos');
    photoInput.addEventListener('change', function(e) {
        const files = Array.from(e.target.files);
        const container = this.closest('div').querySelector('p');
        container.textContent = files.length > 0
            ? `${files.length} file${files.length === 1 ? '' : 's'} selected`
            : 'PNG, JPG, GIF up to 10MB each';
    });
</script>
@endpush
