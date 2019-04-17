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
        $services = Service::getServices()
            ->groupBy(function ($item, $key) {
                return $item->category->name;
            });

        return view('service.list',[
            'services' => $services
        ]);
    }
    public function show_diagnostic()
    {
        $services = Service::getDiagnostics()
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

        return redirect()->route('service.admin');
    }

    public function edit(Service $service)
    {
        return view('service.edit', [
            'service' => $service,
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, Service $service)
    {
        if($request->is_diagnostic == 'on') {
            $request->merge(['is_diagnostic' => true]);
        }
        else
        {
            $request->merge(['is_diagnostic' => false]);
        }
        $service->update($request->all());

        return redirect()->route('service.admin');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->back();
    }

    public function objects(Service $service)
    {
        $services = Service::with(['doctors'])->where('id',$service->id)->get();

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

    public function apiIndex(Request $request)
    {
        if ($request->ids) {
            $services = Service::whereNotIn('id', $request->ids)
                ->where('is_diagnostic', true)
                ->get(['id', 'name']);
        } else {
            $services = Service::where('is_diagnostic', '=', true)
                ->get(['id', 'name']);
        }

        return response()->json([
            'id' => $request->ids,
            'services' => $services,
        ]);
    }
}
