@if(!isset($withOutName))
        <div class="form-row">
            <div class="col form-group">
                <label for="name">Имя</label>
                @if(old('name'))
                    <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}"  required>
                @else
                    <input id="name" type="text" name="name" class="form-control" value="{{ isset($doctor) && $doctor ? $doctor->user->name : '' }}"  required>
                @endif
                @if($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col form-group">
                <label for="last_name">Фамилия</label>
                @if(old('last_name'))
                    <input id="last_name" name="last_name" type="text" class="form-control" value="{{ old('last_name') }}" required>
                @else
                    <input id="last_name" name="last_name" type="text" class="form-control" value="{{ isset($doctor) && $doctor ? $doctor->user->last_name : '' }}" required>
                @endif
                @if($errors->has('last_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col form-group">
                <label for="patronymic">Отчество</label>
                @if(old('patronymic'))
                    <input id="patronymic" name="patronymic" type="text" class="form-control" value="{{ old('patronymic') }}" required>
                @else
                    <input id="patronymic" name="patronymic" type="text" class="form-control" value="{{ isset($doctor) && $doctor ? $doctor->user->patronymic : '' }}" required>
                @endif
                @if($errors->has('patronymic'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('patronymic') }}</strong>
                    </span>
                @endif
            </div>
        </div>
@endif

<div class="form-group">
    <label for="email">E-mail</label>
    @if(old('email'))
        <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required>
    @else
        <input id="email" name="email" type="email" class="form-control" value="{{ isset($doctor) && $doctor ? $doctor->user->email : '' }}" required>
    @endif
    @if($errors->has('email'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

@if(isset($create) && $create)

    <div class="form-group row">

        <div class="col-md-6">
            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>

            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-md-6">
            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>
@endisset