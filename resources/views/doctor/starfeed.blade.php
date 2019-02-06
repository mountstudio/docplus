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
