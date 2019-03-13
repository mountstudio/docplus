<ul class="nav nav-tabs" id="myTab" role="tablist">
    @foreach($records->keys() as $key)
        <li class="nav-item">
            <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="" data-toggle="tab" href="#schedule-{{ $loop->index }}" role="tab" aria-controls="schedule-{{ $loop->index }}" aria-selected="true">{{ \Carbon\Carbon::make($key)->format('M Y') }}</a>
        </li>
    @endforeach
</ul>
<div class="tab-content" id="myTabContent">
    @foreach($records->keys() as $key)
        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="schedule-{{ $loop->index }}" role="tabpanel" aria-labelledby="">@include('doctor.tabs.statistics_show', ['records' => $records[$key]])</div>
    @endforeach
</div>