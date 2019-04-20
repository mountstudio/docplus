<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        return view('branch.index');
    }
    public function create()
    {
        return view('branch.create', [
            'branches' => Branch::all(),
        ]);
    }
    public function store(Request $request)
    {
        $branch = new Branch();
        $branch->name = $request->name;

        $branch->save();

        return redirect()->route('branch.index');
    }
    public function edit(branch $branch)
    {
        return view('branch.edit', [
            'branch' => $branch,
            'branches' => branch::all(),
        ]);
    }

    public function update(Request $request, Branch $branch)
    {
        $branch->update($request->all());

        return redirect()->route('branch.admin');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->back();
    }
}
