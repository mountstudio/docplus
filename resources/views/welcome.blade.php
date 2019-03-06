@extends('layouts.app')

@section('content')

    <div class="container-fluid py-5 position-relative" style="background-image: url('{{ asset('img/welcome-doctor.png') }}'); background-size: cover; background-position: center right">
        <div class="backdrop"></div>
        <div class="row py-5 justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 py-5 d-none d-md-block">
                <h1 class="text-uppercase text-white text-center">Найдите проверенного специалиста <br> и запишитесь к нему на прием</h1>
            </div>
            <div class="col-10 col-sm-10 col-md-8 col-lg-6">
                @include('_partials.search')
            </div>
        </div>
    </div>





    <div class="container-fluid bg-primary d-none d-md-block">
        <div class="container py-5">
            <div class="row py-3 text-uppercase text-white text-center">
                <div class="col-md-12">
                    <p class="display-2 font-weight-bold">Всё просто</p>
                </div>
                <div class="col h4 font-weight-light"><span class="display-2 font-weight-bold">1</span> <br> поиск врача</div>
                <div class="col h4 font-weight-light"><span class="display-2 font-weight-bold">2</span> <br> запись на прием</div>
                <div class="col h4 font-weight-light"><span class="display-2 font-weight-bold">3</span> <br> посещение</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center py-5">



            <div class="card-deck col-11 col-md-10 col-lg-8">
                <div class="card border-0">
                    <img src="{{ asset('img/teeth-care.png') }}" alt="" class="card-img-top" >
                    <div class="card-body">
                        <p class="text-primary  font-weight-bold pt-3 text-uppercase">Профилактический осмотр</p>
                    </div>
                    <div class="card-footer border-0 text-center">
                        <a href="" class="btn btn-primary btn-radius shadow text-uppercase">Записаться</a>
                    </div>
                </div>
                <div class="card border-0">
                    <img src="{{ asset('img/classes.png') }}" alt="" class="card-img-top">
                    <div class="card-body">
                        <p class="text-primary  font-weight-bold pt-3 text-uppercase">Проверка зрения</p>
                    </div>
                    <div class="card-footer border-0 text-center">
                        <a href="" class="btn btn-primary btn-radius shadow text-uppercase">Записаться</a>
                    </div>
                </div>
                <div class="card border-0">
                    <img src="{{ asset('img/doctor-instr.png') }}" alt="" class="card-img-top">
                    <div class="card-body">
                        <p class="text-primary  font-weight-bold pt-3 text-uppercase">Плановое посещение педиатра</p>
                    </div>
                    <div class="card-footer border-0 text-center">
                        <a href="" class="btn btn-primary btn-radius shadow text-uppercase">Записаться</a>
                    </div>
                </div>
            </div>


<!--
            <div class="col-3 text-center">
                <img class="img-fluid" src="{{ asset('img/teeth-care.png') }}" alt="">
                <p class="text-primary  font-weight-bold pt-3 text-uppercase">
                    Забота о зубах
                </p>
                <a class="btn btn-primary btn-radius shadow text-uppercase" href="#" role="button">Записаться на прием</a>
            </div>
            <div class="col-3 text-center">
                <img class="img-fluid" src="{{ asset('img/classes.png') }}" alt="">
                <p class="text-primary  font-weight-bold pt-3 text-uppercase">
                    Проверка зрения
                </p>
                <a class="btn btn-primary btn-radius shadow text-uppercase" href="#" role="button">Записаться на прием</a>
            </div>
            <div class="col-3 text-center">
                <img class="img-fluid" src="{{ asset('img/doctor-instr.png') }}" alt="">
                <p class="text-primary  font-weight-bold pt-3 text-uppercase">
                    Посещайте доктора не только в те моменты когда болеете
                </p>
                <a class="btn btn-primary btn-radius shadow text-uppercase" href="#" role="button">Записаться на прием</a>
            </div>
-->
        </div>
        <div class="row d-none d-md-block">
            <div class="col-12">
                @include('_partials.slider')
            </div>
        </div>
        <div class="row d-none d-md-block">



            <div class="col-12 py-4">

                <div class="row justify-content-center">
                    <div class="div-3 text-center mb-4">
                        <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="">
                    </div>
                    <div class="div-3">
                        <p class="text-center text-primary font-weight-bold text-uppercase h4 px-2 m-4">Доверяют</p>
                    </div>
                </div>

                <div class="row py-2 justify-content-center">
                    <div class="col-3">
                        <p class="text-secondary font-weight-bold text-uppercase  text-right">
                            <span class="h1">{{\App\Feedback::all()->count()}}</span> ОТЗЫВОВ
                        </p>
                    </div>

                    <div class="col-3">
                        <p class="text-secondary font-weight-bold text-uppercase  text-center">
                            <span class="h1">{{\App\Doctor::all()->count()}}</span> ВРАЧЕЙ
                        </p>
                    </div>

                    <div class="col-3">
                        <p class="text-secondary font-weight-bold text-uppercase  text-left">
                            <span class="h1">{{\App\Clinic::all()->count()}}</span> КЛИНИК
                        </p>
                    </div>
                </div>
            </div>

            @include('spec.list')




        </div>
    </div>

    <div class=" d-md-none d-lg-none d-xl-none pb-5 ">
        <div class="container">
            <div class="row">

                @include('_partials.mobile-menu')
            </div>
        </div>
    </div>


    <div class="d-none d-md-block">

    @include('_partials.partners')
    @include('_partials.faq')

    </div>





@endsection
@push('styles')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

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

