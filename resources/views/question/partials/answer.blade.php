<div class="col-12">
    <div class="row align-items-center">
        <div class="col-5 col-md-3 row justify-content-center">
            <div class="col-8">
                <img src="{{ asset('img/doctor.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-12">
                <p class="text-center mb-0"><a href="" class="text-dark"><u>Миргасимова А.А.</u></a></p>
                <p class="text-center"><small>Стоматолог</small></p>
            </div>
        </div>
        <div class="col-7 col-md-7">
            <div class="border border-danger rounded p-3">
                Конечно можно
            </div>
            <p><small>{{ \Carbon\Carbon::now()->format('d.m.Y H:i') }}</small></p>
        </div>
    </div>
</div>
