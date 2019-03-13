<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use App\Doctor;
use App\Clinic;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request, $type, $id)
    {
        try {
            $model = call_user_func('App\\'.$type."::find", $id);

            $like = new Like(['user_id' => Auth::id()]);

            Auth::user()->likes()->save($like);

            $model->likes()->save($like);

            return response()->json(['status' => 'success']);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error']);
        }

    }
}
