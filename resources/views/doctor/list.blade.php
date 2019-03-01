@extends('layouts.app')

@section('content')

    <div class="container border-bottom border-secondary d-none d-lg-block">
        @include('_partials._head_rec')
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                @include('_partials.search')
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row align-items-center">
            <div class="col-6 my-2 col-md-12">
                @include('_partials.sort')
            </div>
            <div class="col-6 my-2 col-md-12">
                @include('_partials._filter')
            </div>
        </div>
    </div>

    <div class="container d-lg-none p-5 ">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                @include('_partials.mobile-question')
            </div>
        </div>
    </div>

    <div class="container my-5">

        @foreach($doctors as $doctor)
            @include('doctor.card')
        @endforeach

        <div class="row">
            <div class="col-4 pt-3">
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
    <div class="container d-none d-lg-block">
        <p><strong>Где найти хорошего окулиста?</strong></p>
        <span>    Хорошего врача вы можете найти на DocDoc.ru. Здесь вы сможете выбрать адрес ближайшего приема специалиста, исходя из важных для вас критериев, а также осуществить запись к окулисту через интернет.
        </span>
        <p><strong>Что лечит врач-офтальмолог</strong></p>
        <span>
    Офтальмолог (окулист) – это врач, который специализируется на диагностике, лечении и профилактике глазных заболеваний. Переоценить тяжесть проблем со зрением сложно – для человека перестает существовать значительная часть окружающего мира. Лечение и предупреждение частной и полной потери зрения – это и есть то, что делает офтальмолог.
        </span>
        <p><strong> Когда необходимо обратиться к окулисту</strong></p>
        <span>
    l после 40-45 лет, не реже раза в год – для предупреждения глаукомы, катаракты и других заболеваний, которые могут быть вызваны возрастными изменениями;
    <br>1 при сахарном диабете, особенно второго типа – с целью предупреждения патологий зрения, характерных для этого заболевания;
    <br>2 при прогрессирующей близорукости, а также при близорукости и дальнозоркости высокой и средней степени тяжести;
    <br>3 если вы находитесь в группе риска по нарушениям зрения: страдаете гипертонической болезнью с высокими показателями артериального давления, имеете родственников, страдающих близорукостью, глаукомой, дистрофическими патологиями сетчатки глаза;
    <br>4 обязательным является профилактический осмотр для всех, чья профессиональная деятельность связана с повышенной нагрузкой на органы зрения.
        </span>
        <p class="my-5"><strong>ОБРАТИТЕ ВНИМАНИЕ!</strong> Информация на странице представлена для ознакомления.
            Для назначения лечения обратитесь к врачу.</p>
    </div>
    <div class="container d-none d-lg-block">
        <div class="row justify-content-center">
            @for($i=0;$i<4;$i++)
                <div class="col-6">
                    {{--<img class="rounded pt-3" src="{{ asset('img/doctor.png') }}" style="width:55px;" alt="">--}}
                    <div><p class="m-0"><strong>Бобров Василий Елисеевич</strong></p>
                        <span>5 отзывов</span><br></div>

                    <span style="overflow: hidden; text-overflow: clip;">Бобров Василий Елисеевич - врач окулист(офтальмолог), стаж 24 года.
                    Скидка на прием врача! Все отзывы о враче. Запись онлайн или по телефону.
                    Бобров Василий Елисеевич - врач окулист(офтальмолог), стаж 24 года.
                    Скидка на прием врача! Все отзывы о враче. Запись онлайн или по телефону.
                    </span>
                    <p class="mt-3 mb-5">На модерации, 13 января 2019</p>
                </div>
            @endfor
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
@endpush

