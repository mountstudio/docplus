@foreach($feedbacks as $feedback)

    <div class="col-12 col-lg-6">
        <div class="row">

            <div class="col-3">
                <a href="{{ route('doctor.show', $feedback->doctors->first()->id) }}">
                    <img class="img-fluid" src="{{ asset('uploads/'.$feedback->doctors->first()->logo) }}" alt="">
                </a>
            </div>

            <div class="col-12 col-lg-9">
                <a href="{{ route('clinic.show', $feedback->doctors->first()->id) }}"><h5 class="text-dark font-weight-bold">{{ $feedback->doctors->first()->fullName }}</h5></a>
                <p class="text-secondary">{{ $feedback->comment }} <br>

                </p>
                <p class="text-right text-secondary">{{ $feedback->name }} , {{ $feedback->created_at }}</p>
            </div>
        </div>
    </div>
@endforeach

