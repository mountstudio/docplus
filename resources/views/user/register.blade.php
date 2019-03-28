@if(!isset($withOutName))
        <div class="form-row">
            <div class="col form-group">
                <label for="name">Имя</label>
                <input id="name" type="text" name="name" class="form-control">
            </div>
            <div class="col form-group">
                <label for="last_name">Фамилия</label>
                <input id="last_name" name="last_name" type="text" class="form-control">
            </div>
            <div class="col form-group">
                <label for="patronymic">Отчество</label>
                <input id="patronymic" name="patronymic" type="text" class="form-control">
            </div>
        </div>
@endif

<div class="form-group">
    <label for="email">E-mail</label>
    <input id="email" name="email" type="email" class="form-control">
</div>

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