<footer class="bg-light border-top border-danger border-10">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-12 pt-0 pt-md-5">
                <nav class="nav flex-column">
                    <h4 class="text-primary">ГЛАВНОЕ</h4>
                    <a class="nav-link text-secondary" href="/about_us">О НАС</a>
                    {{--<a class="nav-link text-secondary" href="/contacts">КОНТАКТЫ</a>--}}
                    <a class="nav-link text-secondary" href="/question">FAQ</a>
                    <a class="nav-link text-secondary" href="#">ОТЗЫВЫ О СЕРВЕСЕ</a>
                    <a class="nav-link text-secondary" href="/profile">ЛИЧНЫЙ КАБИНЕТ</a>
                </nav>
            </div>

            <div class="col-md-3 col-lg-3 col-12 pt-md-5 pt-3">
                <nav class="nav flex-column">
                    <h4 class="text-primary">ПАЦИЕНТУ</h4>
                    <a class="nav-link text-secondary" href="{{ route('doctor.index') }}">ВРАЧИ</a>
                    <a class="nav-link text-secondary" href="/clinic">КЛИНИКИ</a>
                    <a class="nav-link text-secondary" href="/service">УСЛУГИ</a>
                    <a class="nav-link text-secondary" href="/diagnostic">ДИАГНОСТИКА</a>
                    <a class="nav-link text-secondary" href="/">БЛОГ</a>
                </nav>
            </div>
            <div class="col-md-3 col-lg-3 col-12 pt-5">
                <nav class="nav flex-column">
                    <a href="/"><img class="w-75" src={{asset('img/Logo.png')}} alt=""></a>
                    <p class="pt-4 mb-0 text-secondary">Наши Контакты: </p>
                    <p class="text-secondary">Наши Телефоны: </p>
                </nav>
            </div>
        </div>
    </div>


</footer>


@push('styles')

@endpush
