@extends('layouts.app')

@section('content')


    @include('_partials._head_rec')

    <div class="container py-5">
                <div class="row ">
                    <div class="col-12 col-md-4   text-center">
                        <div class="row justify-content-center">
                            <div class="col-10 col-md-8">
                                @include('_partials.like', ['type' => 'Doctor', 'model' => $doctor])
                                <img class="img-card-doctors_clinics rounded-circle mb-2 img-thumbnail w-100" src="{{ $doctor->pics->first() ? asset('uploads/'.$doctor->pics->first()->image) : asset('img/doctor.jpg') }}" alt="">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            @include('_partials.stars', ['id' => 'doctor-show'])
                        </div>
                        <p class="text-muted font-weight-light small">Рейтинг врача на основе {{count($doctor->feedbacks)}} отзывов-(ва)</p>
                        <p><a class="text-primary small" href="{{ $doctor->clinic ? route('clinic.show', $doctor->clinic) : '#' }}">{{ $doctor->clinic ? $doctor->clinic->name : '' }}</a></p>
                        {{--<div class="row justify-content-center mt-3">--}}
                        {{--@include('_partials.stars', ['id' => $doctor->id.'-prof'])--}}
                        {{--</div>--}}
                        {{--<p class="text-muted font-weight-light mb-0 small">Профессиональный рейтинг врача</p>--}}
                    </div>
                    <div class="col col-md-auto mt-3 mt-md-0">
                        <a href="{{ route('doctor.show', $doctor->id) }}">
                            <h3 class="text-secondary text-center text-md-left h2 mt-3 mt-md-0">{{ $doctor->fullName ?? 'Бобров Василий Елисеевич' }}</h3>
                        </a>
                        <p class="text-secondary font-weight-light">
                            @if(isset($doctor))
                                {{ $doctor->specs->implode('name', ', ') }}
                            @else
                                Гастроэнтеролог, Терапевт
                            @endif
                            <br> Стаж <span class="font-weight-bold h5">{{ $doctor->age ?? 19 }}</span> лет
                        </p>
                        <p class="text-secondary font-weight-light">Профессиональный рейтинг - <span class="font-weight-bold h5">{{ $doctor->prof_rating }}</span></p>

                        <p class="text-secondary font-weight-light m-0 mb-md-2">
                            Приём от
                            @if($doctor->discount)
                                <span class="text-doc2 font-weight-bold"><del>{{ $doctor->price ?? '1400' }} сом</del></span>
                                <span>{{ round($doctor->price - $doctor->price * $doctor->discount / 100) }} сом</span>
                            @else
                                <span class="text-doc2 font-weight-bold">{{ $doctor->price ?? '1400' }} сом</span>
                            @endif
                            <i class="fas fa-exclamation-circle"  data-toggle="tooltip" data-placement="top" title="Скидка указана за первое посещение врача"></i>
                        </p>
                        <p class="text-secondary font-weight-light m-0 mb-md-2">
                            Телефон для записи: <br>
                            <span class="font-weight-bold h5">+996 (777) 777-777</span>
                        </p>
                        <a href="#feedbacks" class="text-secondary pt-md-5 d-md-block d-none"><u>Отзывы о враче</u></a>
                        <p class="text-secondary font-weight-light small m-0">На прошлой неделе записалось два человека</p>

                    </div>
                    <div class="col-auto d-md-block d-none">
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
    {{--<div class="col-12 d-md-none d-block">--}}
        {{--<div class="row">--}}
            {{--<div class="col-6">--}}
                {{--<p class="text-secondary font-weight-bold ml-1">ВНИМАТЕЛЬНОСТЬ</p>--}}
                {{--<p class="text-secondary font-weight-bold ml-1">МАНЕРЫ</p>--}}
                {{--<p class="text-secondary font-weight-bold ml-1">ВРЕМЯ ОЖИДАНИЯ</p>--}}
            {{--</div>--}}
            {{--<div class="col-4">--}}
                {{--@include('_partials.stars', ['class' => 'doctor-attent'])<br>--}}
                {{--@include('_partials.stars', ['class' => 'doctor-manner'])<br>--}}
                {{--@include('_partials.stars', ['class' => 'doctor-time'])--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="d-md-block d-none">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 position-relative">
                <h5 class="text-secondary font-weight-bold text-center">Информация о враче</h5>
                <p>{{ $doctor->description }}</p>

                <p class="text-secondary">Отзывы о врачах могут оставлять пациенты записавшиеся через сервис DOC+.
                    Каждый отзыв проходит тщательную проверку, что позволяет избежать заказныъ и рекламных отзывов.</p>
                {{--<div class="row">--}}
                    {{--<div class="col-5">--}}
                {{--<p class="text-secondary font-weight-bold ml-1">ВНИМАТЕЛЬНОСТЬ</p>--}}
                {{--<p class="text-secondary font-weight-bold ml-1">МАНЕРЫ</p>--}}
                {{--<p class="text-secondary font-weight-bold ml-1">ВРЕМЯ ОЖИДАНИЯ</p>--}}
                {{--</div>--}}
                    {{--@include('_partials.stars', ['class' => 'doctor-attent'])<br>--}}
                    {{--@include('_partials.stars', ['class' => 'doctor-manner'])<br>--}}
                    {{--@include('_partials.stars', ['class' => 'doctor-time'])--}}
                {{--</div>--}}
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

    </div>

    <div class="d-md-none d-block">
        <div class="container py-4">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="" data-toggle="tab" href="#info" role="tab" aria-controls="" aria-selected="true">Информация</a>
                </li>
            <li class="nav-item">
                <a class="nav-link" id="" data-toggle="tab" href="#schedule" role="tab" aria-controls="" aria-selected="true">Расписание</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="" data-toggle="tab" href="#feedback" role="tab" aria-controls="" aria-selected="true">Отзывы</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="">
                    <div class="row justify-content-center mt-5">
                        <div class="col-12 col-md-8 position-relative">
                            <h5 class="text-secondary font-weight-bold text-center">Информация о враче</h5>
                            <p class="text-secondary">Бобров Василий Елисеевич - врач окулист(офтальмолог), стаж 24 года.
                                Скидка на прием врача! Все отзывы о враче. Запись онлайн или по телефону.</p>
                            <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto corporis impedit mollitia soluta!
                                Ab, animi consequatur eum, eveniet facere illo illum iure modi nemo nulla, quae quas qui repellat voluptate.
                                <a class="text-primary" href="">др. подробная информация о враче</a></p>

                            <p class="text-secondary">Отзывы о врачах могут оставлять пациенты записавшиеся через сервис DOC+.
                                Каждый отзыв проходит тщательную проверку, что позволяет избежать заказныъ и рекламных отзывов.</p>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="schedule" role="tabpanel" aria-labelledby="">
                    <div class="col mt-5">

                        @include('_partials.right-sidebar')

                    </div>
                </div>
                <div class="tab-pane fade" id="feedback" role="tabpanel" aria-labelledby="">
                    <div class="container d-none d-md-block py-4 mt-5" id="feedbacks">
                        <!-- Отзыв -->
                        @foreach($feedbacks as $feedback)
                            @include('doctor.feedback')
                        @endforeach
                    </div>


                    @include('_partials.form-feedback')
                </div>
        </div>
        </div>
    </div>
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

        $('.rateYo-doctor-attent').rateYo({
            rating: "{!! $doctor->attent_rating !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        });

        $('.rateYo-doctor-manner').rateYo({
            rating: "{!! $doctor->manner_rating !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        });

        $('.rateYo-doctor-time').rateYo({
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
