<div class="container">
    <div class="row schedule">

        @foreach($schedules as $schedule)
            <div class="col-auto my-1">
                @if($schedule->active == 1)
                    <a href="/record/{{$schedule->id}}" class="btn btn-sm btn-danger disabled" disabled>{{$schedule->time_of_record}}</a>
                @else
                    <form action="{{ route('record.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">
                        <button type="submit" class="btn btn-sm btn-primary">{{$schedule->time_of_record}}</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</div>
