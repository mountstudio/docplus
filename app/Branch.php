<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    Public function clinics()
    {
        return $this->hasMany('App\Clinic');
    }
}
