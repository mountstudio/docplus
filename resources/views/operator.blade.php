<div class="container">
    <div class="row">
        <div class="col-12">
            @foreach($doctors as $doctor)
                <p>{{ $doctor->name }}</p>
            @endforeach
            @foreach($clinics as $clinic)
                <p>{{ $clinic->name }}</p>
            @endforeach
        </div>
    </div>
</div>
