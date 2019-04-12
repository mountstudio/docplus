@foreach($services as $service)
        <li class="nav-item h6 my-0 ">
            <a class="nav-link py-1 text-black" href="/objects/{{$service->id}}">{{$service->name}}</a>
        </li>
@endforeach