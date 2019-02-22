<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all()
            ->groupBy(function($item,$key) {
                return mb_substr($item->name,0,1);
            })
            ->sortBy(function($item,$key) {
                return $key;
            });

        return view('welcome',['categories' => $categories]);
    }
}
