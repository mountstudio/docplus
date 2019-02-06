@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12" style="background-image: url('{{ asset('img/welcome-doctor.png') }}'); width: 100%;">
                <h1 class="text-uppercase text-white text-center">Найдите проверинного специалиста <br> и запишитесь к нему на прием</h1>
            </div>

            <div class="col-12 py-5">
                <form class="form-inline my-2 my-lg-0 ">
                    <input class="form-control mr-sm-2 shadow-sm btn-radius" style="background-color: #ededed;" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-info text-light shadow-sm my-2 my-sm-0 btn-radius text-uppercase" type="submit"><h5 class="m-0">Найти</h5></button>
                </form>
            </div>

            <div class="col-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('img/slide-1.png') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('img/slide-1.png') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('img/slide-1.png') }}" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-12 py-5">
                <div class="row">
                    <div class="col-4 text-center">
                        <img class="img-fluid w-50" src="{{ asset('img/teeth-care.png') }}" alt="">
                        <p class="text-primary  font-weight-bold pt-3">
                            Забота о зубах
                        </p>
                        <a class="btn btn-primary btn-radius" href="#" role="button">Записаться на прием</a>
                    </div>
                    <div class="col-4 text-center">
                        <img class="img-fluid w-50" src="{{ asset('img/classes.png') }}" alt="">
                        <p class="text-primary  font-weight-bold pt-3">
                            Проверка зрения
                        </p>
                        <a class="btn btn-primary btn-radius" href="#" role="button">Записаться на прием</a>
                    </div>
                    <div class="col-4 text-center">
                        <img class="img-fluid w-50" src="{{ asset('img/doctor-instr.png') }}" alt="">
                        <p class="text-primary  font-weight-bold pt-3">
                            Посещайте доктора не только в те моменты когда болеете
                        </p>
                        <a class="btn btn-primary btn-radius" href="#" role="button">Записаться на прием</a>
                    </div>
                </div>
            </div>

            <div class="col-12 bg-danger">
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

            <div class="col-12">
                <h3 class="text-secondary text-center font-weight-bold">СПЕЦИАЛЬНОСТИ ВРАЧЕЙ</h3>
                <br>



                <div class="row">
                    <div class="col-3">
                        <div class="row">
                            <div class="col-2">
                                <h3 class="text-primary">А</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Аллерголог</a>
                                    <a class="nav-link" href="#">Аллерголог</a>
                                    <a class="nav-link" href="#">Аллерголог</a>
                                </nav>
                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">А</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Аллерголог</a>
                                    <a class="nav-link" href="#">Аллерголог</a>
                                    <a class="nav-link" href="#">Аллерголог</a>
                                </nav>
                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">В</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Венеролог</a>
                                    <a class="nav-link" href="#">Вертебролог</a>
                                </nav>
                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">Г</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left text-secondary">
                                    <a class="nav-link" href="#">Гастроэнтеролог</a>
                                    <a class="nav-link" href="#">Гематолог</a>
                                    <a class="nav-link" href="#">Генетик</a>
                                    <a class="nav-link" href="#">Гепатолог</a>
                                    <a class="nav-link" href="#">Гинеколог</a>
                                    <a class="nav-link" href="#">Гирудотерапефт</a>
                                </nav>

                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">Д</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Дерматовенеролог</a>
                                    <a class="nav-link" href="#">Дерматолог</a>
                                    <a class="nav-link" href="#">Диетолог</a>
                                </nav>
                            </div>
                        </div>
                    </div>


                    <div class="col-3">
                        <div class="row">
                            <div class="col-2">
                                <h3 class="text-primary">А</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Аллерголог</a>
                                    <a class="nav-link" href="#">Аллерголог</a>
                                    <a class="nav-link" href="#">Аллерголог</a>
                                </nav>
                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">В</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Венеролог</a>
                                    <a class="nav-link" href="#">Вертебролог</a>
                                </nav>
                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">Г</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left text-secondary">
                                    <a class="nav-link" href="#">Гастроэнтеролог</a>
                                    <a class="nav-link" href="#">Гематолог</a>
                                    <a class="nav-link" href="#">Генетик</a>
                                    <a class="nav-link" href="#">Гепатолог</a>
                                    <a class="nav-link" href="#">Гинеколог</a>
                                    <a class="nav-link" href="#">Гирудотерапефт</a>
                                </nav>

                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">Д</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Дерматовенеролог</a>
                                    <a class="nav-link" href="#">Дерматолог</a>
                                    <a class="nav-link" href="#">Диетолог</a>
                                </nav>
                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">Р</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Ревматолог</a>
                                    <a class="nav-link" href="#">Рефлексотерапефт(иглотерапефт)</a>
                                </nav>
                            </div>
                        </div>
                    </div>




                    <div class="col-3">
                        <div class="row">

                            <div class="col-2">
                                <h3 class="text-primary">О</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Офтальмолог(Окулист)</a>
                                    <a class="nav-link" href="#">Онколог</a>
                                    <a class="nav-link" href="#">Ортапед</a>
                                </nav>
                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">П</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left text-secondary">
                                    <a class="nav-link" href="#">Педиатр</a>
                                    <a class="nav-link" href="#">Проктолог</a>
                                    <a class="nav-link" href="#">Педиатр</a>
                                    <a class="nav-link" href="#">Проктолог</a>
                                    <a class="nav-link" href="#">Педиатр</a>
                                    <a class="nav-link" href="#">Проктолог</a>
                                    <a class="nav-link" href="#">Педиатр</a>
                                    <a class="nav-link" href="#">Проктолог</a>
                                </nav>

                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">Д</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Ревматолог</a>
                                    <a class="nav-link" href="#">Рефлексотерапевт(иглотерапевт)</a>
                                </nav>
                            </div>
                        </div>
                    </div>




                    <div class="col-3">
                        <div class="row">
                            <div class="col-2">
                                <h3 class="text-primary">С</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Сексапотолог</a>
                                    <a class="nav-link" href="#">Стомаолог</a>
                                </nav>
                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">Т</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Терапевт</a>
                                    <a class="nav-link" href="#">Травматолог</a>
                                    <a class="nav-link" href="#">Трихолог</a>
                                </nav>
                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">У</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left text-secondary">                                    <a class="nav-link" href="#">Гепатолог</a>
                                    <a class="nav-link" href="#">УЗИ-специалист</a>
                                    <a class="nav-link" href="#">Уролог</a>
                                </nav>

                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">Ф</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Дерматовенеролог</a>
                                    <a class="nav-link" href="#">Дерматолог</a>
                                    <a class="nav-link" href="#">Физиотерапевт</a>
                                </nav>
                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">Х</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Хирург</a>
                                </nav>
                            </div>
                            <div class="col-2">
                                <h3 class="text-primary">Э</h3>
                            </div>
                            <div class="col-10">
                                <nav class="nav flex-column border-left pb-2 text-secondary">
                                    <a class="nav-link" href="#">Эндокринолог</a>
                                    <a class="nav-link" href="#">Эндоскопист</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>


            </div>




        </div>
    </div>

@endsection
