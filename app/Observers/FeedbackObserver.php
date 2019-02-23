<?php

namespace App\Observers;

use App\Clinic;
use App\Doctor;
use App\Feedback;
use Illuminate\Database\Eloquent\Model;

class FeedbackObserver
{
    /**
     * Handle the feedback "created" event.
     *
     * @param  \App\Feedback  $feedback
     * @return void
     */
    public function created(Feedback $feedback)
    {
        if ($doctor_id = request()->doctor_id) {
            $feedback->doctors()->attach($doctor_id);
            $doctor = Doctor::find($doctor_id);
            if ($rating = request('rating')) {
                $this->addRating($rating, $doctor, 'rating');
            }
            if (request('rating') != "NaN" && request('rating') != null) {
                if ($attent_rating = request('attent_rating')) {
                    $this->addRating($attent_rating, $doctor, 'attent_rating');
                }
                if ($manner_rating = request('manner_rating')) {
                    $this->addRating($manner_rating, $doctor, 'manner_rating');
                }
                if ($time_rating = request('time_rating')) {
                    $this->addRating($time_rating, $doctor, 'time_rating');
                }
            }

        }

        if ($clinic_id = request()->clinic_id) {
            $feedback->clinics()->attach($clinic_id);
            $clinic = Clinic::find($clinic_id);
            if ($rating = request('rating')) {
                $this->addRating($rating, $clinic, 'rating');
            }
            if (request('rating') != "NaN" && request('rating') != null) {
                if ($clinic_rating = request('clinic_rating')) {
                    $this->addRating($clinic_rating, $clinic, 'clinic_rating');
                }
                if ($comfort_rating = request('comfort_rating')) {
                    $this->addRating($comfort_rating, $clinic, 'comfort_rating');
                }
                if ($discipline_rating = request('discipline_rating')) {
                    $this->addRating($discipline_rating, $clinic, 'discipline_rating');
                }
            }
        }

    }

    private function addRating($rating, $model, $type)
    {
        /**
         * @var Model $model
         */
        $model->$type = ($model->$type + $rating) / 2;
        $model->save();
    }

    /**
     * Handle the feedback "updated" event.
     *
     * @param  \App\Feedback  $feedback
     * @return void
     */
    public function updated(Feedback $feedback)
    {
        //
    }

    /**
     * Handle the feedback "deleted" event.
     *
     * @param  \App\Feedback  $feedback
     * @return void
     */
    public function deleted(Feedback $feedback)
    {
        //
    }

    /**
     * Handle the feedback "restored" event.
     *
     * @param  \App\Feedback  $feedback
     * @return void
     */
    public function restored(Feedback $feedback)
    {
        //
    }

    /**
     * Handle the feedback "force deleted" event.
     *
     * @param  \App\Feedback  $feedback
     * @return void
     */
    public function forceDeleted(Feedback $feedback)
    {
        //
    }
}
