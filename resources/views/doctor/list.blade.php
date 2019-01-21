@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @for($i = 0; $i < 6; $i++)

                <div class="col-4 cards">
                    @include('doctor.single')
                </div>

            @endfor
        </div>
    </div>

@endsection

@push('styles')
    <style>
        .cards {
            margin: 20px 0px;
        }
        </style>
@endpush
