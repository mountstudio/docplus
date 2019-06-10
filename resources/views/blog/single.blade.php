<div class="card">
    <img src="{{ asset('uploads/'.$blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
    <div class="card-body">
        <h5 class="card-title">{{ $blog->title }}</h5>
        <p class="card-text">{{ str_limit($blog->content, 150, '...') }}</p>
        <p class="card-text"><small class="text-muted">{{ $blog->created_at }}</small></p>
    </div>
</div>