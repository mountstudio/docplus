<div class="row justify-content-center">
    <div class="btn-group d-none d-md-inline-flex" role="group" aria-label="Basic example">
        <a href="{{ route('doctor.index', ['popular' => $popular]) }}" class="btn btn-primary">Популярные</a>
        <a href="{{ route('doctor.index', ['rating' => $rating]) }}" class="btn btn-primary">Рейтинг</a>
        <a href="{{ route('doctor.index', ['price' => $price]) }}" class="btn btn-primary">Стоимость</a>
        <a href="{{ route('doctor.index', ['feeds' => $feeds]) }}" class="btn btn-primary">Отзывы</a>
    </div>
    <div class="btn-group btn-group-vertical d-md-none" role="group" aria-label="Basic example">
        <a href="{{ route('doctor.index', ['popular' => $popular]) }}" class="btn btn-primary">Популярные</a>
        <a href="{{ route('doctor.index', ['rating' => $rating]) }}" class="btn btn-primary">Рейтинг</a>
        <a href="{{ route('doctor.index', ['price' => $price]) }}" class="btn btn-primary">Стоимость</a>
        <a href="{{ route('doctor.index', ['feeds' => $feeds]) }}" class="btn btn-primary">Отзывы</a>
    </div>

</div>
