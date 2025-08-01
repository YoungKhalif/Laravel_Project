<?php

namespace App\Http\Controllers;

use App\Models\Event;
<<<<<<< HEAD
use App\Models\Ticket;
=======
use App\Models\Company;
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
<<<<<<< HEAD
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Event::query();

        // Apply search filters
        if ($request->has('search') && !empty($request->search)) {
=======
    public function index(Request $request)
    {
        $query = Event::with(['organizer', 'company']);

        if ($request->search) {
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

<<<<<<< HEAD
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }

        if ($request->has('location') && !empty($request->location)) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->has('date')) {
            $today = now()->format('Y-m-d');
            $tomorrow = now()->addDay()->format('Y-m-d');
            $weekEnd = now()->addDays(7)->format('Y-m-d');
            $monthEnd = now()->addDays(30)->format('Y-m-d');

            if ($request->date === 'today') {
                $query->whereDate('start_date', $today);
            } elseif ($request->date === 'tomorrow') {
                $query->whereDate('start_date', $tomorrow);
            } elseif ($request->date === 'week') {
                $query->whereDate('start_date', '>=', $today)
                      ->whereDate('start_date', '<=', $weekEnd);
            } elseif ($request->date === 'month') {
                $query->whereDate('start_date', '>=', $today)
                      ->whereDate('start_date', '<=', $monthEnd);
            }
        }

        $events = $query->latest()->paginate(12);

        return view('events.index', compact('events'));
    }

    /**
     * Display a listing of past events.
     */
    public function past(Request $request)
    {
        $events = Event::where('end_date', '<', now())->latest()->paginate(12);
        return view('events.past', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'location' => 'required|max:255',
            'address' => 'nullable',
            'event_type' => 'required|in:in_person,online,hybrid',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'has_tickets' => 'nullable|boolean',
            'ticket_price' => 'nullable|required_if:has_tickets,1|numeric|min:0',
            'ticket_quantity' => 'nullable|required_if:has_tickets,1|integer|min:1',
        ]);

        // Remove ticket data from event creation
        $ticketData = null;
        if ($request->has('has_tickets')) {
            $ticketData = [
                'price' => $request->ticket_price,
                'quantity' => $request->ticket_quantity,
                'available' => $request->ticket_quantity,
            ];

            unset($validatedData['has_tickets']);
            unset($validatedData['ticket_price']);
            unset($validatedData['ticket_quantity']);
        }

        // Create the event
        $event = Event::create($validatedData);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $event->update(['image' => $imagePath]);
        }

        // Create ticket if needed
        if ($ticketData) {
            $event->ticket()->create([
                'name' => 'Standard',
                'price' => $ticketData['price'],
                'quantity' => $ticketData['quantity'],
                'available' => $ticketData['available'],
            ]);
        }

        return redirect()->route('events.show', $event->id)
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        // Load related data
        $event->load(['ticket', 'company']);

        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        // Load related data
        $event->load(['ticket', 'company']);

        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'location' => 'required|max:255',
            'address' => 'nullable',
            'event_type' => 'required|in:in_person,online,hybrid',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'delete_image' => 'nullable|boolean',
            'has_tickets' => 'nullable|boolean',
            'ticket_price' => 'nullable|numeric|min:0',
            'ticket_quantity' => 'nullable|integer|min:1',
        ]);

        // Handle image deletion if requested
        if ($request->has('delete_image') && $request->delete_image == 1) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
                $validatedData['image'] = null;
            }
        }

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $imagePath = $request->file('image')->store('events', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Remove ticket data from event update
        $ticketData = null;
        if ($request->has('has_tickets')) {
            $ticketData = [
                'price' => $request->ticket_price,
                'quantity' => $request->ticket_quantity,
            ];
        }

        unset($validatedData['has_tickets']);
        unset($validatedData['ticket_price']);
        unset($validatedData['ticket_quantity']);
        unset($validatedData['delete_image']);

        // Update the event
        $event->update($validatedData);

        // Update or create ticket if needed
        if ($request->has('has_tickets')) {
            if ($event->ticket) {
                $event->ticket->update([
                    'price' => $ticketData['price'],
                    'quantity' => $ticketData['quantity'],
                    'available' => $ticketData['quantity'] - ($event->ticket->quantity - $event->ticket->available),
                ]);
            } else {
                $event->ticket()->create([
                    'name' => 'Standard',
                    'price' => $ticketData['price'],
                    'quantity' => $ticketData['quantity'],
                    'available' => $ticketData['quantity'],
                ]);
            }
        } elseif ($event->ticket) {
            // If tickets were enabled before but now disabled, delete the ticket
            $event->ticket->delete();
        }

        return redirect()->route('events.show', $event->id)
            ->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event deleted successfully.');
=======
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
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    }
}
