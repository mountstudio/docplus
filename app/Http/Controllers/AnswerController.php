<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AnswerController extends Controller
{
    public function store(Request $request)
    {
        $request->merge(['doctor_id' => Auth::user()->doctor->id]);

        $answer = Answer::create($request->all());
        Session::flash('new_answer', 'Ваш ответ был записан и ожидает модерации');

        return redirect()->back();
    }
}
