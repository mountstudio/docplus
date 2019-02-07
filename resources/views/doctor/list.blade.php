@extends('layouts.app')

@section('content')

    <div class="container border-bottom border-secondary">
        @include('_partials._head_rec')
    </div>
    <div class="container">
        <div class="d-flex justify-content-center">
              <div class="col-8 text-right">
                <div class="btn-group ">
                    <button type="button" class="btn shadow my-5 bg-light rounded dropdown-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>

                </div>

            </div>
            <div class="col-4">
                <button type="button"   class="btn btn-primary h3 position-relative my-5">Найти</button>
            </div>

        </div>
    </div>
    <div class="form-check text-center">
        <input type="checkbox" id="exampleCheck1">
        <label class="form-check-label mr-5" for="exampleCheck1">Детский врач</label>
        <input class="ml-5" type="checkbox" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Выезд на дом</label>
    </div>
    <div class="row justify-content-center my-5">
        <div class="col-auto">
            <p class="pt-3 m-0">СОРТИРОВАТЬ</p>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary">Популярные</button>
                <button type="button" class="btn btn-primary">Рейтинг</button>
                <button type="button" class="btn btn-primary">Стоимость</button>
                <button type="button" class="btn btn-primary">Отзывы</button>

            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-10" id="table-clinic" style="background-color: #eae6e7;">
                @for($i = 0; $i < 5; $i++)
                    @include('doctor.single')
                @endfor
            </div>
            <div class="col-2">

            </div>
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
    <div class="container">
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
    <div class="container">
        <div class="row justify-content-center">
            @for($i=0;$i<4;$i++)
            <div class="col-6">
                {{--<img class="rounded pt-3" src="{{ asset('img/doctor.png') }}" style="width:55px;" alt="">--}}
                <div ><p class="m-0"><strong>Бобров Василий Елисеевич</strong></p>
                    <span>5 отзывов</span><br></div>

                <span style="overflow: hidden; text-overflow: clip; ">Бобров Василий Елисеевич - врач окулист(офтальмолог), стаж 24 года.
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


