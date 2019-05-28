@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row h-100">
            <div class="col-lg-5 col-md-6 bg-purple-dark p-5 h-100 row m-0">
                <form class="col-12 align-self-center text-white py-5 mt-5" action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="form-group my-4">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white text-muted" id="basic-addon1">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            <input type="text" name="email"
                                   class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                   placeholder="Электронная почта"
                                   aria-label="Username" aria-describedby="basic-addon1">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <i class="fas fa-exclamation-circle  text-red-light"></i>&nbsp;<strong class="text-white text-capitalize-first">{{ __($errors->first('email')) }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white text-muted" id="basic-addon4">
                                    <i class="fas fa-key"></i>
                                </span>
                            </div>
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Пароль"
                                   area-label="Password" area-describedby="basic-addon5">
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ __($errors->first('password')) }}</strong>
                            </span>
                        @endif

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Запомнить меня') }}
                                </label>
                            </div>
                        </div>

                        <div class="form-group mt-5 ">
                            <input type="submit" value="Войти" class="btn btn-primary"/>
                        </div>
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


    <!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
            </label>
        </div>
    </div>
    </div>

    <div class="form-group row mb-0">
    <div class="col-md-8 offset-md-4">
        <button type="submit" class="btn btn-primary">
{{ __('Login') }}
            </button>

@if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                </a>
@endif
            </div>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
-->


@endsection

@push('styles')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

@endpush

@push('scripts')

    <script src='https://www.google.com/recaptcha/api.js'></script>

@endpush
