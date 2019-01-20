@extends('admin.index')

@section('admin_content')

    <form action="{{ route('clinic.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name_of_clinic"></label>
            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_clinic" placeholder="Название Клиники" value="{{ old('name') }}">
            @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
            @endif
        </div>
        <div class="form-group">
            <label for="address_of_clinic"></label>
            <input name="address" type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address_of_clinic" placeholder="Адрес Клиники" value="{{ old('address') }}">
            @if($errors->has('address'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('address') }}</strong>
				</span>
            @endif
        </div>
        <div class="form-group">
            <label for="phones_of_clinic"></label>
            <input name="phones" type="text" class="form-control {{ $errors->has('phones') ? 'is-invalid' : '' }}" id="phones_of_clinic" placeholder="Телефон Клиники" value="{{ old('phones') }}">
            @if($errors->has('phones'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('phones') }}</strong>
				</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

@endsection