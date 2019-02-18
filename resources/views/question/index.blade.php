@extends('layouts.app')

@section('content')

    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <h1 class="text-center">Вопрос врачу</h1>
                </div>
            </div>
            <div class="row py-5 justify-content-center">
                <div class="col-12 col-lg-10 border rounded shadow p-5 bg-info text-white position-relative">
                    <div class="backdrop index-1"></div>
                    <form action="" class="position-relative index-5">
                        <div class="form-group">
                            <select name="" class="form-control col-12 col-md-6 col-lg-4" id="">
                                <option value="">Выберите категорию</option>
                                @for($i = 0; $i < 5; $i++)
                                    <option value="">Выбор №{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6 col-md-4 col-lg-2">
                                <select name="" id="" class="form-control">
                                    <option value="">Пол</option>
                                    <option value="">Женский</option>
                                    <option value="">Мужской</option>
                                </select>
                            </div>
                            <div class="form-group col-6 col-md-4 col-lg-2">
                                <input class="form-control" type="text" placeholder="Возраст">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" placeholder="Электронная почта" class="form-control col-12 col-md-6 col-lg-4">
                        </div>


                        <div class="form-row">
                            <div class="form-group col-12">
                                <textarea name="" id="" cols="30" rows="10" class="form-control d-md-none d-lg-none"></textarea>
                            </div>
                            <div class="form-group col-md-8 col-lg-7">
                                <textarea name="" id="" cols="30" rows="20" class="form-control d-none d-md-block"></textarea>
                            </div>
                            <div class="col d-none d-md-block">
                                <p>Чтобы доктору было проще ответить на вопрос придеживайтесь следующих пунктов:</p>
                                <ul>
                                    <li>Как давно Вас беспокоит заболевание</li>
                                    <li>После чего Вы заметили проявление заболевания</li>
                                    <li>Были ли перемены в симптомах</li>
                                    <li>Проводились ли обследования, если да, то какие</li>
                                    <li>Принимались ли препараты, если да, то какие именно</li>
                                    <li>Четко сформулированный вопрос касательно недуга</li>
                                    <li>Добавляйте изображения хорошего качества</li>
                                </ul>
                                <p>(Старайтесь писать грамотно, перед отправкой вопроса, прочитайте его еще раз)</p>


                            </div>
                            <div class="col ">
                                <button class="btn btn-primary">Задать вопрос</button>
                                <p>
                                    <small>Задавая вопрос, Вы даете согласие на обработку персональных данных и принимаете
                                        <a href="">пользовательское соглашение</a>
                                    </small>
                                </p>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="file" class="form-control col-12 col-md-6 col-lg-4">
                            <small>Прикреплено изображений 0/5</small>
                        </div>


                    </form>
                </div>
            </div>

        </div>
    </section>

    @include('question.chat')

@endsection
