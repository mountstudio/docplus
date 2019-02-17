<div class="row justify-content-center my-4 border">
    <div class="col-12 py-4 shadow">
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col-6 text-center">
                        <div class="position-relative">
                            <img class="img-fluid rounded-circle mb-2 img-thumbnail" src="{{ asset('img/doctor_assistant.png') }}" alt="">
                        </div>

                        @include('_partials.stars')
                        <p class="text-muted font-weight-light mt-3 small">Превосходный врач на основе 171 отзыв</p>
                    </div>
                    <div class="col-6">
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
                        <p class="text-secondary font-weight-light mt-2 mb-5">
                            Приём от
                            <span class="text-primary font-weight-bold">{{ $doctor->price ?? '1400' }} руб.</span>
                            <i class="fas fa-exclamation-circle"></i>
                        </p>
                        <p class="text-secondary font-weight-light mt-2 mb-5">
                            Телефон для записи <br>
                            +996(777)777-777
                        </p>
                        <span class="text-secondary font-weight-light small">На прошлой неделе записалось два человека</span>

                    </div>
                </div>
            </div>

            <div class="col-3">
                <p class="text-secondary" style="font-size: 0.6rem;">
                    Сервис DOCPlus поможет вам выбрать необходимую медицинскую услугу из широкого спектра
                    предоставленных а сайте и записаться в клинику.
                </p>
                <button type="button" class="btn btn-lg btn-info text-light font-weight-bold my-4 shadow text-uppercase h4 py-1 border-bottom" style="border-radius: 50px;">
                    Записаться
                </button>
                <p class="text-secondary text-left" style="font-size: 0.6rem;">
                    Медицинский центр Иван(MCI)
                    Бишкек, ул. Бакча-Ата, д. 45
                    Звенигородская (400м)
                    Лиговский проспект(300м)
                </p>
            </div>
        </div>

    </div>
</div>
