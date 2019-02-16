<footer class="bg-light border-top border-danger border-10">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 col-lg-3 col-sm-12 pt-2">
                <nav class="nav flex-column">
                    <a class="nav-link text-secondary" href="/about_us">О НАС</a>
                    <a class="nav-link text-secondary" href="/contacts">КОНТАКТЫ</a>
                    <a class="nav-link text-secondary" href="/question">FAQ</a>
                    <a class="nav-link text-secondary" href="#">ОТЗЫВЫ О СЕРВЕСЕ</a>

                    <h4 class="mt-4 text-primary">Врачам и клинике</h4>
                    <a class="nav-link text-secondary" href="/getdoctor/1 ">ЛИЧНЫЙ КАБИНЕТ</a>
                </nav>
            </div>

            <div class="col-md-6 col-lg-3 col-sm-12 pt-5">
                <nav class="nav flex-column">
                    <h4 class="text-primary">ПАЦИЕНТУ</h4>
                    <a class="nav-link text-secondary" href="/getdoctors">ВРАЧИ</a>
                    <a class="nav-link text-secondary" href="/">УСЛУГИ ВРАЧЕЙ</a>
                    <a class="nav-link text-secondary" href="/getclinics">КЛИНИКИ</a>
                    <a class="nav-link text-secondary" href="/">ДИАГНОСТИКА</a>
                    <a class="nav-link text-secondary" href="/">БЛОГ</a>
                </nav>
            </div>
            <div class="col-md-6 col-lg-3 col-sm-12 pt-5">
                <nav class="nav flex-column">
                    <a href="/"><img class="w-75" src={{asset('img/logo.png')}} alt=""></a>
                    <p class="pt-4 mb-0 text-secondary">Наши Контакты: </p>
                    <p class="text-secondary">Наши Телефоны: </p>
                </nav>
            </div>
        </div>
    </div>
</footer>


@push('styles')

@endpush
