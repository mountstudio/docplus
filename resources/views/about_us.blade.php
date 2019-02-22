@extends('layouts.app')

@section('content')
    <div class="container-fluid py-5 position-relative" style="background-image: url('{{ asset('img/coracao.jpg') }}'); background-size: cover; background-position: center;">
        <div class="backdrop"></div>


        <div class="row justify-content-center my-5">
            <div class="col-12 col-md-auto text-light text-center">
                <h2>Doc+ для пациентов</h2>
                <p>Наш проект - это ответ на извечный вопрос: "где найти хорошего врача?"</p>
                <p>Основные задачи нашего проекта - делать медицину более качественной,</p>
                <p>более доступной и более прозрачной</p>
            </div>
        </div>

    </div>


    <div class="row col-12 justify-content-center text-center my-5 py-5 border-bottom">
        <div class="col-12 col-md-4">
            <img class="img-fluid" src="{{ asset('img/chat.png') }}" alt="">
            <p class="text-uppercase"><strong>Настоящие отзывы</strong></p>
            <span>Мы публикуем проверенные отзывы людей записавшихся через DOC +, которые помогут Вам найти нужного специалиста.</span>
        </div>
        <div class="col-12 col-md-4">
            <img class="img-fluid" src="{{ asset('img/clock_blue.png') }}" alt="">
            <p class="text-uppercase"><strong>Экономия времени</strong></p>
            <span>Наша задача помочь оперативно найти хорошего специалиста и записываться к нему на приёкм</span>
        </div>
        <div class="col-12 col-md-4">
            <img class="img-fluid" src="{{ asset('img/doctor_assistant.png') }}" alt="">
            <p class="text-uppercase"><strong>Вопрос врачу</strong></p>
            <span>На нашем сайте Вы сможете задать вопрос врачам нашего города, не прибегая к помощи сомнительных форумов</span>
        </div>
    </div>
    <div class="row col-12 justify-content-center text-center my-5">

        <div class="col-12 col-md-9">
            <p class="text-secondary h2 text-center">
                ХОРОШИЕ ВРАЧИ СТАЛИ ДОСТУПНЕЙ
            </p>
            <p class="text-secondary">
                DOCPlus — это сервис по поиску врачей. Мы стремимся помочь людям оперативно найти хорошего доктора и записаться к нему на приём.
                Для этого мы создали базу врачей, собираем отзывы у пациентов после приёма и публикуем их на сайте.
                Мы предоставляем максимально подробную информацию о специалисте (опыт, квалификация, специализация, расписание), которая формирует его рейтинг.
            </p>
        </div>


    </div>

@endsection
