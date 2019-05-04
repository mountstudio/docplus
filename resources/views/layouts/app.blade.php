<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/heart.png') }}" type="image/x-icon">
    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Nunito|Montserrat|Oswald" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/my-tailwind.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-white">
    @include('_partials.header')
    <div id="app">



        <main>
            @yield('content')
        </main>


        @include('_partials.footer')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $('.like-btn-ajax').click((e) => {
            e.preventDefault();
            let btn = $(e.currentTarget);

            $.ajax({
                url: btn.prop('href'),
                success: (data) => {
                    console.log(data);
                    if (data.action == 'like') {
                        btn.find('.fa-heart').removeClass('far');
                        btn.find('.fa-heart').addClass('fas');
                    } else if (data.action == 'dislike') {
                        btn.find('.fa-heart').removeClass('fas');
                        btn.find('.fa-heart').addClass('far');
                    }
                },
                error: () => {
                    console.log('error');
                }
            });
        })
    </script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey={{ env('YANDEX_MAPS_API_KEY') }}&lang=ru_RU" type="text/javascript"></script>
    @stack('scripts')

</body>
</html>
