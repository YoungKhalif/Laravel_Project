<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
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
=======
    protected $fillable = [
        'event_id',
        'user_id',
        'ticket_number',
        'price',
        'status',
        'payment_status',
        'payment_method',
        'qr_code',
        'purchased_at'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'purchased_at' => 'datetime'
    ];

>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

<<<<<<< HEAD
    /**
     * Get the user that owns the ticket.
     */
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    public function user()
    {
        return $this->belongsTo(User::class);
    }

<<<<<<< HEAD
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
=======
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }

<<<<<<< HEAD
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
=======
    public function generateTicketNumber()
    {
        return 'TKT-' . strtoupper(uniqid());
    }

    public function generateQRCode()
    {
        return base64_encode($this->ticket_number . '-' . $this->event_id . '-' . $this->user_id);
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    }
}
