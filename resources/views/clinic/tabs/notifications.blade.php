@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <h1>Уведомления</h1>
        </div>
        <div class="row">
            @foreach($notifications->keys() as $key)
                    @if($key === 'App\Notifications\NewRecordNotification')
                        <div class="col-12 my-2">
                            <div class="card shadow-sm p-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            <p>У вас новые клиенты на запись. (Кол-во записей
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
                    @if($key === 'App\Notifications\NewClinicFeedbackNotification')
                        <div class="col-12 my-2">
                            <div class="card shadow-sm p-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            <p>У вас новые отзывы. (Кол-во записей
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
                    @if($key === 'App\Notifications\NewEditClinicNotification')
                        <div class="col-12 my-2">
                            <div class="card shadow-sm p-3">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-10">
                                            <p>{{ $notifications[$key]->first()->data['message'] }}</p>
                                        </div>
                                        <div class="col">
                                            <a class="btn btn-primary" href="{{ route('notification.read', $notifications[$key]->first()) }}">Отметить как просмотренное</a>
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
