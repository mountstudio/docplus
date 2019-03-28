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
        'name', 'last_name', 'email', 'password', 'is_doctor',
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

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function clinic()
    {
        return $this->hasOne(Clinic::class);
    }

    public function pic()
    {
        return $this->hasOne(Pic::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public static function registerUser($data, $role = 'ROLE_USER')
    {
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $role,
        ]);
    }

    public function getFullNameAttribute()
    {
        return ucfirst($this->name) . ' ' . ucfirst($this->last_name);
    }

    public static function getRecord(User $user)
    {
        return Record::all()->where('user_id', $user->id);
    }

    public static function markAsRead($notification, $user, $params = [])
    {
        $notification = $user->notifications->where('id', $notification)->first();

        if (array_has($params, ['operators'])) {
            $operators = User::where('role', 'ROLE_OPERATOR')->get();

            foreach ($operators as $operator) {
                $operator->unreadNotifications->where('data', $notification->data)->markAsRead();
            }
        } else {
            Auth::user()->unreadNotifications->where('id', $notification->id)->markAsRead();
        }
    }
}
