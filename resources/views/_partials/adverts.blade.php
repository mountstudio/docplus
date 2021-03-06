<div class="row">
    <div class="col-12 col-md-4">
        <div class="card border-0 rounded-0">
            <div class="owl-carousel owl-theme">
                <a href="/#1">
                    <img src="{{ asset('img/4.jpg') }}" class="card-img-top rounded-0" alt="">
                </a>
                <a href="/#2">
                    <img src="{{ asset('img/5.jpg') }}" class="card-img-top rounded-0" alt="">
                </a>
                <a href="/#3">
                    <img src="{{ asset('img/6.jpg') }}" class="card-img-top rounded-0" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="col-12 col-md">
        <div class="card-columns">
            <div class="card border-0 rounded-0">
                <a href="/#4">
                    <img src="{{ asset('img/2.jpg') }}" class="card-img-top rounded-0" alt="">
                </a>
            </div>
            <div class="card border-0 rounded-0">
                <a href="/#5">
                    <img src="{{ asset('img/1.jpg') }}" class="card-img-top rounded-0" alt="">
                </a>
            </div>
            <div class="card border-0 rounded-0">
                <a href="/#6">
                    <img src="{{ asset('img/3.jpg') }}" class="card-img-top rounded-0" alt="">
                </a>
            </div>
        </div>
    </div>
</div>



@push('scripts')

    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

    <script>
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 1500,
            margin: 10,
            nav: false,
            dots: true,
        })
    </script>

@endpush

@push('styles')

    <style>
        .owl-dots {
            position: absolute;
            left: 2%;
            bottom: 0%;
        }
    </style>

@endpush