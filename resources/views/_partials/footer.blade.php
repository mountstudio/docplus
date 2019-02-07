<footer class="bg-light border-10">
    <div class="container pt-5">
        <div class="row">
            <div class="col-3">
                <nav class="nav flex-column">
                    <a class="nav-link text-secondary" href="#">О НАС</a>
                    <a class="nav-link text-secondary" href="#">КОНТАКТЫ</a>
                    <a class="nav-link text-secondary" href="#">FAQ</a>
                    <a class="nav-link text-secondary" href="#">ОТЗЫВЫ О СЕРВЕСЕ</a>

                    <h4 class="mt-4 text-primary">Врачам и клинике</h4>
                    <a class="nav-link text-secondary" href="/getdoctor/1 ">ЛИЧНЫЙ КАБИНЕТ</a>
                </nav>
            </div>

            <div class="col-3">
                <nav class="nav flex-column">
                    <h4 class="text-primary">ПАЦИЕНТУ</h4>
                    <a class="nav-link text-secondary" href="/getdoctors">ВРАЧИ</a>
                    <a class="nav-link text-secondary" href="/">УСЛУГИ ВРАЧЕЙ</a>
                    <a class="nav-link text-secondary" href="/">КЛИНИКИ</a>
                    <a class="nav-link text-secondary" href="/">ДИАГНОСТИКА</a>
                    <a class="nav-link text-secondary" href="/">БЛОГ</a>
                </nav>
            </div>
            <div class="col-3">
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
