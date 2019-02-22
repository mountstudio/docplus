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
                                Зачем делают УЗИ? Ультразвуковое исследование позволяет получить достоверную информацию о форме, размерах, положении и состоянии внутренних органов. Ультразвук безвреден, практически не имеет ограничений и противопоказаний, исключение составляет только внутриректальное обследования при заболеваниях прямой кишки. Используется для выявления заболеваний на ранних стадиях, уточнения диагноза или оценки результатов лечения.

                                Подготовка к УЗИ. За 3 дня до процедуры рекомендуется исключить из рациона продукты, которые способствуют вздутию живота и газообразованию. Для лучшей визуализации за пару дней до исследования необходимо принимать ферментные препараты, которые улучшают пищеварение. Запрещается проводить УЗИ после рентгенконтрастных исследований, колоноскопии и ФГДС. Исследования проводят натощак, а если процедура запланирована на вторую половину дня, нельзя есть за 6 часов до процедуры и пить за 2 часа до ее начала. Достоверное снятие данных УЗИ и консультацию может обеспечить только грамотный врач УЗИ в медицинском центре.

                                Здесь представлены клиники и медцентры в которых можно сделать лучшее УЗИ в Москве.

                                Сколько стоит УЗИ? Средняя стоимость в частном кабинете УЗИ в Москве: 1000-1500 руб.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

        </div>

    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-10" id="table-clinic" style="background-color: #eae6e7;">
                @for($i = 0; $i < 5; $i++)
                    <div class="row m-2">
                        <div class="col-12 col-lg-8 border-top border-bottom bg-white">
                            <div class="row">
                                <div class="col-5 position-relative">
                                    <a href="/getservices/1">
                                        <img class="img-fluid rounded my-2 " src="{{ asset('img/teeth.png') }}" alt="">
                                    </a>
                                        <div class="row justify-content-center">
                                            @include('_partials.stars')
                                        </div>

                                </div>
                                <div class="col-7 text-secondary ">
                                    <h1><strong>Он клиник</strong></h1>
                                    <p class="text-uppercase font-weight-bold">Мединцинский центр <br> <span class="h5">Первичная стоимость приёма - низкая</span>
                                    </p>
                                    <p class="pt-2">
                                        Группа «Он Клиник» – это сеть универсальных лечебно-диагностических центров
                                        семейного типа, в которых ведут
                                        прием больше 600 специалистов 60 ключевых мединцинских специалистов. Два
                                        десятилетия плодотворной работы дали возможность приобрести
                                        огромный опыт.
                                    </p>


                                    <table class="col-12">
                                        <tr>
                                            <td class="w-75 text-left"><span>Drug 1</span></td>
                                            <td class="w-25 text-right">10mL</td>
                                        </tr>
                                    </table>


                                    <div class="accordion text-secondary " id="accordionExample">
                                        <div class="card border-0">
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                 data-parent="#accordionExample">
                                                <div class="card-body px-0">

                                                    <table class="col-12">
                                                        <tr>
                                                            <td class="text-left"><span>Drug 1</span></td>
                                                            <td class="text-right"><span>10mL</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left"><span>Another drug</span></td>
                                                            <td class="text-right"><span>50mL</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-left"><span>Third</span></td>
                                                            <td class="text-right"><span>100mL</span></td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-header py-0 pl-0 bg-transparent border-0" id="headingOne">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link text-secondary pl-0" type="button"
                                                        data-toggle="collapse" data-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                    <span class="">дальше</span>
                                                </button>
                                            </h2>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-lg-4 border-top border-bottom border-left bg-white">
                            <div class="row">
                                <div class="col-2 py-3">
                                    <img class="img-size" src="{{ asset('img/marker.png') }}" alt="">
                                </div>
                                <div class="col-10 text-secondary  py-3">
                                    <p class="h6">
                                        г. Москва, Цветной б-р, д. 30, корп. 2 Цветной бульвар (390 м), Трубная(540м),
                                        Сухаревская(920м)
                                    </p>
                                </div>
                                <div class="col-2 py-3">
                                    <img class="img-size" src="{{ asset('img/clock.png') }}" alt="">
                                </div>
                                <div class="col-10 text-secondary  py-3">
                                    <p class="h6">
                                        <span>пн-пт:     08:00-21:00</span><br>
                                        <span>сб:     08:00-21:00</span><br>
                                        <span>вс:     08:00-21:00</span>
                                    </p>
                                </div>
                                <div class="col-2 py-3">
                                    <img class="img-size" src="{{ asset('img/phone.png') }}" alt="">
                                </div>
                                <div class="col-10 text-dark  py-4">
                                    <p class="font-weight-bold h5">

                                        +996 (708) 75-75-75

                                    </p>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="button"
                                            class="btn btn-lg btn-info text-light font-weight-bold mb-4 shadow text-uppercase h4 py-1"
                                            style="border-radius: 50px;">
                                        Записаться
                                    </button>
                                </div>
                            </div>
                        </div>


                    </div>
                @endfor
            </div>

            <!-- for yandex map-->
            <div class="col-2 d-none d-md-block">

            </div>


            <div class="col-12 col-md-4 pt-3">
                <nav aria-label="...">
                    <ul class="pagination pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>






@endsection


@push('styles')


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
    <style>
        dt {
            float: left;
            overflow: hidden;
            white-space: nowrap
        }

        dd {
            float: left;
            overflow: hidden
        }

        dt span:before {
            content: " .................................................................................."
        }
    </style>



@endpush

@push('scripts')
    <script src="{{ asset('js/rateyo.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script>
        $(".rateYo").rateYo({
            rating: 4,
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px"
        });
    </script>


@endpush
