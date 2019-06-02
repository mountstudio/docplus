@extends('layouts.app')

@push('metatags')
    <meta name="keywords" content="врачи, клиники, услуги, диагностика">
    <meta name="description" content="Docplus.kg - сборник врачей, клиник, услуг и диагностик">
    <title>Docplus.kg - подача заявки</title>
@endpush

@section('content')

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-10 col-md-5 border border-5 bg-light border-primary">

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group row justify-content-center bg-primary   py-2 ">

                        <p class="h5 text-light">
                            Оставьте нам предложение
                        </p>


                    </div>

                    <div class="form-group my-4">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white text-muted" id="basic-addon1"><i
                                            class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control" placeholder="Ваше ФИО"
                                   aria-label="name" aria-describedby="basic-addon1">

                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white text-muted" id="basic-addon4"><i
                                            class="fas fa-phone"></i></span>
                            </div>
                            <input type="tel" name="phone" class="form-control" placeholder="Номер телефона"
                                   area-label="phone" area-describedby="basic-addon5">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white text-muted" id="basic-addon5"><i
                                            class="fas fa-envelope"></i></span>
                            </div>
                            <textarea name="message" class="form-control" placeholder="Предложение"
                                   area-label="message" style="height:100px;" area-describedby="basic-addon5">
                            </textarea>
                        </div>

                        <div class="form-group">


                            <input type="submit" value="Отправить" class="rss-button btn btn-outline-dark mt-4">
                            <p class="mt-2">Вас будет видеть большое количество пользователей нашего сервиса</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection

@push('styles')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

@endpush

@push('scripts')

    <script src='https://www.google.com/recaptcha/api.js'></script>

@endpush
