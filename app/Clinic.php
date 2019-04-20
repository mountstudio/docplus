<?php

namespace App;

use App\Collections\ClinicCollection;
use App\Doctor;
use App\Pic;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Clinic extends Model
{
    protected $fillable = [
        'name', 'address', 'phones', 'clinic_rating', 'comfort_rating', 'discipline_rating', 'rating', 'user_id',
        'title', 'description', 'keywords', 'logo', 'child', 'fullDay', 'type',
    ];

    protected $casts = [
      'phones' => 'array',
    ];

    public function newCollection(array $models = [])
    {
        return new ClinicCollection($models); // TODO: Change the autogenerated stub
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot([
            'service_price',
        ]);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function pics()
    {
        return $this->belongsToMany(Pic::class);
    }
    public function feedbacks()
    {
        return $this->belongsToMany(Feedback::class);
    }
    public static function getRecord(Clinic $clinic)
    {
//        return Record::all()->where('clinic_id', $clinic->id);
    }

    public static function getScheduleActivated(Clinic $clinic)
    {
        return Schedule::all()
            ->where('clinic_id', $clinic->id)
            ->where('active', true)
            ->where('accepted', false)
            ->groupBy('date_of_record');
    }

    public function updateClinicRelations(Request $request)
    {
        if ($cats = $request->categories) {
                $this->categories()->sync($cats);
        }

        if ($docs = $request->doctors) {
            $this->doctors()->sync($docs);
        }

        if ($pics = $request->pics) {
            foreach ($pics as $file) {
                $fileName = ImageSaver::save($file, 'uploads', 'clinic');

                $pic = Pic::create([
                    'image' => $fileName,
                ]);

                $this->pics()->attach($pic->id);
            }
        }

        if ($services = $request->services) {
            foreach ($services as $index => $service) {
                $this->services()->syncWithoutDetaching([$service => ['service_price' => request('prices')[$index]]]);
            }
        }

        $this->user->update($request->all());
    }
}
