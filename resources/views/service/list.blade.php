@extends('layouts.app')

@push('metatags')
    <meta name="keywords" content="врачи, клиники, услуги, диагностика">
    <meta name="description" content="Docplus.kg - сборник врачей, клиник, услуг и диагностик">
    <title>Docplus.kg</title>
@endpush

@section('content')

    <div class="container-fluid py-5 position-relative" style="background-image: url('{{ asset('img/service.png') }}'); background-size: cover; background-position: center center">
        <div class="backdrop"></div>
        <div class="row py-5 justify-content-center">
            <div class="col-12 py-5">
                <h1 class="text-uppercase text-white text-center">Найдите нужную вам Услугу</h1>
            </div>
            <div class="col-12 col-md-6 ">
                @include('_partials.search')
            </div>
        </div>
    </div>

    <div class="container">

       @include('_partials.service-tabs')

    </div>



@endsection


@push('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
@endpush
