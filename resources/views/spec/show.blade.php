@extends('layouts.app')

@section('content')
    <div class="container border-bottom border-secondary">
        @include('_partials._head_rec')

        <div class="row py-5 justify-content-center">

            <div class="col-6">
                @include('_partials.search')
            </div>
        </div>
    </div>

    @if($spec->description)
    <div class="container mt-4 d-ld-block d-none">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                @include('_partials.mobile-question')
            </div>
        </div>
    </div>
    @endif

    <div class="container">
        <p class="mt-3">Частные клиники Бишкека ({{$doctors->count()}})</p>
        @foreach($doctors as $doctor)
            @include('doctor.card')
        @endforeach
    </div>
    <div class="container d-none d-lg-block">
        <span class="text-secondary">{!! $spec->description !!}</span>
    </div>
    <div class="container d-none d-lg-block">
        <div class="row justify-content-center">
            @foreach($feedbacks as $feedback)
                <div class="col-6 my-5">
                    {{--<img class="rounded pt-3" src="{{ asset('img/doctor.png') }}" style="width:55px;" alt="">--}}
                    <div>
                        <p class="m-0"><strong>
                                @foreach($feedback->doctors as $doctor)
                                    {{$doctor->user->name}}
                                @endforeach
                            </strong></p>
                        <br>
                    </div>

                    <span style="overflow: hidden; text-overflow: clip;">{{ $feedback->comment }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endsection