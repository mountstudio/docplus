@extends('admin.index')

@section('admin_content')

    <form action="{{route('doctor.update', $doctor)}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name_of_doctor"></label>
            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_doctor" placeholder="Имя Доктора" value="{{ $user->name }}">
            @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
            @endif
        </div>
        <div class="form-group">
            <label for="last_name_of_doctor"></label>
            <input name="last_name" type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" id="last_name_of_doctor" placeholder="Фамилия Доктора" value="{{ $user->last_name }}">
            @if($errors->has('last_name'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('last_name') }}</strong>
				</span>
            @endif
        </div>
        <div class="form-group">
            <label for="email_of_doctor"></label>
            <input name="email" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email_of_doctor" placeholder="Email Доктора" value="{{ $user->email }}">
            @if($errors->has('email'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
            @endif
        </div>
        <div class="form-group">
            <label for="address_of_doctor"></label>
            <input name="address" type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address_of_doctor" placeholder="Адрес Доктора" value="{{ $doctor->address}}">
            @if($errors->has('address'))
                <span class="invalid-feedback" role="alert">x
					<strong>{{ $errors->first('address') }}</strong>
				</span>
            @endif
        </div>
        <div class="form-group">
            <label for="price_of_doctor"></label>
            <input name="price" type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price_of_doctor" placeholder="Цена Доктора" value="{{ $doctor->price }}">
            @if($errors->has('price'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('price') }}</strong>
				</span>
            @endif
        </div>
        <div class="form-group">
            <label for="discount_of_doctor"></label>
            <input name="discount" type="text" class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" id="discount_of_doctor" placeholder="Скидка Доктора" value="{{ $doctor->discount}}">
            @if($errors->has('discount'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('discount') }}</strong>
				</span>
            @endif
        </div>
        <div class="form-group">
            <label for="password_of_doctor"></label>
            <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password_of_doctor" placeholder="Пароль доктора" required>
            @if($errors->has('password'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
            @endif
        </div>
        <div class="form-group">
            <label for="password-confirm"></label>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Подтвердите пароль" required>
        </div>
        <button type="submit" class="btn btn-primary">Внести изменения</button>
    </form>

@endsection