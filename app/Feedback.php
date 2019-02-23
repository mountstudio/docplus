<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    protected $fillable = [
        'comment', 'ratings', 'rating', 'name', 'phone_number','user_id'
    ];

    protected $casts = [
        'ratings' => 'array',
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
