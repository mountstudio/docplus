    <div class="col-12 d-none d-md-block">
    <h3 class="text-secondary text-center font-weight-bold">СПЕЦИАЛЬНОСТИ ВРАЧЕЙ</h3>
    <br>



    <div class="row">

        @foreach($specs as $key => $spec)
            <div class="col-3">
                <div class="row">
                    <div class="col-2">
                        <h3 class="text-doc">{{ $key }}</h3>
                    </div>
                    <div class="col-10">
                        <nav class="nav flex-column border-left pb-2 text-secondary">
                            @foreach($spec as $item)
                                <a class="nav-link pb-0 text-doc2 font-weight-bold" href="{{ route('spec.show', $item->category_id) }}">{{ $item->name }}</a>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


</div>