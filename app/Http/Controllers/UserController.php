<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Doctor;
use App\Feedback;
use App\Notifications\NewEditDoctorNotification;
use App\Question;
use App\Record;
use App\User;
use Carbon\Carbon;
use function foo\func;
use function GuzzleHttp\Promise\all;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function profile(Request $request)
    {
        if (Auth::user()->role === 'ROLE_OPERATOR')
        {
            $edits = Auth::user()
                ->unreadNotifications->where('type', 'App\Notifications\NewEditNotification');

            $questionNotifications = Auth::user()
                ->unreadNotifications->where('type', 'App\Notifications\NewQuestionNotification');
            $feedbackNotifications = Auth::user()
                ->unreadNotifications->where('type', 'App\Notifications\NewFeedbackNotification');

            $doctors = Doctor::all();
            $clinics = Clinic::all();

            return view('profile',[
                'show' => $request->show ? $request->show : null,
                'edits' => $edits,
                'doctors' => $doctors,
                'clinics' => $clinics,
                'user' => Auth::user(),
                'feedbackNotifications' => $feedbackNotifications,
                'questionNotifications' => $questionNotifications,
            ]);
        }
        elseif( Auth::user()->role === 'ROLE_DOCTOR') {
            $records = Record::all()
                ->where('doctor_id', Auth::user()->doctor->id)
                ->groupBy(function ($d) {
                    return Carbon::parse($d->created_at)->format('M Y');
                });
            return view('profile', ['user' => Auth::user(), 'records' => $records]);
        }
        elseif( Auth::user()->role === 'ROLE_CLINIC') {
            $records = Record::all()
                ->where('clinic_id', Auth::user()->clinic->id)
                ->groupBy(function ($d) {
                    return Carbon::parse($d->created_at)->format('M Y');
                });
            return view('profile', ['user' => Auth::user(), 'records' => $records]);
        }
        $doctor_likes = Auth::user()->likes->where('likeable_type', 'App\Doctor');
        $clinic_likes = Auth::user()->likes->where('likeable_type', 'App\Clinic');
        return view('profile', ['user' => Auth::user(), 'doctor_likes' => $doctor_likes, 'clinic_likes' => $clinic_likes]);

    }

    public function notifications()
    {
        $notifications = Auth::user()->unreadNotifications
        ->groupBy('type');

        if(Auth::user()->role == "ROLE_DOCTOR") {
            return view('doctor.tabs.notifications', [
                'notifications' => $notifications,
            ]);
        }
        elseif(Auth::user()->role == "ROLE_CLINIC") {
            return view('clinic.tabs.notifications', [
                'notifications' => $notifications,
            ]);
        }
        elseif (Auth::user()->role == "ROLE_OPERATOR") {
            return view('operator.tabs.notifications', [
                'notifications' => $notifications,
            ]);
        }

    }

    public function DoctorEditmarkAsRead(Request $request, $notification)
    {
        $edit = Auth::user()->Notifications->where('id', $notification)->first();

        $doctor = Doctor::find($edit->data['doctor']['id']);

        if($request->number == 1) {
            $doctor->user->name = $edit->data['request']['name'];
            $doctor->user->last_name = $edit->data['request']['last_name'];
            $doctor->address = $edit->data['request']['address'];
            $doctor->price = $edit->data['request']['price'];
            $doctor->discount = $edit->data['request']['discount'];
            $doctor->save();

        }

        $notifications = DB::table('notifications')->where('data', json_encode($edit->data))->delete();
        $doctor->user->notify(new NewEditDoctorNotification($request->number));

        return back();
    }

    public function markAsRead(Request $request, $notification)
    {
        $notification = Auth::user()->notifications->where('id', $notification)->first();

        if ($request->has('operators')) {
            $operators = User::where('role', 'ROLE_OPERATOR')->get();

            foreach ($operators as $operator) {
                $operator->unreadNotifications->where('data', $notification->data)->markAsRead();
            }
        } else {
            Auth::user()->unreadNotifications->where('id', $notification->id)->markAsRead();
        }
    }
}
