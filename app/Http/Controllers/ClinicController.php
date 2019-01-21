<?php

namespace App\Http\Controllers;

use App\Clinic;
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
        ]);
    }
    public function store(Request $request)
    {
        $clinic = new Clinic();
        $clinic->address = $request->address;
        $clinic->name = $request->name;
        $clinic->phones = $request->phones;
        $clinic->save();

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
