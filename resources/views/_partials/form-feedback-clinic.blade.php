<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 px-6 my-5 text-center">
            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#clinicfeedback" >
                Оставить Отзыв
            </button>
        </div>
    </div>
</div>


<div class="modal fade" id="clinicfeedback" tabindex="-1" role="form" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-secondary" id="exampleModalLabel">Оставьте свой отзыв.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
                    <form class="text-secondary" action="{{ route('feedback.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="form-row">
                                <div class="form-group col-12 col-md">
                                    <label class="label-feed-rate" for="clinic">Состояние клиники:</label>
                                    <div id="clinic" class=""></div>
                                    <input type="hidden" id="clinic_input" name="clinic_rating" required>
                                </div>

                                <div class="form-group col-12 col-md">
                                    <label class="label-feed-rate" for="comfort">Комфорт клиники:</label>
                                    <div id="comfort" class=""></div>
                                    <input type="hidden" id="comfort_input" name="comfort_rating" required>
                                </div>

                                <div class="form-group col-12 col-md">
                                    <label class="label-feed-rate" for="discipline">Персонал клиники:</label>
                                    <div id="discipline" class=""></div>
                                    <input type="hidden" id="discipline_input" name="discipline_rating" required>
                                </div>

                                <input type="hidden" id="rating_end_input" name="rating" required>
                            </div>
                            <p class="mt-3">
                                Отзыв о клинике:
                            </p>
                            <input type="text" class="form-control h6" id="message-text" name="comment">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Введите ваше ФИО:</label>
                            <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Ваше ФИО">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Введите ваш телефон:</label>
                            <input type="tel" name="phone_number" class="form-control" id="regexp-mask" >
                        </div>
                        {{--<p class=" h6">*на указанный вами номер будет отправлено SMS с кодом подтверждения</p>--}}
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <p>Doc+ не публикует отзывы, которые содержат оскорбления и ненормативную лексику</p>
                                <p><a href="/" class="text-primary"><i>Как мы собираем отзывы</i></a></p>
                            </div>
                            <input type="hidden" name="clinic_id" value="{{ $clinic->id }}">
                            <div class="col-12 col-md-4 text-center">
                                <button type="submit" class="btn btn-outline-success my-4">Отправить</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="{{ asset('js/rateyo.js') }}"></script>
    <script>
        $("#clinic").rateYo({
            fullStar: true,
            numStars: 5,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
            onSet: function(rating, rateYoInstance) {
                $('#clinic_input').val(rating);
                let comfort = $('#comfort_input').val();
                let discipline = $('#discipline_input').val();

                let rating_this = ((parseInt(discipline, 10) + parseInt(comfort, 10) + parseInt(rating, 10)) / 3).toFixed(1);

                $('#rating_end_input').val(rating_this);
            }
        });
        $("#comfort").rateYo({
            fullStar: true,
            numStars: 5,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
            onSet: function(rating, rateYoInstance) {
                $('#comfort_input').val(rating);
                let clinic = $('#clinic_input').val();
                let discipline = $('#discipline_input').val();

                let rating_this = ((parseInt(clinic, 10) + parseInt(discipline, 10) + parseInt(rating, 10)) / 3).toFixed(1);

                $('#rating_end_input').val(rating_this);
            }
        });
        $("#discipline").rateYo({
            fullStar: true,
            numStars: 5,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
            onSet: function(rating, rateYoInstance) {
                $('#discipline_input').val(rating);
                let comfort = $('#comfort_input').val();
                let clinic = $('#clinic_input').val();

                let rating_this = ((parseInt(comfort, 10) + parseInt(clinic, 10) + parseInt(rating, 10)) / 3).toFixed(1);

                $('#rating_end_input').val(rating_this);
            }
        });
    </script>
@endpush
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
@endpush