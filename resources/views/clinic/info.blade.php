<div class="container justify-content-center">

    <!-- img -->
    <div class="row py-4">
        <div class="col-9">
            <div class="row">
                <div class="col-12 col-md-4 text-center ">
                    <img class="img-fluid" src="{{ $clinic->pics->first() ? asset('uploads/'.$clinic->pics->first()->image) : asset('img/doctor.jpg') }}" alt="">
                    <div class="row justify-content-center">
                        @include('_partials.stars', ['id' => 'clinic-show'])
                    </div>
                    <p class="text-secondary text-uppercase py-2">{{$clinic->feedbacks->count()}} отзывов</p>
                </div>

                <div class="col-8 d-none d-md-block">
                <!--<img class="" src="{{ asset('img/cabinet-clinic.png') }}" alt="">-->

                    @include('_partials.slider')

                </div>
            </div>
        </div>

    </div>

    <!-- secondary line -->
    <div class="row bg-secondary pt-1 my-3"></div>


    <!-- adress form and contacts-->
    <div class="row pt-3">
        <div class="col-12 col-md-8">
            <p class="text-secondary">
            <h5>О клинике</h5>
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A cumque deserunt dolorem, in incidunt
                inventore ipsa ipsum nam obcaecati officia officiis placeat possimus quaerat quisquam, repudiandae
                tempora tempore ut vitae.
            </div>
            <div>Consectetur ex iure magnam voluptas voluptatum. A beatae blanditiis dolore, ducimus eos facere hic
                iusto laboriosam maiores maxime, minus necessitatibus nesciunt, nihil odit praesentium quas quia quod
                repellendus sapiente voluptatibus?
            </div>
            </p>

            <p class="text-secondary">
            <h5>Специализация</h5>
            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam cum deserunt dolores doloribus
                esse explicabo, magni modi praesentium reprehenderit? Cumque distinctio dolorum excepturi fuga iure
                laudantium libero nostrum repellat.
            </div>
            <div>Accusamus impedit ipsum nulla repudiandae sequi sint sunt. Accusantium aliquam corporis culpa delectus
                distinctio dolorem eaque earum fugiat incidunt ipsum libero minus nobis, odio perspiciatis rerum sequi
                temporibus tenetur vel.
            </div>
            </p>
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
            <div class="row">
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-lg btn-info text-light font-weight-bold mb-4 shadow text-uppercase h4 py-1" style="border-radius: 50px;">
                        Записаться
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 d-none d-md-block">
            <p class="h3 py-4">Цены на диагностические услуги</p>
        <div class="row">
        @foreach($clinic->services as $service)
            <div class="col-6 pr-1">
                    <div class="row">
                        <div class="col-8 text-secondary py-2">
                            <span class="h4">{{$service->name}}</span>
                        </div>
                        <div class="col-4 py-2">
                            <span class="h4">{{$service->pivot->service_price}} сом</span>
                        </div>
                    </div>
            </div>
        @endforeach
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