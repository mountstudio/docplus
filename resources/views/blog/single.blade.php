<div class="card shadow border-0">
    <a href="{{ route('blog.show', $blog) }}">
        <img src="{{ asset('uploads/'.$blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
    </a>
    <div class="card-body">
        <a class="card-title font-weight-bold h4" href="{{ route('blog.show', $blog) }}">{{ $blog->title }}</a>
        <p class="card-text">{{ str_limit($blog->excerpt, 150, '...') }}</p>
        <p class="card-text"><small class="text-muted">{{ $blog->created_at }}</small></p>
    </div>
    @admin
        <div class="card-footer">
            <a class="btn btn-warning" href="{{ route('blog.edit', $blog) }}">Edit</a>
            <a class="text-danger" href="{{ route('blog.destroy', $blog) }}" onclick="event.preventDefault();getElementById('delete-blog-{{ $blog->id }}').submit();">Delete</a>
            <form id="delete-blog-{{ $blog->id }}" action="{{ route('blog.destroy', $blog) }}" method="post">
                @csrf
                @method("DELETE")
            </form>
        </div>
    @endadmin
</div>