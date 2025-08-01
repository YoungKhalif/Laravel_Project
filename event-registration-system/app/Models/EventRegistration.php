<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
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
        'amount_paid',
        'payment_status',
        'payment_id',
        'registration_number',
        'status',
    ];

    /**
     * Get the event that owns the registration.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the user that owns the registration.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
}
