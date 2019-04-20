<form action="{{ $route ?? route('doctor.index') }}" class="border pt-3 shadow my-4" method="get">

    <div class="px-3">
        <h5 class="h5">
            Прочее
        </h5>
        <div class="form-check">
            <input class="form-check-input" name="child" type="checkbox" id="defaultCheck1" {{ $child ? 'checked' : '' }}>
            <label class="form-check-label" for="defaultCheck1">
                Детский
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" name="home" type="checkbox" id="defaultCheck2" {{ $home ? 'checked' : '' }}>
            <label class="form-check-label" for="defaultCheck2">
                На дом
            </label>
        </div>
        <hr>

        <h5 class="h5">
            Сортировка по:
        </h5>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="filter" id="exampleRadios1" value="popularity" {{ $filter === 'popularity' ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleRadios1">
                Популярные
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="filter" id="exampleRadios2" value="rating" {{ $filter === 'rating' ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleRadios2">
                Рейтинг
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="filter" id="exampleRadios3" value="price" {{ $filter === 'price' ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleRadios3">
                Стоимость
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="filter" id="exampleRadios4" value="feeds" {{ $filter === 'feeds' ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleRadios4">
                Отзывы
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-success rounded-0 w-100 mt-3">Применить</button>

</form>