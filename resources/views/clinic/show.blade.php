@extends('layouts.app')

@section('content')

    @include('clinic.info')

    {{--<div class="container-fluid bg-container d-none d-md-block">--}}
        {{--<div class="row  py-5 justify-content-center">--}}
            {{--<div class="col-md-12 col-lg-8 bg-light shadow-lg rounded my-4">--}}
                {{--<div class="accordion text-white text-uppercase bg-transparent" id="accordionExample">--}}
                    {{--<div class="card bg-transparent border-0 ">--}}
                        {{--<div class="card-header bg-light bg-transparent border-0 p-0 mt-2" id="headingOne">--}}
                            {{--<h2 class="mb-0">--}}
                                {{--<button class="btn btn-link text-white text-uppercase" type="button"--}}
                                        {{--data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"--}}
                                        {{--aria-controls="collapseOne">--}}
                                    {{--<p class="text-secondary">--}}
                                        {{--<i class="fas fa-bars fa-2x"></i>--}}
                                        {{--<span class="h4 pl-2">Цены на Невралогию</span>--}}
                                    {{--</p>--}}
                                {{--</button>--}}
                            {{--</h2>--}}
                        {{--</div>--}}

                        {{--<div id="collapseOne" class="collapse show" aria-labelledby="headingOne"--}}
                             {{--data-parent="#accordionExample">--}}
                            {{--<div class="card-body p-0 border-top ">--}}
                                {{--<div class="row">--}}

                                    {{--<div class="col-md-12 col-lg-9 border-right">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col-8">--}}
                                                {{--<p class="text-secondary h4  mt-5">--}}
                                                    {{--Паравертебральная блокада--}}
                                                {{--</p>--}}
                                                {{--<p class="text-secondary h4 mb-5">--}}
                                                    {{--Вестибулометрия--}}
                                                {{--</p>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-4">--}}
                                                {{--<p class="text-secondary h4 mt-5">--}}
                                                    {{--от 1500 сом--}}
                                                {{--</p>--}}
                                                {{--<p class="text-secondary h4 mb-5">--}}
                                                    {{--от 1500 сом--}}
                                                {{--</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="col-md-12 col-lg-3 text-center">--}}
                                        {{--<button type="button"--}}
                                                {{--class="btn btn-lg btn-info bg-doc text-light font-weight-bold my-4 shadow text-uppercase h4 py-1"--}}
                                                {{--style="border-radius: 50px;">--}}
                                            {{--Записаться--}}
                                        {{--</button>--}}
                                        {{--<p class="text-secondary" style="font-size: 0.6rem;">--}}
                                            {{--Сервис DOCPlus поможет вам выбрать необходимую медицинскую услугу из--}}
                                            {{--широкого спектра предоставленных а сайте и записаться в клинику.--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="container">


    </div>
@endsection



@push('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    <style>
        .bg-container {
            background: #eae6e7;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('js/rateyo.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(".rateYo").rateYo({
            rating: 4,
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px"
        });
    </script>


    <script>
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 1500,
            margin: 10,
            nav: true,
            dots: false,
            navText: ['<span class="fas fa-chevron-left fa-2x"></span>','<span class="fas fa-chevron-right fa-2x"></span>'],
        })
    </script>
@endpush

