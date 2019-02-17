<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach($schedules->keys() as $key)
        <li class="nav-item">
            <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="" data-toggle="tab" href="#schedule-{{ $loop->index }}" role="tab" aria-controls="schedule-{{ $loop->index }}" aria-selected="true">{{ \Carbon\Carbon::make($key)->format('d-m') }}</a>
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
