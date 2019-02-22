<?php

namespace App\Observers;

use App\Clinic;
use App\Doctor;
use App\Helpers\ImageSaver;
use App\Pic;

class ClinicObserver
{
    /**
     * Handle the clinic "created" event.
     *
     * @param  \App\Clinic  $clinic
     * @return void
     */
    public function created(Clinic $clinic)
    {
        if (request()->categories) {
            foreach (request()->categories as $category) {
                $clinic->categories()->attach($category);
            }
        }

        if (request()->doctors) {
            foreach (request()->doctors as $doctor) {
                /**
                 * @var Doctor $doctor
                 */
                $doctor = Doctor::find($doctor);
                $doctor->clinic()->associate($clinic);
                $doctor->save();
            }
        }

        if (request()->allFiles()) {
            foreach (request()->allFiles() as $input) {
                foreach ($input as $file) {
                    $fileName = ImageSaver::save($file, 'uploads', 'clinic');

                    $pic = Pic::create([
                        'image' => $fileName,
                    ]);

                    $clinic->pics()->attach($pic->id);
                }
            }
        }

        if (request()->services) {
            foreach (request()->services as $service) {
                $clinic->services()->attach($service);
            }
        }
    }

    /**
     * Handle the clinic "updated" event.
     *
     * @param  \App\Clinic  $clinic
     * @return void
     */
    public function updated(Clinic $clinic)
    {
        //
    }

    /**
     * Handle the clinic "deleted" event.
     *
     * @param  \App\Clinic  $clinic
     * @return void
     */
    public function deleted(Clinic $clinic)
    {
        //
    }

    /**
     * Handle the clinic "restored" event.
     *
     * @param  \App\Clinic  $clinic
     * @return void
     */
    public function restored(Clinic $clinic)
    {
        //
    }

    /**
     * Handle the clinic "force deleted" event.
     *
     * @param  \App\Clinic  $clinic
     * @return void
     */
    public function forceDeleted(Clinic $clinic)
    {
        //
    }
}
