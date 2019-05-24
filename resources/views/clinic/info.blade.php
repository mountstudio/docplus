<div class="container justify-content-center">
<!-- img -->
    <div class="container py-5 mb-5">
        <div class="row pt-5">
            <div class="col-12 col-md-4   text-center">
                <div class="row justify-content-center">
                    <div class="col-10 col-md-8">
                        @include('_partials.like', ['type' => 'Clinic', 'model' => $clinic])
                        <img class="img-card-doctors_clinics rounded-circle mb-2 img-thumbnail w-100"
                             src="{{ $clinic->logo && file_exists(public_path('uploads/'.$clinic->logo)) ? asset('uploads/'.$clinic->logo) : asset('img/noavatar.png') }}"
                             alt="">
                    </div>
                </div>

                <div class="row justify-content-center">
                    @include('_partials.stars', ['id' => 'clinic-show'])
                </div>
                <p class="text-muted font-weight-light small">{{count($clinic->feedbacks)}}
                    отзывов-(ва)</p>
                {{--<div class="row justify-content-center mt-3">--}}
                {{--@include('_partials.stars', ['id' => $doctor->id.'-prof'])--}}
                {{--</div>--}}
                {{--<p class="text-muted font-weight-light mb-0 small">Профессиональный рейтинг врача</p>--}}
            </div>
            <div class="col col-md mt-3 mt-md-0">
                <h3 class="text-secondary text-center text-md-left h2 mt-3 mt-md-0 font-weight-bold">{{ $clinic->type ?? '' }} {{ $clinic->clinic_name }}</h3>
                <p class="text-secondary font-weight-light m-0 mb-md-2">
                    Телефон для записи: <br>
                    <span class="font-weight-bold h5">{{ $clinic->phones }}</span>
                </p>
                {{--<a href="#feedbacks" class="text-secondary pt-md-5 d-md-block d-none"><u>Отзывы о клинике</u></a>--}}
                <p class="text-secondary font-weight-light small m-0">На прошлой неделе записалось {{ $clinic->records->count() }} человека</p>

            </div>
            @if($clinic->latitude && $clinic->longtitude)
                <div class="col-12 col-md-4 p-0">
                    <div id="map" style="width: 100%; height: 100%;"></div>
                </div>
            @endif
        </div>
    </div>

<!-- secondary line -->
    <div class="row bg-secondary pt-1 my-3"></div>

    <div class="row pt-3">
        <div class="col-12 col-md-8">
            @if($clinic->description)
                <h5 class="font-weight-bold">О клинике</h5>
                <div>
                    {!! $clinic->description !!}
                </div>
            @endif
            @if(count($specs))
                <div class="mt-5">
                    <h5 class="font-weight-bold">Специализации</h5>
                    @foreach($specs as $spec)
                        <a href="{{ route('clinic.doctor',[$clinic->id, $spec->id]) }}">{{$spec->name}}</a>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="col-12 col-md-4">
            <div class="row">
                <div class="col-auto">
                    <p class="text-secondary small">
                        <i class="fas fa-map-marker-alt fa-2x"></i>
                    </p>
                </div>
                <div class="col">
                    <p class="text-secondary small">
                        {{$clinic->address}}
                    </p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-auto">
                    <p class="text-secondary small">
                        <i class="far fa-clock fa-2x"></i>
                    </p>
                </div>
                <div class="col">
                    <p class="text-secondary small m-0">
                        пн-пт:    <span class="float-right">{{ $clinic->worktimes['weekdays_begin'] }} - {{ $clinic->worktimes['weekdays_end'] }}</span>
                    </p>
                    <p class="text-secondary small m-0">
                        сб:       <span class="float-right">{{ $clinic->worktimes['saturday_begin'] }} - {{ $clinic->worktimes['saturday_end'] }}</span>
                    </p>
                    <p class="text-secondary small m-0">
                        вс:       <span class="float-right">{{ $clinic->worktimes['sunday_begin'] }} - {{ $clinic->worktimes['sunday_end'] }}</span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <p class="text-secondary small">
                        <i class="fas fa-phone fa-2x"></i>
                    </p>
                </div>
                <div class="col">
                    <p class="font-weight-bold">{{$clinic->phones}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button type="button" data-toggle="modal" data-target="#servicerecordModal"
                            class="btn btn-lg btn-info bg-doc text-light font-weight-bold mb-4 shadow text-uppercase h4 py-1"
                            style="border-radius: 50px;">
                        Записаться
                    </button>
                </div>
            </div>
            @include('_partials.modals.service_record_modal')
        </div>
    </div>
</div>
<!-- adress form and contacts-->


@if(count($clinic->services) > 1)
    <div class="container d-none d-md-block my-5">
        <p class="h3 py-4">Цены на диагностические услуги</p>
        <div class="row">
            @foreach($clinic->services as $service)
                <div class="col-6 pr-1">
                    <div class="row">
                        <div class="col-8 text-secondary py-2">
                            <a href="" data-toggle="modal" data-target="#servicerecordModal"
                               class="h4">{{$service->name}}</a>
                        </div>
                        <div class="col-4 py-2">
                            <span class="h4">{{$service->pivot->service_price}} сом</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
<div class="container d-none d-md-block py-4" id="feedbacks">
    <!-- Отзыв -->
    @foreach($feedbacks as $feedback)
        @include('clinic.feedback')
    @endforeach
</div>


@include('_partials.form-feedback-clinic')
<div class="container">
    <p class="text-secondary">Отзывы о врачах могут оставлять пациенты записавшиеся через сервис DOC+.
        Каждый отзыв проходит тщательную проверку, что позволяет избежать заказных и рекламных отзывов.</p>
</div>

@include('_partials.modals.service_record_modal')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/imask.js') }}"></script>
    <script src="{{ asset('js/rateyo.js') }}"></script>
    <script>
        $('#rateYo-clinic-show').rateYo({
            rating: "{!! $clinic->rating !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        })
    </script>
@endpush