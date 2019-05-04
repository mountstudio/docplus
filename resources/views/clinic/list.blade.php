@extends('layouts.app')

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
            <div class="col-12 col-md-4">
                <div id="map" class="sticky-top border shadow-sm" style="width: auto; height: 400px;"></div>
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
    <div class="container">
        <div class="row">
            <div class="col-12 font-weight-bold text-secondary h3 pb-5">
                Отзывы о стомотологах в Бишкеке
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
        }
    </script>
@endpush




