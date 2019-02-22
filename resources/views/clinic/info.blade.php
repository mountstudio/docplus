<div class="container justify-content-center">

    <!-- img -->
    <div class="row py-4">
        <div class="col-9">
            <div class="row">
                <div class="col-12 col-md-4 text-center ">
                    <img class="img-fluid" src="{{ asset('img/mobile-doctor.png') }}" alt="">
                    <div class="row justify-content-center">
                        @include('_partials.stars')
                    </div>
                    <p class="text-secondary text-uppercase py-2">60 отзывов</p>
                </div>

                <div class="col-8 d-none d-md-block">
                    <!--<img class="" src="{{ asset('img/cabinet-clinic.png') }}" alt="">-->

                    @include('_partials.slider')

                </div>
            </div>
        </div>

    </div>

    <!-- secondary line -->
    <div class="row bg-secondary pt-1 my-3"></div>


    <!-- adress form and contacts-->
    <div class="row pt-3">
        <div class="col-12 col-md-8">
            <p class="text-secondary">
            <h5>О клинике</h5>
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A cumque deserunt dolorem, in incidunt inventore ipsa ipsum nam obcaecati officia officiis placeat possimus quaerat quisquam, repudiandae tempora tempore ut vitae.</div><div>Consectetur ex iure magnam voluptas voluptatum. A beatae blanditiis dolore, ducimus eos facere hic iusto laboriosam maiores maxime, minus necessitatibus nesciunt, nihil odit praesentium quas quia quod repellendus sapiente voluptatibus?</div>
            </p>

            <p class="text-secondary">
            <h5>Специализация</h5>
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam cum deserunt dolores doloribus esse explicabo, magni modi praesentium reprehenderit? Cumque distinctio dolorum excepturi fuga iure laudantium libero nostrum repellat.</div><div>Accusamus impedit ipsum nulla repudiandae sequi sint sunt. Accusantium aliquam corporis culpa delectus distinctio dolorem eaque earum fugiat incidunt ipsum libero minus nobis, odio perspiciatis rerum sequi temporibus tenetur vel.</div>
            </p>
        </div>
        <div class="col-12 col-md-4">
            <div class="row">
                <div class="col-2 py-3">
                    <img class="img-size pt-3" src="{{ asset('img/marker.png') }}" alt="">
                </div>
                <div class="col-10 text-secondary  py-3">
                    <p class="h6">
                        г. Москва, Цветной б-р, д. 30, корп. 2 Цветной бульвар (390 м), Трубная(540м), Сухаревская(920м)
                    </p>
                </div>
                <div class="col-2 py-3">
                    <img class="img-size pt-3" src="{{ asset('img/clock.png') }}" alt="">
                </div>
                <div class="col-10 text-secondary  py-3">
                    <p class="h6">
                        <span>пн-пт:     08:00-21:00</span><br>
                        <span>сб:     08:00-21:00</span><br>
                        <span>вс:     08:00-21:00</span>
                    </p>
                </div>
                <div class="col-2 py-3">
                    <img class="img-size pt-3" src="{{ asset('img/phone.png') }}" alt="">
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
    </div>

    <div class="row py-3 d-none d-md-block">

        @for($j = 0; $j < 2; $j++)


            <p class="text-secondary h4 pt-4">Цены на диагностические услуги</p>

            <div class="col-12 pr-1 py-2">
                @for($i = 0; $i < 5; $i++)

                    <a class="btn btn-secondary" href="">Гастроскопия</a>

                @endfor
            </div>
            <div class="col-12">
                @for($i = 0; $i < 5; $i++)

                    <a class="btn btn-secondary" href="">Гастроскопия</a>

                @endfor
            </div>


        @endfor





    </div>

</div>
