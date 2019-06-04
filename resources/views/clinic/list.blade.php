@extends('layouts.app')

@push('metatags')
    <meta name="keywords" content="врачи, клиники, услуги, диагностика">
    <meta name="description" content="Docplus.kg - сборник врачей, клиник, услуг и диагностик">
    <title>Docplus.kg</title>
@endpush

@section('content')
    <div class="container-fluid py-5 position-relative" style="background-image: url('{{ asset('img/service.png') }}'); background-size: cover; background-position: center center">
        <div class="backdrop"></div>
        <div class="row py-5 justify-content-center">
            <div class="col-12 py-5">
                <h1 class="text-uppercase text-white text-center">Найдите нужную вам Клинику</h1>
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
                @include('_partials.buttons.clinic_filter')
            </div>
        </div>
    </div>



    <!-- Create table clinics and map -->
    <div class="container my-5">
        <p class="text-doc font-weight-bold mt-3 h3">
            Клиники Бишкека
            <span class="text-secondary font-weight-light">{{ $clinics->total() }}</span>
        </p>
        <div class="row">
            <div class="col-auto d-none d-lg-block">
                @include('_partials.filters.clinic_filter_pc')
            </div>


        </div>


    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                @foreach($clinics as $clinic)
                    @include('clinic.card')
                @endforeach
            </div>
            <div class="col-12 col-md-4 d-none d-md-block">
                <div class="pt-5 mt-4 h-100">
                    <div id="map" class="sticky-top" style="width: auto; height: 400px;"></div>
                </div>
            </div>

        </div>

        @if($clinics instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="row">
                <div class="col-4 pt-3">
                    {{ $clinics->appends(request()->query())->links() }}
                </div>
            </div>
        @endif
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-12 font-weight-bold text-secondary h3 pb-5">
                Отзывы о клиниках в Бишкеке
            </div>


            @include('clinic.reviews')

        </div>
    </div>
@endsection


@push('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
@endpush

@push('scripts')
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




