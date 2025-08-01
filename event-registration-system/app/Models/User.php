<?php

namespace App\Models;

<<<<<<< HEAD
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
<<<<<<< HEAD
        'date_of_birth',
        'role',
        'user_type',
        'company_name',
        'contact_person',
        'website',
        'location',
        'description',
        'profile_photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
=======
        'role',
        'company_id',
        'email_verified_at'
    ];

>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
=======
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'organizer_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function eventRegistrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isOrganizer()
    {
        return $this->role === 'organizer';
    }

    public function isAttendee()
    {
        return $this->role === 'attendee';
>>>>>>> 8a996aa7d56b8b38ce7291c226b99d292509af77
    }
}
