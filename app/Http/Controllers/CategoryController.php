<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return view('category.index');
    }
    public function create()
    {
        return view('category.create', [
            'categorys' => Category::all(),
        ]);
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index');
    }
    public function edit(Category $category)
    {
        return view('category.edit', [
            'category' => $category,
            'categorys' => Category::all(),
        ]);
    }
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back();
    }
}
