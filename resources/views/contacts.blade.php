@extends('layouts.app')

@push('metatags')
    <meta name="keywords" content="врачи, клиники, услуги, диагностика">
    <meta name="description" content="Docplus.kg - сборник врачей, клиник, услуг и диагностик">
    <title>Docplus.kg</title>
@endpush

@section('content')


    <div class="container">
        <div class="row">
            @include('_partials.phone-input')
        </div>
    </div>


@endsection


