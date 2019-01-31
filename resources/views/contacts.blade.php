@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-6 pr-0">
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
                    <img class="flex-shrink-1 size-toggle my-5" src="{{ asset('img/dropdown-toggle.png') }}" alt="">
                </div>

            </div>
            <div class="col-6">
                <button type="button" class="btn btn-primary h3 position-relative my-5">Найти</button>
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
                <nav class="nav">
                    <a class="nav-link btn btn-outline-secondary" href="#">Популярное</a>
                    <a class="nav-link btn btn-outline-secondary" href="#">Рейтинг</a>
                    <a class="nav-link btn btn-outline-secondary" href="#">Отзывы</a>
                    <a class="nav-link btn btn-outline-secondary" href="#">Стаж</a>
                    <a class="nav-link btn btn-outline-secondary" href="#">Стоимость</a>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8">
                
            </div>
        </div>
    </div>

@endsection
