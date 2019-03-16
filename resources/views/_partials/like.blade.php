@auth
    <a class="like-btn-ajax position-absolute border rounded-circle bg-light" style="width: 42px; height: 42px;" href="{{ route('like', [$type, $model->id]) }}">
        <i class="{{ \App\Like::getExistedLike(Auth::user(), $model) ? 'fas' : 'far' }} fa-heart fa-2x m-auto text-danger position-absolute" style="top: 6px; left: 5px;"></i>
    </a>
@else
    <a class="position-absolute border rounded-circle bg-light" style="width: 42px; height: 42px;" href="{{ route('login') }}">
        <i class="far fa-heart fa-2x m-auto text-danger position-absolute" style="top: 6px; left: 5px;"></i>
    </a>
@endauth