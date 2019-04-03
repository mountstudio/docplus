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


    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 d-lg-none">
                @include('_partials.buttons.doctor_filter')
            </div>
        </div>
    </div>


    <div class="container my-5">
        <p class="text-primary font-weight-bold mt-3 h3">
            Частные врачи Бишкека
            <span class="text-secondary font-weight-light">{{ $doctors->count() }}</span>
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


        <div class="row">
            <div class="col-4 pt-3">
                <nav aria-label="...">
                    <ul class="pagination pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
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
