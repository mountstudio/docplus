@foreach($services as $service)
        <li class="nav-item h6 my-0 color-text ">
            <a class="nav-link py-1" href="/objects/{{$service->id}}">{{$service->name}}</a>
        </li>
@endforeach