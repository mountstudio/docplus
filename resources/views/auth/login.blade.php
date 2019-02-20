@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-5 border border-5 bg-light border-primary">

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group row justify-content-center bg-primary   py-2 ">

                        <p class="h5 text-light">
                            Вход
                        </p>


                    </div>
                    <div class="form-group pt-4 my-4">
                        <p class="font-weight-bold ">
                            Кого вы представляете
                        </p>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Клинику
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Врача
                            </label>
                        </div>
                    </div>
                    <div class="form-group my-4">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white text-muted" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" placeholder="Электронная почта" aria-label="Username" aria-describedby="basic-addon1">

                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white text-muted" id="basic-addon4"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="Пароль" area-label="Password" area-describedby="basic-addon5">
                        </div>

                        <div class="form-group mt-5 ">

                            <div class="g-recaptcha" data-sitekey="0000000000000000000000"></div>
                            <input type="submit" value="Отправить" class="rss-button btn btn-outline-dark mt-4"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
        $secret = '0000000000000000000000';
        $ip = $_SERVER['REMOTE_ADDR'];
        $response = $_POST['g-recaptcha-response'];
        $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
        //var_dump($rsp);
        $arr = json_decode($rsp, TRUE);
        if($arr['success']){
            if (isset($_POST['name'])) {$name = $_POST['name'];}
            if (isset($_POST['email'])) {$email = $_POST['email'];}
            if (isset($_POST['tel'])) {$tel = $_POST['tel'];}
            if (isset($_POST['comment'])) {$comment = $_POST['comment'];}
            $mail_header = "MIME-Version: 1.0\r\n";
            $mail_header.= "Content-type: text/html; charset=UTF-8\r\n";
            $mail_header.= "From: Any people \r\n";
            $mail_header.= "Reply-to: Reply to Name \r\n";

            $recipient= 'адрес, кому отправлять';
            $subject = 'Тема письма';
            $message = 'Поступила заявка на звонок
';
            if (isset($_POST['name'])){
                $message.= '
 Имя:' . htmlspecialchars($name) . '<br />';
            }
            if (isset($_POST['email'])){
                $message.= '
 Почта:' . htmlspecialchars($email) . '<br />';
            }
            if (isset($_POST['tel'])){
                $message.= '
 Телефон:' . htmlspecialchars($tel) . '<br />';
            }
            if (isset($_POST['comment'])){
                $message.= '
 О проекте: ' . htmlspecialchars($comment) . '<br />';
            }


            if (mail($recipient, $subject, $message, $mail_header))
                echo 'Письмо отправлено';
            else echo 'Письмо не отправлено';
        }
        else {
            echo 'Нет';
        }
    }
    ?>





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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

@endpush

@push('scripts')

    <script src='https://www.google.com/recaptcha/api.js'></script>

@endpush
