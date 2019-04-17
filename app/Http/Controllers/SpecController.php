<?php

namespace App\Http\Controllers;

use App\Category;
use App\Clinic;
use App\Doctor;
use App\Feedback;
use App\Spec;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class SpecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('spec.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('spec.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $spec = Spec::create($request->all());

        return redirect()->route('spec.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $specs = Spec::with(['doctors'])->where('category_id',$id)->get();

        $doctors = $specs->map(function ($item, $key) {
            return $item->doctors;
        })->flatten()->unique('id');

        $feedbacks = $doctors->map(function ($item) {
            return $item->feedbacks;
        })->flatten()->reverse();

        return view('spec.show',[
            'doctors' => $doctors,
            'feedbacks' => $feedbacks
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function edit(Spec $spec)
    {

        return view('spec.edit', [
            'spec' => $spec,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spec $spec)
    {
        $spec->update($request->all());

        return redirect()->route('spec.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Spec  $spec
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spec $spec)
    {
        $spec->delete();

        return back();
    }

    public function clinic(Request $request, $id, $spec)
    {
        $clinic = Clinic::find($id);


        $doctors = $clinic->doctors->filter(function($item, $key) use ($spec) {
            return $item->specs->where('id', $spec)->count() > 0;
        });

        $spec = Spec::find($spec);

        return view('clinic.doctors', ['doctors' => $doctors, 'clinic' => $clinic, 'spec' => $spec]);
    }
}
