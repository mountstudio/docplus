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

        $clins = Clinic::all();
        $feedbacks = $clins->map(function ($item, $key) {
            return $item->feedbacks;
        })->flatten()->unique('id')->take(4);

        return view('clinic.list', [
            'clinics' => $clinics,
            'feedbacks' => $feedbacks,
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
        $user = User::registerUser($request, User::$CLINIC_ROLE);


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

        $clinic->updateClinicRelations($request);

        return redirect()->route('clinic.admin');
    }

    public function show(Clinic $clinic)
    {
        $specs = $clinic->doctors->map(function($item, $key)
        {
            return $item->specs;
        })->flatten()->unique('id');

        $feedbacks = $clinic->feedbacks->where('is_active', true);
        $branch = Branch::find($clinic->branch_id);
        $branches = null;
        if ($branch) {
            $branches = $branch->clinics->except($clinic->id);
        }
        if ($branches && $branches->count() > 4)
        {
            $branches = $branches->random(4);
        }
        return view('clinic.show',[
            'clinic' => $clinic,
            'feedbacks' => $feedbacks,
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
