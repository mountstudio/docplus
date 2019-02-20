<div class="container d-none d-md-block py-4">
    <!-- Отзыв -->
    <div class="row ">

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
    <!-- End Отзыв -->

</div>
