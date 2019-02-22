<div class="row">

    @foreach($services->keys() as $key)
    <div class="col-2 my-5">
        <ul class="nav flex-column">
            <li class="nav-item color-text ">
                <a class="nav-link pb-0 h5 font-weight-bold  " href="#">{{$key}}</a>
            </li>
            @include('_partials.services',['services' => $services[$key]])
        </ul>
    </div>
    @endforeach


    <div class="col my-5">
        <ul class="nav flex-column">
            <li class="nav-item ">
                <a class="nav-link pb-0 h5 font-weight-bold text-blue-light " href="#">КТ</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="#">-сердца</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">-головного мозга</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="#">-позвоночника</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">-брюшной полости</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="#">-почек</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">-грудной клетки</a>
            </li>
        </ul>
    </div>
    <div class="col my-5">
        <ul class="nav flex-column">
            <li class="nav-item ">
                <a class="nav-link pb-0 h5 font-weight-bold text-blue-light " href="#">МРТ</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">-головного мозга</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="#">-позвоночника</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">-коленного суставам</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="#">-брюшной полости</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="#">- малого таза</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">-гипофиза</a>
            </li>
        </ul>
    </div>
    <div class="col my-5">
        <ul class="nav flex-column">
            <li class="nav-item ">
                <a class="nav-link pb-0 h5 font-weight-bold text-blue-light " href="#">Ренген</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="#">-легких</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">-позвоночника</a>

            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="#">-грудной клетки</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">-суставов</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="#">-маммография</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">- ирригоскопия</a>
            </li>
        </ul>
    </div>
    <div class="col my-5">
        <ul class="nav flex-column">
            <li class="nav-item h6 my-0">
                <a class="nav-link pt-3 text-blue-light" href="#">Флюорография</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">Электрокардиография (ЭКГ)</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">Колоноскопия</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">Гастроскопия</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">Бронхоскопия</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">Ректороманоскопия</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="#">Денситометрия</a>
            </li>
        </ul>
    </div>
</div>
