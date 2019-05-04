<form action="{{ $route ?? route('doctor.index') }}" class="border pt-3 shadow my-4 text-center" method="get">
<div class="row justify-content-center px-4">
        <span class="h5 col">
            Фильтр по:
        </span>
        <div class="col">
            <input class="form-check-input" name="child" type="checkbox" id="defaultCheck1" {{ $child ? 'checked' : '' }}>
            <label class="form-check-label" for="defaultCheck1">
                Детский
            </label>
        </div>
        <div class="col border-right">
            <input class="form-check-input" name="home" type="checkbox" id="defaultCheck2" {{ $home ? 'checked' : '' }}>
            <label class="form-check-label" for="defaultCheck2">
                На дом
            </label>
        </div>

        <span class="h5 col">
            Сортировка по:
        </span>
        <div class="form-check col">
            <input class="form-check-input" type="radio" name="filter" id="exampleRadios1" value="popularity" {{ $filter === 'popularity' ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleRadios1">
                Популярные
            </label>
        </div>
        <div class="form-check col">
            <input class="form-check-input" type="radio" name="filter" id="exampleRadios2" value="rating" {{ $filter === 'rating' ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleRadios2">
                Рейтинг
            </label>
        </div>
        <div class="form-check col">
            <input class="form-check-input" type="radio" name="filter" id="exampleRadios3" value="price" {{ $filter === 'price' ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleRadios3">
                Стоимость
            </label>
        </div>
        <div class="form-check col">
            <input class="form-check-input" type="radio" name="filter" id="exampleRadios4" value="feeds" {{ $filter === 'feeds' ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleRadios4">
                Отзывы
            </label>
        </div>
</div>
    <button type="submit" class="btn btn-success rounded-0 my-3">Применить</button>
</form>
