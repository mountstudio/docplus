<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Clinic;
use App\Pic;
use App\Service;
use App\Doctor;
use App\Category;
use App\Spec;
use App\User;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    //
    public function index(Request $request)
    {
        $clinics = Clinic::all()->sortingAndFilter($request)->paginate(5);

        return view('clinic.list', [
            'clinics' => $clinics,
            'filter' => $request->filter,
            'child' => $request->child ? 1 : null,
            'fullDay' => $request->fullDay ? 1 : null,
        ]);
    }

    public function create()
    {
        $doctors = Doctor::all()
            ->where('clinic_id', 'IS NULL', null);

        return view('clinic.create', [
            'clinics' => Clinic::all(),
            'categories' => Category::all(),
            'branches' => Branch::all(),
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
        $doctors = Doctor::all()->where('clinic_id', '<>', $clinic->id);

        return view('clinic.edit', [
            'clinic' => $clinic,
            'clinics' => Clinic::all(),
            'categories' => Category::all(),
            'doctors' => $doctors,
            'branches' => Branch::all(),
            'services' => Service::all(),
        ]);
    }

    public function update(Request $request, Clinic $clinic)
    {
        $clinic->update($request->all());

        return redirect()->route('clinic.admin');
    }

    public function show($id)
    {

        $clinic = Clinic::find($id);
        $specs = $clinic->doctors->map(function($item, $key)
        {
            return $item->specs;
        })->flatten()->unique('id');


        $branch = Branch::find($clinic->branch_id);
        $branches = null;
        if ($branch) {
            $branches = $branch->clinics->except($clinic->id);
        }
        return view('clinic.show',[
            'clinic' => $clinic,
            'doctors' => $clinic->doctors,
            'specs' => $specs,
            'branches' => $branches
        ]);
    }

    public function destroy(Clinic $clinic)
    {
        $clinic->user->delete();
        Pic::destroy($clinic->pics);
        $clinic->delete();

        return redirect()->back();
    }
}
