<?php

namespace App\Observers;

use App\Branch;
use App\Clinic;
use App\Doctor;
use App\Helpers\ImageSaver;
use App\Pic;

class ClinicObserver
{
    public function creating(Clinic $clinic)
    {
        if (request('fullDay')) {
            $clinic->fullDay = true;
        } else {
            $clinic->fullDay = false;
        }

        if (request('partner')) {
            $clinic->partner = true;
        } else {
            $clinic->partner = false;
        }

        if (request('child')) {
            $clinic->child = true;
        } else {
            $clinic->child = false;
        }

        if (request('logo')) {
            $fileName = ImageSaver::save(request('logo'), 'uploads', 'clinic_logo', ['width' => 500, 'height' => 500]);

            $clinic->logo = $fileName;
        }
    }

    /**
     * Handle the clinic "created" event.
     *
     * @param  \App\Clinic  $clinic
     * @return void
     */
    public function created(Clinic $clinic)
    {
//        if (request()->categories) {
//            foreach (request()->categories as $category) {
//                $clinic->categories()->attach($category);
//            }
//        }

        if (request()->doctors) {
            foreach (request()->doctors as $doctor) {
                /**
                 * @var Doctor $doctor
                 */
                $doctor = Doctor::find($doctor);
                $doctor->clinics()->attach($clinic);
                $doctor->save();
            }
        }

        if (request('pics')) {
            foreach (request('pics') as $file) {
                $fileName = ImageSaver::save($file, 'uploads', 'clinic');

                $pic = Pic::create([
                    'image' => $fileName,
                ]);

                $clinic->pics()->attach($pic->id);
            }
        }

        if (request()->services) {
            foreach (request()->services as $index => $service) {
                $clinic->services()->attach($service, ['service_price' => request('prices')[$index]]);
            }
        }
    }

    public function updating(Clinic $clinic)
    {
        if (request('fullDay')) {
            $clinic->fullDay = true;
        } else {
            $clinic->fullDay = false;
        }
        if (request('child')) {
            $clinic->child = true;
        } else {
            $clinic->child = false;
        }
        if (request('partner')) {
            $clinic->partner = true;
        } else {
            $clinic->partner = false;
        }

        if (request('logo')) {
            $fileName = ImageSaver::save(request('logo'), 'uploads', 'clinic_logo', ['width' => 500, 'height' => 500]);

            $clinic->logo = $fileName;
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
        \Log::info('Clinic updated');

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
