<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'category',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
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
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

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
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

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
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
