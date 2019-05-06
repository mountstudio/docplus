<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Doctor;
use App\Notifications\NewRecordNotification;
use App\Record;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;

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
            $doctor = Doctor::find($request->doctor_id);
            $record = Record::create([
                'schedule_id' => $schedule->id,
                'user_id' => Auth::id(),
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'last_name' => $request->last_name
            ]);
            if($schedule->clinic_id)
            {
                $record->clinic_id = $schedule->clinic_id;
                $clinic = Clinic::find($schedule->clinic_id);
                $clinic->user->notify(new NewRecordNotification($record, $doctor));
            }
            else{
                $doctor->user->notify(new NewRecordNotification($record, null));
            }
            $schedule->active = 1;
            $schedule->save();
        }
        else {

            $record = Record::create([
                'schedule_id' => null,
                'user_id' => Auth::id(),
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'last_name' => $request->last_name
            ]);
        }
        if( !$schedule && $request->doctor_id)
        {
            $record->doctor_id = $request->doctor_id;
            if($request->spec_id)
            {
                $record->spec_id = $request->spec_id;
            }
            if($request->doctor_clinic_id)
            {
                $record->doctor_clinic_id = $request->doctor_clinic_id;
            }

            $doctor->user->notify(new NewRecordNotification($record, null));
        }
        if(!$schedule && $request->clinic_id)
        {
            $record->clinic_id = $request->clinic_id;
            if($request->service_id)
            {
                $record->service_id = $request->service_id;
            }
            $clinic = Clinic::find($request->clinic_id);
            $clinic->user->notify(new NewRecordNotification($record, $doctor));
        }

        $record->save();



        return back();
    }
}
