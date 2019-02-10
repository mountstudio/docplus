<?php

namespace App;

use App\Spec;
use App\Clinic;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'address', 'educations', 'experiences', 'price', 'discount', 'user_id'
    ];


    protected $casts = [
        'educations' => 'array',
        'experiences' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function specs()
    {
        return $this->belongsToMany(Spec::class);
    }
}
