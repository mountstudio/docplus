<?php

namespace App;

use App\Service;
use App\Spec;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function services()
    {
    	return $this->hasMany(Service::class);
    }

    public function specs()
    {
    	return $this->hasMany(Spec::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
