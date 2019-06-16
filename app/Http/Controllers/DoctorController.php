<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Helpers\ImageSaver;
use App\Level;
use App\Notifications\NewEditNotification;
use App\Pic;
use App\Record;
use App\Schedule;
use App\Service;
use App\Spec;
use App\Doctor;
use App\User;
use App\Clinic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctors = Doctor::with('feedbacks')->get()->sortingAndFilter($request)->paginate(5);

        $docs = Doctor::all();
        $feedbacks = $docs->map(function ($item, $key) {
            return $item->feedbacks;
        })->flatten()->unique('id')->take(4);

        return view('doctor.list', [
            'doctors' => $doctors,
            'feedbacks' => $feedbacks,
            'child' => $request->child ? 1 : null,
            'home' => $request->home ? 1 : null,
            'filter' => $request->filter,
        ]);
    }

    public function create()
    {
        return view('doctor.create', [
            'levels' => Level::all(),
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
        $schedules = Schedule::all()->where('doctor_id', $doctor->id)
            ->where('date_of_record', '>=', date('Y-m-d'))
            ->groupBy('clinic_id');

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
            'levels' => Level::all(),
            'doctor' => $doctor,
            'clinics' => Clinic::all(),
            'specs' => Spec::all(),
            'services' => Service::all(),
        ]);
    }

    public function update(Request $request, Doctor $doctor)
    {
        $doctor->update($request->all());

        $doctor->updateDoctorRelations($request);

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
    public function getClinic($id)
    {
        $doctor = Doctor::find($id);
        $clinics = $doctor->clinics;

        return response()->json(['clinics' => $clinics]);
    }


    public function profile(Request $request){

        $doctor = Doctor::where('user_id', Auth::user()->id)->first();

        $schedules = Schedule::all()->where('doctor_id', $doctor->id)
            ->where('date_of_record', '>=', date('Y-m-d'))
            ->groupBy('clinic_id');

        $records = Record::all()
            ->where('doctor_id', Auth::user()->doctor->id)
            ->groupBy(function ($d) {
                return Carbon::parse($d->created_at)->format('M Y');
            });


        return view('doctor.profile', [
            'show' => $request->show,
            'doctor' => $doctor,
            'records' => $records,
            'schedules' => $schedules
        ]);
        }

        public function schedulecreate()
        {
            return view('doctor.tabs.create_schedule.blade.php');
        }
}
