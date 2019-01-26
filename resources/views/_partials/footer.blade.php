{{--<div class="red-line-in-footer"></div>--}}
<footer class="bg-light p-5 border-top-10">

    <div class="container">
        <div class="row">
            <div class="col-3">
                <nav class="nav flex-column">
                    <a class="nav-link text-secondary" href="#">- О НАС</a>
                    <a class="nav-link text-secondary" href="#">-КОНТАКТЫ</a>
                    <a class="nav-link text-secondary" href="#">-FAQ</a>
                    <a class="nav-link text-secondary" href="#">-ОТЗЫВЫ</a>
                    <br>

                    <h4 class="text-primary">Врачу и клинике</h4>
                    <a class="nav-link text-secondary" href="">ЛИЧНЫЙ КАБИНЕТ</a>
                </nav>
            </div>

            <div class="col-3">
                <nav class="nav flex-column">
                    <h4 class="text-primary">Пациенту</h4>
                    <a class="nav-link text-secondary" href="#">ВРАЧИ</a>
                    <a class="nav-link text-secondary" href="#">УСЛУГИ ВРАЧЕЙ</a>
                    <a class="nav-link text-secondary" href="#">КЛИНИКИ</a>
                    <a class="nav-link text-secondary" href="#">ДИАГНОСТИКА</a>
                    <a class="nav-link text-secondary" href="#">БЛОГ</a>
                </nav>
            </div>
            <div class="col-auto">
                <a href="/"><img class="w-50 mt-4 mb-4" src="{{asset('img/Logo.png')}}" alt=""></a>
                <nav class="nav flex-column ">
                    <a class="nav-link text-secondary" href="">НАШИ КОНТАКТЫ: </a>
                    <a class="nav-link text-secondary" href="">НАШИ ТЕЛЕФОНЫ: </a>
                </nav>
            </div>
        </div>
    </div>
</footer>


@push('styles')



@endpush
