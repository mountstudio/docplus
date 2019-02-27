@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($notifications as $notification)
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body">
                            {!!  $notification->data['message']  !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
