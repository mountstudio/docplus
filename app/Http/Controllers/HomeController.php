<?php

namespace App\Http\Controllers;

use App\Record;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function about_us()
    {
        return view('about_us');
    }
    public function test()
    {
        $schedules = Schedule::all()->where('doctor_id','=',1);
        return view('test',['schedules' => $schedules]);
    }
    public function record($id)
    {
        $record = new Record();
        $schedule = Schedule::find($id);
        $record->record_time = $schedule->time_of_record;
        $record->doctor_id = $schedule->doctor_id;
        $record->user_id = Auth::id();
        $record->save();
        $schedule->active = 1;
        $schedule->save();
        return back();
    }
}
