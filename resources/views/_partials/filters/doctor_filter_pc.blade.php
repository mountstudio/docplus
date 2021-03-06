<form action="{{ $route ?? route('doctor.index') }}" class="my-4 text-center" method="get">
    <div class="row justify-content-center px-4">
        <div class="col-auto">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary mb-0 {{ $child ? 'active' : '' }}">
                    <input class="form-check-input no-appearance" name="child" type="checkbox" id="defaultCheck1" {{ $child ? 'checked' : '' }}>
                    Детский
                </label>
            </div>
        </div>
        <div class="col-auto">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary mb-0 {{ $home ? 'active' : '' }}">
                    <input class="form-check-input no-appearance" name="home" type="checkbox" id="defaultCheck2" {{ $home ? 'checked' : '' }}>
                    На дом
                </label>
            </div>
        </div>
        <div class="col-auto">
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-primary mb-0 {{ $filter === 'popularity' ? 'active' : '' }}">
                    <input class="form-check-input no-appearance" type="radio" name="filter" id="exampleRadios1" value="popularity" {{ $filter === 'popularity' ? 'checked' : '' }}>
                    Популярные
                </label>
                <label class="btn btn-primary mb-0 {{ $filter === 'rating' ? 'active' : '' }}">
                    <input class="form-check-input no-appearance" type="radio" name="filter" id="exampleRadios2" value="rating" {{ $filter === 'rating' ? 'checked' : '' }}>
                    Рейтинг
                </label>
                <label class="btn btn-primary mb-0 {{ $filter === 'price' ? 'active' : '' }}">
                    <input class="form-check-input no-appearance" type="radio" name="filter" id="exampleRadios3" value="price" {{ $filter === 'price' ? 'checked' : '' }}>
                    Стоимость
                </label>
                <label class="btn btn-primary mb-0 {{ $filter === 'feeds' ? 'active' : '' }}">
                    <input class="form-check-input no-appearance" type="radio" name="filter" id="exampleRadios4" value="feeds" {{ $filter === 'feeds' ? 'checked' : '' }}>
                    Отзывы
                </label>
            </div>
            <button type="submit" class="btn btn-success rounded-0">Применить</button>

        </div>
    </div>

</form>
