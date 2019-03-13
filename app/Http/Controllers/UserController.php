<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Doctor;
use App\Record;
use App\User;
use Carbon\Carbon;
use function foo\func;
use function GuzzleHttp\Promise\all;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function profile()
    {
        if (Auth::user()->role === 'ROLE_OPERATOR')
        {
            $doctors = Doctor::all();
            $clinics = Clinic::all();




            return view('profile',['doctors' => $doctors, 'clinics' => $clinics, 'user' => Auth::user()]);
        }
        $records = Record::all()
            ->where('doctor_id',Auth::user()->doctor->id)
            ->groupBy(function($d) {
                return Carbon::parse($d->created_at)->format('M Y');
            });
        return view('profile',['user' => Auth::user(), 'records' => $records]);
    }

    public function notifications()
    {
        $notifications = Auth::user()->unreadNotifications;

        return view('notifications', [
            'notifications' => $notifications,
        ]);
    }

    public function markAsRead($notification)
    {
        Auth::user()->unreadNotifications->where('id', $notification)->markAsRead();

        return back();
    }
}
