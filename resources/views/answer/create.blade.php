<div class="container py-3">
    <div class="row">

        <div class="col-9 p-5 pb-3 border shadow-sm">
            <div class="card border-0 p-0">
                <div class="card-body p-0">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <img src="{{ asset('uploads/'.Auth::user()->doctor->pics->first()->image) }}" class="rounded-circle img-fluid" alt="">
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('profile') }}" class="h3 text-dark"><u>{{ Auth::user()->fullName }}</u></a>
                            <p>{{ Auth::user()->doctor->specs->implode('name', ', ') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <form class="pt-3" action="{{ route('answer.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="answer_for_question">Ваш ответ:</label>
                    <textarea class="form-control" name="content" id="answer_for_question" cols="30" rows="10"></textarea>
                </div>
                <input type="hidden" value="{{ $question->id }}" name="question_id">
                <button type="submit" class="btn btn-outline-primary">Отправить ответ</button>
            </form>
        </div>
    </div>
</div>