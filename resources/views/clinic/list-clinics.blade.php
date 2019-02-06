
            <div class="col-8 border-top border-bottom bg-white">
                <div class="row">
                    <div class="col-5 img-fluid text-center">
                        <img class="rounded w-100 pt-3" src="{{ asset('img/teeth.png') }}" alt="">

                        @for($j = 0; $j < 5; $j++)

                            <img class="rounded py-3 pr-1" src="{{ asset('img/star.png') }}" alt="">

                        @endfor
                    </div>
                    <div class="col-7 text-secondary ">
                        <h1><strong>Он клиник</strong></h1>
                        <p class="text-uppercase font-weight-bold">Мединцинский центр <br> <span class="h5">Первичная стоимость приёма - низкая</span></p>
                        <p class="pt-2">
                            Группа «Он Клиник» – это сеть универсальных лечебно-диагностических центров семейного типа, в которых ведут
                            прием больше 600 специалистов 60 ключевых мединцинских специалистов. Два десятилетия плодотворной работы дали возможность приобрести
                            огромный опыт.
                            <a href="/">
                                <img class="rounded" src="{{ asset('img/arrow.png') }}" alt="">
                            </a>
                        </p>
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
                        <button type="button" class="btn btn-lg btn-info text-light font-weight-bold mb-4 shadow text-uppercase h4 py-1" style="border-radius: 50px;">
                            Записаться
                        </button>
                    </div>
                </div>
            </div>

