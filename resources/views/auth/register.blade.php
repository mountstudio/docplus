@extends('layouts.app')

@push('metatags')
    <meta name="keywords" content="врачи, клиники, услуги, диагностика">
    <meta name="description" content="Docplus.kg - сборник врачей, клиник, услуг и диагностик">
    <title>Docplus.kg - регистрация</title>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row h-100">
            <div class="col-lg-5 col-md-6 bg-purple-dark p-5 h-100 row m-0">
                <form class="col-12 align-self-center text-white py-5 mt-5" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name-clinic">{{ __('Имя') }}</label>

                        <input id="name" type="text"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                               value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <i class="fas fa-exclamation-circle text-red-light"></i>&nbsp;<strong class="text-white text-capitalize-first">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="name" class="">{{ __('Фамилия') }}</label>

                        <input id="name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                               name="last_name" value="{{ old('last_name') }}" required autofocus>

                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert">
                                <i class="fas fa-exclamation-circle text-red-light"></i>&nbsp;<strong class="text-white text-capitalize-first">{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Адрес') }}</label>

                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <i class="fas fa-exclamation-circle text-red-light"></i>&nbsp;<strong class="text-white text-capitalize-first">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Пароль') }}</label>

                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                               required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <i class="fas fa-exclamation-circle text-red-light"></i>&nbsp;<strong class="text-white text-capitalize-first">{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">{{ __('Подтвердите пароль') }}</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Регистрация') }}
                        </button>

                        <p class="mt-4">По вопросам сотрудничества и партнерства оставьте нам предложение </p>
                        <a href="{{'/sentence'}}" class="btn btn-success">Оставить предложение</a>
                    </div>
                </form>
            </div>
            <div class="col row align-items-center m-0 text-white position-relative"
                 style="background-image: url({{ asset('img/welcome-doctor.png') }}); background-size: cover; background-repeat: no-repeat; background-position: center right;">
                <div class="backdrop"></div>
                <div class="col" style="position: relative; z-index: 10;">
                    <h1 class="mb-5">Добро пожаловать на <img src="{{ asset('img/doc_logo.png') }}"
                                                              style="width: 100px; height: auto;" alt=""></h1>
                    <h2 class="">Преимущества</h2>
                    <ul class="nav flex-column">
                        <li class="nav-item"><i class="fas fa-check"></i>&nbsp;Бесплатная регистрация</li>
                        <li class="nav-item"><i class="fas fa-check"></i>&nbsp;Онлайн запись к врачам</li>
                        <li class="nav-item"><i class="fas fa-check"></i>&nbsp;И многое другое</li>
                    </ul>
                </div>
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
