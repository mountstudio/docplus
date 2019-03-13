@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <h2>Результаты поиска</h2>
        </div>
        <div class="row">
            <div class="col-12">
                @include('_partials.search-result-ajax')
            </div>
        </div>
    </div>
@stop