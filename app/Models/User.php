<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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

    const ROLE_SUPER_ADMIN = 'super-admin';
    const ROLE_TEACHER = 'teacher';
    const ROLE_STUDENT = 'student';
    const ROLE_ADMINISTRATIVE = 'administrative';
    const ROLE_VIGILANT = 'vigilant';
    const DOMAIN_UTP = '@utp.edu.pe';

    const ROLES = [
        self::ROLE_SUPER_ADMIN,
        self::ROLE_TEACHER,
        self::ROLE_STUDENT,
        self::ROLE_ADMINISTRATIVE,
        self::ROLE_VIGILANT,
    ];


    public function hasActiveParkingReserved()
    {
        return $this->parking_reserveds()->whereDate('start_time', '<=', now())->whereNull('end_time')->exists();
    }

    public function getVehiclesSelectOptions(): array
    {
        if ($this->vehicles->isEmpty()) {
            return [];
        }

        return $this->vehicles->mapWithKeys(function ($vehicule) {
            return [$vehicule->id => $vehicule->vehicle_type . ' - ' . $vehicule->plate];
        })->toArray();
    }

    public function getCurrentRoles()
    {
        return $this->roles()->get()->first()?->name;
    }

    public function parking_reserveds()
    {
        return $this->hasMany(ParkingReserved::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
