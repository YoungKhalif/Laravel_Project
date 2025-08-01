<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'event_id',
        'user_id',
        'ticket_id',
        'check_in_time',
        'check_out_time',
        'status',
        'notes',
    ];

    /**
     * Get the event that owns the attendance.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the user that owns the attendance.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the ticket that owns the attendance.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
