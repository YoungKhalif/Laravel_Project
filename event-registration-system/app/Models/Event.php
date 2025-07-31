<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'venue',
        'address',
        'city',
        'state',
        'country',
        'max_attendees',
        'ticket_price',
        'organizer_id',
        'company_id',
        'image',
        'status',
        'category',
        'tags'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'ticket_price' => 'decimal:2',
        'tags' => 'array'
    ];

    public function organizer()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function getAvailableTicketsAttribute()
    {
        return $this->max_attendees - $this->tickets()->where('status', 'confirmed')->count();
    }

    public function getTotalSoldTicketsAttribute()
    {
        return $this->tickets()->where('status', 'confirmed')->count();
    }

    public function getTotalRevenueAttribute()
    {
        return $this->tickets()->where('status', 'confirmed')->sum('price');
    }

    public function isActive()
    {
        return $this->status === 'active' && $this->start_date >= Carbon::today();
    }
}
