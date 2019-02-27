<div class="row justify-content-center">
    <div class="btn-group d-none d-md-inline-flex" role="group" aria-label="Basic example">
        <a href="{{ route('clinic.index', ['popular' => $popular]) }}" class="btn btn-primary">Популярные</a>
        <a href="{{ route('clinic.index', ['rating' => $rating]) }}" class="btn btn-primary">Рейтинг</a>
        <a href="{{ route('clinic.index', ['feeds' => $feeds]) }}" class="btn btn-primary">Отзывы</a>
    </div>
    <div class="btn-group btn-group-vertical d-md-none" role="group" aria-label="Basic example">
        <a href="{{ route('clinic.index', ['popular' => $popular]) }}" class="btn btn-primary">Популярные</a>
        <a href="{{ route('clinic.index', ['rating' => $rating]) }}" class="btn btn-primary">Рейтинг</a>
        <a href="{{ route('clinic.index', ['feeds' => $feeds]) }}" class="btn btn-primary">Отзывы</a>
    </div>
</div>
