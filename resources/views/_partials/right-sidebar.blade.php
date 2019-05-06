<div class="row shadow">

    <div class="col-12  border border-bottom-0 bg-danger">
            <div class="text-center text-light">
            <br>
            <h4 class="mb-0">Расписание приема врача</h4>
            <br>
        </div>
    </div>

        {{--<div class="col-12  border border-bottom-0 bg-danger">--}}
            {{--<div class="text-center text-light">--}}
                {{--<br>--}}
                {{--<h4 class="mb-0">Расписание приема врача</h4>--}}
                {{--<br>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-12 border ">--}}
            {{--<div class="pt-3">--}}
                {{--<p class="text-center text-secondary font-weight-bold pt-3">--}}
                    {{--У врача нет расписания--}}
                {{--</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endif--}}
    <div class="col-12 border ">
        <div class="pt-3">
            @if(count($schedules))
                @foreach($schedules->keys() as $key)
                    @dd($key);
                    @endforeach
            {{--@include('schedule.list')--}}
                @else
                <p class="text-center text-secondary font-weight-bold pt-3">
                    У данного врача нет расписания
                </p>
            @endif

            <p class="mt-3 text-secondary">Адресc : {{$doctor->address}}</p>
            {{--<p class="font-weight-bold text-primary pt-3 pb-3 h5">{{$doctor->price}} сом</p>--}}
            <p class="text-secondary">996-707-85-85-00</p>
        </div>
    </div>
    @if($doctor->home)
    <div class="col-12 border border-top-0">
        <p class="text-secondary">
            Выезд врача на дом <br> <span class="font-weight-bold">Стоимость выезда: от {{$doctor->second_price}} сом</span>
        </p>

        <!-- It's a button -->

        <div class="text-center">
            <button type="button" class="btn btn-danger text-white font-weight-bold mb-4 shadow" style="border-radius: 50px;">Вызвать врача на дом</button>
        </div>

    </div>
        @endif

</div>
