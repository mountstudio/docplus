@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 position-relative" style="background-image: url('{{ asset('img/welcome-doctor.png') }}'); background-size: cover; background-position: center center">
        <div class="backdrop"></div>
        <div class="row py-5 justify-content-center">
            <div class="col-12 py-5">
                <h1 class="text-uppercase text-white text-center">Найдите проверинного специалиста <br> и запишитесь к нему на прием</h1>
            </div>
            <div class="col-6">
                @include('_partials.search')
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-3">
        @include('_partials.right-sidebar')
    </div>
</div>

    @include('_partials.faq')
@endsection