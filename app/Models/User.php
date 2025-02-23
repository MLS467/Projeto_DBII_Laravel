<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'phone',
        'cpf',
        'sex',
        'birth',
        'photo',
        'place_of_birth',
        'city',
        'neighborhood',
        'street',
        'block',
        'apartment',
        'role',
        'age',
        'flag'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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
    }

    public function adm()
    {
        return $this->hasOne(Adm::class);
    }

    public function patient()
    {
        return $this->hasOne(PatientModel::class);
    }
    public function attendant()
    {
        return $this->hasOne(Attendant::class);
    }
    public function nurse()
    {
        return $this->hasOne(nurse::class);
    }
}