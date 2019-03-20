@extends('layouts.app')

@section('content')

    <div class="container py-5">
        @include('question.buttons.back_to_all')
        <div class="row">
            <div class="col p-4 shadow-sm border">
                <div class="row align-items-center">
                    <div class="col">
                        <h2>{{ $question->title }}</h2>
                        <p class="small m-0 text-muted">Question #{{ $question->id }}</p>
                    </div>
                    <div class="col-auto">
                        <p class="small mb-2 text-secondary"><i class="fas fa-clock fa-lg text-blue"></i>&nbsp;{{ \Carbon\Carbon::make($question->created_at)->format('d M Y') }}</p>
                        <p class="small mb-2 text-secondary"><i class="fas fa-eye fa-lg text-blue"></i>&nbsp;{{ $question->views }} показов</p>
                        <p class="small mb-2 text-secondary"><i class="fas fa-check-circle fa-lg text-blue"></i>&nbsp;{{ $question->answers->count() }} ответов</p>
                    </div>
                </div>
                <div class="row border-top">
                    <div class="col-12 pt-3">
                        @include('question.chat')
                    </div>
                </div>
            </div>

            <div class="col-3">
                <p class="h3">Похожие вопросы</p>
                @include('question.list', ['questions' => $questions])
            </div>
        </div>
    </div>

@stop