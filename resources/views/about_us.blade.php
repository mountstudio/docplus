@extends('layouts.app')

@section('content')
    <div class="container my-5">
    <div>
        <h2>Doc+ для пациентов</h2>
        <p>Наш проект - это ответ на извечный вопрос: "где найти хорошего врача?"</p>
        <p>Основные задачи нашего проекта - делать медицину более качественной,</p>
        <p>более доступной и более прозрачной</p>
    </div>

    <div class="row col-12 justify-content-center">
        <div class="col-4">
            <img src="{{ asset('img/chat.png') }}" alt="">
            <p class="text-uppercase"><strong>Настоящие отзывы</strong></p>
            <span>Мы публикуем проверенные отзывы людей записавшихся через DOC +, которые помогут Вам найти нужного специалиста.</span>
        </div>
        <div class="col-4">
            <img src="{{ asset('img/clock_blue.png') }}" alt="">
            <p class="text-uppercase"><strong>Экономия времени</strong></p>
            <span>Наша задача помочь оперативно найти хорошего специалиста и записываться к нему на приёкм</span>
        </div>
        <div class="col-4">
            <img src="{{ asset('img/doctor_assistant.png') }}" alt="">
            <p class="text-uppercase"><strong>Вопрос врачу</strong></p>
            <span>На нашем сайте Вы сможете задать вопрос врачам нашего города, не прибегая к помощи сомнительных форумов</span>
        </div>
    </div>
        <div class="my-5">
            <img src="{{ asset('img/coracao.jpg') }}" width="100%" alt="">
        </div>
    </div>

@endsection