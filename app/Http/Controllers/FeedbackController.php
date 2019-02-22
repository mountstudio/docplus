<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    //


    public function store(Request $request)
    {
        if(Auth::check())
        {
            $request->merge(['user_id' => Auth::id()]);
        }
        $feedback = Feedback::create($request->all());


        return back();
    }
}
