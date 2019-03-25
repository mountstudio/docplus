<div class="card rounded-0 shadow-sm my-2">
    <div class="card-body position-relative row">
        <div class="col py-2">
            <a href="{{ route('question.show', $question) }}" class="text-black h3">{{ $question->title }}</a>
            <p class="small text-muted m-0 mt-2">Вопрос #{{ $question->id }}</p>
            <p class="small text-muted m-0">{{ $question->category->name }}</p>
        </div>
        <div class="col-12 col-md-auto py-2">
            <p class="small mb-2 text-secondary"><i class="fas fa-clock fa-lg text-blue"></i>&nbsp;{{ \Carbon\Carbon::make($question->created_at)->format('d M Y') }}</p>
            <p class="small mb-2 text-secondary"><i class="fas fa-eye fa-lg text-blue"></i>&nbsp;{{ $question->views }} показов</p>
            <p class="small mb-2 text-secondary"><i class="fas fa-check-circle fa-lg text-blue"></i>&nbsp;{{ $question->answers->count() }} ответов</p>
        </div>
    </div>

</div>