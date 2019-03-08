<div class="row justify-content-center my-4 border shadow p-md-4 py-3">
    <div class="col-12 col-lg-9">
        <div class="row">
            <div class="col-5 text-center">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        @auth
                            <a href="#">
                                <img class="position-absolute rounded-circle img-thumbnail like " src="{{ asset('img/heart-0.png') }}" alt="">
                            </a>
                        @elseauth
                            <a href="{{ route('login') }}">
                                <img class="position-absolute rounded-circle img-thumbnail like " src="{{ asset('img/heart-0.png') }}" alt="">
                            </a>
                        @endauth
                        <img class="img-card-doctors_clinics rounded-circle mb-2 img-thumbnail" src="{{ $doctor->pics->first() ? asset('uploads/'.$doctor->pics->first()->image) : asset('img/doctor.jpg') }}" alt="">
                    </div>
                </div>

                <div class="row justify-content-center">
                    @include('_partials.stars', ['id' => $doctor->id.'-doctor'])
                </div>
                <p class="text-muted font-weight-light mt-3 mb-0 small">Рейтинг врача на основе {{count($doctor->feedbacks)}} отзывов-(ва)</p>
            </div>
            <div class="col-7">
                <a href="{{ route('doctor.show', $doctor->id) }}">
                    <span class="text-secondary h3 mt-5 mb-2">{{ $doctor->user->fullName ?? 'Бобров Василий Елисеевич' }}</span>
                </a>
                <p class="text-secondary font-weight-light h6 my-3"><em>
                        @if(isset($doctor))
                            {{ $doctor->specs->implode('name', ', ') }}
                        @else
                            Гастроэнтеролог, Терапевт
                        @endif
                        <br> Стаж 19 лет</em></p>
                <span class="text-secondary">Проф. рейтинг - <strong>{{$doctor->prof_rating}}</strong></span>
                <p class="text-secondary font-weight-light m-0 mt-md-2 mb-lg-3">
                    Приём от
                    <span class="text-primary font-weight-bold">{{ $doctor->price ?? '1400' }} руб.</span>
                    <i class="fas fa-exclamation-circle"></i>
                </p>
                <p class="text-secondary font-weight-light m-0 mt-md-2 mb-lg-3">
                    Телефон для записи: <br>
                    +996(777)777-777
                </p>
                <p class="text-secondary font-weight-light small pt-3">На прошлой неделе записалось два человека</p>

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
    @foreach($doctors as $doctor)
        <script>
            $("#rateYo-{{ $doctor->id }}-doctor").rateYo({
                rating: "{{ $doctor->rating }}",
                readOnly: true,
                ratedFill: "red",
                starWidth: "20px",
                spacing: "5px"
            });
        </script>
    @endforeach
@endpush


