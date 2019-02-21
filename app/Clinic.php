<?php

namespace App;

use App\Doctor;
use App\Pic;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $fillable = [
        'name', 'address', 'phones', 'clinic_rating', 'comfort_rating', 'discipline_rating', 'rating',
    ];

    protected $casts = [
      'phones' => 'array',
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function pics()
    {
        return $this->belongsToMany(Pic::class);
    }
}
