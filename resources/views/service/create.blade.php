@extends('admin.index')

@section('admin_content')

    <form action="{{ route('service.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name_of_service"></label>
            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_service" placeholder="Название Сервиса" value="{{ old('name') }}">
            @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

@endsection