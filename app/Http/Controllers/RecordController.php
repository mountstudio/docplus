<?php

namespace App\Http\Controllers;

use App\Record;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    //
    public function index()
    {
    }


    public function store(Request $request)
    {
        $schedule = Schedule::find($request->schedule_id);

        if ($schedule) {
            $record = Record::create([
                'schedule_id' => $schedule->id,
                'user_id' => Auth::id(),
                'name' => $request->name,
                'phone_number' => $request->phone_number,
            ]);
            $schedule->active = 1;
            $schedule->save();
        }
        else
        {
            $record = Record::create([
                'schedule_id' => 0,
                'user_id' => Auth::id(),
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'doctor_id' => $request->doctor_id,
            ]);
        }



        return back();
    }
}
