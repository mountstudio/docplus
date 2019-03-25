<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Feedback;
use App\Notifications\NewFeedbackNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    //


    public function store(Request $request)
    {
        $this->mergeRequestByRatingTypes($request);
        if (Auth::check()) {
            $request->merge(['user_id' => Auth::id()]);
        }

        $feedback = Feedback::create($request->all());

        $users = User::where('role', 'ROLE_OPERATOR')->get();

        foreach ($users as $user) {
            $user->notify(new NewFeedbackNotification());
        }

        return back();
    }

    public function activation(Feedback $feedback)
    {
        $feedback->is_active = true;
        $feedback->save();

        return back();
    }
    /**
     * @param Request $request
     */
    private function mergeRequestByRatingTypes($request)
    {
        if ($request->rating != "NaN" && $request->rating != null) {
            if ($request->has('doctor_id')) {
                $request->merge([
                    'ratings' => [
                        'attent_rating' => $request->get('attent_rating'),
                        'manner_rating' => $request->get('manner_rating'),
                        'time_rating' => $request->get('time_rating'),
                    ]
                ]);
            }
            if ($request->has('clinic_id')) {
                $request->merge([
                    'ratings' => [
                        'clinic_rating' => $request->get('clinic_rating'),
                        'comfort_rating' => $request->get('comfort_rating'),
                        'discipline_rating' => $request->get('discipline_rating'),
                    ]
                ]);
            }
        }
    }
}
