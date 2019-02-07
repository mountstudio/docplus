<div class="row m-2">


    <div class="col-8 border-top border-bottom bg-white">
        <div class="row">
            <div class="col-5 img-fluid text-center">
                <img class="rounded w-100 pt-3" src="{{ asset('img/doctor.png') }}" alt="">

                <div class="row justify-content-center mt-3">
                    @for($j = 0; $j < 5; $j++)

                        <div class="col-2 px-0">
                            <img class="img-fluid p-2" src="{{ asset('img/star.png') }}" alt="">
                        </div>

                    @endfor
                </div>
            </div>
            <div class="col-7 text-secondary py-2">
                <h2 class="font-weight-bold">Бобров Василий Елисеевич</h2>
                <p class="text-uppercase small">Гастроэнтеролог, Терапевт
                    Стаж 19 лет <br></p>
                <p class="pt-2">
                    Бобров Василий Елисеевич - врач окулист(офтальмолог), стаж 24 года. Скидка на прием врача! Все отзывы о враче. Запись онлайн или по телефону.

                    др. подробная информация о враче
                </p>
                <a href="/" class="mt-3">
                    <img class="rounded" src="{{ asset('img/arrow.png') }}" alt="">
                </a>
            </div>

        </div>
    </div>
    <div class="col-4 border-top border-bottom border-left bg-white">
        <div class="row">
            <div class="col-2 py-3">
                <img src="{{ asset('img/marker.png') }}" alt="">
            </div>
            <div class="col-10 text-secondary  py-3">
                <p class="h6">
                    г. Москва, Цветной б-р, д. 30, корп. 2 Цветной бульвар (390 м), Трубная(540м), Сухаревская(920м)
                </p>
            </div>
            <div class="col-2 py-3">
                <img src="{{ asset('img/clock.png') }}" alt="">
            </div>
            <div class="col-10 text-secondary  py-3">
                <p class="h6">
                    <span>пн-пт:     08:00-21:00</span><br>
                    <span>сб:     08:00-21:00</span><br>
                    <span>вс:     08:00-21:00</span>
                </p>
            </div>
            <div class="col-2 py-3">
                <img src="{{ asset('img/phone.png') }}" alt="">
            </div>
            <div class="col-10 text-dark  py-4">
                <p class="font-weight-bold h5">

                    +996 (708) 75-75-75

                </p>
            </div>
            <div class="col-12 text-center">
                <button type="button" class="btn btn-lg btn-info text-light font-weight-bold mb-4 shadow text-uppercase h4 py-1">
                    Записаться
                </button>
            </div>
        </div>
    </div>



</div>