@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <h1>Уведомления</h1>
        </div>
        <div class="row">
            @foreach($notifications->keys() as $key)
                    @if($key === 'App\Notifications\NewEditNotification')
                        <div class="col-12 my-2">
                            <div class="card shadow-sm p-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            <p> Новые просьбы на изменение. (Кол-во
                                                - {{ $notifications[$key]->count() }} )</p>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('profile', ['show' => $notifications[$key]->first()->type]) }}"
                                               class="btn btn-primary">Перейти</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($key === 'App\Notifications\NewFeedbackNotification')
                        <div class="col-12 my-2">
                            <div class="card shadow-sm p-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            <p> Новые отзывы на рассмотрение. (Кол-во
                                                - {{ $notifications[$key]->count() }} )</p>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('profile', ['show' => $notifications[$key]->first()->type]) }}"
                                               class="btn btn-primary">Перейти</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($key === 'App\Notifications\NewQuestionNotification')
                        <div class="col-12 my-2">
                            <div class="card shadow-sm p-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            <p> Новые вопросы врачам на рассмотрение. (Кол-во
                                                - {{ $notifications[$key]->count() }} )</p>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('profile', ['show' => $notifications[$key]->first()->type]) }}"
                                               class="btn btn-primary">Перейти</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
            @endforeach
        </div>
    </div>
@endsection
