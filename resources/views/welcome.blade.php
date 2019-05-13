@extends('layouts.app')

@section('content')

    <div class="container-fluid py-5 position-relative" style="background-image: url('{{ asset('img/welcome-doctor.png') }}'); background-size: cover; background-position: center right">
        <div class="backdrop"></div>
        <div class="row py-3 py-md-5 justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 py-5">
                <h1 class="text-uppercase text-white text-left text-md-center font-weight-bold">Мы делаем медицину доступнее</h1>
                <p class="text-white text-left text-md-center">Записывайтесь к проверенным специалистам</p>
            </div>
            <div class="col-10 col-sm-10 col-md-8 col-lg-6">
                @include('_partials.search')
            </div>
        </div>
    </div>





    <div class="container-fluid bg-doc d-none d-md-block">
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
    <div class="container-fluid bg-white">
        <div class="row justify-content-center py-5">



            <div class="card-deck col-11 col-md-10 col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="backdrop"></div>
                    <img src="{{ asset('img/teeth-care.png') }}" alt="" class="card-img" >
                    <div class="card-img-overlay p-0 px-1 d-flex justify-content-center">
                        <p class="text-white  align-self-end h4 mb-2 font-weight-bold text-uppercase text-center">Профилактический осмотр</p>
                    </div>
                </div>
                <div class="card shadow-sm border-0">
                    <div class="backdrop"></div>
                    <img src="{{ asset('img/classes.png') }}" alt="" class="card-img">
                    <div class="card-img-overlay p-0 px-1 d-flex justify-content-center">
                        <p class="text-white  align-self-end h4 mb-2 font-weight-bold text-uppercase text-center">Проверка зрения</p>
                    </div>
                </div>
                <div class="card shadow-sm border-0">
                    <div class="backdrop"></div>
                    <img src="{{ asset('img/doctor-instr.png') }}" alt="" class="card-img">
                    <div class="card-img-overlay p-0 px-1 d-flex justify-content-center">
                        <p class="text-white  align-self-end h4 mb-2 font-weight-bold text-uppercase text-center">Плановое посещение педиатра</p>
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
    </div>

    <div class="container">
        <div class="row py-5">
            <div class="col-12">
                @include('_partials.adverts')
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">



            <div class="col-12 py-5">

                <div class="row justify-content-center mb-4 align-items-center">
                    <div class="col col-md-3 text-center">
                        <img class="img-fluid" src="{{ asset('img/doc_logo.png') }}" alt="">
                    </div>
                    <div class="col-auto">
                        <p class="text-center text-doc font-weight-bold text-uppercase h4 m-0">Доверяют</p>
                    </div>
                </div>

                <div class="row py-2 justify-content-center">
                    <div class="col-12 col-md-4">
                        <p class="text-secondary display-2 font-weight-bold count text-center">
                            {{\App\Feedback::all()->where('is_active', true)->count()}}
                        </p>
                        <p class="text-secondary font-weight-bold text-uppercase  text-center"> ОТЗЫВОВ</p>
                    </div>

                    <div class="col-12 col-md-4">
                        <p class="text-secondary display-2 font-weight-bold count text-center">
                            {{\App\Doctor::all()->count()}}
                        </p>
                        <p class="text-secondary font-weight-bold text-uppercase  text-center"> ВРАЧЕЙ</p>
                    </div>

                    <div class="col-12 col-md-4">
                        <p class="text-secondary display-2 font-weight-bold count text-center">
                            {{\App\Clinic::all()->count()}}
                        </p>
                        <p class="text-secondary font-weight-bold text-uppercase  text-center"> КЛИНИК</p>
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

        @if($partners)
    @include('_partials.partners')
        @endif
    @include('_partials.faq')

    </div>





@endsection
@push('styles')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
@endpush
@push('scripts')

    <script>
        $('.count').each(function () {
            if ($(this).text() < 20)
            {
                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 800,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            }
            else
            {
                $(this).prop('Counter',0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            }

        });
    </script>


@endpush

