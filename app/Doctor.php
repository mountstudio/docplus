<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    protected $casts = [
      'educations' => 'array',
        'experiences' => 'array',
        'specializations' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clinic()
    {
        return $this->hasOne('App/Clinic');
    }
}
