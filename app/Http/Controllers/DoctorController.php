<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\Spec;
use App\Doctor;
use App\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctors = Doctor::with('feedbacks')->get();

        if ($request->price) {
            $doctors = $doctors->sortBy('price');
        } else {
            $doctors = $doctors->sortByDesc('price');
        }
        if ($request->feeds) {
            $doctors = $doctors->sortBy(function ($doc) {
                return $doc->feedbacks->count();
            });
        } else {
            $doctors = $doctors->sortByDesc(function ($doc) {
                return $doc->feedbacks->count();
            });
        }

        return view('doctor.list', [
            'doctors' => $doctors,
            'price' => $request->price ? 0 : 1,
            'feeds' => $request->feeds ? 0 : 1,
        ]);
    }

    public function create()
    {
        return view('doctor.create', [
            'specs' => Spec::all(),
        ]);
    }
    public function store(Request $request)
    {
        $doctor = new Doctor($request->all());
        $user = User::registerUser($request, 1);
        $doctor->user_id = $user->id;
        $doctor->save();

        foreach ($request->specializations as $spec) {
            $doctor->specs()->attach($spec);
        }

        return redirect()->route('doctor.index');
    }

    public function show(Doctor $doctor)
    {
        $schedules = Schedule::all()->where('doctor_id', $doctor->id)->groupBy('date_of_record');

        return view('doctor.show', [
            'schedules' => $schedules,
            'doctor' => $doctor,
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
