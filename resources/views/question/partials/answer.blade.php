<div class="col-12">
    <div class="row align-items-center">
        <div class="col-5 col-md-2 row justify-content-center">
            <div class="col-8">
                <img src="{{ asset('img/doctor.png') }}" alt="" class="img-fluid">
            </div>
            <p class="text-center mb-0"><a href="" class="text-dark"><u>Миргасимова А.А.</u></a></p>
            <p class="text-center"><small>Стоматолог</small></p>
        </div>
        <div class="col-8 col-md-8">
            <div class="border border-danger text-justify rounded p-3">
                Ответ: Конечно можно
            </div>
            <p><small>{{ \Carbon\Carbon::now()->format('d.m.Y H:i') }}</small></p>
        </div>
    </div>
</div>
