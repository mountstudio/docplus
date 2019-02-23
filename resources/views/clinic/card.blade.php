<div class="row justify-content-center my-4 border shadow p-md-4 py-3">
    <div class="col-12 col-md-7">
        <div class="row">
            <div class="col-5 text-center">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8">
                        @auth
                            <img class="position-absolute rounded-circle img-thumbnail like" src="{{ asset('img/heart-0.png') }}" alt="">
                        @endauth
                        <img class="img-fluid rounded-circle mb-2 img-thumbnail" src="{{ $clinic->pics->first() ? asset('uploads/'.$clinic->pics->first()->image) : asset('img/doctor.jpg') }}" alt="">
                    </div>
                </div>

                <div class="row justify-content-center">
                    @include('_partials.stars', ['id' => $clinic->id])
                </div>
                <p class="text-muted font-weight-light mt-3 mb-0 small">Превосходный клиника на основе 171 отзыв</p>
            </div>
            <div class="col-7">
                <a href="{{ route('clinic.show', $clinic->id) }}">
                    <span class="text-secondary h3 mt-5 mb-2">{{ $clinic->name ?? 'Бобров Василий Елисеевич' }}</span>
                </a>
                <p class="text-secondary font-weight-light h6 my-3"><em>
                        @if(isset($doctor))
                            {{ $doctor->specs->implode('name', ', ') }}
                        @else
                            Гастроэнтеролог, Терапевт
                        @endif
                        <br> Стаж 19 лет</em></p>
                <p class="text-secondary font-weight-light m-0 mt-md-2 mb-lg-3">
                    Приём от
                    <span class="text-primary font-weight-bold">{{ $clinic->price ?? '1400' }} руб.</span>
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

    <div class="col-12 col-md">
        <div class="row">
            <div class="col-auto">
                <p class="text-secondary small">
                    <i class="fas fa-map-marker-alt fa-2x"></i>
                </p>
            </div>
            <div class="col">
                <p class="text-secondary small">
                    г. Москва, Цветной б-р, д. 30, корп 2 Цветной бульвар, Трубная, Сухаревская
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
                <p class="text-secondary small w-50 m-0">
                    пн-пт:         <span class="float-right">08:00 - 21:00</span>
                </p>
                <p class="text-secondary small w-50 m-0">
                    сб:            <span class="float-right">08:00 - 21:00</span>
                </p>
                <p class="text-secondary small w-50 m-0">
                    вс:            <span class="float-right">08:00 - 21:00</span>
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
                <p class="font-weight-bold">+996 (700) 700 - 700</p>
            </div>
        </div>


        <div class="row justify-content-center">
            <button type="button" class="btn btn-lg btn-info text-light font-weight-bold my-2 shadow text-uppercase h4 py-1 border-bottom" style="border-radius: 50px;">
                Записаться
            </button>
        </div>


    </div>

</div>

@push('styles')

    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">

@endpush
@push('scripts')
    <script src="{{ asset('js/rateyo.js') }}"></script>
    @foreach($clinics as $clinic)
        <script>
            $("#rateYo-{{ $clinic->id }}").rateYo({
                rating: "{{ $clinic->rating }}",
                readOnly: true,
                ratedFill: "red",
                starWidth: "20px",
                spacing: "5px"
            });
        </script>
    @endforeach
@endpush