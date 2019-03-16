@extends('layouts.app')

@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="row align-items-start">
                    <div class="col">
                        <p class="text-secondary h3 m-0 mt-md-5 mb-md-2">Личный кабинет</p>

                    </div>
                </div>
            </div>
            {{--<div class="col-4">--}}
            {{--@includeWhen($user->role === "ROLE_DOCTOR", 'schedule.index',[--}}
            {{--'schedules' => \App\Doctor::getScheduleActivated($user->doctor),--}}
            {{--'profile' => true,--}}
            {{--])--}}
            {{--</div>--}}
        </div>
        <div class="py-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @if($user->role !== 'ROLE_OPERATOR')
                <li class="nav-item">
                    <a class="nav-link active" id="" data-toggle="tab" href="#edit" role="tab" aria-controls="" aria-selected="true">Изменить данные</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="" data-toggle="tab" href="#story" role="tab" aria-controls="" aria-selected="true">История</a>
                </li>
                @endif
                    @if($user->role !== 'ROLE_USER')
                <li class="nav-item">
                    <a class="nav-link" id="" data-toggle="tab" href="#statistic" role="tab" aria-controls="" aria-selected="true">{{ $user->role === 'ROLE_DOCTOR' || $user->role === 'ROLE_CLINIC' ? 'Статистика' : ''}}</a>
                </li>
                    @endif
            </ul>
        </div>
        <div class="row">
            <div class="tab-content col-12" id="myTabContent">
                <div class="tab-pane fade active show" id="edit" role="tabpanel" aria-labelledby="">@includeWhen($user->role === "ROLE_DOCTOR" , 'doctor.tabs.edit') @includeWhen($user->role === "ROLE_USER" , 'user.tabs.edit')</div>
                <div class="tab-pane fade" id="story" role="tabpanel" aria-labelledby="">
                    @includeWhen($user->role === 'ROLE_DOCTOR' , 'doctor.tabs.story_pick')
                    @includeWhen($user->role === 'ROLE_CLINIC' , 'clinic.tabs.story_pick')
                    @includeWhen($user->role === 'ROLE_USER' , 'user.tabs.story_tabs')
                </div>
                <div class="tab-pane fade" id="statistic" role="tabpanel" aria-labelledby="">
                    @includeWhen($user->role === 'ROLE_DOCTOR', 'doctor.tabs.statistic_tab')
                    @includeWhen($user->role === 'ROLE_CLINIC' , 'clinic.tabs.statistic_tab')
                </div>
            </div>
        </div>
    </div>

    @includeWhen($user->role === "ROLE_OPERATOR" && isset($doctors) && isset($clinics), 'operator', [
        'doctors' => $doctors ?? null,
        'clinics' => $clinics ?? null,
    ])

@endsection
