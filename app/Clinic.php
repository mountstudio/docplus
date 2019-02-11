<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    //
    protected $casts = [
      'phones' => 'array',
    ];

    public function doctors()
    {
        return $this->hasMany('App/Doctors');
    }

    public function pics()
    {
        return $this->belongsToMany(Pic::class);
    }
}
