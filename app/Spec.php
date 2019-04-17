<?php

namespace App;

use App\Doctor;
use App\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    protected $fillable = [
    	'name', 'category_id',
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function doctors()
    {
    	return $this->belongsToMany(Doctor::class);
    }

}
