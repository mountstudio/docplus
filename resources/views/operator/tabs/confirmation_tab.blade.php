<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link {{ isset($show) && $show == 'App\Notifications\NewFeedbackNotification' ? 'active' : '' }}" id="" data-toggle="tab" href="#feedback_confirm" role="tab" aria-controls="" aria-selected="true">Отзывы</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ isset($show) && $show == 'App\Notifications\NewEditNotification' ? 'active' : '' }}" id="" data-toggle="tab" href="#AppNotificationsNewEditNotification" role="tab" aria-controls="" aria-selected="true">Изменение данных</a>
    </li>
</ul>

<div class="row py-5">
    <div class="tab-content col-12" id="myTabContent">
        <div class="tab-pane fade {{ isset($show) && $show == 'App\Notifications\NewFeedbackNotification' ? 'active show' : '' }}" id="feedback_confirm" role="tabpanel" aria-labelledby="">
            <div class="container d-none d-md-block py-4" id="feedbacks">
                @if($feedbacks->count() === 0)
                    <p>Нет новых отзывов на рассмотрение</p>
                @else
                @foreach($feedbacks as $feedback)
                    @include('operator.tabs.feedback_confirm')
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
                                @if($loop->first || $loop->index === 1)

                                @elseif($edit->data['request'][$key] != $edit->data['doctor'][$key])
                                    <div class="row col-12">
                                        <div class="col-2">
                                            <span class="mr-2">{{$key}}:</span>
                                        </div>
                                        <div class="col-4">
                                        <span class="text-success h5">{{ $edit->data['request'][$key] }}</span>
                                        </div>
                                        <div class="col-4">
                                        <span class="text-danger h5">{{ $edit->data['doctor'][$key] }}</span>
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





                    {{--<div class="container row border my-3 p-4">--}}
                        {{--<div class="col-12">--}}
                        {{--<p>Доктор <a href="{{ route('doctor.show', $edit->data['doctor']['id']) }}" class="h5 text-secondary"> {{\App\User::find($edit->data['doctor']['user_id'])->fullName}} </a> предложил следующие изменения:</p>--}}
                        {{--</div>--}}
                        {{--@if( $edit->data['request']['name'] !== \App\User::find($edit->data['doctor']['id'])->name)--}}
                            {{--<div class="row col-12">--}}
                            {{--<div class="col-4">--}}
                                {{--<span>Изменение: {{ $edit->data['request']['name'] }}</span>--}}
                            {{--</div>--}}
                            {{--<div class="col-4">--}}
                                {{--<span>В данный момент: {{ \App\User::find($edit->data['doctor']['id'])->name }}</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        {{--@if( $edit->data['request']['last_name'] !== \App\User::find($edit->data['doctor']['id'])->last_name)--}}
                            {{--<div class="row col-12">--}}
                                {{--<div class="col-4">--}}
                                    {{--<span>Изменение: {{ $edit->data['request']['last_name'] }}</span>--}}
                                {{--</div>--}}
                                {{--<div class="col-4">--}}
                                    {{--<span>В данный момент: {{ \App\User::find($edit->data['doctor']['id'])->last_name }}</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        {{--@if( $edit->data['request']['address'] !== $edit->data['doctor']['address'])--}}
                            {{--<div class="row col-12">--}}
                                {{--<div class="col-4">--}}
                                    {{--<span>Изменение: {{ $edit->data['request']['address'] }}</span>--}}
                                {{--</div>--}}
                                {{--<div class="col-4">--}}
                                    {{--<span>В данный момент: {{ $edit->data['doctor']['address'] }}</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        {{--@if( $edit->data['request']['price'] != $edit->data['doctor']['price'])--}}
                            {{--<div class="row col-12">--}}
                                {{--<div class="col-4">--}}
                                    {{--<span>Изменение: {{ $edit->data['request']['price'] }}</span>--}}
                                {{--</div>--}}
                                {{--<div class="col-4">--}}
                                    {{--<span>В данный момент: {{ $edit->data['doctor']['price'] }}</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        {{--@if( $edit->data['request']['discount'] != $edit->data['doctor']['discount'])--}}
                            {{--<div class="row col-12">--}}
                                {{--<div class="col-4">--}}
                                    {{--<span>Изменение: {{ $edit->data['request']['discount'] }}</span>--}}
                                {{--</div>--}}
                                {{--<div class="col-4">--}}
                                    {{--<span>В данный момент: {{ $edit->data['doctor']['discount'] }}</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endif--}}

                        {{--<div class="mt-3 ml-auto">--}}
                            {{--<a href="{{ route('notification.read', $edit) }}" class="btn btn-primary">Принять</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>