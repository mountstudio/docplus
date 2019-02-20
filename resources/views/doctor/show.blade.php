@extends('layouts.app')

@section('content')

    <div class="container border-bottom border-secondary">
        @include('_partials._head_rec')
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-5 text-center">

                        <div class="position-relative">
                            @auth
                                <img class="position-absolute rounded-circle img-thumbnail like m-2" src="{{ asset('img/heart-0.png') }}" alt="">
                            @endauth
                            <img class="img-fluid rounded-circle mb-2 img-thumbnail " src="{{ asset('img/doctor.jpg') }}" alt="">
                        </div>

                        @for($i = 0; $i < 5; $i++)

                            <img class="star" src="{{ asset('img/star.png') }}" alt="">

                        @endfor
                        <p class="text-secondary mt-3">Превосходный врач<br>на основе 171 отзыв</p>
                    </div>

                    <div class="col">
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
                @for($i = 0; $i < 3; $i++)
                    @include('doctor.starfeed')
                @endfor

                @for($i = 0; $i < 5; $i++)
                    @include('doctor.feedback')
                @endfor


        </div>
            <div class="col">
                @include('_partials.right-sidebar')
            </div>
        </div>

    </div>

    @include('_partials.form-feedback')


@endsection


@push('scripts')
    <script src="{{ asset('js/imask.js') }}"></script>
    {{--<script>--}}

        {{--var regExpMask = new IMask(--}}
            {{--document.getElementById('regexp-mask'),--}}
            {{--{--}}
                {{--mask: /^\+996\s\(\d{3}\)\s\d{3}\-\d{3}$/--}}
            {{--});--}}

    {{--</script>--}}

@endpush
