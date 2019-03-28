<div class="row border p-3 my-2 align-items-center">
    <div class="col">
        <p class="m-0"><span class="font-weight-bold">Пациент</span>: {{ $notification->data['question']['name'] }} {{ $notification->data['question']['age'] }} лет</p>
        <p class="m-0"><span class="font-weight-bold">Категория</span>: {{ \App\Category::find($notification->data['question']['category_id'])->name }}</p>
        <p class="m-0"><span class="font-weight-bold">Название вопроса</span>: {{ $notification->data['question']['title'] }}</p>
        <p><span class="font-weight-bold">Вопрос</span>: {{ $notification->data['question']['content'] }}</p>
    </div>
    <div class="col-auto">
        <a href="{{ route('question.activate', ['question' => $notification->data['question']['id'], 'operators' => 1, 'notification' => $notification]) }}" class="btn btn-primary">Активировать</a>
    </div>
</div>
