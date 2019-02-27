<div class="row">

    @foreach($services->keys() as $key)
        <div class="col-12 col-md-4 col-lg-3 my-5">
            <ul class="nav flex-column">
                <li class="nav-item color-text ">
                    <a class="nav-link pb-0 h5 font-weight-bold  " href="#">{{$key}}</a>
                </li>
                @include('_partials.services',['services' => $services[$key]])
            </ul>
        </div>
    @endforeach

</div>
