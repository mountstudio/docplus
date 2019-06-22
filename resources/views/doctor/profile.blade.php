@extends('layouts.app')

@section('content')

        <div class="container py-5">
            <div class="row py-5">
                <div class="col-12 col-md-3 pr-md-5 pr-0">
                    <div class="row align-items-start">
                        <div class="col">
                            <img class="w-100 rounded-circle" src="{{ $doctor->logo && file_exists(public_path('uploads/'.$doctor->logo)) ? asset('uploads/'.$doctor->logo) : asset('img/noavatar.png') }}" alt="">
                            <p class="text-secondary h4 m-0 mt-md-5 mb-md-2 text-center">{{$doctor->fullName}}</p>
                            <p class="text-secondary h5 m-0 mt-md-5 mb-md-2 text-center">{{$doctor->specs->implode('name', ', ') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-12 border-left pl-md-5 pl-0">
                    <div class="py-5">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="" data-toggle="tab" href="#edit-doctor" role="tab" aria-controls="" aria-selected="true">Изменить данные</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="" data-toggle="tab" href="#story-doctor" role="tab" aria-controls="" aria-selected="true">История</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="" data-toggle="tab" href="#statistic-doctor" role="tab" aria-controls="" aria-selected="true">Статистика</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="" data-toggle="tab" href="#schedule-doctor" role="tab" aria-controls="" aria-selected="true">Расписание</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="tab-content col-12" id="myTabContent">
                            <div class="tab-pane fade show active" id="edit-doctor" role="tabpanel" aria-labelledby="">@include('doctor.tabs.edit')</div>
                            <div class="tab-pane fade" id="story-doctor" role="tabpanel" aria-labelledby="">
                                @include('doctor.tabs.story_pick')
                            </div>
                            <div class="tab-pane fade" id="statistic-doctor" role="tabpanel" aria-labelledby="">
                                @include('doctor.tabs.statistic_tab')
                            </div>
                            <div class="tab-pane fade" id="statistic-doctor" role="tabpanel" aria-labelledby="">
                                @include('doctor.tabs.statistic_tab')
                            </div>
                            <div class="tab-pane fade" id="schedule-doctor" role="tabpanel" aria-labelledby="">
                                @include('doctor.tabs.schedule.schedule')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
