<?php

namespace App\Observers;

use App\Doctor;
use App\Helpers\ImageSaver;
use App\Pic;
use App\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorObserver
{
    public function creating(Doctor $doctor)
    {
        if (request('home')) {
            $doctor->home = true;
        } else {
            $doctor->home = false;
        }
        if (request('child')) {
            $doctor->child = true;
        } else {
            $doctor->child = true;
        }

        if (request('logo')) {
            $fileName = ImageSaver::save(request('logo'), 'uploads', 'doctor_logo', ['width' => 500, 'height' => 500]);

            $doctor->logo = $fileName;
        }
    }

    /**
     * Handle the doctor "created" event.
     *
     * @param  \App\Doctor  $doctor
     * @return void
     */
    public function created(Doctor $doctor)
    {
        if (request('pics')) {
            foreach (request('pics') as $file) {
                    $fileName = ImageSaver::save($file, 'uploads', 'doctor');

                    $pic = new Pic([
                        'image' => $fileName,
                    ]);
                    $pic->save();

                    $doctor->pics()->attach($pic->id);
            }
        }

        if ($specs = request()->specializations) {
            $doctor->specs()->sync($specs);
        }

        if ($clinics = request()->clinics) {
            $doctor->clinics()->sync($clinics);
        }

        if ($services = request()->services) {
            $doctor->services()->sync($services);
        }
    }

    public function updating(Doctor $doctor)
    {
        if (request('home')) {
            $doctor->home = true;
        } else {
            $doctor->home = false;
        }
        if (request('child')) {
            $doctor->child = true;
        } else {
            $doctor->child = true;
        }

        if (request('logo')) {
            $fileName = ImageSaver::save(request('logo'), 'uploads', 'doctor_logo', ['width' => 500, 'height' => 500]);

            $doctor->logo = $fileName;
        }
    }

    /**
     * Handle the doctor "updated" event.
     *
     * @param  \App\Doctor  $doctor
     * @return void
     */
    public function updated(Doctor $doctor)
    {

    }

    /**
     * Handle the doctor "deleted" event.
     *
     * @param  \App\Doctor  $doctor
     * @return void
     */
    public function deleted(Doctor $doctor)
    {
        //
    }

    /**
     * Handle the doctor "restored" event.
     *
     * @param  \App\Doctor  $doctor
     * @return void
     */
    public function restored(Doctor $doctor)
    {
        //
    }

    /**
     * Handle the doctor "force deleted" event.
     *
     * @param  \App\Doctor  $doctor
     * @return void
     */
    public function forceDeleted(Doctor $doctor)
    {
        //
    }
}
