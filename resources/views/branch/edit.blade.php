@extends('admin.index')

@section('admin_content')

    <form action="{{ route('branch.update', $branch) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name_of_branch"></label>
            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_branch" placeholder="Название Категории" value="{{ $branch->name }}">
            @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>

@endsection