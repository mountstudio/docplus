<footer class="bg-light border-top border-danger border-10">
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-12 col-sm-6 my-3 pt-0">
                <nav class="nav flex-column">
                    <h4 class="text-doc">ГЛАВНОЕ</h4>
                    <a class="nav-link text-secondary" href="/about_us">О НАС</a>
                    {{--<a class="nav-link text-secondary" href="/contacts">КОНТАКТЫ</a>--}}
                    <a class="nav-link text-secondary" href="/question">FAQ</a>
                    <a class="nav-link text-secondary" href="#">ОТЗЫВЫ О СЕРВЕСЕ</a>
                    <a class="nav-link text-secondary" href="/profile">ЛИЧНЫЙ КАБИНЕТ</a>
                </nav>
            </div>

            <div class="col-md-3 col-lg-3 col-12 col-sm-6 my-3 pt-3 pt-sm-0">
                <nav class="nav flex-column">
                    <h4 class="text-doc">ПАЦИЕНТУ</h4>
                    <a class="nav-link text-secondary" href="{{ route('doctor.index') }}">ВРАЧИ</a>
                    <a class="nav-link text-secondary" href="/clinic">КЛИНИКИ</a>
                    <a class="nav-link text-secondary" href="/service">УСЛУГИ</a>
                    <a class="nav-link text-secondary" href="/diagnostic">ДИАГНОСТИКА</a>
                    <a class="nav-link text-secondary" href="{{ route('blog.index') }}">БЛОГ</a>
                    <a class="nav-link text-secondary" href="{{ route('question.index') }}">Вопросы врачам</a>
                </nav>
            </div>
            <div class="col-md-3 col-lg-4 col-12 my-3 pb-5 pb-md-0">
                <nav class="nav flex-column">
                    <a href="/"><img class="w-50" src={{asset('img/doc_logo.png')}} alt=""></a>
                    <p class="pt-4 mb-0 text-secondary">Наши Контакты: +996(700)312-312</p>
                    <p class="pt-4 mb-0 text-secondary">По вопросам сотрудничества и партнерства обращайтесь по номеру</p>
                </nav>
            </div>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <a href="https://mount.kg/" target="_blank" class="text-muted small mb-4 mb-md-0">
                Made with <span class="text-danger font-weight-bold h6">&hearts;</span> by Mount
            </a>
        </div>
    </div>
</footer>


@push('styles')

@endpush
