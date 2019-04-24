@extends('layouts.app')

@section('content')

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


    <div class="container my-5">
        <p class="text-doc font-weight-bold mt-3 h3">
            {{$clinic->clinic_name}}
        </p>
        <p class="text-doc font-weight-bold mt-3 h3">
            Врачи специальности {{ $spec->name }}
        </p>

        <div class="row">
            <div class="col">
                @foreach($doctors as $doctor)
                    @include('doctor.card')
                @endforeach
            </div>
        </div>


    </div>


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
