<div class="row justify-content-center">
    <div class="btn-group d-none d-md-inline-flex" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-primary">Популярные</button>
        <button type="button" class="btn btn-primary">Рейтинг</button>
        <a href="{{ request()->fullUrlWithQuery(['price' => $price]) }}" class="btn btn-primary">Стоимость</a>
        <a href="{{ request()->fullUrlWithQuery(['feeds' => $feeds]) }}" class="btn btn-primary">Отзывы</a>
    </div>
    <div class="btn-group btn-group-vertical d-md-none" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-primary">Популярные</button>
        <button type="button" class="btn btn-primary">Рейтинг</button>
        <a href="{{ request()->fullUrlWithQuery(['price' => $price]) }}" class="btn btn-primary">Стоимость</a>
        <a href="{{ request()->fullUrlWithQuery(['feeds' => $feeds]) }}" class="btn btn-primary">Отзывы</a>
    </div>

</div>
