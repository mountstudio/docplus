<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class User extends Authenticatable
{
    use Notifiable;

    public static $USER_ROLE = 'ROLE_USER';
    public static $ADMIN_ROLE = 'ROLE_ADMIN';
    public static $OPERATOR_ROLE = 'ROLE_OPERATOR';
    public static $DOC_ROLE = 'ROLE_DOCTOR';
    public static $CLINIC_ROLE = 'ROLE_CLINIC';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'patronymic', 'email', 'password', 'is_doctor', 'role',
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
        $data = $data->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'patronymic' => ['sometimes', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        return User::create([
            'patronymic' => $data['patronymic'] ?? '',
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $role,
        ]);
    }

    public function getFullNameAttribute()
    {
        return ucfirst($this->last_name) . ' ' . ucfirst($this->name) . ' ' . ucfirst($this->patronymic);
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
            $user->unreadNotifications->where('id', $notification->id)->markAsRead();
        }
    }
}
