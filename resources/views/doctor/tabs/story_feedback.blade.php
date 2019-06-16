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
                            <p>Пользователь {{ $feedback->name }} оставил отзыв:</p>
                            <p><strong> {{ $feedback->comment }}.</strong></p>
                            <p>{{$feedback->created_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach