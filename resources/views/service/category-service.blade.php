<div class="row">

  {{-- @foreach($services->keys() as $key)
        <div class="col-2 my-5">
            <ul class="nav flex-column">
                <li class="nav-item color-text ">
                    <a class="nav-link pb-0 h5 font-weight-bold  " href="#">{{$key}}</a>
                </li>
                @include('_partials.services',['services' => $services[$key]])
            </ul>
        </div>
    @endforeach--}}

    <div class="col my-5">
        <ul class="nav flex-column">
            <li class="nav-item ">
                <a class="nav-link pb-0 h5 font-weight-bold text-blue-light " href="/getservice">УЗИ при беременности</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">3D УЗИ</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Ранних сроков</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Скрининг 1 триместра</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Скрининг 2 триместра</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Скрининг 3 триместра</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Фолликулометрия</a>
            </li>
        </ul>

        <ul class="nav flex-column">
            <li class="nav-item ">
                <a class="nav-link pb-0 h5 font-weight-bold text-blue-light " href="/getservice">УЗИ головы</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Глазного яблока</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Головного мозга</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Головного мозга детей</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Орбиты глаз</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Слюнных желез</a>
            </li>
        </ul>

        <ul class="nav flex-column">
            <li class="nav-item ">
                <a class="nav-link pb-0 h5 font-weight-bold text-blue-light " href="/getservice">УЗИ половой системы</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Матки и придатков</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Молочных желез</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Мошонки</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Полового члена</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Предстательной железы</a>
            </li>
        </ul>
    </div>

    <div class="col my-5">
        <ul class="nav flex-column">
            <li class="nav-item ">
                <a class="nav-link pb-0 h5 font-weight-bold text-blue-light " href="#">УЗИ шеи</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Паращитовидных желез</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Щитовидной железы</a>
            </li>
        </ul>

        <ul class="nav flex-column">
            <li class="nav-item ">
                <a class="nav-link pb-0 h5 font-weight-bold text-blue-light " href="/getservice">УЗИ брюшной полости</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Желудка</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Желчного пузыря</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Желчного пузыря с определением функции</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Надпочечников</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Обзор всех органов</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Печени</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Поджелуочной железы</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Почек</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Селезенки</a>
            </li>
        </ul>

        <ul class="nav flex-column">
            <li class="nav-item ">
                <a class="nav-link pb-0 h5 font-weight-bold text-blue-light " href="/getservice">УЗИ малого таза</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Мочевого пузыря</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Мочевого пузыря с определением остаточной мочи</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Обзорное (трансабдоминально)</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Обзорное (трансвагинально/трансректально</a>
            </li>
        </ul>
    </div>

    <div class="col my-5">
        <ul class="nav flex-column">
            <li class="nav-item ">
                <a class="nav-link pb-0 h5 font-weight-bold text-blue-light " href="/getservice">УЗИ суставов и тканей</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Коленного сустава</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Лимфатических узлов</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Мелкого сустава</a>
            </li>
            <li class="nav-item h6 my-0 ">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Мягких тканей</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Тазобедренного сустава</a>
            </li>
        </ul>

        <ul class="nav flex-column">
            <li class="nav-item ">
                <a class="nav-link pb-0 h5 font-weight-bold text-blue-light " href="/getservice">Дуплексное сканирование</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Аорты и нижней половой вены</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Артерий верхней конечностей</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Артерий нижней конечностей</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Брахтоцефальных артерий</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Вен верхних конечностей</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Вен нижних конечностей</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Дуги аорты и ее ветвей</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Магистральных сосудов головы</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Маточно-плацентарного кровотока</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Почечных артерий</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">УЗИ сердца (ЭКОКГ)</a>
            </li>
            <li class="nav-item h6 my-0">
                <a class="nav-link py-1 text-blue-light" href="/getservice">Сосудов печени</a>
            </li>
        </ul>
    </div>


</div>
