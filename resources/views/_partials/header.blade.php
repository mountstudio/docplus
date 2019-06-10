
<nav class="navbar navbar-expand-xl  py-0 pl-0 position-absolute px-0" style="z-index: 999; background: rgba(0,0,0,.4)">
    <div class="container-fluid px-0">
        <div class="col-12 col-sm-12 col-xl-3 py-2 pl-0 d-flex">

          {{--<div class="row">--}}

              <div class="col-auto my-auto d-xl-none">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                      <i class="fas fa-bars fa-lg text-doc "></i>
                  </button>
              </div>


              <div class="col text-center">
                  <a class="navbar-brand m-0" href="{{ url('/') }}">
                      <img class="" id="logo" src={{asset('img/doc_logo.png')}} alt="">
                  </a>
              </div>

              <div class="col-auto my-auto d-xl-none">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContactPhone" aria-controls="navbarContactPhone" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                      <i class="fas fa-phone fa-lg text-doc text-right"></i>
                  </button>
              </div>

          {{--</div>--}}


        </div>




            <!-- Right Side Of Navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav text-center d-none d-lg-flex">

                <li class="nav-item border-right">
                    <a href="{{ route('doctor.index') }}" class="nav-link text-light font-weight-bold">Врачи ({{ \App\Doctor::all()->count() }})</a>
                </li>
                <li class="nav-item border-right">
                    <a href="{{ route('clinic.index') }}" class="nav-link text-light font-weight-bold">Клиники ({{ \App\Clinic::all()->count() }})</a>
                </li>
                <li class="nav-item border-right">
                    <a href="{{ route('service.index') }}" class="nav-link text-light font-weight-bold">Услуги ({{ \App\Service::getServicesHasDoctorsAndClinics()->count() }})</a>
                </li>
                <li class="nav-item border-right">
                    <a href="{{ route('service.diagnostics') }}" class="nav-link text-light font-weight-bold">Диагностика ({{ \App\Service::getDiagnosticsHasDoctorsAndClinics()->count() }})</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blog.index') }}" class="nav-link text-light font-weight-bold">Блог</a>
                </li>
            </ul>
            <ul class="navbar-nav text-center bg-doc d-block d-lg-none">

                <li class="nav-item border-right">
                    <a href="{{ route('doctor.index') }}" class="nav-link text-light font-weight-bold">Врачи ({{ \App\Doctor::all()->count() }})</a>
                </li>
                <li class="nav-item border-right">
                    <a href="{{ route('clinic.index') }}" class="nav-link text-light font-weight-bold">Клиники ({{ \App\Clinic::all()->count() }})</a>
                </li>
                <li class="nav-item border-right">
                    <a href="{{ route('service.index') }}" class="nav-link text-light font-weight-bold">Услуги ({{ \App\Service::getServicesHasDoctorsAndClinics()->count() }})</a>
                </li>
                <li class="nav-item border-right">
                    <a href="{{ route('service.diagnostics') }}" class="nav-link text-light font-weight-bold">Диагностика ({{ \App\Service::getDiagnosticsHasDoctorsAndClinics()->count() }})</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blog.index') }}" class="nav-link text-light font-weight-bold">Блог</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('question.index') }}" class="nav-link text-light font-weight-bold">Вопрос врачу</a>
                </li>
            </ul>
            <ul class="ml-auto navbar-nav text-center d-none d-xl-block pl-3">
                <li class="nav-item">
                    <p class="nav-link text-light p-0 m-0 font-weight-bold">Нужна помощь?</p>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-light p-0">+996(700)312-312</a>
                </li>
            </ul>

            <ul class="navbar-nav text-center ml-auto d-block d-md-none bg-doc">

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Вход') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
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
                            @admin
                                <a class="dropdown-item text-dark" href="{{ route('options') }}">Админка</a>
                            @endadmin
                            <a class="dropdown-item text-dark" href="/profile">Личный кабинет</a>
                            <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выход') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

        </div>
        <div class=" shadow-sm ml-4 d-none d-xl-block h-100 bg-danger">
            <ul class="nav text-center ml-auto">

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Вход') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
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
                            @admin
                                <a class="dropdown-item text-dark" href="{{ route('options') }}">Админка</a>
                            @endadmin
                            <a class="dropdown-item text-dark" href="/profile">Личный кабинет</a>
                            <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выход') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        <div class="row d-block d-xl-none mx-auto w-100">
            <div class="collapse navbar-collapse text-center" id="navbarContactPhone">
                <ul class="navbar-nav text-center bg-doc">
                    <li class="nav-item">
                        <a href="" class="nav-link text-light">+996(777)312-312</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-light">+996(700)312-312</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-light">+996(700)312-312</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<nav class="d-xl-none navbar fixed-bottom navbar-expand-lg px-0 py-0 shadow-top" >
    <div class="container-fluid bg-white p-0">
        <div class="col-3 p-0 {{ Request::is('*doctor*') ? 'border-top border-bottom border-doc border-3 border-dark' : '' }}">
            <a href="{{ route('doctor.index') }}" class="nav-link text-center px-0">
                {{--<div class="doctor-icon p-0 mx-auto"></div>--}}
                <img src="{{ asset('svg/387561.svg') }}" style="width: 20px; height: 20px;" alt="">
                <p class="{{ Request::is('*doctor*') ? 'font-weight-bold' : 'font-weight-light' }} smallest p-0 m-0">Врачи</p>
            </a>
        </div>
        <div class="col-3 p-0 {{ Request::is('*clinic*') ? 'border-top border-bottom border-doc border-3 border-dark' : '' }}">
            <a href="{{ route('clinic.index') }}" class="nav-link  text-center px-0">
                {{--<div class="clinic-icon p-0 mx-auto"></div>--}}
                <img src="{{ asset('svg/1546113.svg') }}" style="width: 20px; height: 20px;" alt="">
                <p class="{{ Request::is('*clinic*') ? 'font-weight-bold' : 'font-weight-light' }} smallest p-0 m-0">Клиники</p>
            </a>
        </div>
        <div class="col-3 p-0 {{ Request::is('*service*') ? 'border-top border-bottom border-doc border-3 border-dark' : '' }}">
            <a href="{{ route('service.index') }}" class="nav-link  text-center px-0">
                {{--<div class="service-icon p-0 mx-auto"></div>--}}
                <img src="{{ asset('svg/1546104.svg') }}" style="width: 20px; height: 20px;" alt="">
                <p class="{{ Request::is('*service*') ? 'font-weight-bold' : 'font-weight-light' }} smallest p-0 m-0">Услуги</p>
            </a>
        </div>
        <div class="col-3 p-0 {{ Request::is('*diagnostic*') ? 'border-top border-bottom border-doc border-3 border-dark' : '' }}">
            <a href="{{ route('service.diagnostics') }}" class="nav-link  text-center px-0">
                {{--<div class="diagnostic-icon p-0 mx-auto"></div>--}}
                <img src="{{ asset('svg/1863349.svg') }}" style="width: 20px; height: 20px;" alt="">
                <p class="{{ Request::is('*diagnostic*') ? 'font-weight-bold' : 'font-weight-light' }} smallest p-0 m-0">Диагностика</p>
            </a>
        </div>
    </div>
</nav>

