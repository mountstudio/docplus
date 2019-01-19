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

}
