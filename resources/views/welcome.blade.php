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





    <div class="container-fluid bg-primary">
        <div class="container py-5">
            <div class="row py-3 text-uppercase text-white text-center">
                <div class="col-12">
                    <h1 class="display-2 font-weight-bold">Всё просто</h1>
                </div>
                <div class="col h4 font-weight-light"><span class="display-2 font-weight-bold">1</span> <br> поиск врача</div>
                <div class="col h4 font-weight-light"><span class="display-2 font-weight-bold">2</span> <br> запись на прием</div>
                <div class="col h4 font-weight-light"><span class="display-2 font-weight-bold">3</span> <br> посещение</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-around py-5">
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
        </div>

        <div class="row">

            <div class="col-12 py-5 bg-danger">
                <p class="text-white text-center text-monospace p-5 h3"> Рекламный банер</p>
            </div>

            <div class="col-12 py-4">

                <div class="row justify-content-center">
                    <div class="div-3 text-center mb-4">
                        <img class="img-fluid" src="{{ asset('img/logo.png') }}" alt="">
                    </div>
                    <div class="div-3">
                        <p class="text-center bg-primary text-white font-weight-bold text-uppercase h4 px-2 m-4">Доверяют</p>
                    </div>
                </div>

                <div class="row py-2 justify-content-center">
                    <div class="col-2">
                        <p class="text-secondary font-weight-bold text-uppercase  text-right">
                            <span class="h1">232</span>ОТЗЫВОВ
                        </p>
                    </div>

                    <div class="col-3">
                        <p class="text-secondary font-weight-bold text-uppercase  text-center">
                            <span class="h1">338</span>ВРАЧЕЙ
                        </p>
                    </div>

                    <div class="col-2">
                        <p class="text-secondary font-weight-bold text-uppercase  text-left">
                            <span class="h1">750</span>КЛИНИК
                        </p>
                    </div>
                </div>
            </div>

            @include('category.list')




        </div>
    </div>

    @include('_partials.partners')

    @include('_partials.faq')

@endsection
@push('styles')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

@endpush
