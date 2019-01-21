<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function index()
    {
        return view('service.index');
    }
    public function create()
    {
        return view('service.create', [
            'services' => Service::all(),
        ]);
    }
    public function store(Request $request)
    {
        $service = new Service();
        $service->name = $request->name;
        $service->save();

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
}
