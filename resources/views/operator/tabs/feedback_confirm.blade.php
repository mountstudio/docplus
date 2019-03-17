<div class="row border my-3 p-4">
    <div class="col-2">
        @foreach($feedback->doctors as $doctor)
            <div class="position-relative">
                <img class="img-fluid rounded-circle mb-2 img-thumbnail " src="{{ $doctor->pics->first() ? asset('uploads/'.$doctor->pics->first()->image) : asset('img/doctor.jpg') }}" alt="">
            </div>
            @endforeach
            <a href="{{ route('doctor.show', $doctor->id) }}">
                <span class="text-secondary text-center text-md-left h3 mt-5 mb-2">{{ $doctor->name ?? 'Бобров Василий Елисеевич' }}</span>
            </a>
    </div>
    <div class="col-8">
    <div>
        <h6 class="text-secondary font-weight-normal ml-1">ВНИМАТЕЛЬНОСТЬ</h6>
            @include('_partials.stars', ['id' => $feedback->id.'-attent' ])
    </div>

    <div>
        <h6 class="text-secondary font-weight-normal ml-1">МАНЕРЫ</h6>
            @include('_partials.stars', ['id' => $feedback->id.'-manner' ])
    </div>

    <div>
        <h6 class="text-secondary font-weight-normal ml-1">ВРЕМЯ ОЖИДАНИЯ</h6>
            @include('_partials.stars', ['id' => $feedback->id.'-time' ])
    </div>

    <div class="col-12">
        <p class="text-secondary mt-3 font-weight-bold">{{ $feedback->comment }}</p>
    </div>
    </div>
    <div class="col-2">
        <p class="text-secondary">Отзыв оставил пользователь {{ $feedback->name }}</p>
        <p class="text-secondary">Тел: {{ $feedback->phone_number }}</p>

        <a href="/activation/{{ $feedback->id }}" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Одобрить </a>
    </div>
</div>
<!-- End Отзыв -->
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/rateyo.js') }}"></script>
    <script>
        $('#rateYo-{!! $feedback->id !!}-attent').rateYo({
            rating: "{!! $feedback->ratings['attent_rating'] !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "10px",
            spacing: "5px",
        });

        $('#rateYo-{!! $feedback->id !!}-manner').rateYo({
            rating: "{!! $feedback->ratings['manner_rating'] !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "10px",
            spacing: "5px",
        });

        $('#rateYo-{!! $feedback->id !!}-time').rateYo({
            rating: "{!! $feedback->ratings['time_rating'] !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "10px",
            spacing: "5px",
        });

    </script>
@endpush
