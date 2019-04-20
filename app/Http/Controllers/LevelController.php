<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        return view('admin.level.index');
    }

    public function create()
    {
        return view('admin.level.create');
    }

    public function store(Request $request)
    {
        $level = Level::create($request->all());

        return redirect()->route('level.index');
    }

    public function edit(Level $level)
    {
        return view('admin.level.edit', [
            'level' => $level,
        ]);
    }

    public function update(Request $request, Level $level)
    {
        $level->update($request->all());

        return redirect()->route('level.index');
    }
}
