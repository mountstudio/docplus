
<nav class="navbar navbar-expand-md navbar-dark navbar-laravel  py-0 pl-0 shadow-lg border-bottom sticky-top px-0">
    <div class="container-fluid pl-0  bg-primary">
        <div class="col-12 col-sm-12 col-md-3 col-lg-4 bg-light py-2 pl-0 shadow">

          <div class="row">

              <div class="col-auto my-auto">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                      <i class="fas fa-bars fa-lg text-primary "></i>
                  </button>
              </div>


              <div class="col text-center">
                  <a class="navbar-brand m-0" href="{{ url('/') }}">
                      <img class="img-fluid w-50 mx-auto" src={{asset('img/Logo.png')}} alt="">
                  </a>
              </div>

              <div class="col-auto my-auto">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContactPhone" aria-controls="navbarContactPhone" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                      <span class="fas fa-phone-square fa-lg text-primary text-right"></span>
                  </button>
              </div>

          </div>




        </div>




            <!-- Right Side Of Navbar -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav text-center">
                <li class="nav-item">
                    <a href="{{ route('doctor.index') }}" class="nav-link text-light">Врачи ({{ \App\Doctor::all()->count() }})</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('clinic.index') }}" class="nav-link text-light">Клиники ({{ \App\Clinic::all()->count() }})</a>
                </li>
            </ul>
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a href="" class="nav-link text-light">+996(777)312-312</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-light">+996(700)312-312</a>
                </li>
            </ul>
            <ul class="navbar-nav text-center ml-auto">

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
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
        <div class="collapse navbar-collapse navbar-expand-md text-center" id="navbarContactPhone">
            <ul class="navbar-nav text-center d-md-none">
                <li class="nav-item">
                    <a href="" class="nav-link text-light">+996(777)312-312</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-light">+996(700)312-312</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

