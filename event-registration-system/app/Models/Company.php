<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'email',
        'phone',
        'website',
        'logo',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'user_id',
        'is_verified',
    ];

    /**
     * Get the user that owns the company.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the events for the company.
     */
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
