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
        $services = Service::getServicesHasDoctorsAndClinics()
            ->groupBy(function ($item, $key) {
                if(count($item->doctors) || count($item->clinics)){
                    return $item->category->name;
                }
            });

        return view('service.list',[
            'services' => $services
        ]);
    }
    public function show_diagnostic()
    {
        $services = Service::getDiagnosticsHasDoctorsAndClinics()
            ->groupBy(function ($item, $key) {
                if(count($item->doctors) || count($item->clinics)){
                return $item->category->name;
                }
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
        } else {
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

    public function objects(Request $request, Service $service)
    {
        $doctors = $service->doctors->sortingAndFilter($request)->paginate(5);

        $clinics = $service->clinics->sortingAndFilter($request)->paginate(5);

        return view('service.show',[
            'service' => $service,
            'doctors' => $doctors,
            'clinics' => $clinics,
            'child' => $request->child ? 1 : null,
            'home' => $request->home ? 1 : null,
            'filter' => $request->filter,
            'route' => route('objects.show', $service),
            'fullDay' => $request->fullDay ? 1 : null,
        ]);
    }

    public function apiIndex(Request $request)
    {
        if ($request->ids) {
            $services = Service::whereNotIn('id', $request->ids)
                ->get(['id', 'name']);
        } else {
            $services = Service::all();
        }

        return response()->json([
            'id' => $request->ids,
            'services' => $services,
        ]);
    }
}
