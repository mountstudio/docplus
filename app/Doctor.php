<?php

namespace App;

use App\Collections\DoctorCollection;
use App\Spec;
use App\Clinic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\Request;

class Doctor extends Model
{
    protected $fillable = [
        'address', 'educations', 'experiences', 'price', 'discount', 'age',
        'attent_rating', 'manner_rating', 'time_rating', 'rating' ,'user_id',
        'home', 'child', 'title', 'description', 'keywords', 'first', 'second', 'third', 'prof_rating',
    ];

    protected $casts = [
        'educations' => 'array',
        'experiences' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clinics()
    {
        return $this->belongsToMany(Clinic::class);
    }

    public function specs()
    {
        return $this->belongsToMany(Spec::class);
    }
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public function pics()
    {
        return $this->belongsToMany(Pic::class);
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function feedbacks()
    {
        return $this->belongsToMany(Feedback::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function newCollection(array $models = [])
    {
        return new DoctorCollection($models); // TODO: Change the autogenerated stub
    }

    public static function getSchedule(Doctor $doctor)
    {
        return Schedule::all()
            ->where('doctor_id', $doctor->id)
            ->groupBy('date_of_record');
    }

    public static function getScheduleActivated(Doctor $doctor)
    {
        return Schedule::all()
            ->where('doctor_id', $doctor->id)
            ->where('active', true)
            ->where('accepted', false)
            ->groupBy('date_of_record');
    }


    public static function getRecord(Doctor $doctor)
    {
        return Record::all()->where('doctor_id', $doctor->id);
    }

    public function getFullNameAttribute()
    {
        return $this->user->fullName;
    }

    public function getNameAttribute()
    {
        return $this->user->name;
    }

    public function getLastNameAttribute()
    {
        return $this->user->last_name;
    }
}
