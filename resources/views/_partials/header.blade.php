<nav class="navbar navbar-expand-md navbar-dark navbar-laravel  py-0 pl-0 shadow-lg border-bottom sticky-top px-0">
    <div class="container-fluid pl-0  bg-primary">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 bg-light py-2 text-center pl-0 shadow">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="w-50" src={{asset('img/Logo.png')}} alt="">
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>


        <!-- Right Side Of Navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav text-center">
                <li class="nav-item">
                    <a href="{{ route('doctor.index') }}" class="nav-link text-light">Врачи
                        ({{ \App\Doctor::all()->count() }})</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('clinic.index') }}" class="nav-link text-light">Клиники
                        ({{ \App\Clinic::all()->count() }})</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('service.index') }}" class="nav-link text-light">Услуги
                        ({{ \App\Service::all()->where('is_diagnostic',false)->count() }})</a>
                </li>
            </ul>
            <ul class="m-auto list-unstyled text-center">
                <li class="text-light font-weight-normal">+996 (000) 000 000</li>
                <li class="text-light font-weight-normal">+996 (000) 000 000</li>
            </ul>
            <ul class="navbar-nav ml-auto text-center">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    @if (Auth::user()->unreadNotifications->count())
                        <li class="nav-item">
                            <a href="{{ route('user.notifications') }}" class="nav-link text-light position-relative">
                                <i class="fas fa-bell shadow position-relative"><span class="badge badge-info shadow-sm text-light font-weight-light position-absolute rounded-circle"
                                                                    style="right: -8px; top: -10px;">
                                    {{ Auth::user()->unreadNotifications->count() }}
                                </span></i>

                            </a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-dark" href="{{ route('options') }}">Админка</a>
                            <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
