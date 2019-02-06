@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-5">
                <div class="btn-group ">
                    <button type="button" class="btn shadow my-5 bg-light rounded dropdown-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Action
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>

                </div>

            </div>
            <div class="col-7">
                <button type="button"   class="btn btn-primary h3 position-relative my-5">Найти</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <p class="text-primary font-weight-bold mt-3 h4">СТОМАТОЛОГИ БИШКЕКА <span class="text-secondary font-weight-light">17</span></p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label mr-4" for="defaultCheck1">
                        Default checkbox
                    </label>
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Default checkbox
                    </label>
                </div>

            </div>


        </div>
        <div class="row">
            <div class="col-auto">
                <p class="pt-3 m-0">СОРТИРОВАТЬ</p>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary">Популярные</button>
                    <button type="button" class="btn btn-primary">Рейтинг</button>
                    <button type="button" class="btn btn-primary">Стоимость</button>
                    <button type="button" class="btn btn-primary">Отзывы</button>

                </div>
            </div>
        </div>
    </div>


<!-- Create table clinics and map -->
    <div class="container my-5">
        <div class="row">
            <div class="col-10" id="table-clinic" style="background-color: #eae6e7;">
                @for($i = 0; $i < 5; $i++)
                <div class="row m-2">


                    @include('clinic.list-clinics')


                </div>
                @endfor
            </div>
            <div class="col-2">

            </div>
            <div class="col-4 pt-3">
                <nav aria-label="...">
                    <ul class="pagination pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#" tabindex="-1">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 font-weight-bold text-secondary h3 pb-5">
                Отзывы о стомотологах в Бишкеке
            </div>

            @include('clinic.reviews')

        </div>
    </div>

@endsection
