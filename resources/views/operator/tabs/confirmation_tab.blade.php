<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link {{ isset($show) && $show == 'App\Notifications\NewFeedbackNotification' ? 'active' : '' }}" id="" data-toggle="tab" href="#feedback_confirm" role="tab" aria-controls="" aria-selected="true">Отзывы</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isset($show) && $show == 'App\Notifications\NewEditNotification' ? 'active' : '' }}" id="" data-toggle="tab" href="#AppNotificationsNewEditNotification" role="tab" aria-controls="" aria-selected="true">Изменение данных</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isset($show) && $show == 'App\Notifications\NewQuestionNotification' ? 'active' : '' }}" id="" data-toggle="tab" href="#AppNotificationsNewQuestionNotification" role="tab" aria-controls="" aria-selected="true">Новые вопросы</a>
    </li>
</ul>

<div class="row py-5">
    <div class="tab-content col-12" id="myTabContent">
        <div class="tab-pane fade {{ isset($show) && $show == 'App\Notifications\NewFeedbackNotification' ? 'active show' : '' }}" id="feedback_confirm" role="tabpanel" aria-labelledby="">
            <div class="container d-none d-md-block py-4" id="feedbacks">
                @if($feedbackNotifications->count() === 0)
                    <p>Нет новых отзывов на рассмотрение</p>
                @else
                @foreach($feedbackNotifications as $notification)
                    @if(\App\Feedback::find($notification->data['feedback']['id'])->doctors()->count())
                            @include('operator.tabs.feedback_confirm_doctor', ['feedback' => \App\Feedback::find($notification->data['feedback']['id'])])
                    @elseif(\App\Feedback::find($notification->data['feedback']['id'])->clinics()->count())
                            @include('operator.tabs.feedback_confirm_clinic', ['feedback' => \App\Feedback::find($notification->data['feedback']['id'])])
                        @endif
                @endforeach
                @endif
            </div>
        </div>
        <div class="tab-pane fade {{ isset($show) && $show == 'App\Notifications\NewQuestionNotification' ? 'active show' : '' }}" id="AppNotificationsNewQuestionNotification" role="tabpanel" aria-labelledby="">
            <div class="container d-none d-md-block py-4" id="feedbacks">
                @if($questionNotifications->count() === 0)
                    <p>Нет новых вопросов врачам</p>
                @else
                    @foreach($questionNotifications as $notification)
                        @include('operator.tabs.question_activate')
                    @endforeach
                @endif
            </div>
        </div>
        <div class="tab-pane fade {{ isset($show) && $show == 'App\Notifications\NewEditNotification' ? 'active show' : '' }}" id="AppNotificationsNewEditNotification" role="tabpanel" aria-labelledby="">
            <div class="container d-none d-md-block py-4" id="edits">
                @if($edits->count() === 0)
                    <p>Нет новых запросов на изменение данных</p>
                @else

                @foreach($edits as $edit)
                        <div class="container row border my-3 p-4">
                        <div class="col-12">
                        <p>Доктор <a href="{{ route('doctor.show', $edit->data['doctor']['id']) }}" class="h5 text-secondary"> {{\App\User::find($edit->data['doctor']['user_id'])->fullName}} </a> предложил следующие изменения:</p>
                        </div>
                            @foreach(array_keys($edit->data['request']) as $key)
                                @if($edit->data['request'][$key] != \App\Doctor::find($edit->data['doctor']['id'])->$key)
                                    <div class="row col-12">
                                        <div class="col-2">
                                            <span class="mr-2">{{$key}}:</span>
                                        </div>
                                        <div class="col-4">
                                            <span class="text-success h5">{{ $edit->data['request'][$key] }}</span>
                                        </div>
                                        <div class="col-4">
                                            <span class="text-danger h5">{{ \App\Doctor::find($edit->data['doctor']['id'])->$key }}</span>
                                        </div>
                                        </div>
                                @endif
                            @endforeach
                            <div class="row mt-3 ml-auto">
                                <div class="col-6">
                                <form action="{{ route('notification.edit', $edit) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="number" value="1">
                                    <button type="submit" class="btn btn-primary">Принять</button>
                                </form>
                                </div>
                                <div class="col-6">
                                <form action="{{ route('notification.edit', $edit) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="number" value="0">
                                    <button type="submit" class="btn btn-danger">Отказать</button>
                                </form>
                                </div>
                            </div>
                        </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>