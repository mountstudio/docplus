@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            @for($i = 0; $i < 6; $i++)
                <div class="col-4 my-2">
                    <div class="card">
                        <img class="card-img-top" src=".../100px180/" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>


@endsection
