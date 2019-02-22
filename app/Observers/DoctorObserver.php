<?php

namespace App\Observers;

use App\Doctor;
use App\Helpers\ImageSaver;
use App\Pic;
use App\Clinic;
use Illuminate\Http\Request;

class DoctorObserver
{
    /**
     * Handle the doctor "created" event.
     *
     * @param  \App\Doctor  $doctor
     * @return void
     */
    public function created(Doctor $doctor)
    {
        if (request()->allFiles()) {
            foreach (request()->allFiles() as $input) {
                foreach ($input as $file) {
                    $fileName = ImageSaver::save($file, 'uploads', 'doctor');

                    $pic = new Pic([
                        'image' => $fileName,
                    ]);
                    $pic->save();

                    $doctor->pics()->attach($pic->id);
                }
            }
        }

        if (request()->specializations) {
            foreach (request()->specializations as $spec) {
                $doctor->specs()->attach($spec);
            }
        }

        if (request()->clinic) {
            $doctor->clinic()->associate(Clinic::find(request()->clinic));
            $doctor->save();
        }

        if (request()->services) {
            foreach (request()->services as $service) {
                $doctor->services()->attach($service);
            }
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
        //
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
