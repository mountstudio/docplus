<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Question::updateQuestionViews();

        $catsChecked = $request->catsChecked;

        $questions = Question::where('active', true)->get();

        if ($catsChecked) {
            $questions = $questions->whereIn('category_id', $catsChecked);
        }

        $cats = Category::all();

        return view('question.index', [
            'questions' => $questions,
            'cats' => $cats,
            'catsChecked' => $catsChecked ? $catsChecked : [],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question.create', [
            'cats' => Category::all(),
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
        $questuion = Question::create($request->all());

        return redirect()->route('question.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        Question::updateQuestionViews($question);

        return view('question.show', [
            'question' => $question,
            'questions' => Question::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }

    public function activate(Request $request, Question $question)
    {
        $question->active = true;
        $question->save();

        User::markAsRead($request->notification, Auth::user(), ['operators' => 1]);

        return back();
    }
}
