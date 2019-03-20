@extends('layouts.app')

@section('content')

    <div class="container py-5">
        @include('question.buttons.back_to_all')
        <div class="row py-5 justify-content-center">
            <div class="col-12 col-lg-10 border rounded shadow p-5 bg-info text-white position-relative">
                <div class="backdrop index-1"></div>
                <form action="{{ route('question.store') }}" method="post" class="position-relative index-5" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Имя" class="form-control col-12 col-md-8 col-lg-4">
                    </div>
                    <div class="form-group">
                        <select name="category_id" class="form-control col-12 col-md-8 col-lg-4" id="">
                            <option class="text-muted">Выберите категорию</option>
                            @foreach($cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6 col-md-4 col-lg-2">
                            <select name="sex" id="" class="form-control">
                                <option>Пол</option>
                                <option value="0">Женский</option>
                                <option value="1">Мужской</option>
                            </select>
                        </div>
                        <div class="form-group col-6 col-md-4 col-lg-2">
                            <input class="form-control" name="age" type="text" placeholder="Возраст">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Электронная почта" class="form-control col-12 col-md-8 col-lg-4">
                    </div>
                    <div class="form-group">
                        <input type="text" name="title" placeholder="Заголовок вопроса" class="form-control">
                    </div>


                    <div class="form-row">
                        <div class="form-group col-12 col-md-8 col-lg-7">
                            <textarea name="content" id="" cols="30" rows="20" class="form-control"></textarea>
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
                    </div>
                    <div class="form-group">
                        <input type="file" name="images[]" class="form-control col-12 col-md-8 col-lg-4">
                        <small>Прикреплено изображений 0/5</small>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Задать вопрос</button>
                        <p>
                            <small>Задавая вопрос, Вы даете согласие на обработку персональных данных и принимаете
                                <a href="">пользовательское соглашение</a>
                            </small>
                        </p>
                    </div>




                </form>
            </div>
        </div>
    </div>

@stop