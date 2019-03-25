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
        }

        if ($clinic_id = request()->clinic_id) {
            $feedback->clinics()->attach($clinic_id);
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
        if ($feedback->doctors->count()) {
            $doctor_id = $feedback->doctors->first()->id;
            $doctor = Doctor::find($doctor_id);
            if ($rating = $feedback->rating) {
                $this->addRating($rating, $doctor, 'rating');
            }
            if ($feedback->rating) {
                if ($attent_rating = $feedback->ratings['attent_rating']) {
                    $this->addRating($attent_rating, $doctor, 'attent_rating');
                }
                if ($manner_rating = $feedback->ratings['manner_rating']) {
                    $this->addRating($manner_rating, $doctor, 'manner_rating');
                }
                if ($time_rating = $feedback->ratings['time_rating']) {
                    $this->addRating($time_rating, $doctor, 'time_rating');
                }
            }

        }

        if ($feedback->clinics->count()) {
            $clinic_id = $feedback->clinics->first()->id;
            $clinic = Clinic::find($clinic_id);
            if ($rating = $feedback->rating) {
                $this->addRating($rating, $clinic, 'rating');
            }
            if ($feedback->rating) {
                if ($clinic_rating = $feedback->ratings['clinic_rating']) {
                    $this->addRating($clinic_rating, $clinic, 'clinic_rating');
                }
                if ($comfort_rating = $feedback->ratings['comfort_rating']) {
                    $this->addRating($comfort_rating, $clinic, 'comfort_rating');
                }
                if ($discipline_rating = $feedback->ratings['discipline_rating']) {
                    $this->addRating($discipline_rating, $clinic, 'discipline_rating');
                }
            }
        }

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
