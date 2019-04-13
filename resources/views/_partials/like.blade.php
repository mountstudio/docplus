@user
    <a class="like-btn-ajax position-absolute border rounded-circle bg-light like-container" style="width: 42px; height: 42px;" href="{{ route('like', [$type, $model->id]) }}">
        <i class="{{ \App\Like::getExistedLike(Auth::user(), $model) ? 'fas' : 'far' }} fa-heart like m-auto text-danger position-absolute" style="top: 6px; left: 5px;"></i>
    </a>
@enduser
@guest
    <a class="position-absolute border rounded-circle bg-light like-container" style="width: 42px; height: 42px;" href="{{ route('login') }}">
        <i class="far fa-heart like m-auto text-danger position-absolute" style="top: 6px; left: 5px;"></i>
    </a>
@endguest
