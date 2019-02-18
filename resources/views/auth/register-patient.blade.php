@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center py-5">
            <div class="col-md-5 border border-5 bg-light border-primary px-0 rounded">

                <div class="card border-primary">
                    <div class="card-header bg-primary text-center text-light font-weight-bold h4">
                        {{__('Регистрация')}}
                    </div>

                    <div class="card-body">
                        <form>


                            <div class="form-group my-4">


                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white text-muted" id="basic-addon2"><i class="fas fa-user-tie"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="ФИО" aria-label="Username" aria-describedby="basic-addon2">

                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white text-muted" id="basic-addon3"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Телефон" aria-label="Username" aria-describedby="basic-addon3">

                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white text-muted" id="basic-addon4"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Электронная почта" aria-label="Username" aria-describedby="basic-addon4">

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white text-muted" id="basic-addon4"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Пароль" area-label="Password" area-describedby="basic-addon5">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white text-muted" id="basic-addon4"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Введите пароль ещё раз" area-label="Username" area-describedby="basic-addon6">
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

@endsection


@push('styles')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

@endpush

@push('scripts')

    <script src='https://www.google.com/recaptcha/api.js'></script>

@endpush
