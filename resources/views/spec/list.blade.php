<div class="col-md-12 pb-4 pb-md-0">
    <h3 class="text-secondary text-center font-weight-bold">СПЕЦИАЛЬНОСТИ ВРАЧЕЙ</h3>
    <br>


    <div class="card-columns">
        @foreach($specs as $key => $spec)
            <div class="card border-0">
                <div class="row">
                    <div class="col-2">
                        <h3 class="text-doc">{{ $key }}</h3>
                    </div>
                    <div class="col-10">
                        <nav class="nav flex-column border-left pb-2 text-secondary">
                            @foreach($spec as $item)
                                <a class="nav-link pb-0 text-doc2 font-weight-bold" href="{{ route('spec.show', $item->id) }}">{{ $item->name }}<span class="ml-2 text-doc">{{count($item->doctors)}}</span></a>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


</div>