<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Event;
use App\Models\Company;
use App\Models\Ticket;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        $users = User::with('company')
                    ->orderBy('created_at', 'desc')
                    ->paginate(20);

        return view('admin.users', compact('users'));
    }

    public function events()
    {
        $events = Event::with(['organizer', 'company'])
                       ->withCount(['tickets', 'registrations'])
                       ->orderBy('created_at', 'desc')
                       ->paginate(20);

        return view('admin.events', compact('events'));
    }

    public function companies()
    {
        $companies = Company::withCount(['events', 'users'])
                            ->orderBy('created_at', 'desc')
                            ->paginate(20);

        return view('admin.companies', compact('companies'));
    }

    public function reports()
    {
        return view('admin.reports');
    }

    public function eventReport(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $event = Event::with(['organizer', 'company'])->findOrFail($request->event_id);
        
        $stats = [
            'total_tickets' => $event->tickets()->count(),
            'confirmed_tickets' => $event->tickets()->where('status', 'confirmed')->count(),
            'total_revenue' => $event->tickets()->where('status', 'confirmed')->sum('price'),
            'total_attendees' => $event->attendances()->count(),
            'attendance_rate' => $event->tickets()->where('status', 'confirmed')->count() > 0 
                ? round(($event->attendances()->count() / $event->tickets()->where('status', 'confirmed')->count()) * 100, 2)
                : 0,
        ];

        $daily_sales = $event->tickets()
            ->where('status', 'confirmed')
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(*) as tickets_sold'),
                DB::raw('SUM(price) as revenue')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $attendees = $event->tickets()
            ->with('user')
            ->where('status', 'confirmed')
            ->get();

        return view('admin.reports.event', compact('event', 'stats', 'daily_sales', 'attendees'));
    }

    public function companyReport(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
        ]);

        $company = Company::findOrFail($request->company_id);
        
        $stats = [
            'total_events' => $company->events()->count(),
            'active_events' => $company->events()->where('status', 'active')->count(),
            'total_tickets_sold' => Ticket::whereIn('event_id', $company->events()->pluck('id'))
                ->where('status', 'confirmed')->count(),
            'total_revenue' => Ticket::whereIn('event_id', $company->events()->pluck('id'))
                ->where('status', 'confirmed')->sum('price'),
        ];

        $events = $company->events()
            ->withCount(['tickets' => function($query) {
                $query->where('status', 'confirmed');
            }])
            ->with(['organizer'])
            ->orderBy('created_at', 'desc')
            ->get();

        $monthly_revenue = Ticket::whereIn('event_id', $company->events()->pluck('id'))
            ->where('status', 'confirmed')
            ->select(
                DB::raw('YEAR(created_at) as year'),
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(price) as revenue')
            )
            ->whereYear('created_at', date('Y'))
            ->groupBy('year', 'month')
            ->orderBy('year', 'month')
            ->get();

        return view('admin.reports.company', compact('company', 'stats', 'events', 'monthly_revenue'));
    }

    public function attendanceReport(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $event = Event::with(['organizer', 'company'])->findOrFail($request->event_id);
        
        $attendances = Attendance::with(['user', 'ticket'])
            ->where('event_id', $event->id)
            ->orderBy('attended_at', 'desc')
            ->get();

        $hourly_checkins = $attendances
            ->groupBy(function($attendance) {
                return $attendance->attended_at->format('H:00');
            })
            ->map(function($group) {
                return $group->count();
            });

        $stats = [
            'total_attendees' => $attendances->count(),
            'peak_hour' => $hourly_checkins->keys()->first(),
            'average_checkin_time' => $attendances->avg(function($attendance) {
                return $attendance->attended_at->format('H');
            }),
        ];

        return view('admin.reports.attendance', compact('event', 'attendances', 'hourly_checkins', 'stats'));
    }

    public function exportEventReport(Event $event)
    {
        $attendees = $event->tickets()
            ->with('user')
            ->where('status', 'confirmed')
            ->get();

        $csv = "Name,Email,Phone,Ticket Number,Purchase Date,Price\n";
        
        foreach ($attendees as $ticket) {
            $csv .= "{$ticket->user->name},{$ticket->user->email},{$ticket->user->phone},{$ticket->ticket_number},{$ticket->purchased_at->format('Y-m-d H:i:s')},{$ticket->price}\n";
        }

        return response($csv)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="event-' . $event->id . '-attendees.csv"');
    }
}
