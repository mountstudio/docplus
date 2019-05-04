@extends('layouts.app')
<style>
    .wrapper {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        justify-content: center;
    }
    .xpandable-block {
        height: 150px;
        overflow: hidden;
        order: 0;
    }
    .xpand-button {
        order: 1;
    }
    input[type="checkbox"] {
        display: none;
    }
    input[type="checkbox"]:checked + .xpandable-block {
        height: auto;
    }
    label {
        order: 1;
        color: blue;
        text-decoration: underline;
        font-size: 18px;
        cursor: pointer;
    }
</style>

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-md-6 py-5">
                @include('_partials.search')
            </div>

        </div>

        <div class="row">
            <div class="col-9 text-secondary">
                <h2 class="font-weight-bold">{{ $service->name }} в Бишкеке</h2>
                <p class="h4 pt-3">
                    <b>{{ $service->name }} :<br>цены, адреса и запись онлайн</b>
                </p>
                <div class="pt-3 pb-0 wrapper">
                    <label class="text-secondary" style="text-decoration: none;" for="button">Показать / скрыть</label>
                    <input type="checkbox" id="button">
                <div class="xpandable-block">
                  <p class="text-secondary">{!! $service->description !!}</p>
                </div>
                </div>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @if($doctors->count() != 0)
                    <li class="nav-item">
                        <a class="nav-link active" id="doctor-tab" data-toggle="tab" href="#doctor" role="tab"
                           aria-controls="doctor" aria-selected="true">Доктора</a>
                    </li>
                @endif
                @if($clinics->count() != 0 && $doctors->count() === 0)
                    <li class="nav-item">
                        <a class="nav-link active" id="clinic-tab" data-toggle="tab" href="#clinic" role="tab"
                           aria-controls="clinic" aria-selected="true">Клиники</a>
                    </li>
                @elseif($clinics->count() != 0)
                    <li class="nav-item">
                        <a class="nav-link" id="clinic-tab" data-toggle="tab" href="#clinic" role="tab"
                           aria-controls="clinic" aria-selected="true">Клиники</a>
                    </li>
                @endif
            </ul>
            <div class="col-12">

                <div class="tab-content" id="myTabContent">
                    @if($doctors->count() != 0)
                        <div class="tab-pane fade active show" id="doctor" role="tabpanel" aria-labelledby="doctor-tab">
                            <div class="row">
                                <div class="col-auto">
                                    @include('_partials.filters.doctor_filter')
                                </div>
                                <div class="col">
                                    @foreach($doctors as $doctor)
                                        @include('doctor.card')
                                    @endforeach
                                    @if($doctors instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                        <div class="row">
                                            <div class="col-4 pt-3">
                                                {{ $doctors->appends(request()->query())->links() }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($clinics->count() != 0)
                        <div class="tab-pane fade" id="clinic" role="tabpanel" aria-labelledby="clinic-tab">
                            <div class="row">
                                <div class="col-auto">
                                    @include('_partials.filters.clinic_filter')
                                </div>
                                <div class="col">
                                    @foreach($clinics as $clinic)
                                        @include('clinic.card')
                                    @endforeach
                                    @if($clinics instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                        <div class="row">
                                            <div class="col-4 pt-3">
                                                {{ $clinics->appends(request()->query())->links() }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
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
@endpush
