<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-12 mb-3">
            <h3 class="text-secondary text-center font-weight-bold">КЛИНИКИ ПАРТНЕРЫ</h3>
        </div>
        @foreach($partners as $partner)
        <div class="col-2">
            <a href="{{ route('clinic.show', $partner->id) }}">
            <p class="text-center font-weight-bold text-secondary">{{ $partner->clinic_name }}</p>
            <img src="{{ asset('uploads/'.$partner->logo) }}" class="img-fluid" alt="">
            </a>
        </div>
        @endforeach
    </div>
</div>