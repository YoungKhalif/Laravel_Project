<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

<<<<<<< HEAD
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    protected $fillable = [
        'event_id',
        'user_id',
        'ticket_id',
<<<<<<< HEAD
        'check_in_time',
        'check_out_time',
        'status',
        'notes',
    ];

    /**
     * Get the event that owns the attendance.
     */
=======
        'attended_at',
        'check_in_method',
        'notes'
    ];

    protected $casts = [
        'attended_at' => 'datetime'
    ];

>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

<<<<<<< HEAD
    /**
     * Get the user that owns the attendance.
     */
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    public function user()
    {
        return $this->belongsTo(User::class);
    }

<<<<<<< HEAD
    /**
     * Get the ticket that owns the attendance.
     */
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
