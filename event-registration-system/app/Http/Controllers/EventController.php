<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Event::query();

        // Apply search filters
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
        }

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
    }
}
