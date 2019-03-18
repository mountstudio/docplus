<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
    	'name', 'category_id','is_diagnostic', 'title', 'description', 'keywords',
    ];

    public static function getServices()
    {
        return Service::where('is_diagnostic', false)->get();
    }

    public static function getDiagnostics()
    {
        return Service::where('is_diagnostic', true)->get();
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }
    public function clinics()
    {
        return $this->belongsToMany(Clinic::class);
    }
}
