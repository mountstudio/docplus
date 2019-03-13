@extends('layouts.app')

@section('content')
    <div class="container border-bottom border-secondary">
        @include('_partials._head_rec')

        <div class="row py-5 justify-content-center">

            <div class="col-6">
                @include('_partials.search')
            </div>
        </div>
    </div>


    <div class="container">
        <p class="mt-3">Показано врачей ({{$doctors->count()}})</p>
        @foreach($doctors as $doctor)
            @include('doctor.card')
        @endforeach
    </div>
    <div class="container d-none d-lg-block">
        <p><strong>Где найти хорошего окулиста?</strong></p>
        <span>    Хорошего врача вы можете найти на DocDoc.ru. Здесь вы сможете выбрать адрес ближайшего приема специалиста, исходя из важных для вас критериев, а также осуществить запись к окулисту через интернет.
        </span>
        <p><strong>Что лечит врач-офтальмолог</strong></p>
        <span>
    Офтальмолог (окулист) – это врач, который специализируется на диагностике, лечении и профилактике глазных заболеваний. Переоценить тяжесть проблем со зрением сложно – для человека перестает существовать значительная часть окружающего мира. Лечение и предупреждение частной и полной потери зрения – это и есть то, что делает офтальмолог.
        </span>
        <p><strong> Когда необходимо обратиться к окулисту</strong></p>
        <span>
    l после 40-45 лет, не реже раза в год – для предупреждения глаукомы, катаракты и других заболеваний, которые могут быть вызваны возрастными изменениями;
    <br>1 при сахарном диабете, особенно второго типа – с целью предупреждения патологий зрения, характерных для этого заболевания;
    <br>2 при прогрессирующей близорукости, а также при близорукости и дальнозоркости высокой и средней степени тяжести;
    <br>3 если вы находитесь в группе риска по нарушениям зрения: страдаете гипертонической болезнью с высокими показателями артериального давления, имеете родственников, страдающих близорукостью, глаукомой, дистрофическими патологиями сетчатки глаза;
    <br>4 обязательным является профилактический осмотр для всех, чья профессиональная деятельность связана с повышенной нагрузкой на органы зрения.
        </span>
        <p class="my-5"><strong>ОБРАТИТЕ ВНИМАНИЕ!</strong> Информация на странице представлена для ознакомления.
            Для назначения лечения обратитесь к врачу.</p>
    </div>
    <div class="container d-none d-lg-block">
        <div class="row justify-content-center">
            @foreach($feedbacks as $feedback)
                <div class="col-6 my-5">
                    {{--<img class="rounded pt-3" src="{{ asset('img/doctor.png') }}" style="width:55px;" alt="">--}}
                    <div>
                        <p class="m-0"><strong>
                                @foreach($feedback->doctors as $doctor)
                                    {{$doctor->user->name}}
                                @endforeach
                            </strong></p>
                        <br>
                    </div>

                    <span style="overflow: hidden; text-overflow: clip;">{{ $feedback->comment }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
@endsection