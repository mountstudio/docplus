<div class="row  justify-content-center d-none d-md-inline-flex">
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{ request()->fullUrlWithQuery(['child' => $child]) }}" class="btn btn-primary {{ $child ?: 'active' }}"><i class="fas fa-baby"></i> Детский</a>
        <a href="{{ request()->fullUrlWithQuery(['home' => $home]) }}" class="btn btn-primary {{ $home ?: 'active' }}"><i class="fas fa-ambulance"></i> На дом</a>
    </div>
</div>
<div class="row">
    <!-- Button trigger modal -->
   <div class="col-auto mx-2">
       <a href="" class="d-md-none" data-toggle="modal" data-target="#exampleModal">
           <i class="fas fa-poll-h fa-2x float-left"></i>
       </a>
   </div>

    <!-- Modal -->
    <div class="modal fade d-md-none" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Настройка поиска</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>



                <div class="modal-body">
                    <span class="h5">
                        Прочее
                    </span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            <i class="fas fa-baby"></i> Детский
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            <i class="fas fa-ambulance"></i> На дом
                        </label>
                    </div>
                    <hr>

                    <span class="h5">
                        Сортировка по:
                    </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Популярные
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Рейтинг
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Стоимость
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Отзывы
                        </label>
                    </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Применить</button>
                </div>
            </div>
        </div>
    </div>

</div>




