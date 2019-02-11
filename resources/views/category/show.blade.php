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


    <div class="container">
        @foreach($doctors as $doctor)
            @include('doctor.card')
        @endforeach
    </div>

@endsection