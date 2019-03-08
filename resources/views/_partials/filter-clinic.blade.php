<div class="row  justify-content-center">
    <div class="btn-group d-none {{--d-md-inline-flex--}}" role="group" aria-label="Basic example">
        <a href="{{ request()->fullUrlWithQuery(['child' => $child]) }}" class="btn btn-primary {{ $child ?: 'active' }}"><i class="fas fa-baby"></i> Детские клиники</a>
        <a href="{{ request()->fullUrlWithQuery(['fullDay' => $fullDay]) }}" class="btn btn-primary {{ $fullDay ?: 'active' }}"><i class="fas fa-clock"></i> Круглосуточно</a>
    </div>
</div>

<div class="row">
    <!-- Button trigger modal -->
    <div class="col-auto mx-2">
        <a href="" class="" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-poll-h fa-2x float-left"></i>
        </a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Настройка поиска</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="{{ route('clinic.index') }}" method="get">
                    <div class="modal-body">
                    <span class="h5">
                        Прочее
                    </span>
                        <div class="form-check">
                            <input class="form-check-input" name="child" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                <i class="fas fa-baby"></i> Детский
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="allDay" type="checkbox" value="" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                <i class="fas fa-ambulance"></i> Круглосуточно
                            </label>
                        </div>
                        <hr>

                        <span class="h5">
                        Сортировка по:
                    </span>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="filter" id="exampleRadios2" value="popularity">
                            <label class="form-check-label" for="exampleRadios2">
                                Популярные
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="filter" id="exampleRadios2" value="rating">
                            <label class="form-check-label" for="exampleRadios2">
                                Рейтинг
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="filter" id="exampleRadios2" value="feeds">
                            <label class="form-check-label" for="exampleRadios2">
                                Отзывы
                            </label>
                        </div>

                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Применить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
