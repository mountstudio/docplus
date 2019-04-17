<div class="row align-items-center my-4 border shadow p-md-3 py-3">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-5 text-center">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8">
                            @include('_partials.like', ['type' => 'Doctor', 'model' => $doctor])
                            <img class="img-fluid rounded-circle mb-2 img-thumbnail" src="{{ $doctor->pics->first() && file_exists(public_path('uploads/'.$doctor->pics->first()->image)) ? asset('uploads/'.$doctor->pics->first()->image) : asset('img/noavatar.png') }}" alt="">
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        @include('_partials.stars', ['id' => $doctor->id.'-doctor'])
                    </div>
                    <p class="text-muted font-weight-light mt-3 mb-0 small d-md-block d-none">Рейтинг клиники на основе {{$doctor->feedbacks->count()}} отзывов</p>
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
                    <p class="text-secondary font-weight-light m-0 mb-md-2">
                        Приём от
                        @if($doctor->discount)
                            <span class="text-doc2 font-weight-bold"><del>{{ $doctor->price ?? '1400' }}</del></span>
                            <span>{{ round($doctor->price - $doctor->price * $doctor->discount / 100) }} сом</span>
                        @else
                            <span class="text-doc2 font-weight-bold">{{ $doctor->price ?? '1400' }} сом</span>
                        @endif
                        <i class="fas fa-exclamation-circle"  data-toggle="tooltip" data-placement="top" title="Скидка указана за первое посещение врача"></i>
                    </p>


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
                    {{$doctor->address}}
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


