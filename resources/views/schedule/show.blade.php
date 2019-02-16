<div class="container">
    <div class="row">

        @foreach($schedules as $schedule)
            <div class="col-auto p-3">
                @if($schedule->active == 1)
                    <a style="background-color: red;" href="/record/{{$schedule->id}}" class="btn btn-primary">{{$schedule->time_of_record}}</a>
                @else
                    <a href="/record/{{$schedule->id}}" class="btn btn-primary">{{$schedule->time_of_record}}</a>

                @endif
            </div>
        @endforeach
    </div>
</div>
