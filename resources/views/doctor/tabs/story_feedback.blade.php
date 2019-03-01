<div class="row">
    <h1>История отзывов</h1>
</div>
@foreach($feedbacks as $feedback)
    <div class="row">
        <div class="col-12 my-2">
            <div class="card shadow-sm p-3">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-10">
                            Пользователь {{ $feedback->name }} оставил отзыв {{ $feedback->comment }}.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach