<div class="container">
    <div class="row justify-content-center mt-5 mb-3">
        <div class="col-auto">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary">Популярные</button>
                <button type="button" class="btn btn-primary">Рейтинг</button>
                <a href="{{ request()->fullUrlWithQuery(['price' => $price]) }}" class="btn btn-primary">Стоимость</a>
                <a href="{{ request()->fullUrlWithQuery(['feeds' => $feeds]) }}" class="btn btn-primary">Отзывы</a>
            </div>
        </div>
    </div>
</div>