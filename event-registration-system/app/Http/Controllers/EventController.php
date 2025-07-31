<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::with(['organizer', 'company']);

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        if ($request->category) {
            $query->where('category', $request->category);
        }

        if ($request->city) {
            $query->where('city', $request->city);
        }

        $events = $query->where('status', 'active')
                       ->where('start_date', '>=', now())
                       ->orderBy('start_date', 'asc')
                       ->paginate(12);

        $categories = Event::select('category')->distinct()->pluck('category');
        $cities = Event::select('city')->distinct()->pluck('city');

        return view('events.index', compact('events', 'categories', 'cities'));
    }

    public function show(Event $event)
    {
        $event->load(['organizer', 'company', 'tickets', 'registrations']);
        $similar_events = Event::where('category', $event->category)
                               ->where('id', '!=', $event->id)
                               ->where('status', 'active')
                               ->take(4)
                               ->get();

        return view('events.show', compact('event', 'similar_events'));
    }

    public function create()
    {
        $this->authorize('create', Event::class);
        $companies = Company::where('is_verified', true)->get();
        return view('events.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Event::class);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required',
            'end_time' => 'required',
            'venue' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'max_attendees' => 'required|integer|min:1',
            'ticket_price' => 'required|numeric|min:0',
            'company_id' => 'required|exists:companies,id',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['organizer_id'] = auth()->id();
        $data['status'] = 'active';

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        if ($request->tags) {
            $data['tags'] = array_map('trim', explode(',', $request->tags));
        }

        $event = Event::create($data);

        return redirect()->route('events.show', $event)
                        ->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        $this->authorize('update', $event);
        $companies = Company::where('is_verified', true)->get();
        return view('events.edit', compact('event', 'companies'));
    }

    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required',
            'end_time' => 'required',
            'venue' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'max_attendees' => 'required|integer|min:1',
            'ticket_price' => 'required|numeric|min:0',
            'company_id' => 'required|exists:companies,id',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tags' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        if ($request->tags) {
            $data['tags'] = array_map('trim', explode(',', $request->tags));
        }

        $event->update($data);

        return redirect()->route('events.show', $event)
                        ->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);

        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('events.index')
                        ->with('success', 'Event deleted successfully!');
    }

    public function myEvents()
    {
        $events = auth()->user()->events()
                              ->withCount(['tickets', 'registrations'])
                              ->orderBy('created_at', 'desc')
                              ->paginate(10);

        return view('events.my-events', compact('events'));
    }
}
