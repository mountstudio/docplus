<?php

namespace App\Http\Controllers;

use App\Category;
use App\Clinic;
use App\Doctor;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function options()
    {
        return view('admin.options');
    }


    public function getClinics()
    {
        $clinics = Clinic::query();

        return Datatables::of($clinics)
            ->make(true);
    }
    public function getDoctors()
    {
        $doctors = Doctor::query()->with(['user:id,name,lastName']);

        return DataTables::of($doctors)
            ->addColumn('action', function ($model) {
                return '<a href="'.route('doctor.edit', $model->id).'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                        <a href="'.route('doctor.destroy', $model->id).'" data-model="doctor" data-id="'.$model->id.'" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-confirmation" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>';
            })
            ->make(true);
    }

    public function getCategories()
    {
        $categories = Category::query();

        return Datatables::of($categories)
            ->make(true);
    }

    public function getServices()
    {
        $services = Service::query();

        return Datatables::of($services)
            ->make(true);
    }

}
