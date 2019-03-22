<div class="col-12">
    <div class="row align-items-center">
        <div class="col-5 col-md-3 row justify-content-center">
            <div class="col-8">
                <img src="{{ asset('uploads/'.$answer->doctor->pics->first()->image) }}" alt="" class="rounded-circle img-fluid">
            </div>
            <div class="col-12 p-0">
                <p class="text-center mb-0"><a href="{{ route('doctor.show', $answer->doctor->id) }}" class="text-dark"><u>{{ $answer->doctor->name }}</u></a></p>
                <p class="text-center"><small>{{ $answer->doctor->specs->implode('name', ', ') }}</small></p>
            </div>
        </div>
        <div class="col-8 col-md-8">
            <div class="border border-danger text-justify rounded p-3">
                {{ $answer->content }}
            </div>
            <p><small>{{ \Carbon\Carbon::make($answer->created_at)->formatLocalized('%d %A %B %Y %H:%M') }}</small></p>
        </div>
    </div>
</div>
