<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    //
    protected $casts = [
      'phones' => 'array',
    ];
}
