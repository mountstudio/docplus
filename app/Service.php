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
        return self::where('is_diagnostic', false)->get();
    }

    public static function getDiagnostics()
    {
        return self::where('is_diagnostic', true)->get();
    }

    public static function getServicesHasDoctorsAndClinics()
    {
        $collection = collect(self::where('is_diagnostic', false)->has('clinics')->with(['clinics', 'doctors'])->get());
        $collection = $collection->merge(self::where('is_diagnostic', false)->has('doctors')->with(['clinics', 'doctors'])->get());
        return $collection->unique();
    }

    public static function getDiagnosticsHasDoctorsAndClinics()
    {
        $collection = collect(self::where('is_diagnostic', true)->has('clinics')->with(['clinics', 'doctors'])->get());
        $collection = $collection->merge(self::where('is_diagnostic', true)->has('doctors')->with(['clinics', 'doctors'])->get());
        return $collection->unique();
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
