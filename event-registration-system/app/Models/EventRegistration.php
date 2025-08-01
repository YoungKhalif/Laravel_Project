<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory;

<<<<<<< HEAD
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'event_id',
        'user_id',
        'ticket_id',
        'amount_paid',
        'payment_status',
        'payment_id',
        'registration_number',
        'status',
    ];

    /**
     * Get the event that owns the registration.
     */
=======
    protected $fillable = [
        'event_id',
        'user_id',
        'registration_date',
        'status',
        'notes'
    ];

    protected $casts = [
        'registration_date' => 'datetime'
    ];

>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

<<<<<<< HEAD
    /**
     * Get the user that owns the registration.
     */
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    public function user()
    {
        return $this->belongsTo(User::class);
    }
<<<<<<< HEAD

    /**
     * Get the ticket associated with the registration.
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * Get the attendance record associated with the registration.
     */
    public function attendance()
    {
        return $this->hasOne(Attendance::class, 'registration_id');
    }

    /**
     * Generate a unique registration number
     */
    public static function generateRegistrationNumber()
    {
        $prefix = 'REG-';
        $random = strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 8));

        return $prefix . $random;
    }
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
}
