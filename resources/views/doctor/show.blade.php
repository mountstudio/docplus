@extends('layouts.app')

@section('content')


    @include('_partials._head_rec')

    <div class="container py-5">
        <div class="row ">
            <div class="col-12 col-md-4   text-center">
                <div class="row justify-content-center">
                    <div class="col-10 col-md-8">
                        @include('_partials.like', ['type' => 'Doctor', 'model' => $doctor])
                        <img class="img-card-doctors_clinics rounded-circle mb-2 img-thumbnail w-100"
                             src="{{ $doctor->logo ? asset('uploads/'.$doctor->logo) : asset('img/noavatar.png') }}"
                             alt="">

                    </div>
                </div>
                @if(!$doctor->pics->isEmpty())
                    <a href="{{ $doctor->logo && file_exists(public_path('uploads/'.$doctor->logo)) ? asset('uploads/'.$doctor->logo) : asset('img/noavatar.png') }}"
                       class="elem"
                       data-lcl-thumb="{{ $doctor->logo && file_exists(public_path('uploads/'.$doctor->logo)) ? asset('uploads/'.$doctor->logo) : asset('img/noavatar.png') }}">
                        Все фото врача
                    </a>
                @endif
                <div class="content">
                    @foreach($doctor->pics as $pic)
                        <a class="elem" href="{{asset('uploads/'.$pic->image)}}"
                           data-lcl-thumb="{{asset('uploads/'.$pic->image)}}">
                            <span style="background-image: url({{asset('uploads/'.$pic->image)}});"></span>
                        </a>
                    @endforeach

                </div>
                <div class="row justify-content-center">
                    @include('_partials.stars', ['id' => 'doctor-show'])
                </div>
                <p class="text-muted font-weight-light small">{{count($doctor->feedbacks)}}
                    отзывов-(ва)</p>
                <p><a class="text-primary small"
                      href="{{ $doctor->clinic ? route('clinic.show', $doctor->clinic) : '#' }}">{{ $doctor->clinic ? $doctor->clinic->name : '' }}</a>
                </p>
                {{--<div class="row justify-content-center mt-3">--}}
                {{--@include('_partials.stars', ['id' => $doctor->id.'-prof'])--}}
                {{--</div>--}}
                {{--<p class="text-muted font-weight-light mb-0 small">Профессиональный рейтинг врача</p>--}}
            </div>
            <div class="col col-md-auto mt-3 mt-md-0">
                <h3 class="text-secondary text-center text-md-left h2 mt-3 mt-md-0 font-weight-bold">{{ $doctor->fullName ?? 'Бобров Василий Елисеевич' }}</h3>
                <p class="text-secondary font-weight-light">
                    @if(isset($doctor))
                        {{ $doctor->specs->implode('name', ', ') }}
                    @else
                        Гастроэнтеролог, Терапевт
                    @endif
                    <br> Стаж <span class="font-weight-bold h5">{{ $doctor->age ?? 19 }}</span> лет
                </p>
                <p class="text-secondary font-weight-light">Профессиональный рейтинг - <span
                            class="font-weight-bold h5">{{ $doctor->prof_rating }} </span><i
                            class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top"
                            title="Профессиональный рейтинг основан на трех критериях: Стаж, категория, степень."></i>
                </p>

                <p class="text-secondary font-weight-light m-0 mb-md-2">
                    Приём от
                    @if($doctor->discount)
                        <span class="text-doc2 font-weight-bold"><del>{{ $doctor->price ?? '1400' }} сом</del></span>
                        <span>{{ round($doctor->price - $doctor->price * $doctor->discount / 100) }} сом</span>
                    @else
                        <span class="text-doc2 font-weight-bold">{{ $doctor->price ?? '1400' }} сом</span>
                    @endif
                    <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top"
                       title="Скидка указана за первое посещение врача"></i>
                </p>
                <p class="text-secondary font-weight-light m-0 mb-md-2">
                    Телефон для записи: <br>
                    <span class="font-weight-bold h5">+996 (777) 777-777</span>
                </p>
                <a href="#feedbacks" class="text-secondary pt-md-5 d-md-block d-none"><u>Отзывы о враче</u></a>
                <p class="text-secondary font-weight-light small m-0">На прошлой неделе записалось два человека</p>

            </div>
            {{--<div class="col-auto d-md-block d-none">--}}
            {{--<div class="row">--}}
            {{--<div class="col-6">--}}
            {{--<p class="mb-0">Степень </p>--}}
            {{--<p class="mb-0">Категория </p>--}}
            {{--<p class="mb-0">Стаж </p>--}}
            {{--<p class="mb-0">Проф.рейтинг</p>--}}
            {{--</div>--}}
            {{--<div class="col-6">--}}
            {{--<div class="mb-1">@include('_partials.stars', ['id' => 'first'])</div>--}}
            {{--<div class="mb-1">@include('_partials.stars', ['id' => 'second'])</div>--}}
            {{--<div class="mb-1">@include('_partials.stars', ['id' => 'third'])</div>--}}
            {{--<div class="mb-1">@include('_partials.stars', ['id' => 'prof_rating'])</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
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
            <div class="col-12 col-md-8">
                <div class="text-secondary mb-5">
                    @if(count($doctor->services))
                        <p class="font-weight-bold h5">Услуги врача</p>
                        @foreach($doctor->services as $service)
                            <span class="mr-2">{{$service->name}}</span>

                        @endforeach
                    @endif
                </div>
                @if($doctor->description)
                    <p>
                    <h5 class="text-secondary font-weight-bold">Информация о враче</h5>
                    <div>
                        <span class="text-secondary">{{$doctor->description}}</span>
                    </div>
                    </p>
                @else
                    <p>
                    <h5 class="text-secondary font-weight-bold">Информация отсутствует</h5>
                    </p>
                @endif
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
        <div class="container">
            <p class="text-secondary">Отзывы о врачах могут оставлять пациенты записавшиеся через сервис DOC+.
                Каждый отзыв проходит тщательную проверку, что позволяет избежать заказных и рекламных отзывов.</p>
        </div>
    </div>

    <div class="d-md-none d-block">
        <div class="container py-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="" data-toggle="tab" href="#info" role="tab" aria-controls=""
                       aria-selected="true">Информация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="" data-toggle="tab" href="#schedule" role="tab" aria-controls=""
                       aria-selected="true">Расписание</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="" data-toggle="tab" href="#feedback" role="tab" aria-controls=""
                       aria-selected="true">Отзывы</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="">
                    <div class="row justify-content-center mt-5">
                        <div class="col-12 col-md-8 position-relative">
                            @if($doctor->description)
                                <h5 class="text-secondary font-weight-bold text-center">Информация о враче</h5>
                                <p class="text-secondary">{{$doctor->description}}</p>
                            @else
                                <h5 class="text-secondary font-weight-bold text-center">Информация отсутствует</h5>
                            @endif

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

    @if($doctor->clinics->count() != 0)
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-12 mb-3">
                    <h3 class="text-secondary text-center font-weight-bold">Клиники врача</h3>
                </div>
            </div>
        </div>
        <div class="container py-4">
            <div class="row">
                <div class="col">
                    @foreach($doctor->clinics as $clinic)
                        @include('clinic.card')
                    @endforeach
                </div>
            </div>
        </div>
    @endif

@endsection

@push('styles')

    <link rel="stylesheet" href="{{ asset('css/lc_lightbox.css') }}"/>

    <link rel="stylesheet" href="{{ asset('css/skins/minimal.css') }}"/>

    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/lib/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/lc_lightbox.lite.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/lib/AlloyFinger/alloy_finger.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/imask.js') }}"></script>
    <script src="{{ asset('js/rateyo.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function (e) {

            // live handler
            lc_lightbox('.elem', {
                wrap_class: 'lcl_fade_oc',
                gallery: true,
                thumb_attr: 'data-lcl-thumb',

                skin: 'minimal',
                radius: 0,
                padding: 0,
                border_w: 0,
            });

        });
    </script>
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
