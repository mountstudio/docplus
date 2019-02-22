<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = [
        'comment', 'attent_rating', 'manner_rating', 'time_rating','rating', 'name', 'phone_number','user_id'
    ];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    public function clinics()
    {
        return $this->belongsToMany(Clinic::class);
    }

}
