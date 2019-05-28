@extends('layouts.app')

@section('content')

    <section class="mt-5">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <h1 class="text-left">Вопрос врачу онлайн</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <a href="{{ route('question.create') }}" class="btn bg-blue rounded-0 text-white">Задать вопрос</a>
                </div>
            </div>

            <div class="row">
                <div class="col-auto">
                    @include('_partials.filters.question-filter')
                </div>
                <div class="col pt-3">
                    @each('question.card', $questions, 'question', 'question.empty')
                </div>
            </div>

        </div>
    </section>

@endsection
