<?php

namespace App\Models;

use App\Models\Caregiver;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use App\Models\Patient;



class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username',
        'password',
        'role',
        'email',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
       // 'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
          // 'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function caregiver(): HasOne
    {
        return $this->hasOne(Caregiver::class);
    }

    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class, 'caregiver_id', 'id');
    }


    // Helper methods untuk cek role
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isCaregiver(): bool
    {
        return $this->role === 'caregiver';
    }
}
