<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Helpers\ImageSaver;
use App\Notifications\NewEditNotification;
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
        $doctors = Doctor::with('feedbacks')->get()->sortingAndFilter($request);

        return view('doctor.list', [
            'doctors' => $doctors,
            'child' => $request->child ? 1 : null,
            'home' => $request->home ? 1 : null,
            'filter' => $request->filter,
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
        $user = User::registerUser($request, 'ROLE_DOCTOR');

        $request->merge(['user_id' => $user->id]);

        $doctor = Doctor::create($request->all());

        return redirect()->route('doctor.admin');
    }

    public function show(Doctor $doctor)
    {
        $schedules = Doctor::getSchedule($doctor);

        $feedbacks = $doctor->feedbacks->where('is_active', true);

        return view('doctor.show', [
            'schedules' => $schedules,
            'doctor' => $doctor,
            'feedbacks' => $feedbacks,
        ]);
    }

    public function edit(Request $request, Doctor $doctor)
    {
        return view('doctor.edit', [
            'doctor' => $doctor,
            'clinics' => Clinic::all(),
            'specs' => Spec::all(),
            'services' => Service::all(),
        ]);
    }

    public function update(Request $request, Doctor $doctor)
    {
        $doctor->update($request->all());

        return redirect()->route('doctor.admin');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->user->delete();
        Pic::destroy($doctor->pics);
        $doctor->delete();

        return redirect()->back();
    }

    public function filter(Request $request)
    {


        return view('doctor.list');
    }

    public function userUpdate(Request $request, Doctor $doctor)
    {
        $users = User::where('role', 'ROLE_OPERATOR')->get();

        foreach ($users as $user) {
            $user->notify(new NewEditNotification($request->except(['_token']), $doctor));
        }

        return back();
    }
    public function getChildren($id)
    {
        $result = '';

        $doctor = Doctor::find($id);

        $clinics = $doctor->clinics;

        return response()->json(['clinics' => $clinics]);
    }
}
