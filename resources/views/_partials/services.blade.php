@foreach($services as $service)
    @if(count($service->doctors) || count($service->clinics))
        <li class="nav-item h6 my-0 ">
            <a class="nav-link py-1 text-black" href="/objects/{{$service->id}}">{{$service->name}}</a>
        </li>
    @endif
@endforeach