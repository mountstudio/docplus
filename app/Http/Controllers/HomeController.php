<?php

namespace App\Http\Controllers;

use App\Record;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function about_us()
    {
        return view('about_us');
    }

    public function uploadTiny(Request $request)
    {
        dd($request->all());
        $newName = null;
        if ($request->hasFile('file')) {
            $newName = uniqid().'.jpg';

            ImageManagerStatic::make($request->file('file'))
                ->save(public_path('uploads/'.$newName), 40);
        }

        return response()->json([
            'location' => asset('uploads/'.$newName),
        ]);
    }

}
