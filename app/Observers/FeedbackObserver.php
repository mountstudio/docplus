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
            if ($rating = request('rating')) {
                $this->addRating($rating, Doctor::find($doctor_id));
            }
        }

        if ($clinic_id = request()->clinic_id) {
            $feedback->clinics()->attach($clinic_id);
            if ($rating = request('rating')) {
                $this->addRating($rating, Clinic::find($clinic_id));
            }
        }

    }

    private function addRating($rating, $model)
    {
        /**
         * @var Model $model
         */
        $model->rating = ($model->rating + $rating) / 2;
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
