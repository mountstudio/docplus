@extends('layouts.app')

@section('content')

    @include('clinic.info')

    <div class="container-fluid bg-container">
        <div class="row py-5">
           <div class="col-12">
               <div class="row justify-content-center">
                   <div class="col-8 bg-light shadow-lg rounded my-4">
                       <div class="accordion text-white text-uppercase bg-transparent" id="accordionExample">
                           <div class="card bg-transparent border-0 ">
                               <div class="card-header bg-light bg-transparent border-0" id="headingOne">
                                   <h2 class="mb-0">
                                       <button class="btn btn-link text-white text-uppercase" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                           <p class="text-secondary">
                                               <i class="fas fa-bars fa-2x"></i>
                                               <span class="h4 pl-2">Цены на Невралогию</span>
                                           </p>
                                       </button>
                                   </h2>
                               </div>

                               <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                   <div class="card-body p-0 border-top ">
                                       <div class="row ">
                                           <div class="col-9 border-right">
                                               <div class="row">
                                                   <div class="col-8">
                                                       <p class="text-secondary h4  mt-5">

                                                           Паравертебральная блокада

                                                       </p>
                                                       <p class="text-secondary h4 mb-5">
                                                           Вестибулометрия
                                                       </p>
                                                   </div>
                                                   <div class="col-4">
                                                       <p class="text-secondary h4 mt-5">
                                                           от 1500 сом
                                                       </p>
                                                       <p class="text-secondary h4 mb-5">
                                                           от 1500 сом
                                                       </p>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-3 text-center">
                                               <button type="button" class="btn btn-lg btn-info text-light font-weight-bold my-4 shadow text-uppercase h4 py-1" style="border-radius: 50px;">
                                                   Записаться
                                               </button>
                                               <p class="text-secondary" style="font-size: 0.6rem;">
                                                   Сервис DOCPlus поможет вам выбрать необходимую медицинскую услугу из широкого спектра предоставленных а сайте и записаться в клинику.
                                               </p>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-12">
                   <div class="row justify-content-center">
                       <div class="col-8 bg-light  rounded py-3">

                            <div class="col-12">
                                <div class="row ">

                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col-6 text-center">
                                                <div class="position-relative">

                                                    <img class="img-fluid rounded-circle mb-2 img-thumbnail " src="{{ asset('img/doctor.png') }}" alt="">
                                                </div>

                                                @for($i = 0; $i < 5; $i++)

                                                    <img class="star" src="{{ asset('img/star.png') }}" alt="">

                                                @endfor
                                                <p class="text-secondary mt-3">Превосходный врач<br>на основе 171 отзыв</p>
                                            </div>
                                            <div class="col-6">
                                                <span class="text-secondary h3 mt-5 mb-2">Бобров Василий Елисеевич</span>
                                                <span class="text-secondary font-weight-light h6 my-3"><em>Гастроэнтеролог, Терапевт <br> Стаж 19 лет</em></span>
                                                <span class="text-secondary font-weight-light mt-2 mb-5">Приём от <span class="text-primary font-weight-bold">1400 руб.</span><i class="fas fa-exclamation-circle"></i></span>
                                                <p class="text-secondary font-weight-light mt-2 mb-5">Телефон для записи <br> +996(777) 312-312</p>
                                                <span class="text-secondary font-weight-light mt-2 mb-5">На прошлой неделе записалось два человека</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <p class="text-secondary" style="font-size: 0.6rem;">
                                            Сервис DOCPlus поможет вам выбрать необходимую медицинскую услугу из широкого спектра предоставленных а сайте и записаться в клинику.
                                        </p>
                                        <button type="button" class="btn btn-lg btn-info text-light font-weight-bold my-4 shadow text-uppercase h4 py-1 border-bottom" style="border-radius: 50px;">
                                            Записаться
                                        </button>
                                        <p class="text-secondary text-left" style="font-size: 0.6rem;">
                                            Медицинский центр Иван(MCI)
                                            Бишкек, ул. Бакча-Ата, д. 45
                                            Звенигородская (400м)
                                            Лиговский проспект(300м)
                                        </p>
                                    </div>
                                </div>



                            </div>

                       </div>

                   </div>
               </div>
                   </div>
               </div>
           </div>
        </div>
    </div>
@endsection


@push('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style>
        .bg-container{
            background: #eae6e7;
        }
    </style>

@endpush
