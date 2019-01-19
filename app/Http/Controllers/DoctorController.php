<?php

namespace App\Http\Controllers;

use App\Doctor;
use Illuminate\Http\Request;

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
            'doctors' => Doctor::all(),
        ]);
    }
    public function store(Request $request)
    {
        $doctor = new Doctor();
        $doctor->address = $request->address;
        $doctor->price = $request->price;
        $doctor->discount = $request->discount;
        $doctor->save();

        return redirect()->route('doctor.index');
    }
}
