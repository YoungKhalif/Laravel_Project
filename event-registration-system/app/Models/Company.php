<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

<<<<<<< HEAD
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
=======
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'website',
        'description',
        'logo',
        'is_verified',
        'registration_number'
    ];

    protected $casts = [
        'is_verified' => 'boolean',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
