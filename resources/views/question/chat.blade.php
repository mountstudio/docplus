<div class="row justify-content-between">
    @include('question.partials.question')
    @includeWhen($question->answers->where('active', 1)->count(), 'answer.list', ['answers' => $question->answers->where('active', 1)])
</div>
