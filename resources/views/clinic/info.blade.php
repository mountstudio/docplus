<div class="container justify-content-center">
@include('_partials._head_rec')
    <!-- img -->
    <div class="container py-5">
        <div class="row ">
            <div class="col-12 col-md-4 text-center">
                <div class="row justify-content-center">
                    <div class="col-10 col-md-8">
                        @include('_partials.like', ['type' => 'Clinic', 'model' => $clinic])
                        <img class="img-card-doctors_clinics rounded-circle mb-2 img-thumbnail w-100" src="{{ $clinic->logo && file_exists(public_path('uploads/'.$clinic->logo)) ? asset('uploads/'.$clinic->logo) : asset('img/noavatar.png') }}" alt="">
                    </div>
                </div>

                <div class="row justify-content-center">
                    @include('_partials.stars', ['id' => 'clinic-show'])
                </div>
                <p class="text-muted font-weight-light small">Рейтинг клиник на основе {{count($clinic->feedbacks)}} отзывов-(ва)</p>
                {{--<div class="row justify-content-center mt-3">--}}
                {{--@include('_partials.stars', ['id' => $doctor->id.'-prof'])--}}
                {{--</div>--}}
                {{--<p class="text-muted font-weight-light mb-0 small">Профессиональный рейтинг врача</p>--}}
            </div>
            <div class="col col-md-auto mt-3 mt-md-0">
                <h3 class="text-secondary text-center text-md-left h2 mt-3 mt-md-0 font-weight-bold">{{ $clinic->name }}</h3>
                <p class="text-secondary font-weight-light m-0 mb-md-2">
                    Телефон для записи: <br>
                    <span class="font-weight-bold h5">{{ $clinic->phones }}</span>
                </p>
                <a href="#feedbacks" class="text-secondary pt-md-5 d-md-block d-none"><u>Отзывы о клинике</u></a>
                <p class="text-secondary font-weight-light small m-0">На прошлой неделе записалось два человека</p>

            </div>
            {{--<div class="col-auto d-md-block d-none">--}}
            {{--<div class="row">--}}
            {{--<div class="col-6">--}}
            {{--<p class="mb-0">Степень </p>--}}
            {{--<p class="mb-0">Категория </p>--}}
            {{--<p class="mb-0">Стаж </p>--}}
            {{--<p class="mb-0">Проф.рейтинг</p>--}}
            {{--</div>--}}
            {{--<div class="col-6">--}}
            {{--<div class="mb-1">@include('_partials.stars', ['id' => 'first'])</div>--}}
            {{--<div class="mb-1">@include('_partials.stars', ['id' => 'second'])</div>--}}
            {{--<div class="mb-1">@include('_partials.stars', ['id' => 'third'])</div>--}}
            {{--<div class="mb-1">@include('_partials.stars', ['id' => 'prof_rating'])</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
    {{--<div class="row py-4">--}}
        {{--<div class="col-9">--}}
            {{--<div class="row">--}}
                {{--<div class="col-12 col-md-4 text-center ">--}}
                    {{--<img class="img-fluid rounded-circle mb-2 img-thumbnail" src="{{ $clinic->pics->first() ? asset('uploads/'.$clinic->pics->first()->image) : asset('img/noavatar.png') }}" alt="">--}}
                    {{--<div class="row justify-content-center">--}}
                        {{--@include('_partials.stars', ['id' => 'clinic-show'])--}}
                    {{--</div>--}}
                    {{--<p class="text-secondary text-uppercase py-2">{{$clinic->feedbacks->count()}} отзывов</p>--}}

                {{--</div>--}}

                {{--<div class="col-8 d-none d-md-block">--}}
                {{--<!--<img class="" src="{{ asset('img/cabinet-clinic.png') }}" alt="">-->--}}

                    {{--@include('_partials.slider')--}}
                        {{--<h3 class="ml-5 text-secondary text-center text-md-left h2 mt-3 mt-md-0">{{ $clinic->name ?? 'Бобров Василий Елисеевич' }}</h3>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}

    <!-- secondary line -->
    <div class="row bg-secondary pt-1 my-3"></div>
    <div class="row">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="" data-toggle="tab" href="#information" role="tab" aria-controls="" aria-selected="true">Информация</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="" data-toggle="tab" href="#gallery" role="tab" aria-controls="" aria-selected="true">Галерея</a>
            </li>
        </ul>
    </div>
    <div class="row pt-3">
        <div class="col-12">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            @if($clinic->description)
                                <p class="text-secondary">
                                <h5>О клинике</h5>
                                <div>
                                    {{$clinic->description}}
                                </div>
                                </p>

                                <p class="text-secondary">
                                <h5>Специализация</h5>
                                <div>
                                    {{$clinic->description}}
                                </div>
                                </p>
                            @else
                                <p class="text-secondary">
                                <h5>Информация отсутствует</h5>
                                </p>
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
                                    <p class="font-weight-bold">{{$clinic->phones}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="button" class="btn btn-lg btn-info bg-doc text-light font-weight-bold mb-4 shadow text-uppercase h4 py-1" style="border-radius: 50px;">
                                        Записаться
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-10" style=" padding:12px;">
                                <div class="owl-carousel owl-theme">
                                    @foreach($clinic->pics as $pic)
                                        <div class="item"><img src="{{ asset('uploads/'.$pic->image) }}" alt=""></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    @if(count($clinic->services) > 1)
    <div class="py-3 d-none d-md-block">
            <p class="h3 py-4">Цены на диагностические услуги</p>
        <div class="row">
        @foreach($clinic->services as $service)
            <div class="col-6 pr-1">
                    <div class="row">
                        <div class="col-8 text-secondary py-2">
                            <a href="" data-toggle="modal" data-target="#service" class="h4">{{$service->name}}</a>
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

    <div class="modal fade" id="service" tabindex="-1" role="form" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form class="text-secondary" action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Введите вашу фамилию:</label>
                                <input type="text" name="last_name" class="form-control" id="recipient-name" placeholder="Ваша фамилия" value="{{ Auth::check() ? Auth::user()->last_name : '' }}" required {{ Auth::check() ? 'disabled' : '' }}>
                                @auth
                                    <input type="hidden" name="last_name" class="form-control" value="{{ Auth::user()->last_name }}" required>
                                @endauth
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Введите ваше имя:</label>
                                <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Ваше имя" value="{{ Auth::check() ? Auth::user()->name : '' }}" required {{ Auth::check() ? 'disabled' : '' }}>
                                @auth
                                    <input type="hidden" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                                @endauth
                            </div>
                            <input type="hidden" name="schedule_id" id="schedule_id">

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
</div>
</div>

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