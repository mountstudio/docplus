<div class="container-fluid py-5 position-relative" id="backgrounder"
     style="background-position: center center; background-size: cover; {{ $blog->image && file_exists(public_path('uploads/'.$blog->image)) ? 'background-image: url('. asset('uploads/'.$blog->image) .')' : '' }}"
>
    <div class="back">
        <a href="{{ url()->previous() }}">
            <i class="fas text-white fa-2x fa-arrow-circle-left"></i>
        </a>
    </div>
    <div class="backdrop"></div>
    <div class="row py-5 my-5 justify-content-center align-items-end" style="height: 300px;">
        <div class="col-10">
            <h1 id="title_view" class="text-center font-weight-bold text-white">{{ $blog->title }}</h1>
        </div>
    </div>
</div>