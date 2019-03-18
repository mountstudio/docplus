<div class="row align-items-center justify-content-center my-4 border shadow p-md-3 py-3">
    <div class="col-12 col-lg-auto">
        <div class="row ">
            <div class="col-12 col-md-5 text-center">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        @include('_partials.like', ['type' => 'Doctor', 'model' => $doctor])
                        <img class="img-card-doctors_clinics rounded-circle mb-2 img-thumbnail" src="{{ $doctor->pics->first() ? asset('uploads/'.$doctor->pics->first()->image) : asset('img/doctor.jpg') }}" alt="">
                    </div>
                </div>

                <div class="row justify-content-center">
                    @include('_partials.stars', ['id' => $doctor->id.'-doctor'])
                </div>
                <p class="text-muted font-weight-light mb-0 small">Рейтинг врача на основе {{count($doctor->feedbacks)}} отзывов-(ва)</p>
                {{--<div class="row justify-content-center mt-3">--}}
                    {{--@include('_partials.stars', ['id' => $doctor->id.'-prof'])--}}
                {{--</div>--}}
                {{--<p class="text-muted font-weight-light mb-0 small">Профессиональный рейтинг врача</p>--}}
            </div>
            <div class="col col-md-auto mt-3 mt-md-0
">
                <a href="{{ route('doctor.show', $doctor->id) }}">
                    <h3 class="text-secondary text-center text-md-left h2 mt-3 mt-md-0">{{ $doctor->name ?? 'Бобров Василий Елисеевич' }}</h3>
                </a>
                <p class="text-secondary font-weight-light">
                        @if(isset($doctor))
                            {{ $doctor->specs->implode('name', ', ') }}
                        @else
                            Гастроэнтеролог, Терапевт
                        @endif
                        <br> Стаж <span class="font-weight-bold h5">19</span> лет
                </p>
                <p class="text-secondary font-weight-light">Профессиональный рейтинг - <span class="font-weight-bold h5">{{ $doctor->prof_rating }}</span></p>
                <p class="text-secondary font-weight-light m-0 mb-md-2">
                    Приём от
                    <span class="text-primary font-weight-bold">{{ $doctor->price ?? '1400' }} руб.</span>
                    <i class="fas fa-exclamation-circle"></i>
                </p>
                <p class="text-secondary font-weight-light m-0 mb-md-2">
                    Телефон для записи: <br>
                    <span class="font-weight-bold h5">+996 (777) 777-777</span>
                </p>
                <p class="text-secondary font-weight-light small m-0">На прошлой неделе записалось два человека</p>

            </div>
        </div>
    </div>

    <div class="col-12 col-lg-3">
        <p class="text-secondary small">
            Сервис DOCPlus поможет вам выбрать необходимую медицинскую услугу из широкого спектра
            предоставленных а сайте и записаться в клинику.
        </p>


        <div class="row justify-content-center">
            <button data-toggle="modal" data-target="#recModal" class="btn btn-lg btn-info text-light font-weight-bold my-2 shadow text-uppercase h4 py-1 border-bottom" style="border-radius: 50px;">
                Записаться
            </button>
        </div>

        <div class="modal fade" id="recModal" tabindex="-1" role="form" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-secondary" id="exampleModalLabel">Введите свои данные</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div>
                        <div class="modal-body">
                            <form class="text-secondary" action="{{ route('record.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Введите ваше имя:</label>
                                    <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Ваше имя" value="{{ Auth::check() ? Auth::user()->name : '' }}" required {{ Auth::check() ? 'disabled' : '' }}>
                                    @auth
                                        <input type="hidden" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                                    @endauth
                                </div>
                                <input type="hidden" name="doctor_id" id="doctor_id" value="{{ $doctor->id }}">

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Введите ваш телефон:</label>
                                    <input type="tel" name="phone_number" class="form-control" placeholder="Номер телефона">
                                </div>
                                <p class=" h6">*на указанный вами номер будет отправлено SMS с кодом подтверждения</p>
                                <div class="row">
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-outline-success my-4">Отправить</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


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


