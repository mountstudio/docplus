<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
