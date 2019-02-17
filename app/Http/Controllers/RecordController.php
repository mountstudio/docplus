<?php

namespace App\Http\Controllers;

use App\Record;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    //
    public function store(Request $request)
    {
        $schedule = Schedule::find($request->schedule_id);

        $record = Record::create([
            'schedule_id' => $schedule->id,
            'user_id' => Auth::id(),
        ]);

        $schedule->active = 1;
        $schedule->save();

        return back();
    }
}
