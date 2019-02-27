@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-10 col-md-5 border border-5 bg-light border-primary">

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group row justify-content-center bg-primary   py-2 ">

                        <p class="h5 text-light">
                            Вход
                        </p>


                    </div>

                    <div class="form-group my-4">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white text-muted" id="basic-addon1"><i
                                        class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" placeholder="Электронная почта"
                                   aria-label="Username" aria-describedby="basic-addon1">

                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white text-muted" id="basic-addon4"><i
                                        class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Пароль"
                                   area-label="Password" area-describedby="basic-addon5">
                        </div>

                        <div class="form-group mt-5 ">


                            <input type="submit" value="Отправить" class="rss-button btn btn-outline-dark mt-4"/>

                        </div>
                    </div>
                </form>
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
