<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'event_id',
        'name',
        'price',
        'quantity',
        'available',
        'description',
        'is_active',
    ];

    /**
     * Get the event that owns the ticket.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the user that owns the ticket.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the registration that owns the ticket.
     */
    public function registration()
    {
        return $this->belongsTo(EventRegistration::class, 'event_registration_id');
    }

    /**
     * Get the attendance record associated with the ticket.
     */
    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }

    /**
     * Safely decrement the available tickets
     *
     * @param int $amount
     * @return bool
     */
    public function decrementAvailable($amount = 1)
    {
        if ($this->available < $amount) {
            return false;
        }

        $this->available -= $amount;
        return $this->save();
    }
}
