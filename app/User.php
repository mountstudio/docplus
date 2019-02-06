<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastName', 'email', 'password', 'isDoctor',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public static function registerUser($data, $isDoctor = false)
    {
        return User::create([
            'name' => $data['name'],
            'lastName' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'isDoctor' => $isDoctor,
        ]);
    }
}
