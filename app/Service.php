<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
    	'name', 'category_id','is_diagnostic'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
