<div class="container">
    <div class="row schedule">

        @foreach($schedules as $schedule)
            <div class="col-auto my-1">
                @if($schedule->active == 1)
                    <a href="/record/{{$schedule->id}}" class="btn btn-sm btn-danger disabled" disabled>{{ \Carbon\Carbon::make($schedule->time_of_record)->format('H:i') }}</a>
                    @isset($profile)
                        <a href="{{ route('schedule.accept',$schedule) }}" class="btn btn-primary">accept</a>
                    @endisset
                @else
                    <button type="submit" data-id="{{ $schedule->id }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#doctorrecordModal">{{ \Carbon\Carbon::make($schedule->time_of_record)->format('H:i') }}</button>
                @endif
            </div>
        @endforeach
    </div>
</div>


@push('scripts')
    <script>

        $('#doctorrecordModal').on('show.bs.modal', (e) => {
            let btn = $(e.relatedTarget);
            let id = btn.data('id');
            let input = $('#schedule_id');

            input.val(id);
        })

    </script>

@endpush
