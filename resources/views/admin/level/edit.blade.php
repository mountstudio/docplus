@extends('admin.index')

@section('admin_content')

    <form action="{{ route('level.update', $level) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name_of_level"></label>
            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_level" placeholder="Название Степени" value="{{ $level->name }}">
            @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>

@endsection