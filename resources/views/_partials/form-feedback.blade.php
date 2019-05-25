<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 px-6 my-5 text-center">
            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal" >
                Оставить Отзыв
            </button>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="form" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <label class="label-feed-rate" for="attent">Внимательность врача:</label>
                                    <div id="attent" class=""></div>
                                    <input type="hidden" id="attent_input" name="attent_rating" required>
                                </div>

                                <div class="form-group col-12 col-md">
                                    <label class="label-feed-rate" for="manner">Маннеры врача:</label>
                                    <div id="manner" class=""></div>
                                    <input type="hidden" id="manner_input" name="manner_rating" required>
                                </div>

                                <div class="form-group col-12 col-md">
                                    <label class="label-feed-rate" for="time">Время ожидания врача:</label>
                                    <div id="time" class=""></div>
                                    <input type="hidden" id="time_input" name="time_rating" required>
                                </div>

                                <input type="hidden" id="rating_end_input" name="rating" required>
                            </div>
                            <p class="mt-3">
                                Отзыв о враче:
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
                        <p class=" h6">*на указанный вами номер будет отправлено SMS с кодом подтверждения</p>
                        <div class="row">
                            <div class="col-12 col-md-8">
                                <p>Doc+ не публикует отзывы, которые содержат оскорбления и ненормативную лексику</p>
                                <p><a href="/" class="text-primary"><i>Как мы собираем отзывы</i></a></p>
                            </div>
                            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                            <div class="col-12 col-md-4 text-center">
                                <button type="submit" class="btn btn-outline-success my-4">Send message</button>
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
        $("#attent").rateYo({
            fullStar: true,
            numStars: 5,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
            onSet: function(rating, rateYoInstance) {
                $('#attent_input').val(rating);
                let manner = $('#manner_input').val();
                let time = $('#time_input').val();

                let rating_this = ((parseInt(time, 10) + parseInt(manner, 10) + parseInt(rating, 10)) / 3).toFixed(1);

                $('#rating_end_input').val(rating_this);
            }
        });
        $("#manner").rateYo({
            fullStar: true,
            numStars: 5,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
            onSet: function(rating, rateYoInstance) {
                $('#manner_input').val(rating);
                let attent = $('#attent_input').val();
                let time = $('#time_input').val();

                let rating_this = ((parseInt(attent, 10) + parseInt(time, 10) + parseInt(rating, 10)) / 3).toFixed(1);

                $('#rating_end_input').val(rating_this);
            }
        });
        $("#time").rateYo({
            fullStar: true,
            numStars: 5,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
            onSet: function(rating, rateYoInstance) {
                $('#time_input').val(rating);
                let manner = $('#manner_input').val();
                let attent = $('#attent_input').val();

                let rating_this = ((parseInt(manner, 10) + parseInt(attent, 10) + parseInt(rating, 10)) / 3).toFixed(1);

                $('#rating_end_input').val(rating_this);
            }
        });
    </script>
@endpush
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
@endpush