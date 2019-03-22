<div class="col-12">
    <div class="row justify-content-end">
        <div class="col-12 col-md-8 order-1 order-md-0">
            <div class="border border-primary text-justify rounded p-1 p-md-3">
                {{ $question->content }}
            </div>
            <p class="text-right"><small>{{ \Carbon\Carbon::make($question->created_at)->format('d M Y H:i') }}</small></p>
        </div>
        <div class="col-12 col-md-2 order-0 order-md-1 p-0">
            <p class="text-center mb-0"><span class="font-weight-bold">{{ $question->name }}</span>, {{ $question->age }}</p>
        </div>
    </div>
</div>
