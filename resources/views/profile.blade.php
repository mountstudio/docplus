@extends('layouts.app')

@section('content')

    @if($user->role === 'ROLE_DOCTOR')
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-12 col-md-3 pr-md-5 pr-0">
                <div class="row align-items-start">
                    <div class="col">
                        <img class="w-100 rounded-circle" src="{{ asset('uploads/'.$user->doctor->logo) }}" alt="">
                        <p class="text-secondary h4 m-0 mt-md-5 mb-md-2 text-center">{{$user->fullName}}</p>
                        <p class="text-secondary h5 m-0 mt-md-5 mb-md-2 text-center">{{$user->doctor->specs->implode('name', ', ') }}</p>
                    </div>
                </div>
            </div>
<div class="col-md-8 col-12 border-left pl-md-5 pl-0">
        <div class="py-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="" data-toggle="tab" href="#edit-doctor" role="tab" aria-controls="" aria-selected="true">Изменить данные</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="" data-toggle="tab" href="#story-doctor" role="tab" aria-controls="" aria-selected="true">История</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="" data-toggle="tab" href="#statistic-doctor" role="tab" aria-controls="" aria-selected="true">Статистика</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  {{ isset($show) && $show == 'Notification' ? 'active' : '' }}" id="" data-toggle="tab" href="#notification-doctor" role="tab" aria-controls="" aria-selected="true">Уведомления</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="tab-content col-12" id="myTabContent">
                <div class="tab-pane fade" id="edit-doctor" role="tabpanel" aria-labelledby="">@include('doctor.tabs.edit')</div>
                <div class="tab-pane fade" id="story-doctor" role="tabpanel" aria-labelledby="">
                    @include('doctor.tabs.story_pick')
                </div>
                <div class="tab-pane fade" id="statistic-doctor" role="tabpanel" aria-labelledby="">
                    @include('doctor.tabs.statistic_tab')
                </div>
                <div class="tab-pane fade {{ isset($show) && $show == 'Notification' ? 'active show' : '' }}" id="notification-doctor" role="tabpanel" aria-labelledby="">
                    @include('doctor.tabs.notification_tab')
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
@endif
    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-3 pr-md-5 pr-0">
                <div class="row align-items-start">
                    <div class="col">
                        {{--<img class="w-100 rounded-circle" src="{{ asset('uploads/'.$user->doctor->logo) }}" alt="">--}}
                        {{--<p class="text-secondary h4 m-0 mt-md-5 mb-md-2 text-center">{{$user->fullName}}</p>--}}
                        {{--<p class="text-secondary h5 m-0 mt-md-5 mb-md-2 text-center">{{$user->doctor}}</p>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-12 border-left pl-md-5 pl-0">
                <div class="py-5">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @if($user->role !== 'ROLE_OPERATOR')
                            <li class="nav-item">
                                <a class="nav-link active" id="" data-toggle="tab" href="#edit" role="tab" aria-controls="" aria-selected="true">Изменить данные</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="" data-toggle="tab" href="#story" role="tab" aria-controls="" aria-selected="true">История</a>
                            </li>
                            @if($user->role !== 'ROLE_USER')
                                <li class="nav-item">
                                    <a class="nav-link" id="" data-toggle="tab" href="#statistic" role="tab" aria-controls="" aria-selected="true">{{ $user->role === 'ROLE_DOCTOR' || $user->role === 'ROLE_CLINIC' ? 'Статистика' : ''}}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" id="" data-toggle="tab" href="#confirmation" role="tab" aria-controls="" aria-selected="true">На рассмотрении</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="row">
                    <div class="tab-content col-12" id="myTabContent">
                        @if($user->role !== 'ROLE_OPERATOR')
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
                        @else
                            <div class="tab-pane fade active show" id="confirmation" role="tabpanel" aria-labelledby="">@include('operator.tabs.confirmation_tab')</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
