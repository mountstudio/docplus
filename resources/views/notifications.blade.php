@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <h1>Уведомления</h1>
        </div>
        <div class="row">
            @foreach($notifications->keys() as $key)
                @if($key === 'App\Notifications\NewRecordNotification')
                    <p>У вас новые клиента на запись. (Кол-во записей - {{ $notifications[$key]->count() }} )</p>
                    <a href="/profile">Перейти</a>
                @endif
            @endforeach
        </div>
    </div>
@endsection
