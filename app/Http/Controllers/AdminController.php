<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Category;
use App\Clinic;
use App\Doctor;
use App\Level;
use App\Schedule;
use App\Service;
use App\User;
use App\Spec;
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
            ->addColumn('action', function ($model) {
                return '<a href="'.route('clinic.show', $model->id).'" class="btn btn-sm btn-secondary"><i class="fas fa-info"></i> Show </a>
                        <a href="'.route('clinic.edit', $model->id).'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                        <a href="'.route('clinic.destroy', $model->id).'" data-model="clinic" data-id="'.$model->id.'" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-confirmation" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>';
            })
            ->make(true);
    }
    public function getDoctors()
    {
        $doctors = Doctor::query()->with(['user:id,name,last_name']);

        return DataTables::of($doctors)
            ->addColumn('action', function ($model) {
                return '<a href="'.route('doctor.show', $model->id).'" class="btn btn-sm btn-secondary"><i class="fas fa-info"></i> Show </a>
                        <a href="'.route('doctor.edit', $model->id).'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                        <a href="'.route('doctor.destroy', $model->id).'" data-model="doctor" data-id="'.$model->id.'" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-confirmation" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>';
            })
            ->make(true);
    }

    public function getCategories()
    {
        $categories = Category::query();

        return Datatables::of($categories)
            ->addColumn('action', function ($model) {
                return '<a href="'.route('category.edit', $model->id).'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                        <a href="'.route('category.destroy', $model->id).'" data-model="category" data-id="'.$model->id.'" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-confirmation" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>';
            })
            ->make(true);
    }

    public function getBranches()
    {
        $branches = Branch::query();

        return Datatables::of($branches)
            ->addColumn('action', function ($model) {
                return '<a href="'.route('branch.edit', $model->id).'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                        <a href="'.route('branch.destroy', $model->id).'" data-model="branch" data-id="'.$model->id.'" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-confirmation" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>';
            })
            ->make(true);
    }

    public function getServices()
    {
        $services = Service::query();

        return Datatables::of($services)
            ->addColumn('action', function ($model) {
                return '<a href="'.route('service.edit', $model->id).'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                        <a href="'.route('service.destroy', $model->id).'" data-model="service" data-id="'.$model->id.'" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-confirmation" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>';
            })
            ->make(true);
    }

    public function getSpecs()
    {
        $specs = Spec::query();

        return Datatables::of($specs)
            ->addColumn('action', function ($model) {
                return '
                        <a href="'.route('spec.edit', $model->id).'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                        <a href="'.route('spec.destroy', $model->id).'" data-model="spec" data-id="'.$model->id.'" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-confirmation" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>';
            })
            ->make(true);
    }

    public function getLevels()
    {
        $levels = Level::query();

        return DataTables::of($levels)
            ->addColumn('action', function ($model) {
                return '
                        <a href="'.route('level.edit', $model->id).'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                        <a href="'.route('level.destroy', $model->id).'" data-model="level" data-id="'.$model->id.'" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-confirmation" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>';
            })
            ->make(true);
    }

    public function getSchedules()
    {
        $schedules = Schedule::query();

        return DataTables::of($schedules)
            ->addColumn('action', function ($model) {
                return '
                        <a href="'.route('schedule.edit', $model->id).'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                        <a href="'.route('schedule.destroy', $model->id).'" data-model="schedule" data-id="'.$model->id.'" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-confirmation" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>';
            })
            ->make(true);
    }
}
