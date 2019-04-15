<div class="row align-items-center my-4 border shadow p-md-3 py-3">
    {{--<div class="col-12 col-lg-auto">--}}
        {{--<div class="row ">--}}
            {{--<div class="col-12 col-md-5 text-center">--}}
                {{--<div class="row justify-content-center">--}}
                    {{--<div class="col-12 col-md-8">--}}
                        {{--@include('_partials.like', ['type' => 'Doctor', 'model' => $doctor])--}}
                        {{--<img class="img-card-doctors_clinics rounded-circle mb-2 img-thumbnail" src="{{ $doctor->pics->first() ? asset('uploads/'.$doctor->pics->first()->image) : asset('img/doctor.jpg') }}" alt="">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="row justify-content-center">--}}
                    {{--@include('_partials.stars', ['id' => $doctor->id.'-doctor'])--}}
                {{--</div>--}}
                {{--<p class="text-muted font-weight-light small">Рейтинг врача на основе {{count($doctor->feedbacks)}} отзывов-(ва)</p>--}}
                {{--<p><a class="text-primary small" href="{{ $doctor->clinic ? route('clinic.show', $doctor->clinic) : '#' }}">{{ $doctor->clinic ? $doctor->clinic->name : '' }}</a></p>--}}
                {{--<div class="row justify-content-center mt-3">--}}
                    {{--@include('_partials.stars', ['id' => $doctor->id.'-prof'])--}}
                {{--</div>--}}
                {{--<p class="text-muted font-weight-light mb-0 small">Профессиональный рейтинг врача</p>--}}
            {{--</div>--}}
            {{--<div class="col col-md-auto mt-3 mt-md-0">--}}
                {{--<a href="{{ route('doctor.show', $doctor->id) }}">--}}
                    {{--<h3 class="text-secondary text-center text-md-left h2 mt-3 mt-md-0">{{ $doctor->fullName ?? 'Бобров Василий Елисеевич' }}</h3>--}}
                {{--</a>--}}
                {{--<p class="text-secondary font-weight-light">--}}
                        {{--@if(isset($doctor))--}}
                            {{--{{ $doctor->specs->implode('name', ', ') }}--}}
                        {{--@else--}}
                            {{--Гастроэнтеролог, Терапевт--}}
                        {{--@endif--}}
                        {{--<br> Стаж <span class="font-weight-bold h5">{{ $doctor->age ?? 19 }}</span> лет--}}
                {{--</p>--}}
                {{--<p class="text-secondary font-weight-light">Профессиональный рейтинг - <span class="font-weight-bold h5">{{ $doctor->prof_rating }}</span></p>--}}
                {{--<p class="text-secondary font-weight-light m-0 mb-md-2">--}}
                    {{--Приём от--}}
                    {{--@if($doctor->discount)--}}
                        {{--<span class="text-doc2 font-weight-bold"><del>{{ $doctor->price ?? '1400' }} сом</del></span>--}}
                        {{--<span>{{ round($doctor->price - $doctor->price * $doctor->discount / 100) }} сом</span>--}}
                    {{--@else--}}
                        {{--<span class="text-doc2 font-weight-bold">{{ $doctor->price ?? '1400' }} сом</span>--}}
                    {{--@endif--}}
                    {{--<i class="fas fa-exclamation-circle"  data-toggle="tooltip" data-placement="top" title="Скидка указана за первое посещение врача"></i>--}}
                {{--</p>--}}
                {{--<p class="text-secondary font-weight-light m-0 mb-md-2">--}}
                    {{--Телефон для записи: <br>--}}
                    {{--<span class="font-weight-bold h5">+996 (777) 777-777</span>--}}
                {{--</p>--}}
                {{--<p class="text-secondary font-weight-light small m-0">На прошлой неделе записалось два человека</p>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}



        <div class="col-12 col-md-8">
            <div class="row align-items-start">
                <div class="col-5 text-center">
                    <div class="position-relative">
                        @include('_partials.like', ['type' => 'Doctor', 'model' => $doctor])
                        <img class="img-fluid rounded-circle mb-2 img-thumbnail" src="{{ $doctor->pics->first() ? asset('uploads/'.$doctor->pics->first()->image) : asset('img/noavatar.png') }}" alt="">
                    </div>
                    <div class="row justify-content-center">
                        @include('_partials.stars', ['id' => $doctor->id.'-doctor'])
                    </div>
                    <p class="text-muted font-weight-light mt-3 mb-0 small">Рейтинг врача на основе {{$doctor->feedbacks->count()}} отзывов</p>
                </div>

                <div class="col">
                    <a href="{{ route('doctor.show', $doctor->id) }}">
                        <p class="text-secondary h3 m-0 mb-md-2 font-weight-bold">{{ $doctor->fullName ?? 'Бобров Василий Елисеевич' }}</p>
                    </a>

                    <p class="text-secondary font-weight-light h6 my-3"><em>
                            @if(isset($doctor))
                                {{ $doctor->specs->implode('name', ', ') }}
                            @else
                                Гастроэнтеролог, Терапевт
                            @endif <br> Стаж {{ $doctor->age ?? 19 }} лет</em></p>
                    <p class="text-secondary font-weight-light m-0 mb-md-2">
                        Приём от
                        @if($doctor->discount)
                            <span class="text-doc2 font-weight-bold"><del>{{ $doctor->price ?? '1400' }} сом</del></span>
                            <span>{{ round($doctor->price - $doctor->price * $doctor->discount / 100) }} сом</span>
                        @else
                            <span class="text-doc2 font-weight-bold">{{ $doctor->price ?? '1400' }} сом</span>
                        @endif
                        <i class="fas fa-exclamation-circle"  data-toggle="tooltip" data-placement="top" title="Скидка указана за первое посещение врача"></i>
                    </p>
                    <p class="text-secondary font-weight-light m-0 mb-md-2">
                        Телефон для записи: <br>
                        <span class="font-weight-bold h5">+996 (777) 777-777</span>
                    </p>


                </div>
            </div>
        </div>



    <div class="col-12 col-lg-3 mt-4">
        <p class="text-secondary small">
            Сервис DOCPlus поможет вам выбрать необходимую медицинскую услугу из широкого спектра
            предоставленных а сайте и записаться в клинику.
        </p>


        {{--<div class="row justify-content-center">--}}
            {{--<button data-toggle="modal" data-target="#doctorrecordModal" class="btn btn-lg bg-doc text-light font-weight-bold my-2 shadow text-uppercase h4 py-1 border-bottom" style="border-radius: 50px;">--}}
                {{--Записаться--}}
            {{--</button>--}}
        {{--</div>--}}

        {{--@include('_partials.modals.doctor_record_modal')--}}


        <p class="text-secondary text-md-left text-center small">
            {{ $doctor->address }}
        </p>


    </div>

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


