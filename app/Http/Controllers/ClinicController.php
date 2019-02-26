<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Service;
use App\Doctor;
use App\Category;
use App\User;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    //
    public function index()
    {
        return view('clinic.list', [
            'clinics' => Clinic::all(),
        ]);
    }

    public function create()
    {
        $doctors = Doctor::all()
            ->where('clinic_id', 'IS NULL', null);

        return view('clinic.create', [
            'clinics' => Clinic::all(),
            'categories' => Category::all(),
            'doctors' => $doctors,
            'services' => Service::all(),
        ]);
    }

    public function store(Request $request)
    {
        $user = User::registerUser($request, 'ROLE_CLINIC');

        $request->merge(['user_id' => $user->id]);

        $clinic = Clinic::create($request->all());

        return redirect()->route('clinic.admin');
    }

    public function edit(Clinic $clinic)
    {
        return view('clinic.edit', [
            'clinic' => $clinic,
            'clinics' => Clinic::all(),
        ]);
    }
    public function show($id)
    {
        $clinic = Clinic::find($id);

        return view('clinic.show',['clinic' => $clinic]);
    }

    public function destroy(Clinic $clinic)
    {
        $clinic->delete();

        return redirect()->back();
    }
}
