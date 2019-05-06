<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach($schedules->keys() as $key)
        <li class="nav-item">
            <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="" data-toggle="tab" href="#schedule-{{ $loop->index }}" role="tab" aria-controls="schedule-{{ $loop->index }}" aria-selected="true">{{ \Carbon\Carbon::make($key)->format('d-M') }}</a>
        </li>
    @endforeach
</ul>
<p class="text-center text-secondary font-weight-bold pt-3">
    Выберите время приема для записи онлайн
</p>
<div class="tab-content" id="myTabContent">
    @foreach($schedules->keys() as $key)
        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="schedule-{{ $loop->index }}" role="tabpanel" aria-labelledby="">@include('schedule.show', ['schedules' => $schedules[$key]])</div>
    @endforeach
</div>

<p class="mt-3 text-secondary">Адресc : {{$clinic->address}}</p>
{{--<p class="font-weight-bold text-primary pt-3 pb-3 h5">{{$doctor->price}} сом</p>--}}
<p class="text-secondary">Телефон для записи: {{$clinic->phones}}</p>