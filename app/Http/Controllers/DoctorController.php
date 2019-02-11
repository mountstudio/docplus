<?php

namespace App\Http\Controllers;

use App\Spec;
use App\Doctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    //
    public function index()
    {
        return view('doctor.index');
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
        dd($doctor->specs);
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
}
