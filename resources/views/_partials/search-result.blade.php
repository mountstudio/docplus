<nav class="nav flex-column">
    @foreach($result as $key => $items)
        @if(count($items))
            <a class="nav-link bg-grey-light font-weight-bold  mt-2 py-0 disabled" href="#" tabindex="-1" aria-disabled="true">{{ $key }}</a>
        @endif

        @foreach($items as $value)
            @if($value instanceof \App\Doctor)
                <a class="nav-link py-0" href="{{ route('doctor.show', $value->id) }}">{{ $value->user->fullName }}</a>
            @elseif($value instanceof \App\Clinic)
                <a class="nav-link py-0" href="{{ route('clinic.show', $value->id) }}">{{ $value->name }}</a>
            @elseif($value instanceof \App\Service)
                <a class="nav-link py-0" href="{{ route('service.show', $value->id) }}">{{ $value->name }}</a>
            @endif
        @endforeach
    @endforeach


</nav>
