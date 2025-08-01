@extends('layouts.app')

@section('title', 'Past Events')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Past Events</h2>
    @if($events->count())
        <div class="row">
            @foreach($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-text">{{ $event->description }}</p>
                            <p class="card-text"><small class="text-muted">Ended: {{ $event->end_date }}</small></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $events->links() }}
    @else
        <div class="alert alert-info">No past events found.</div>
    @endif
</div>
@endsection
