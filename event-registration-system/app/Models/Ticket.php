<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

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

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }

    public function generateTicketNumber()
    {
        return 'TKT-' . strtoupper(uniqid());
    }

    public function generateQRCode()
    {
        return base64_encode($this->ticket_number . '-' . $this->event_id . '-' . $this->user_id);
    }
}
