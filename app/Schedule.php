<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $fillable = ['doctor_id', 'date_of_record', 'time_of_record'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function record()
    {
        return $this->hasOne(Record::class);
    }
}
