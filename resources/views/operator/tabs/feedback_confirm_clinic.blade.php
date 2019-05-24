<div class="row border p-3 my-2">
    <div class="col-2">
        @foreach($feedback->clinics as $clinic)
            <div class="position-relative">
                <img class="img-fluid rounded-circle mb-2 img-thumbnail " src="{{ $clinic->logo ? asset('uploads/'.$clinic->logo) : asset('img/doctor.jpg') }}" alt="">
            </div>
        @endforeach
        <a href="{{ route('clinic.show', $clinic->id) }}">
            <span class="text-secondary text-center text-md-left h3 mt-5 mb-2">{{ $clinic->name ?? 'Бобров Василий Елисеевич' }}</span>
        </a>
    </div>
    <div class="col-8">
        <div>
            <h6 class="text-secondary font-weight-normal ml-1">СОСТОЯНИЕ</h6>
            @include('_partials.stars', ['id' => $feedback->id.'-clinic' ])
        </div>

        <div>
            <h6 class="text-secondary font-weight-normal ml-1">КОМФОРТ</h6>
            @include('_partials.stars', ['id' => $feedback->id.'-comfort' ])
        </div>

        <div>
            <h6 class="text-secondary font-weight-normal ml-1">ПЕРСОНАЛ</h6>
            @include('_partials.stars', ['id' => $feedback->id.'-discipline' ])
        </div>

        <div class="col-12">
            <p class="text-secondary mt-3 font-weight-bold">{{ $feedback->comment }}</p>
        </div>
    </div>
    <div class="col-2">
        <p class="text-secondary">Отзыв оставил пользователь {{ $feedback->name }}</p>
        <p class="text-secondary">Тел: {{ $feedback->phone_number }}</p>

        <a href="{{ route('feedback.activation', ['feedback' => $feedback, 'notification' => $notification]) }}" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Одобрить </a>
    </div>
</div>
<!-- End Отзыв -->
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('js/rateyo.js') }}"></script>
    <script>
        $('#rateYo-{!! $feedback->id !!}-clinic').rateYo({
            rating: "{!! $feedback->ratings['clinic_rating'] !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "10px",
            spacing: "5px",
        });

        $('#rateYo-{!! $feedback->id !!}-comfort').rateYo({
            rating: "{!! $feedback->ratings['comfort_rating'] !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "10px",
            spacing: "5px",
        });

        $('#rateYo-{!! $feedback->id !!}-discipline').rateYo({
            rating: "{!! $feedback->ratings['discipline_rating'] !!}",
            readOnly: true,
            ratedFill: "red",
            starWidth: "10px",
            spacing: "5px",
        });

    </script>
@endpush
