@extends('layouts.app')

@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="row align-items-start">


                    <div class="col">
                        <p class="text-secondary h3 m-0 mt-md-5 mb-md-2">{{ $user->fullName ?? 'Бобров Василий Елисеевич' }}</p>

                    </div>
                </div>
            </div>
            <div class="col-4">
                @includeWhen($user->role === "ROLE_DOCTOR", 'schedule.index',[
                    'schedules' => \App\Doctor::getScheduleActivated($user->doctor),
                    'profile' => true,
                ])
            </div>
        </div>
    </div>

    @includeWhen($user->role === "ROLE_OPERATOR" && isset($doctors) && isset($clinics), 'operator', [
        'doctors' => $doctors ?? null,
        'clinics' => $clinics ?? null,
    ])

@endsection
