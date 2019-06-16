<div class="row justify-content-end pb-3 ">
    <a data-toggle="modal" data-target="#createschedule" class="btn btn-success">Добавить расписание</a>
</div>
<div class="row shadow">
    <div class="col-12 border">
        <div class="pt-3">
            @if(count($schedules))
                <p class="text-center text-secondary font-weight-bold pt-3">
                    Ваше активное расписание
                </p>
             @if(count($doctor->clinics))
                <ul class="nav nav-tabs mb-2" id="myTab" role="tablist">
                    @foreach($schedules->keys() as $key)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="" data-toggle="tab" href="#schedules-{{ $loop->index }}" role="tab" aria-controls="schedule-{{ $loop->index }}" aria-selected="true">{{ \App\Clinic::find($key)->clinic_name }}</a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content" id="myTabContent">
                    @foreach($schedules->keys() as $key)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="schedules-{{ $loop->index }}" role="tabpanel" aria-labelledby="">@include('doctor.tabs.schedule.list', ['schedules' => \App\Doctor::getclinicSchedule($doctor, $key), 'clinic' => \App\Clinic::find($key)])</div>
                    @endforeach
                </div>

                @else
                    @include('doctor.tabs.schedule.list')
                 @endif
                {{--@include('schedule.list')--}}
            @else
                <p class="text-center h4 text-secondary font-weight-bold py-3">
                    У вас нет расписания
                </p>
            @endif

        </div>
    </div>
</div>
@include('_partials.modals.create_schedule')
