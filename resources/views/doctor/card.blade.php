<div class="row align-items-center mb-3 border shadow p-md-3 py-3" id="doctor-card-{{ $doctor->id }}">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-5 text-center">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8">
                            @include('_partials.like', ['type' => 'Doctor', 'model' => $doctor])
                            <a href="{{ route('doctor.show', $doctor->id) }}">
                                <img class="img-fluid rounded-circle mb-2 img-thumbnail" src="{{ $doctor->logo && file_exists(public_path('uploads/'.$doctor->logo)) ? asset('uploads/'.$doctor->logo) : asset('img/noavatar.png') }}" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        @include('_partials.stars', ['id' => $doctor->id.'-doctor'])
                    </div>
                    <p class="text-muted font-weight-light mt-3 mb-0 small d-md-block d-none">{{$doctor->feedbacks->count()}} отзывов-(ва)</p>
                </div>
                <div class="col mt-md-4 mt-0 px-md-0 px-0">
                    <a href="{{ route('doctor.show', $doctor->id) }}">
                        <p class="text-secondary h3 m-0 mb-md-2 font-weight-bold">{{ $doctor->fullName ?? 'Бобров Василий Елисеевич' }}</p>
                    </a>

                    <p class="text-secondary font-weight-light h6 my-3"><em>
                            @if(isset($doctor))
                                {{ $doctor->specs->implode('name', ', ') }}
                            @else
                                Гастроэнтеролог, Терапевт
                            @endif
                            @if($doctor->age)
                            <br> Стаж {{ $doctor->age }} лет
                            @endif
                        </em></p>
                    <p class="text-secondary font-weight-light">Профессиональный рейтинг - <span class="font-weight-bold h5">{{ $doctor->prof_rating }} </span><i class="fas fa-exclamation-circle"  data-toggle="tooltip" data-placement="top" title="Профессиональный рейтинг основан на трех критериях: Стаж, категория, степень."></i></p>

                    @isset($service)
                        <p class="m-0 text-dark font-weight-bold">Услуга: {{ $service->name }}</p>
                    @endisset

                    <p class="text-secondary font-weight-light m-0 mb-md-2">
                        Приём от
                        @if($doctor->discount)
                            <span class="text-doc2 font-weight-bold"><del>{{ $doctor->price ?? '1400' }}</del></span>
                            <span>{{ round($doctor->price - $doctor->price * $doctor->discount / 100) }} сом</span>
                            <i class="fas fa-exclamation-circle"  data-toggle="tooltip" data-placement="top" title="Скидка за первое посещение врача, действует только при записи с сервиса Doc+"></i>
                            <img src="{{ asset('img/doc_logo.png') }}" style="width: 30px; height: auto;" alt="">
                        @else
                            <span class="text-doc2 font-weight-bold">{{ $doctor->price ?? '1400' }} сом</span>
                        @endif

                    </p>


                </div>
            </div>
        </div>
    <hr class="d-lg-none d-block " align="center" width="500" size="2" color="#ff0000" />
            <div class="col-12 col-lg">
                <div class="row">
                    <div class="col-auto">
                        <p class="text-secondary small">
                            <i class="fas fa-map-marker-alt fa-2x"></i>
                        </p>
                    </div>
                    <div class="col">
                <p class="text-secondary small">
                    {{$doctor->address}}
                </p>
            </div>
        </div>
                @if($doctor->phones)
        <div class="row">
            <div class="col-auto">
                <p class="text-secondary small">
                    <i class="fas fa-phone fa-2x"></i>
                </p>
            </div>

            <div class="col">
                <p class="font-weight-bold">{{$doctor->phones}}</p>
            </div>

        </div>
                @endif
                <div class="row">
                    <div class="col-12 text-center">
                        <button type="button" data-toggle="modal" data-target="#doctorrecordModal-{{$doctor->id}}"
                                class="btn btn-lg btn-info bg-doc text-light font-weight-bold mb-4 shadow text-uppercase h4 py-1"
                                style="border-radius: 50px;">
                            Записаться
                        </button>
                    </div>
                </div>
                @include('_partials.modals.doctor_record_modal')

        {{--<div class="row justify-content-center">--}}
        {{--<button type="button" data-toggle="modal" data-target="#servicerecordModal" class="btn btn-lg btn-info bg-doc text-light font-weight-bold my-2 shadow text-uppercase h4 py-1 border-bottom" style="border-radius: 50px;">--}}
        {{--Записаться--}}
        {{--</button>--}}
        {{--</div>--}}

        {{--@include('_partials.modals.service_record_modal')--}}

    </div>

    {{--<div class="container row d-md-none d-block">--}}
        {{--<div class="col-6 text-center">--}}
            {{--<p>Адресс: {{$doctor->address}}</p>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>


@push('styles')

    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">

@endpush
@push('scripts')
    <script src="{{ asset('js/rateyo.js') }}"></script>
        <script>
            $("#rateYo-{{ $doctor->id }}-doctor").rateYo({
                rating: "{{ $doctor->rating }}",
                readOnly: true,
                ratedFill: "red",
                starWidth: "15px",
                spacing: "5px"
            });

            {{--$("#rateYo-{{ $doctor->id }}-prof").rateYo({--}}
                {{--rating: "{{ $doctor->prof_rating }}",--}}
                {{--readOnly: true,--}}
                {{--ratedFill: "red",--}}
                {{--starWidth: "15px",--}}
                {{--spacing: "5px"--}}
            {{--});--}}
        </script>
@endpush


