
<div class="row border my-3 p-4">
    <div  class="col-4 text-center">
        <h6 class="text-secondary font-weight-normal ml-1">Состояние клиники</h6>
        <div class="row justify-content-center">
            @include('_partials.stars', ['id' => $feedback->id.'-clinic' ])
        </div>
    </div>

    <div  class="col-4 text-center">
        <h6 class="text-secondary font-weight-normal ml-1">Комфорт</h6>
        <div class="row justify-content-center">
            @include('_partials.stars', ['id' => $feedback->id.'-comfort' ])
        </div>
    </div>

    <div  class="col-4 text-center">
        <h6 class="text-secondary font-weight-normal ml-1">Персонал</h6>
        <div class="row justify-content-center">
            @include('_partials.stars', ['id' => $feedback->id.'-discipline' ])
        </div>
    </div>

    <div class="col-12">
        <p class="text-secondary mt-3 font-weight-bold">{{ $feedback->comment }}</p>
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
