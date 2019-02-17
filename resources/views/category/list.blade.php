<div class="col-12">
    <h3 class="text-secondary text-center font-weight-bold">СПЕЦИАЛЬНОСТИ ВРАЧЕЙ</h3>
    <br>



    <div class="row">

        @foreach($categories as $key => $category)
            <div class="col-3">
                <div class="row">
                    <div class="col-2">
                        <h3 class="text-primary">{{ $key }}</h3>
                    </div>
                    <div class="col-10">
                        <nav class="nav flex-column border-left pb-2 text-secondary">
                            @foreach($category as $item)
                                <a class="nav-link" href="{{ route('category.show', $item) }}">{{ $item->name }}</a>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>
        @endforeach



        {{--<div class="col-3">--}}
            {{--<div class="row">--}}
                {{--<div class="col-2">--}}
                    {{--<h3 class="text-primary">А</h3>--}}
                {{--</div>--}}
                {{--<div class="col-10">--}}
                    {{--<nav class="nav flex-column border-left pb-2 text-secondary">--}}
                        {{--<a class="nav-link" href="#">Аллерголог</a>--}}
                        {{--<a class="nav-link" href="#">Аллерголог</a>--}}
                        {{--<a class="nav-link" href="#">Аллерголог</a>--}}
                    {{--</nav>--}}
                {{--</div>--}}
                {{--<div class="col-2">--}}
                    {{--<h3 class="text-primary">В</h3>--}}
                {{--</div>--}}
                {{--<div class="col-10">--}}
                    {{--<nav class="nav flex-column border-left pb-2 text-secondary">--}}
                        {{--<a class="nav-link" href="#">Венеролог</a>--}}
                        {{--<a class="nav-link" href="#">Вертебролог</a>--}}
                    {{--</nav>--}}
                {{--</div>--}}
                {{--<div class="col-2">--}}
                    {{--<h3 class="text-primary">Г</h3>--}}
                {{--</div>--}}
                {{--<div class="col-10">--}}
                    {{--<nav class="nav flex-column border-left text-secondary">--}}
                        {{--<a class="nav-link" href="#">Гастроэнтеролог</a>--}}
                        {{--<a class="nav-link" href="#">Гематолог</a>--}}
                        {{--<a class="nav-link" href="#">Генетик</a>--}}
                        {{--<a class="nav-link" href="#">Гепатолог</a>--}}
                        {{--<a class="nav-link" href="#">Гинеколог</a>--}}
                        {{--<a class="nav-link" href="#">Гирудотерапефт</a>--}}
                    {{--</nav>--}}

                {{--</div>--}}
                {{--<div class="col-2">--}}
                    {{--<h3 class="text-primary">Д</h3>--}}
                {{--</div>--}}
                {{--<div class="col-10">--}}
                    {{--<nav class="nav flex-column border-left pb-2 text-secondary">--}}
                        {{--<a class="nav-link" href="#">Дерматовенеролог</a>--}}
                        {{--<a class="nav-link" href="#">Дерматолог</a>--}}
                        {{--<a class="nav-link" href="#">Диетолог</a>--}}
                    {{--</nav>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-3">--}}
            {{--<div class="row">--}}
                {{--<div class="col-2">--}}
                    {{--<h3 class="text-primary">А</h3>--}}
                {{--</div>--}}
                {{--<div class="col-10">--}}
                    {{--<nav class="nav flex-column border-left pb-2 text-secondary">--}}
                        {{--<a class="nav-link" href="#">Аллерголог</a>--}}
                        {{--<a class="nav-link" href="#">Аллерголог</a>--}}
                        {{--<a class="nav-link" href="#">Аллерголог</a>--}}
                    {{--</nav>--}}
                {{--</div>--}}
                {{--<div class="col-2">--}}
                    {{--<h3 class="text-primary">В</h3>--}}
                {{--</div>--}}
                {{--<div class="col-10">--}}
                    {{--<nav class="nav flex-column border-left pb-2 text-secondary">--}}
                        {{--<a class="nav-link" href="#">Венеролог</a>--}}
                        {{--<a class="nav-link" href="#">Вертебролог</a>--}}
                    {{--</nav>--}}
                {{--</div>--}}
                {{--<div class="col-2">--}}
                    {{--<h3 class="text-primary">Г</h3>--}}
                {{--</div>--}}
                {{--<div class="col-10">--}}
                    {{--<nav class="nav flex-column border-left text-secondary">--}}
                        {{--<a class="nav-link" href="#">Гастроэнтеролог</a>--}}
                        {{--<a class="nav-link" href="#">Гематолог</a>--}}
                        {{--<a class="nav-link" href="#">Генетик</a>--}}
                        {{--<a class="nav-link" href="#">Гепатолог</a>--}}
                        {{--<a class="nav-link" href="#">Гинеколог</a>--}}
                        {{--<a class="nav-link" href="#">Гирудотерапефт</a>--}}
                    {{--</nav>--}}

                {{--</div>--}}
                {{--<div class="col-2">--}}
                    {{--<h3 class="text-primary">Д</h3>--}}
                {{--</div>--}}
                {{--<div class="col-10">--}}
                    {{--<nav class="nav flex-column border-left pb-2 text-secondary">--}}
                        {{--<a class="nav-link" href="#">Дерматовенеролог</a>--}}
                        {{--<a class="nav-link" href="#">Дерматолог</a>--}}
                        {{--<a class="nav-link" href="#">Диетолог</a>--}}
                    {{--</nav>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        <div class="col-3">
            <div class="row">

            </div>
        </div>
    </div>


</div>
