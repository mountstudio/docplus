@extends('layouts.app')

@push('metatags')
    <meta name="keywords" content="{{ $doctor->keywords }}">
    <meta name="description" content="{{ $doctor->description }}">
    <title>Docplus.kg - {{ $doctor->title }}</title>
@endpush

@section('content')

    <div class="container py-5">
        <div class="row pt-5">
            <div class="col-12 col-md-4 text-center">
                <div class="row justify-content-center">
                    <div class="col-10 col-md-8">
                        @include('_partials.like', ['type' => 'Doctor', 'model' => $doctor])
                        <img class="img-card-doctors_clinics rounded-circle mb-2 img-thumbnail w-100"
                             src="{{ $doctor->logo && file_exists(public_path('/uploads/'.$doctor->logo)) ? asset('uploads/'.$doctor->logo) : asset('img/noavatar.png') }}"
                             alt="">

                    </div>
                </div>
                @if(!$doctor->pics->isEmpty())
                    <a href="{{ $doctor->pics->first()->image && file_exists(public_path('uploads/'.$doctor->pics->first()->image)) ? asset('uploads/'.$doctor->pics->first()->image) : asset('img/noavatar.png') }}"
                       class="elem text-dark"
                       data-lcl-thumb="{{ $doctor->pics->first()->image && file_exists(public_path('uploads/'.$doctor->pics->first()->image)) ? asset('uploads/'.$doctor->pics->first()->image) : asset('img/noavatar.png') }}">
                        Все фото врача
                    </a>
                @endif
                <div class="content">
                    @foreach($doctor->pics as $pic)
                        @if(!$loop->first)
                            <a class="elem" href="{{asset('uploads/'.$pic->image)}}"
                               data-lcl-thumb="{{asset('uploads/'.$pic->image)}}">
                                <span style="background-image: url({{asset('uploads/'.$pic->image)}});"></span>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    @include('_partials.stars', ['id' => 'doctor-show'])
                </div>
                <p class="text-dark font-weight-light small">{{count($doctor->feedbacks)}}
                    отзывов-(ва)</p>
                <p><a class="text-primary small"
                      href="{{ $doctor->clinic ? route('clinic.show', $doctor->clinic) : '#' }}">{{ $doctor->clinic ? $doctor->clinic->clinic_name : '' }}</a>
                </p>
                {{--<div class="row justify-content-center mt-3">--}}
                {{--@include('_partials.stars', ['id' => $doctor->id.'-prof'])--}}
                {{--</div>--}}
                {{--<p class="text-muted font-weight-light mb-0 small">Профессиональный рейтинг врача</p>--}}
            </div>
            <div class="col col-md-4 mt-3 mt-md-0">
                <h1 class="text-dark text-center text-md-left h2 mt-3 mt-md-0 font-weight-bold">{{ $doctor->fullName ?? 'Бобров Василий Елисеевич' }}</h1>
                <p class="text-dark font-weight-light">
                    @if(isset($doctor))
                        {{ $doctor->specs->implode('name', ', ') }}
                    @else
                        Гастроэнтеролог, Терапевт
                    @endif
                    <br> Стаж <span class="font-weight-bold h5">{{ $doctor->age ?? 19 }}</span> лет
                </p>
                <p class="text-dark font-weight-light">Профессиональный рейтинг - <span
                            class="font-weight-bold h5">{{ $doctor->prof_rating }} </span><i
                            class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top"
                            title="Профессиональный рейтинг основан на трех критериях: Стаж, категория, степень."></i>
                </p>

                <p class="text-dark font-weight-light m-0 mb-md-2">
                    Приём от
                    @if($doctor->discount)
                        <span class="text-doc2 font-weight-bold"><del>{{ $doctor->price ?? '1400' }} сом</del></span>
                        <span>{{ round($doctor->price - $doctor->price * $doctor->discount / 100) }} сом</span>
                    @else
                        <span class="text-doc2 font-weight-bold">{{ $doctor->price ?? '1400' }} сом</span>
                    @endif
                    <i class="fas fa-exclamation-circle" data-toggle="tooltip" data-placement="top"
                       title="Скидка за первое посещение врача, действует только при записи с сервиса Doc+"></i>
                </p>
                <p class="text-dark font-weight-light m-0 mb-5">
                    Телефон для записи: <br>
                    <span class="font-weight-bold h5">+996 (777) 777-777</span>
                </p>
                <a href="#feedbacks" class="text-dark"><u>Отзывы о враче</u></a>
                <p class="text-dark font-weight-light small m-0">На прошлой неделе записалось {{ $doctor->records->count() }} человек(-а)</p>

            </div>

            @if($doctor->latitude && $doctor->longtitude)
                <div class="col-12 col-md">
                    <div id="map" style="width: 100%; height: 350px;"></div>
                </div>
            @endif
        </div>
    </div>


    <div class="d-md-block d-none">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="mb-5">
                        @if(count($doctor->services))
                            <p class="font-weight-bold h5">Услуги врача</p>
                            @foreach($doctor->services as $service)
                                <span class="mr-2 text-secondary ">{{$service->name}}</span>

                            @endforeach
                        @endif
                    </div>
                    @if($doctor->description)
                        <div class="mb-5">
                        <h5 class="text-dark font-weight-bold ">Информация о враче</h5>
                        <div>
                            <span class="text-secondary">{!! $doctor->description !!}</span>
                        </div>
                        </div>
                    @else
                        <div class="mb-5">
                        <h5 class="text-dark font-weight-bold">Информация отсутствует</h5>
                        </div>
                    @endif
                    @if($doctor->educations)
                        <div class="mb-5">
                        <h5 class="text-dark font-weight-bold">Образование</h5>

                        <ul class="text-secondary">
                            @foreach($doctor->educations as $education)
                            <li>{{$education}}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif
                    @if($doctor->experiences)
                        <div class=" mb-5">
                        <h5 class="text-dark font-weight-bold">Опыт работы</h5>

                        <ul class="text-secondary">
                            @foreach($doctor->experiences as $experience)
                                <li>{{$experience}}</li>
                            @endforeach
                        </ul>
                        </div>
                    @endif
                    @if($doctor->qualifications)
                        <div class=" mb-5">
                            <h5 class="text-dark font-weight-bold">Квалификация</h5>

                            <ul class="text-secondary">
                                @foreach($doctor->qualifications as $qualification)
                                    <li>{{$qualification}}</li>
                                @endforeach
                            </ul>
                        </div>
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
                    <a class="nav-link active" id="" data-toggle="tab" href="#info" role="tab" aria-controls=""
                       aria-selected="true">Информация</a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" id="" data-toggle="tab" href="#schedule" role="tab" aria-controls=""--}}
                       {{--aria-selected="true">Расписание</a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a class="nav-link" id="" data-toggle="tab" href="#feedback" role="tab" aria-controls=""
                       aria-selected="true">Отзывы</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show" id="info" role="tabpanel" aria-labelledby="">
                    <div class="row justify-content-center mt-5">
                        <div class="col-12 col-md-8 position-relative">
                            @if($doctor->description)
                                <h5 class="text-secondary font-weight-bold text-center">Информация о враче</h5>
                                <p class="text-secondary">{!! $doctor->description !!}</p>
                            @else
                                <h5 class="text-secondary font-weight-bold text-center">Информация отсутствует</h5>
                            @endif

                        </div>
                    </div>
                </div>
                {{--<div class="tab-pane fade" id="schedule" role="tabpanel" aria-labelledby="">--}}
                    {{--<div class="col mt-5">--}}

                        {{--@include('_partials.right-sidebar')--}}

                    {{--</div>--}}
                {{--</div>--}}
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
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    @foreach($doctor->clinics as $clinic)
                        @include('clinic.card')
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @include('_partials.modals.doctor_record_modal')
    @include('_partials.modals.doctor_feedback')
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
    <script type="text/javascript">
        // Функция ymaps.ready() будет вызвана, когда
        // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
        ymaps.ready(init);
        function init(){
            // Создание карты.
            var myMap = new ymaps.Map("map", {
                // Координаты центра карты.
                // Порядок по умолчанию: «широта, долгота».
                // Чтобы не определять координаты центра карты вручную,
                // воспользуйтесь инструментом Определение координат.
                center: [{{ $doctor->latitude ?? 42.865388923088396 }}, {{ $doctor->longtitude ?? 74.60104350048829 }}],
                // Уровень масштабирования. Допустимые значения:
                // от 0 (весь мир) до 19.
                zoom: 17
            });

            myMap.geoObjects.add(new ymaps.Placemark([{{ $doctor->latitude ?? 42.865388923088396 }}, {{ $doctor->longtitude ?? 74.60104350048829 }}], {
                balloonContent: '{{ $doctor->fullName }}'
            }, {
                preset: 'islands#icon',
                iconColor: '#0095b6'
            }))
        }
    </script>
@endpush
