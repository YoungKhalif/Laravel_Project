<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use App\Models\Company;
use App\Models\Ticket;
use App\Models\Attendance;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user->isAdmin()) {
            return $this->adminDashboard();
        } elseif ($user->isOrganizer()) {
            return $this->organizerDashboard();
        } else {
            return $this->attendeeDashboard();
        }
    }

    private function adminDashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'total_events' => Event::count(),
            'total_companies' => Company::count(),
            'total_tickets_sold' => Ticket::where('status', 'confirmed')->count(),
            'total_revenue' => Ticket::where('status', 'confirmed')->sum('price'),
            'active_events' => Event::where('status', 'active')->count(),
        ];

        $recent_events = Event::with(['organizer', 'company'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $monthly_revenue = Ticket::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(price) as revenue')
        )
        ->where('status', 'confirmed')
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->get();

        return view('dashboard', compact('stats', 'recent_events', 'monthly_revenue'));
    }

    private function organizerDashboard()
    {
        $user = auth()->user();
        
        $stats = [
            'my_events' => $user->events()->count(),
            'total_tickets_sold' => Ticket::whereIn('event_id', $user->events()->pluck('id'))->where('status', 'confirmed')->count(),
            'total_revenue' => Ticket::whereIn('event_id', $user->events()->pluck('id'))->where('status', 'confirmed')->sum('price'),
            'upcoming_events' => $user->events()->where('start_date', '>=', now())->count(),
        ];

        $my_events = $user->events()
            ->withCount(['tickets', 'registrations'])
            ->orderBy('start_date', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact('stats', 'my_events'));
    }

    private function attendeeDashboard()
    {
        $user = auth()->user();
        
        $stats = [
            'my_tickets' => $user->tickets()->where('status', 'confirmed')->count(),
            'events_attended' => $user->eventRegistrations()->count(),
            'upcoming_events' => $user->tickets()
                ->whereHas('event', function($q) {
                    $q->where('start_date', '>=', now());
                })
                ->where('status', 'confirmed')
                ->count(),
        ];

        $my_tickets = $user->tickets()
            ->with('event')
            ->where('status', 'confirmed')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $upcoming_events = Event::where('status', 'active')
            ->where('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->take(6)
            ->get();

        return view('dashboard', compact('stats', 'my_tickets', 'upcoming_events'));
    }
}
