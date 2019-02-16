<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //
    public function create()
    {
        $doctors = User::all()->where('is_doctor','=',1);
        return view('record.create',['doctors' => $doctors]);
    }

    public function store(Request $request)
    {
//        $schedule = Schedule::create([
//            'doctor_id' => $request->doctor_id,
//            'schedule_date' => new \DateTime($request->schedule_date),
//        ]);
        foreach ($request->times as $time) {
            $schedule = new Schedule();
            $schedule->doctor_id = 1;
            $schedule->date_of_record = new \DateTime($request->schedule_date);
            $schedule->time_of_record = $time;
            $schedule->save();
        }

        return back();
    }
}
