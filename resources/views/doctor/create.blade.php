@extends('admin.index')

@section('admin_content')

    <form action="{{ route('doctor.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="address_of_doctor"></label>
            <input name="address" type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address_of_doctor" placeholder="Адрес Доктора" value="{{ old('address') }}">
            @if($errors->has('address'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('address') }}</strong>
				</span>
            @endif
        </div>
        <div class="form-group">
            <label for="price_of_doctor"></label>
            <input name="price" type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price_of_doctor" placeholder="Цена Доктора" value="{{ old('price') }}">
            @if($errors->has('price'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('price') }}</strong>
				</span>
            @endif
        </div>
        <div class="form-group">
            <label for="discount_of_doctor"></label>
            <input name="discount" type="text" class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" id="discount_of_doctor" placeholder="Скидка Доктора" value="{{ old('price') }}">
            @if($errors->has('discount'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('discount') }}</strong>
				</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

@endsection