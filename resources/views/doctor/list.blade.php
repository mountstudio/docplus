@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 position-relative" style="background-image: url('{{ asset('img/service.png') }}'); background-size: cover; background-position: center center">
        <div class="backdrop"></div>
        <div class="row py-5 justify-content-center">
            <div class="col-12 py-5">
                <h1 class="text-uppercase text-white text-center">Найдите нужного вам Врача</h1>
            </div>
            <div class="col-12 col-md-6 ">
                @include('_partials.search')
            </div>
        </div>
    </div>
    <div class="container border-bottom border-secondary d-none d-lg-block">
        @include('_partials._head_rec')
    </div>


    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 d-lg-none">
                @include('_partials.buttons.doctor_filter')
            </div>
        </div>
    </div>


    <div class="container my-5">
        <p class="text-doc font-weight-bold mt-3 h3">
            Частные врачи Бишкека
            <span class="text-secondary font-weight-light">{{ $doctors->total() }}</span>
        </p>


        <div class="col-auto d-none d-lg-block">
            @include('_partials.filters.doctor_filter_pc')
        </div>


    </div>

    <div class="container-fluid">
        <div class="row">

            <div class="col">
                @foreach($doctors as $doctor)
                    @include('doctor.card')
                @endforeach
            </div>
            <div class="col-12 col-md-4 d-none d-md-block">
                <div class="pt-5 mt-4 h-100">
                    <div id="map" class="sticky-top" style="width: auto; height: 400px;"></div>
                </div>
            </div>
        </div>

        @if($doctors instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="row">
                <div class="col-4 pt-3">
                    {{ $doctors->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-12 font-weight-bold text-secondary h3 pb-5">
                Отзывы о докторах в Бишкеке
            </div>


            @include('doctor.reviews')

        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
@endpush

@push('scripts')
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
@endpush
