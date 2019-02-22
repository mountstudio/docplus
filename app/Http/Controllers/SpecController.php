<?php

namespace App\Http\Controllers;

use App\Category;
use App\Doctor;
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

        return view('category.show',[
            'doctors' => $doctors,
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
        $spec = Spec::update($request->all());

        return redirect()->route('spec.index');
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
}
