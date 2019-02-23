@extends('layouts.app')

@section('content')


    @include('_partials._head_rec')

    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="row align-items-start">
                    <div class="col-5 text-center">

                        <div class="position-relative">
                            @auth
                                <img class="position-absolute rounded-circle img-thumbnail like m-0 m-md-2" src="{{ asset('img/heart-0.png') }}" alt="">
                            @endauth
                            <img class="img-fluid rounded-circle mb-2 img-thumbnail " src="{{ $doctor->pics->first() ? asset('uploads/'.$doctor->pics->first()->image) : asset('img/doctor.jpg') }}" alt="">
                        </div>

                        <div class="row justify-content-center">
                            @include('_partials.stars', ['id' => 'doctor-show'])
                        </div>
                        <p class="text-secondary mt-3">{{ $status }} врач<br>на основе {{ $feedbacks->count() }} отзыв</p>
                    </div>

                    <div class="col">
                        <p class="text-secondary h3 m-0 mt-md-5 mb-md-2">{{ $doctor->user->fullName ?? 'Бобров Василий Елисеевич' }}</p>
                        <p class="text-secondary font-weight-light h6 my-3"><em>
                                @if(isset($doctor))
                                    {{ $doctor->specs->implode('name', ', ') }}
                                @else
                                    Гастроэнтеролог, Терапевт
                                @endif <br> Стаж 19 лет</em></p>
                        <p class="text-secondary font-weight-light mt-2 mb-5">Приём от <del>1400</del> руб.  <span class="text-primary font-weight-bold">1000 руб.</span></p>
                        <a href="#feedbacks" class="text-secondary pt-md-5"><u>Отзывы о враче</u></a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 position-relative">
                <h5 class="text-secondary font-weight-bold text-center">Информация о враче</h5>
                <p class="text-secondary">Бобров Василий Елисеевич - врач окулист(офтальмолог), стаж 24 года.
                    Скидка на прием врача! Все отзывы о враче. Запись онлайн или по телефону.</p>
                <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto corporis impedit mollitia soluta!
                    Ab, animi consequatur eum, eveniet facere illo illum iure modi nemo nulla, quae quas qui repellat voluptate.
                    <a class="text-primary" href="">др. подробная информация о враче</a></p>

                <p class="text-secondary">Отзывы о врачах могут оставлять пациенты записавшиеся через сервис DOC+.
                    Каждый отзыв проходит тщательную проверку, что позволяет избежать заказныъ и рекламных отзывов.</p>
                <div class="row">
                    <div class="col-5">
                <p class="text-secondary font-weight-bold ml-1">ВНИМАТЕЛЬНОСТЬ</p>
                <p class="text-secondary font-weight-bold ml-1">МАНЕРЫ</p>
                <p class="text-secondary font-weight-bold ml-1">ВРЕМЯ ОЖИДАНИЯ</p>
                </div>
                    <div class="col-4">
                        @include('_partials.stars', ['id' => 'doctor-attent'])<br>
                        @include('_partials.stars', ['id' => 'doctor-manner'])<br>
                        @include('_partials.stars', ['id' => 'doctor-time'])
                    </div>
                </div>
        </div>
            <div class="col">
                @include('_partials.right-sidebar')
            </div>
        </div>


    </div>

    @include('doctor.feedback')


    @include('_partials.form-feedback')


@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/imask.js') }}"></script>
    <script src="{{ asset('js/rateyo.js') }}"></script>
    <script>
        $('#rateYo-doctor-show').rateYo({
            rating: "{!! $doctor->rating !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        });

        $('#rateYo-doctor-attent').rateYo({
            rating: "{!! $doctor->attent_rating !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        });

        $('#rateYo-doctor-manner').rateYo({
            rating: "{!! $doctor->manner_rating !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        });

        $('#rateYo-doctor-time').rateYo({
            rating: "{!! $doctor->time_rating !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        });
    </script>
@endpush
