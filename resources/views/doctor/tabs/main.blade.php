<div class="form-row">
	<div class="col-6 form-group">
		<label for="name">Name</label>
		<input id="name" type="text" name="name" class="form-control">
	</div>
	<div class="col-6 form-group">
		<label for="last_name">Last name</label>
		<input id="last_name" name="last_name" type="text" class="form-control">
	</div>
</div>

<div class="form-group">
	<label for="email">E-mail</label>
	<input id="email" name="email" type="email" class="form-control">
</div>

<div class="form-group">
	<label for="address">Address</label>
	<input id="address" name="address" type="text" class="form-control">
</div>

<div class="form-row">
	<div class="form-group col-6">
		<label for="price">Price</label>
		<input id="price" name="price" type="text" class="form-control">
	</div>
	<div class="form-group col-6">
		<label for="discount">Discount</label>
		<input id="discount" name="discount" type="text" class="form-control">
	</div>
</div>


<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
</div>		