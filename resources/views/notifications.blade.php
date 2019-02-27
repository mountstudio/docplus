@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <h1>Уведомления</h1>
        </div>
        <div class="row">
            @foreach($notifications as $notification)
                <div class="col-12 my-2">
                    <div class="card shadow-sm p-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    {!!  $notification->data['message']  !!}
                                </div>
                                <div class="col">
                                    <a href="{{ route('notification.read', $notification) }}" class="btn btn-primary">Принять</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
