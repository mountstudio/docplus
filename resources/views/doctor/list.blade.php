@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 position-relative" style="background-image: url('{{ asset('img/service.png') }}'); background-size: cover; background-position: center center">
        <div class="backdrop"></div>
        <div class="row py-5 justify-content-center">
            <div class="col-12 py-5">
                <h1 class="text-uppercase text-white text-center">Найдите нужнуого вам Врача</h1>
            </div>
            <div class="col-12 col-md-6 ">
                @include('_partials.search')
            </div>
        </div>
    </div>
    <div class="container border-bottom border-secondary d-none d-lg-block">
        @include('_partials._head_rec')
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                @include('_partials.search')
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 d-lg-none">
                @include('_partials.buttons.doctor_filter')
            </div>
        </div>
    </div>


    <div class="container my-5">
        <p class="text-doc font-weight-bold mt-3 h3">
            Частные врачи Бишкека
            <span class="text-secondary font-weight-light">{{ $doctors->total() }}</span>
        </p>

        <div class="row">
            <div class="col-auto d-none d-lg-block">
                @include('_partials.filters.doctor_filter')
            </div>
            <div class="col">
                @foreach($doctors as $doctor)
                    @include('doctor.card')
                @endforeach
            </div>
        </div>

        @if($doctors instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="row">
                <div class="col-4 pt-3">
                    {{ $doctors->appends(request()->query())->links() }}
                </div>
            </div>
        @endif

@endsection

@push('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
@endpush

@push('scripts')
    <script>
        $('[data-toggle="tooltip"]').tooltip();
    </script>
@endpush
