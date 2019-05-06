<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Schedule;
use App\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedule.index');
    }
    public function create()
    {
        $doctors = Doctor::all();
        return view('record.create',['doctors' => $doctors]);
    }

    public function store(Request $request)
    {
        foreach ($request->time_of_records as $time) {
            $schedule = new Schedule($request->all());
            $schedule->doctor_id = $request->doctor_id;
            $schedule->clinic_id = $request->clinic_id;
            $schedule->time_of_record = $time;
            $schedule->date_of_record = new \DateTime($request->schedule_date);
            $schedule->save();
        }

        return back();
    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}
