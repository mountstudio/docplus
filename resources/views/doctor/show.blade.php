@extends('layouts.app')

@section('content')


    @include('_partials._head_rec')

    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="row align-items-start">
                    <div class="col-5 text-center">

                        <div class="position-relative">
                            @include('_partials.like', ['type' => 'Doctor', 'model' => $doctor])
                            <img class="img-fluid rounded-circle mb-2 img-thumbnail " src="{{ $doctor->pics->first() ? asset('uploads/'.$doctor->pics->first()->image) : asset('img/doctor.jpg') }}" alt="">
                        </div>

                        <div class="row justify-content-center">
                            @include('_partials.stars', ['id' => 'doctor-show'])
                        </div>
                        <p class="text-secondary mt-3">Рейтинг врача<br>на основе {{ $feedbacks->count() }} отзывов-(ва)</p>
                    </div>

                    <div class="col">
                        <p class="text-secondary h3 m-0 mt-md-5 mb-md-2">{{ $doctor->fullName ?? 'Бобров Василий Елисеевич' }}</p>
                        <p class="text-secondary font-weight-light h6 my-3"><em>
                                @if(isset($doctor))
                                    {{ $doctor->specs->implode('name', ', ') }}
                                @else
                                    Гастроэнтеролог, Терапевт
                                @endif <br> Стаж {{ $doctor->age ?? 19 }} лет</em></p>
                        <span class="text-secondary">Проф. рейтинг - <strong>{{$doctor->prof_rating}}</strong></span>
                        <p class="text-secondary font-weight-light mt-2 mb-5">Приём от <del>{{ $doctor->price }}</del> сом<br>
                            <span class="text-primary font-weight-bold">{{ $doctor->price - $doctor->price * $doctor->discount / 100 }} сом</span></p>
                        <a href="#feedbacks" class="text-secondary pt-md-5"><u>Отзывы о враче</u></a>


                    </div>
                </div>
            </div>
            <div class="col-4 d-md-block d-none">
                <div class="row">
                    <div class="col-6">
                        <p class="mb-0">Степень </p>
                        <p class="mb-0">Категория </p>
                        <p class="mb-0">Стаж </p>
                        <p class="mb-0">Проф.рейтинг</p>
                    </div>
                    <div class="col-6">
                        <div class="mb-1">@include('_partials.stars', ['id' => 'first'])</div>
                        <div class="mb-1">@include('_partials.stars', ['id' => 'second'])</div>
                        <div class="mb-1">@include('_partials.stars', ['id' => 'third'])</div>
                        <div class="mb-1">@include('_partials.stars', ['id' => 'prof_rating'])</div>
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
    <div class="container d-none d-md-block py-4" id="feedbacks">
        <!-- Отзыв -->
        @foreach($feedbacks as $feedback)
    @include('doctor.feedback')
        @endforeach
    </div>


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
        $('#rateYo-first').rateYo({
            rating: "{!! $doctor->first !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        });

        $('#rateYo-second').rateYo({
            rating: "{!! $doctor->second !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        });

        $('#rateYo-third').rateYo({
            rating: "{!! $doctor->third !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        });

        $('#rateYo-prof_rating').rateYo({
            rating: "{!! $doctor->prof_rating !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        });
    </script>
@endpush
