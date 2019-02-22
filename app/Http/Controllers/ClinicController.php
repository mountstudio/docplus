<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Service;
use App\Doctor;
use App\Category;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    //
    public function index()
    {
        return view('clinic.index');
    }

    public function create()
    {
        return view('clinic.create', [
            'clinics' => Clinic::all(),
            'categories' => Category::all(),
            'doctors' => Doctor::all(),
            'services' => Service::all(),
        ]);
    }

    public function store(Request $request)
    {
        $clinic = Clinic::create($request->all());

        return redirect()->route('clinic.index');
    }

    public function edit(Clinic $clinic)
    {
        return view('clinic.edit', [
            'clinic' => $clinic,
            'clinics' => Clinic::all(),
        ]);
    }

    public function destroy(Clinic $clinic)
    {
        $clinic->delete();

        return redirect()->back();
    }
}
