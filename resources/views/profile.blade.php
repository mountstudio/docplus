@extends('layouts.app')

@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="row align-items-start">


                    <div class="col">
                        <p class="text-secondary h3 m-0 mt-md-5 mb-md-2">{{ $user->name ?? 'Бобров Василий Елисеевич' }}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @includeWhen($user->role === "ROLE_OPERATOR", 'operator', [
        'doctors' => $doctors,
        'clinics' => $clinics,
    ])
@endsection
