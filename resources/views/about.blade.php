@extends('layouts.app')

@section('content')

    <div class="container border-bottom border-secondary">
        <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid" src="{{asset('img/plus.png')}}" alt="">
                    </div>
                    <div class="col-9">
                        <h4 class="font-weight-bold mb-0">Моментальная запись к врачу</h4>
                        <p class="text-secondary">Записывайтесь онлайн с помощью актуального расписания</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid" src="{{asset('img/plus.png')}}" alt="">
                    </div>
                    <div class="col-9">
                        <h4 class="font-weight-bold mb-0">Моментальная запись к врачу</h4>
                        <p class="text-secondary">Записывайтесь онлайн с помощью актуального расписания</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid" src="{{asset('img/plus.png')}}" alt="">
                    </div>
                    <div class="col-9">
                        <h4 class="font-weight-bold mb-0">Моментальная запись к врачу</h4>
                        <p class="text-secondary">Записывайтесь онлайн с помощью актуального расписания</p>
                    </div>
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-4"></div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-4 text-center">

                        <div class="position-relative">
                            <img class="position-absolute rounded-circle img-thumbnail like m-2" src="{{ asset('img/heart-0.png') }}" alt="">
                            <img class="img-fluid rounded-circle mb-2 img-thumbnail " src="{{ asset('img/doctor.png') }}" alt="">
                        </div>

                        @for($i = 0; $i < 5; $i++)

                            <img class="star" src="{{ asset('img/star.png') }}" alt="">

                        @endfor
                        <p class="text-secondary mt-3">Превосходный врач<br>на основе 171 отзыв</p>
                    </div>

                    <div class="col-8">
                        <p class="text-secondary h3 mt-5 mb-2">Бобров Василий Елисеевич</p>
                        <p class="text-secondary font-weight-light h6 my-3"><em>Гастроэнтеролог, Терапевт <br> Стаж 19 лет</em></p>
                        <p class="text-secondary font-weight-light mt-2 mb-5">Приём от <del>1400</del> руб.  <span class="text-primary font-weight-bold">1000 руб.</span></p>
                        <p class="text-secondary pt-5"><u>Отзывы о враче</u></p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8 position-relative">
                <h5 class="text-secondary font-weight-bold">Информация о враче</h5>
                <p class="text-secondary">Бобров Василий Елисеевич - врач окулист(офтальмолог), стаж 24 года.
                    Скидка на прием врача! Все отзывы о враче. Запись онлайн или по телефону.</p>
                <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto corporis impedit mollitia soluta!
                    Ab, animi consequatur eum, eveniet facere illo illum iure modi nemo nulla, quae quas qui repellat voluptate.
                    <a class="text-primary" href="">др. подробная информация о враче</a></p>

                <p class="text-secondary">Отзывы о врачах могут оставлять пациенты записавшиеся через сервис DOC+.
                    Каждый отзыв проходит тщательную проверку, что позволяет избежать заказныъ и рекламных отзывов.</p>
                <p>
                    @for($i = 0; $i < 5; $i++)

                        @if($i<4)

                            <img class="star" src="{{ asset('img/star.png') }}" alt="">

                        @else
                            <img class="star" src="{{ asset('img/star-0.png') }}" alt="">
                            <span class="text-secondary font-weight-bold ml-1">ВНИМАТЕЛЬНОСТЬ</span>
                        @endif

                    @endfor
                </p>
                <p>
                    @for($i = 0; $i < 5; $i++)

                        @if($i<4)

                            <img class="star" src="{{ asset('img/star.png') }}" alt="">

                        @else
                            <img class="star" src="{{ asset('img/star-0.png') }}" alt="">
                            <span class="text-secondary font-weight-bold ml-1">ВНИМАТЕЛЬНОСТЬ</span>
                        @endif

                    @endfor
                </p>
                <p>
                    @for($i = 0; $i < 5; $i++)

                        @if($i<4)

                            <img class="star" src="{{ asset('img/star.png') }}" alt="">

                        @else
                            <img class="star" src="{{ asset('img/star-0.png') }}" alt="">
                            <span class="text-secondary font-weight-bold ml-1">ВНИМАТЕЛЬНОСТЬ</span>
                        @endif

                    @endfor
                </p>
                <div class="row">

                    <div  class="col-4 text-center">
                        <h6 class="text-secondary font-weight-bold ml-1">ВНИМАТЕЛЬНОСТЬ</h6>
                        <p>

                            @for($i = 0; $i < 5; $i++)

                                @if($i<4)

                                    <img class="star" src="{{ asset('img/star.png') }}" alt="">

                                @else
                                    <img class="star" src="{{ asset('img/star-0.png') }}" alt="">
                                @endif

                            @endfor
                        </p>
                    </div>
                    <div class="col-4 text-center">
                        <h6 class="text-secondary font-weight-bold ml-1">МАНЕРЫ</h6>
                        <p>
                            @for($i = 0; $i < 5; $i++)

                                @if($i<4)

                                    <img class="star" src="{{ asset('img/star.png') }}" alt="">

                                @else

                                    <img class="star" src="{{ asset('img/star-0.png') }}" alt="">

                                @endif

                            @endfor
                        </p>
                    </div>
                    <div class="col-4 text-center">
                        <h6 class="text-secondary font-weight-bold ml-1">ВРЕМЯ ОЖИДАНИЯ</h6>
                        <p>

                            @for($i = 0; $i < 5; $i++)

                                @if($i<4)

                                    <img class="star" src="{{ asset('img/star.png') }}" alt="">

                                @else

                                    <img class="star" src="{{ asset('img/star-0.png') }}" alt="">

                                @endif

                            @endfor
                        </p>
                    </div>
                    <p class="text-secondary text-center">Отзывы о врачах могут оставлять пациенты записавшиеся через сервис DOC+.
                        Каждый отзыв проходит тщательную проверку, что позволяет избежать заказныъ и рекламных отзывов.</p>
                    <p>
                <div class="row">

                    <div  class="col-4 text-center">
                        <h6 class="text-secondary font-weight-bold ml-1">ВНИМАТЕЛЬНОСТЬ</h6>
                        <p>

                            @for($i = 0; $i < 5; $i++)

                                @if($i<4)

                                    <img class="star" src="{{ asset('img/star.png') }}" alt="">

                                @else
                                    <img class="star" src="{{ asset('img/star-0.png') }}" alt="">
                                @endif

                            @endfor
                        </p>
                    </div>
                    <div class="col-4 text-center">
                        <h6 class="text-secondary font-weight-bold ml-1">МАНЕРЫ</h6>
                        <p>
                            @for($i = 0; $i < 5; $i++)

                                @if($i<4)

                                    <img class="star" src="{{ asset('img/star.png') }}" alt="">

                                @else

                                    <img class="star" src="{{ asset('img/star-0.png') }}" alt="">

                                @endif

                            @endfor
                        </p>
                    </div>
                    <div class="col-4 text-center">
                        <h6 class="text-secondary font-weight-bold ml-1">ВРЕМЯ ОЖИДАНИЯ</h6>
                        <p>

                            @for($i = 0; $i < 5; $i++)

                                @if($i<4)

                                    <img class="star" src="{{ asset('img/star.png') }}" alt="">

                                @else

                                    <img class="star" src="{{ asset('img/star-0.png') }}" alt="">

                                @endif

                            @endfor
                        </p>
                    </div>
                    <p class="text-secondary text-center">Отзывы о врачах могут оставлять пациенты записавшиеся через сервис DOC+.
                        Каждый отзыв проходит тщательную проверку, что позволяет избежать заказныъ и рекламных отзывов.</p>
                    <p>
                </div>
                <div class="row">

                    <div  class="col-4 text-center">
                        <h6 class="text-secondary font-weight-bold ml-1">ВНИМАТЕЛЬНОСТЬ</h6>
                        <p>

                            @for($i = 0; $i < 5; $i++)

                                @if($i<4)

                                    <img class="star" src="{{ asset('img/star.png') }}" alt="">

                                @else
                                    <img class="star" src="{{ asset('img/star-0.png') }}" alt="">
                                @endif

                            @endfor
                        </p>
                    </div>
                    <div class="col-4 text-center">
                        <h6 class="text-secondary font-weight-bold ml-1">МАНЕРЫ</h6>
                        <p>
                            @for($i = 0; $i < 5; $i++)

                                @if($i<4)

                                    <img class="star" src="{{ asset('img/star.png') }}" alt="">

                                @else

                                    <img class="star" src="{{ asset('img/star-0.png') }}" alt="">

                                @endif

                            @endfor
                        </p>
                    </div>
                    <div class="col-4 text-center">
                        <h6 class="text-secondary font-weight-bold ml-1">ВРЕМЯ ОЖИДАНИЯ</h6>
                        <p>

                            @for($i = 0; $i < 5; $i++)

                                @if($i<4)

                                    <img class="star" src="{{ asset('img/star.png') }}" alt="">

                                @else

                                    <img class="star" src="{{ asset('img/star-0.png') }}" alt="">

                                @endif

                            @endfor
                        </p>
                    </div>
                    <p class="text-secondary text-center">Отзывы о врачах могут оставлять пациенты записавшиеся через сервис DOC+.
                        Каждый отзыв проходит тщательную проверку, что позволяет избежать заказныъ и рекламных отзывов.</p>
                    <p>
                </div>
                <div class="row">

                    <div  class="col-4 text-center">
                        <h6 class="text-secondary font-weight-bold ml-1">ВНИМАТЕЛЬНОСТЬ</h6>
                        <p>

                            @for($i = 0; $i < 5; $i++)

                                @if($i<4)

                                    <img class="star" src="{{ asset('img/star.png') }}" alt="">

                                @else
                                    <img class="star" src="{{ asset('img/star-0.png') }}" alt="">
                                @endif

                            @endfor
                        </p>
                    </div>
                    <div class="col-4 text-center">
                        <h6 class="text-secondary font-weight-bold ml-1">МАНЕРЫ</h6>
                        <p>
                            @for($i = 0; $i < 5; $i++)

                                @if($i<4)

                                    <img class="star" src="{{ asset('img/star.png') }}" alt="">

                                @else

                                    <img class="star" src="{{ asset('img/star-0.png') }}" alt="">

                                @endif

                            @endfor
                        </p>
                    </div>
                    <div class="col-4 text-center">
                        <h6 class="text-secondary font-weight-bold ml-1">ВРЕМЯ ОЖИДАНИЯ</h6>
                        <p>

                            @for($i = 0; $i < 5; $i++)

                                @if($i<4)

                                    <img class="star" src="{{ asset('img/star.png') }}" alt="">

                                @else

                                    <img class="star" src="{{ asset('img/star-0.png') }}" alt="">

                                @endif

                            @endfor

                        </p>
                    </div>
                    <p class="text-secondary text-center">Отзывы о врачах могут оставлять пациенты записавшиеся через сервис DOC+.
                        Каждый отзыв проходит тщательную проверку, что позволяет избежать заказныъ и рекламных отзывов.</p>
                    <p>
                </div>

            </div>
        </div>

    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3 px-6">
                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal" >
                    Оставить Отзыв
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="form" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-secondary" id="exampleModalLabel">Оставьте свой отзыв.</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div>
                                <div class="modal-body">
                                    <form class="text-secondary">
                                        <div class="form-group">
                                            <label for="massage-text" class="col-form-label ">
                                                Ваша оценка врачу:
                                                @for($i = 0; $i < 5; $i++)

                                                    <img class="star" src="{{ asset('img/star-1.png') }}" alt="">

                                                @endfor
                                                <p class="mt-3">
                                                    Отзыв о враче:
                                                </p>
                                            </label>
                                            <textarea class="form-control h6" id="message-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam beatae delectus dolorum eligendi, et excepturi exercitationem expedita explicabo fugiat illum incidunt quam quasi quos temporibus. Eius et nam rem?</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Введите ваше имя:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>

                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Введите ваш телефон:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <p class=" h6">*на указанный вами номер будет отправлено SMS с кодом подтверждения</p>
                                        <div class="row">
                                            <div class="col-8">
                                                <p>Doc+ не публкует отзывы, которые содержат оскорбления и ненормативную лексику</p>
                                                <p><a href="/" class="text-primary"><i>Как мы собираем отзывы</i></a></p>
                                            </div>
                                            <div class="col-4">
                                                <button type="button" class="btn btn-outline-success my-4">Send message</button>
                                            </div>
                                        </div>

                                    </form>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
