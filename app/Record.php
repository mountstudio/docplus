<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['schedule_id', 'user_id', 'name', 'phone_number','doctor_id', 'lastname'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
