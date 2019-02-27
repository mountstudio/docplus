@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-12 col-md-8">

                @include('_partials.search')

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p class="text-primary font-weight-bold mt-3 h3">
                    СТОМАТОЛОГИ БИШКЕКА
                    <span class="text-secondary font-weight-light">17</span>
                </p>
            </div>


        </div>
        <div class="row">
            <div class="col-6 my-2 col-md-12">

            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 my-2 col-md-12">
                    @include('_partials.sort-clinic')
                </div>
                <div class="col-6 my-2 col-md-12">
                    @include('_partials.filter-clinic')
                </div>
            </div>
        </div>
    </div>


    <!-- Create table clinics and map -->
    <div class="container my-5">
        @foreach($clinics as $clinic)
            @include('clinic.card')
        @endforeach

        <div class="row">

            <!--for map-->
            <div class="col-2 d-none d-md-block">

            </div>


            <div class="col-4 pt-3 ">
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


@push('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/rateyo.js') }}"></script>
    <script>
        $(".rateYo").rateYo({
            rating: 4,
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px"
        });
    </script>
@endpush



