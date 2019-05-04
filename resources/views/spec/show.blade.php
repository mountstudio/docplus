@extends('layouts.app')
<style>
    .wrapper {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: center;
    }
    .xpandable-block {
        height: 150px;
        overflow: hidden;
        order: 0;
    }
    .xpand-button {
        order: 1;
    }
    input[type="checkbox"] {
        display: none;
    }
    input[type="checkbox"]:checked + .xpandable-block {
        height: auto;
    }
    label {
        order: 1;
        color: blue;
        text-decoration: underline;
        font-size: 18px;
        cursor: pointer;
    }
</style>
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
        <div class="row justify-content-center wrapper">
            <label for="button">еще...</label>
            <input type="checkbox" id="button">
            <div class="col-12 text-center xpandable-block">
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