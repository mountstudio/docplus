<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Notifications\NewRecordNotification;
use App\Record;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    //
    public function index(Schedule $schedule)
    {
        $schedule->accepted = true;
        $schedule->save();

        return back();
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

            $doctor = $schedule->doctor;

            $doctor->user->notify(new NewRecordNotification($record));
        } else {
            $record = Record::create([
                'schedule_id' => null,
                'user_id' => Auth::id(),
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'doctor_id' => $request->doctor_id,
            ]);

            $doctor = Doctor::find($request->doctor_id);
            $doctor->user->notify(new NewRecordNotification($record));
        }



        return back();
    }
}
