
            <div class="row border my-3 p-4">
                <div  class="col-4 text-center">
                    <h6 class="text-secondary font-weight-normal ml-1">ВНИМАТЕЛЬНОСТЬ</h6>
                    <div class="row justify-content-center">
                        @include('_partials.stars', ['id' => $feedback->id.'-attent' ])
                    </div>
                </div>

                <div  class="col-4 text-center">
                    <h6 class="text-secondary font-weight-normal ml-1">МАНЕРЫ</h6>
                    <div class="row justify-content-center">
                        @include('_partials.stars', ['id' => $feedback->id.'-manner' ])
                    </div>
                </div>

                <div  class="col-4 text-center">
                    <h6 class="text-secondary font-weight-normal ml-1">ВРЕМЯ ОЖИДАНИЯ</h6>
                    <div class="row justify-content-center">
                        @include('_partials.stars', ['id' => $feedback->id.'-time' ])
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
