<div class="card-columns">
    @foreach($blogs as $blog)
        @include('blog.single', ['blog' => $blog])
    @endforeach
</div>