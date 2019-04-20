<div class="row justify-content-center my-4 border shadow p-md-4 py-3">
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="col-5 text-center">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        @include('_partials.like', ['type' => 'Clinic', 'model' => $clinic])
                        <img class="img-card-doctors_clinics rounded-circle mb-2 img-thumbnail" src="{{ $clinic->logo && file_exists(public_path('uploads/'.$clinic->logo)) ? asset('uploads/'.$clinic->logo) : asset('img/noavatar.png') }}" alt="">
                    </div>
                </div>

                <div class="row justify-content-center">
                    @include('_partials.stars', ['id' => $clinic->id.'-clinic'])
                </div>
                <p class="text-muted font-weight-light mt-3 mb-0 small d-md-block d-none">{{$clinic->feedbacks->count()}} отзывов</p>
            </div>
            <div class="col-7">
                <a href="{{ route('clinic.show', $clinic->id) }}">
                    <span class="text-secondary h3 mt-5 mb-2 font-weight-bold">{{ $clinic->name ?? 'Бобров Василий Елисеевич' }}</span>
                </a>
                <p class="text-secondary font-weight-light h6 my-3"><em>
                        @if($clinic->type)
                            {{$clinic->type}}
                            @endif
                    </em></p>
                <p class="text-secondary font-weight-light small pt-3 d-md-block d-none">На прошлой неделе записалось два человека</p>

            </div>
        </div>
    </div>

    <div class="border-top w-100 d-md-none d-block my-4"></div>
    <div class="col-12 col-md">
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
                    пн-пт:         <span class="float-right">08:00 - 21:00</span>
                </p>
                <p class="text-secondary small m-0">
                    сб:            <span class="float-right">08:00 - 21:00</span>
                </p>
                <p class="text-secondary small m-0">
                    вс:            <span class="float-right">08:00 - 21:00</span>
                </p>
            </div>
        </div>
        @if($clinic->phones)
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
        @endif


        {{--<div class="row justify-content-center">--}}
        {{--<button type="button" data-toggle="modal" data-target="#servicerecordModal" class="btn btn-lg btn-info bg-doc text-light font-weight-bold my-2 shadow text-uppercase h4 py-1 border-bottom" style="border-radius: 50px;">--}}
        {{--Записаться--}}
        {{--</button>--}}
        {{--</div>--}}

        {{--@include('_partials.modals.service_record_modal')--}}

    </div>
</div>

@push('styles')

    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">

@endpush
@push('scripts')
    <script src="{{ asset('js/rateyo.js') }}"></script>
        <script>
            $("#rateYo-{{ $clinic->id }}-clinic").rateYo({
                rating: "{{ $clinic->rating }}",
                readOnly: true,
                ratedFill: "red",
                starWidth: "20px",
                spacing: "5px"
            });
        </script>
@endpush
