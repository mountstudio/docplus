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
        $doctors = Doctor::query();

        return Datatables::of($doctors)
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
