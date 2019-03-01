@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-md-6 py-5">
                @include('_partials.search')
            </div>

        </div>

        <div class="row">
            <div class="col-9 text-secondary">
                <h2 class="font-weight-bold">УЗИ в Бишкеке</h2>
                <p class="h4 pt-3">
                    <b>УЗИ (ультразвуковое исследование) :<br>цены, адреса и запись онлайн</b>
                </p>
                <p class="pt-3 pb-0">
                    ✚ Лучшие центры УЗИ в Бишкеке представлены здесь - адреса и цены, рейтинг клиник, отзывы пациентов;
                    запишитесь онлайн или по телефону <b>со скидкой до 50%</b>.
                </p>
                <p class="py-3 border-bottom border-3 border-grey">
                    Ультразвуковое исследование (УЗИ) - неинвазивное исследование человеческого организма благодаря
                    воздействию ультразвуковых волн. Способы проведения УЗИ: через переднюю брюшную стенку,
                    трансвагинально и через прямую кишку.
                </p>


                <div class="accordion text-secondary " id="accordionExample">
                    <div class="card bg-transparent border-0">
                        <div class="card-header py-0 bg-transparent border-0" id="headingOne">
                            <button class="btn btn-link text-secondary h2" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <span class="">дальше</span>
                            </button>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                             data-parent="#accordionExample">
                            <div class="card-body pt-0">
                                Зачем делают УЗИ? Ультразвуковое исследование позволяет получить достоверную информацию
                                о форме, размерах, положении и состоянии внутренних органов. Ультразвук безвреден,
                                практически не имеет ограничений и противопоказаний, исключение составляет только
                                внутриректальное обследования при заболеваниях прямой кишки. Используется для выявления
                                заболеваний на ранних стадиях, уточнения диагноза или оценки результатов лечения.

                                Подготовка к УЗИ. За 3 дня до процедуры рекомендуется исключить из рациона продукты,
                                которые способствуют вздутию живота и газообразованию. Для лучшей визуализации за пару
                                дней до исследования необходимо принимать ферментные препараты, которые улучшают
                                пищеварение. Запрещается проводить УЗИ после рентгенконтрастных исследований,
                                колоноскопии и ФГДС. Исследования проводят натощак, а если процедура запланирована на
                                вторую половину дня, нельзя есть за 6 часов до процедуры и пить за 2 часа до ее начала.
                                Достоверное снятие данных УЗИ и консультацию может обеспечить только грамотный врач УЗИ
                                в медицинском центре.

                                Здесь представлены клиники и медцентры в которых можно сделать лучшее УЗИ в Москве.

                                Сколько стоит УЗИ? Средняя стоимость в частном кабинете УЗИ в Москве: 1000-1500 руб.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="doctor-tab" data-toggle="tab" href="#doctor" role="tab"
                       aria-controls="doctor" aria-selected="true">Доктора</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="clinic-tab" data-toggle="tab" href="#clinic" role="tab"
                       aria-controls="clinic" aria-selected="true">Клиники</a>
                </li>
            </ul>
            <div class="col-12">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="doctor" role="tabpanel" aria-labelledby="doctor-tab">
                        @foreach($doctors as $doctor)
                            @include('doctor.card')
                        @endforeach
                    </div>

                    <div class="tab-pane fade" id="clinic" role="tabpanel" aria-labelledby="clinic-tab">
                        @foreach($clinics as $clinic)
                            @include('clinic.card')
                        @endforeach
                    </div>
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
@endpush
