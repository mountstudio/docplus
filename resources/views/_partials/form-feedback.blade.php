<div class="container">
    <div class="row justify-content-center">
        <div class="col-3 px-6">
            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal" >
                Оставить Отзыв
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="form" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-secondary" id="exampleModalLabel">Оставьте свой отзыв.</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div>
                            <div class="modal-body">
                                <form class="text-secondary">
                                    <div class="form-group">
                                        <label for="massage-text" class="col-form-label ">
                                            Ваша оценка врачу:
                                            @for($i = 0; $i < 5; $i++)

                                                <img class="star" src="{{ asset('img/star-1.png') }}" alt="">

                                            @endfor
                                            <p class="mt-3">
                                                Отзыв о враче:
                                            </p>
                                        </label>
                                        <textarea class="form-control h6" id="message-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet aperiam beatae delectus dolorum eligendi, et excepturi exercitationem expedita explicabo fugiat illum incidunt quam quasi quos temporibus. Eius et nam rem?</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Введите ваше имя:</label>
                                        <input type="text" class="form-control" id="recipient-name" placeholder="Ваше имя">
                                    </div>

                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Введите ваш телефон:</label>
                                        <input type="tel" class="form-control" id="regexp-mask" >
                                    </div>
                                    <p class=" h6">*на указанный вами номер будет отправлено SMS с кодом подтверждения</p>
                                    <div class="row">
                                        <div class="col-8">
                                            <p>Doc+ не публкует отзывы, которые содержат оскорбления и ненормативную лексику</p>
                                            <p><a href="/" class="text-primary"><i>Как мы собираем отзывы</i></a></p>
                                        </div>
                                        <div class="col-4">
                                            <button type="button" class="btn btn-outline-success my-4">Send message</button>
                                        </div>
                                    </div>

                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
