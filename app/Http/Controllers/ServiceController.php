<?php

namespace App\Http\Controllers;

use App\Category;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $services = Service::all();

        return view('service.index');
    }
    public function show_diagnostic()
    {
        $services = Service::all()
            ->where('is_diagnostic', true)
            ->groupBy(function ($item, $key) {
                return $item->category->name;
            });

        return view('service.list',[
            'services' => $services
        ]);
    }

    public function show()
    {
        $services = Service::all()
            ->where('is_diagnostic', false)
            ->groupBy(function ($item, $key) {
                return $item->category->name;
            });

        return view('service.list',[
            'services' => $services
        ]);
    }

    public function create()
    {
        return view('service.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        if($request->is_diagnostic) {
            $request->merge(['is_diagnostic' => true]);
        }
        $service = Service::create($request->all());

        return redirect()->route('service.index');
    }

    public function edit(Service $service)
    {
        return view('service.edit', [
            'service' => $service,
            'services' => Service::all(),
        ]);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->back();
    }

    public function objects($id)
    {
        $service = Service::find($id);

        $services = Service::with(['doctors'])->where('category_id',$service->id)->get();

        $doctors = $services->map(function ($item, $key) {
            return $item->doctors;
        })->flatten()->unique('id');

        $clinics = $services->map(function ($item, $key) {
            return $item->clinics;
        })->flatten()->unique('id');

        return view('service.show',[
            'doctors' => $doctors,
            'clinics' => $clinics
        ]);
    }
}
