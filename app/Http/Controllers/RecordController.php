<?php

namespace App\Http\Controllers;

use App\Record;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    //
    public function store($id)
    {
        $record = new Record();
        $schedule = Schedule::find($id);
        $record->schedule_id = $schedule->id;
        $record->user_id = Auth::id();
        $record->save();
        $schedule->active = 1;
        $schedule->save();
        return back();
    }
}
