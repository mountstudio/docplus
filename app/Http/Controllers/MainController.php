<?php

namespace App\Http\Controllers;

use App\Category;
use App\Clinic;
use App\Doctor;
use App\Like;
use App\Service;
use App\Spec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    //
    public function index()
    {
        $searchData = Doctor::all()->pluck('user.fullName');
        $searchData = $searchData->merge(Clinic::all()->pluck('name'));
        $searchData = $searchData->merge(Service::all()->pluck('name'));
        Session::put('searchData', json_encode($searchData, JSON_UNESCAPED_UNICODE));

        $specs = Spec::all()
            ->groupBy(function($item,$key) {
                return mb_substr($item->name,0,1);
            })
            ->sortBy(function($item,$key) {
                return $key;
            });

        $partners = Clinic::where('partner', 1)->get();

        if($partners->count() > 4)
        {
            $partners = $partners->random(4);
        }


        return view('welcome',['specs' => $specs, 'partners' => $partners]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $result = collect(['Доктора' => Doctor::whereHas('user' ,function($query) use ($search) {
            $query->where('name', 'like', "%$search%");
        })->get(['id', 'user_id'])]);
        $result = $result->merge(collect(['Клиники' => Clinic::where('clinic_name', 'like', '%' . $search. '%')->get(['id', 'clinic_name'])]));
        $result = $result->merge(collect(['Услуги' => Service::where('name', 'like', '%' . $search. '%')->get(['id', 'name'])]));

        if ($request->ajax()) {
            return response()->json(view('_partials.search-result-ajax', [
                'result' => $result,
            ])->render());
        }

        return view('_partials.search-result', [
            'result' => $result,
        ]);
    }
}
