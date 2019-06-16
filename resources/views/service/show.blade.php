@extends('layouts.app')
<style>
    .wrapper {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: center;
    }
    .xpandable-block {
        height: 150px;
        overflow: hidden;
        order: 0;
    }
    .xpand-button {
        order: 1;
    }
    input[type="checkbox"] {
        display: none;
    }
    input[type="checkbox"]:checked + .xpandable-block {
        height: auto;
    }
    label {
        order: 1;
        color: blue;
        text-decoration: underline;
        font-size: 18px;
        cursor: pointer;
    }
</style>

@push('metatags')
    <meta name="keywords" content="{{ $service->keywords }}">
    <meta name="description" content="{{ $service->description }}">
    <title>Docplus.kg - {{ $service->title }}</title>
@endpush

@section('content')

    <div class="container py-5">
        <div class="row justify-content-center">

            <div class="col-12 col-md-6 py-5">
                @include('_partials.search')
            </div>

        </div>

        <div class="row">
            <div class="col-9 text-secondary">
                <h2 class="font-weight-bold">{{ $service->name }} в Бишкеке</h2>
                <p class="h4 pt-3">
                    <b>{{ $service->name }} :<br>цены, адреса и запись онлайн</b>
                </p>
                <div class="pt-3 pb-0 wrapper">
                    <label class="text-secondary" style="text-decoration: none;" for="button">Показать / скрыть</label>
                    <input type="checkbox" id="button">
                <div class="xpandable-block">
                  <p class="text-secondary">{!! $service->description !!}</p>
                </div>
                </div>

            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row justify-content-center">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @if($doctors->count() != 0)
                    <li class="nav-item">
                        <a class="nav-link active" id="doctor-tab" data-toggle="tab" href="#doctor" role="tab"
                           aria-controls="doctor" aria-selected="true">Доктора</a>
                    </li>
                @endif
                @if($clinics->count() != 0 && $doctors->count() === 0)
                    <li class="nav-item">
                        <a class="nav-link active" id="clinic-tab" data-toggle="tab" href="#clinic" role="tab"
                           aria-controls="clinic" aria-selected="true">Клиники</a>
                    </li>
                @elseif($clinics->count() != 0)
                    <li class="nav-item">
                        <a class="nav-link" id="clinic-tab" data-toggle="tab" href="#clinic" role="tab"
                           aria-controls="clinic" aria-selected="true">Клиники</a>
                    </li>
                @endif
            </ul>
            <div class="col-12">

                <div class="tab-content" id="myTabContent">
                    @if($doctors->count() != 0)
                        <div class="tab-pane fade active show" id="doctor" role="tabpanel" aria-labelledby="doctor-tab">
                            <div class="row">
                                <div class="col-12">
                                    @include('_partials.filters.doctor_filter_pc')
                                </div>
                                <div class="col">
                                    @foreach($doctors as $doctor)
                                        @include('doctor.card', ['service' => $service])
                                    @endforeach
                                </div>
                                <div class="col-12 col-md-4 d-none d-md-block">
                                    <div class="pt-5 mt-4 h-100">
                                        <div id="map" class="sticky-top" style="width: auto; height: 400px;"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    @if($doctors instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                        <div class="row">
                                            <div class="col-4 pt-3">
                                                {{ $doctors->appends(request()->query())->links() }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($clinics->count() != 0)
                        <div class="tab-pane fade" id="clinic" role="tabpanel" aria-labelledby="clinic-tab">
                            <div class="row">
                                <div class="col-12">
                                    @include('_partials.filters.clinic_filter_pc')
                                </div>
                                <div class="col">
                                    @foreach($clinics as $clinic)
                                        @include('clinic.card')
                                    @endforeach
                                </div>
                                <div class="col-12 col-md-4 d-none d-md-block">
                                    <div class="pt-5 mt-4 h-100">
                                        <div id="map2" class="sticky-top" style="width: auto; height: 400px;"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    @if($clinics instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                        <div class="row">
                                            <div class="col-4 pt-3">
                                                {{ $clinics->appends(request()->query())->links() }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>



@endsection


@push('styles')


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">

@endpush
@push('scripts')
    <script src="{{ asset('js/rateyo.js') }}"></script>
    <script>
        $('[data-toggle="tooltip"]').tooltip();
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
                center: [42.865388923088396, 74.60104350048829],
                // Уровень масштабирования. Допустимые значения:
                // от 0 (весь мир) до 19.
                zoom: 13,
                controls: ['zoomControl']
            });

            var events = ['mouseenter', 'mouseleave'];



                    @foreach($doctors as $doctor)
            var doctorPlacemark{{ $doctor->id }} = new ymaps.Placemark([{{ $doctor->latitude ?? 42.865388923088396 }}, {{ $doctor->longtitude ?? 74.60104350048829 }}], {
                    balloonContent: '<p class="font-weight-bold mb-1">{{ $doctor->fullName }}</p>'+
                    '<p class=" mb-1">{{ $doctor->specs->implode('name', ', ') }}</p>' +
                    '<p class=" mb-1">Адрес: {{ $doctor->address }}</p>' +
                    '<p class=" mb-0">{{ $doctor->clinics->implode('clinic_name', ', ') }}</p>',
                    hintContent: '<p class="font-weight-bold mb-1">{{ $doctor->fullName }}</p>' +
                    '<p class="mb-0">Адрес: {{ $doctor->address }}</p>',
                    myID: 'placemark-doctor-{{ $doctor->id }}'
                }, {
                    preset: 'islands#icon',
                    iconColor: '#0095b6'
                });

            doctorPlacemark{{ $doctor->id }}.events
                .add('mouseenter', function (e) {
                    // Ссылку на объект, вызвавший событие,
                    // можно получить из поля 'target'.
                    e.get('target').options.set('iconColor', '#ff0000');
                })
                .add('mouseleave', function (e) {
                    e.get('target').options.unset('iconColor', '#0095b6');
                })
                .add('balloonclose', function (e) {
                    e.get('target').options.set('iconColor', '#0095b6');
                });

            myMap.geoObjects.add(doctorPlacemark{{ $doctor->id }});
                    @endforeach
                    @foreach($doctors as $doctor)
            var targetElement{{ $doctor->id }} = document.getElementById('doctor-card-{{ $doctor->id }}'),
                divListeners{{ $doctor->id }} = ymaps.domEvent.manager.group(targetElement{{ $doctor->id }})
                    .add(events, function (event) {
                        if ("mouseenter" === event.get('type')) {
                            doctorPlacemark{{ $doctor->id }}.options.set('iconColor', '#ff0000');
                            doctorPlacemark{{ $doctor->id }}.balloon.open();
                        } else if ("mouseleave" === event.get('type')) {
                            doctorPlacemark{{ $doctor->id }}.options.set('iconColor', '#0095b6');
                            doctorPlacemark{{ $doctor->id }}.balloon.close();
                        }
                    });
            @endforeach
            myMap.setBounds(myMap.geoObjects.getBounds());
        }
    </script>
    <script type="text/javascript">
        // Функция ymaps.ready() будет вызвана, когда
        // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
        ymaps.ready(init);
        function init(){
            // Создание карты.
            var myMap = new ymaps.Map("map2", {
                // Координаты центра карты.
                // Порядок по умолчанию: «широта, долгота».
                // Чтобы не определять координаты центра карты вручную,
                // воспользуйтесь инструментом Определение координат.
                center: [42.865388923088396, 74.60104350048829],
                // Уровень масштабирования. Допустимые значения:
                // от 0 (весь мир) до 19.
                zoom: 13
            });

            var events = ['mouseenter', 'mouseleave'];



                    @foreach($clinics as $clinic)
            var clinicPlacemark{{ $clinic->id }} = new ymaps.Placemark([{{ $clinic->latitude ?? 42.865388923088396 }}, {{ $clinic->longtitude ?? 74.60104350048829 }}], {
                    balloonContent: '<p class="font-weight-bold mb-1">{{ $clinic->clinic_name }}</p>'+
                    '<p class=" mb-1">Адрес: {{ $clinic->address }}</p>',
                    hintContent: '<p class="font-weight-bold mb-1">{{ $clinic->clinic_name }}</p>',
                    myID: 'placemark-clinic-{{ $clinic->id }}'
                }, {
                    preset: 'islands#icon',
                    iconColor: '#0095b6'
                });

            clinicPlacemark{{ $clinic->id }}.events
                .add('mouseenter', function (e) {
                    // Ссылку на объект, вызвавший событие,
                    // можно получить из поля 'target'.
                    e.get('target').options.set('iconColor', '#ff0000');
                })
                .add('mouseleave', function (e) {
                    e.get('target').options.unset('iconColor', '#0095b6');
                })
                .add('balloonclose', function (e) {
                    e.get('target').options.set('iconColor', '#0095b6');
                });

            myMap.geoObjects.add(clinicPlacemark{{ $clinic->id }});
                    @endforeach
                    @foreach($clinics as $clinic)
            var targetElement{{ $clinic->id }} = document.getElementById('clinic-card-{{ $clinic->id }}'),
                divListeners{{ $clinic->id }} = ymaps.domEvent.manager.group(targetElement{{ $clinic->id }})
                    .add(events, function (event) {
                        if ("mouseenter" === event.get('type')) {
                            clinicPlacemark{{ $clinic->id }}.options.set('iconColor', '#ff0000');
                            clinicPlacemark{{ $clinic->id }}.balloon.open();
                        } else if ("mouseleave" === event.get('type')) {
                            clinicPlacemark{{ $clinic->id }}.options.set('iconColor', '#0095b6');
                            clinicPlacemark{{ $clinic->id }}.balloon.close();
                        }
                    });
            @endforeach

            myMap.setBounds(myMap.geoObjects.getBounds());
        }
    </script>
@endpush
