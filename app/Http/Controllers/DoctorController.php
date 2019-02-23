<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Helpers\ImageSaver;
use App\Pic;
use App\Schedule;
use App\Service;
use App\Spec;
use App\Doctor;
use App\User;
use App\Clinic;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctors = Doctor::with('feedbacks')->get()
            ->sortByPrice($request->price)->sortByFeeds($request->feeds);

        return view('doctor.list', [
            'doctors' => $doctors,
            'price' => $request->price ? 0 : 1,
            'feeds' => $request->feeds ? 0 : 1,
            'child' => $request->child ? 0 : 1,
            'home' => $request->home ? 0 : 1,
        ]);
    }

    public function create()
    {
        return view('doctor.create', [
            'specs' => Spec::all(),
            'clinics' => Clinic::all(),
            'services' => Service::all()->where('is_diagnostic', false)
        ]);
    }
    public function store(Request $request)
    {
        $user = User::registerUser($request, 1);

        $request->merge(['user_id' => $user->id]);

        $doctor = Doctor::create($request->all());

        return redirect()->route('doctor.admin');
    }

    public function show(Doctor $doctor)
    {
        $schedules = Schedule::all()
            ->where('doctor_id', $doctor->id)
            ->groupBy('date_of_record');

        $feedbacks = $doctor->feedbacks;

        if ($doctor->rating == 5) {
            $status = 'God of Doctors';
        } elseif ($doctor->rating > 4 && $doctor->rating < 5) {
            $status = 'Превосходный';
        } elseif ($doctor->rating > 3 && $doctor->rating < 4) {
            $status = 'Отличный';
        } elseif ($doctor->rating > 2 && $doctor->rating < 3) {
            $status = 'Хороший';
        } else {
            $status = 'Херовый';
        }

        return view('doctor.show', [
            'schedules' => $schedules,
            'doctor' => $doctor,
            'feedbacks' => $feedbacks,
            'status' => $status,
        ]);
    }

    public function edit(Doctor $doctor)
    {
        $user = $doctor->user;
        return view('doctor.edit', [
            'doctor' => $doctor,
            'user' => $user
        ]);
    }
    public function update(Request $request)
    {
        $doctor = Doctor::find($request->id);
        $user = User::find($request);
        $doctor->address = $request->address;
        $doctor->price = $request->price;
        $doctor->discount = $request->discount;

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_doctor = 1;
        $user->save();

        $doctor->user_id = $user->id;
        $doctor->save();
    }
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->back();
    }

    public function filter(Request $request)
    {


        return view('doctor.list');
    }
}
