<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
=======
use Carbon\Carbon;
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77

class Event extends Model
{
    use HasFactory;

<<<<<<< HEAD
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'category',
=======
    protected $fillable = [
        'title',
        'description',
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
        'start_date',
        'end_date',
        'start_time',
        'end_time',
<<<<<<< HEAD
        'location',
        'address',
        'event_type',
        'image',
        'is_active',
        'user_id',
        'company_id',
        'status',
    ];

    /**
     * Get the user that owns the event.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the company that owns the event.
     */
=======
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

>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

<<<<<<< HEAD
    /**
     * Get the registrations for the event.
     */
    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    /**
     * Get the tickets for the event.
     */
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

<<<<<<< HEAD
    /**
     * Get the main ticket for the event.
     */
    public function ticket()
    {
        return $this->hasOne(Ticket::class)->where('name', 'Standard')->latest();
    }

    /**
     * Get the attendances for the event.
     */
=======
    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
<<<<<<< HEAD
=======

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
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
}
