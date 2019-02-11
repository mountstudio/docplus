<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pic extends Model
{
    protected $fillable = [
        'image'
    ];

    public function clinics()
    {
        return $this->belongsToMany(Clinic::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
