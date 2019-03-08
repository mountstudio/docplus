<div class="row justify-content-center">
    <div class="btn-group d-none {{--d-md-inline-flex--}}" role="group" aria-label="Basic example">
        <a href="{{ route('doctor.index', ['popular' => $popular]) }}" class="btn btn-primary {{ $popular ?: 'active' }}">Популярные</a>
        <a href="{{ route('doctor.index', ['rating' => $rating]) }}" class="btn btn-primary {{ $rating ?: 'active' }}">Рейтинг</a>
        <a href="{{ route('doctor.index', ['feeds' => $feeds]) }}" class="btn btn-primary {{ $feeds ?: 'active' }}">Отзывы</a>
    </div>

</div>
