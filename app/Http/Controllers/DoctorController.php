<?php

namespace App\Http\Controllers;

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
            'categories' => Category::all()->where('parent_id', '=', null),
        ]);
    }
}
