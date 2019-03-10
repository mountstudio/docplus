<div class="col-12 ">
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
                                <a class="nav-link pb-0" href="{{ route('category.show', $item) }}">{{ $item->name }}</a>
                            @endforeach
                        </nav>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


</div>
