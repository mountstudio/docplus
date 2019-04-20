@include('user.register', ['doctor' => isset($doctor) ? $doctor : null, 'create' => $create])

<div class="form-group">
	<label for="address">Address</label>
	<input id="address" name="address" type="text" class="form-control" value="{{ isset($doctor) ? $doctor->address : old('address') }}" required>
</div>

<div class="form-row">
	<div class="form-group col">
		<label for="price">Price</label>
		<input id="price" name="price" type="text" class="form-control" value="{{ isset($doctor) ? $doctor->price : old('price') }}" required>
	</div>
	<div class="form-group col">
		<label for="discount">Discount</label>
		<input id="discount" name="discount" type="text" class="form-control" value="{{ isset($doctor) ? $doctor->discount : old('discount') }}" required>
	</div>
	<div class="form-group col">
		<label for="age">Стаж</label>
		<input id="age" name="age" type="text" class="form-control" value="{{ isset($doctor) ? $doctor->age : old('age') }}" required>
	</div>
</div>
<div class="form-row align-items-center justify-content-center">
	<div class="form-group col-4 mr-5">
		<select name="level_id" id="level_of_doctor" class="form-control">
			<option value="{{ null }}">Выберите степень врача...</option>
			@foreach($levels as $level)
				<option value="{{ $level->id }}" {{ isset($doctor) && $doctor->level_id == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group col-auto">
		<label for="home">
			<input type="checkbox" name="home" id="home" {{ (isset($doctor) && $doctor->home) || old('home') ? 'checked' : '' }}>
			Выезд на дом
		</label>
	</div>
	<div class="form-group col-auto">
		<label for="child">
			<input type="checkbox" name="child" id="child" {{ (isset($doctor) && $doctor->child) || old('child') ? 'checked' : '' }}>
			Детский
		</label>
	</div>
</div>
<div class="form-row py-4">
	<div class="form-group col">
		<label for="first">Степень</label>
		<div id="first" class="rateYo"></div>
		@if(old('first'))
			<input type="hidden" id="first_input" name="first" value="{{ old('clinic_rating') }}" required>
		@else
			<input type="hidden" id="first_input" name="first" value="{{ isset($doctor) && $doctor->first ? $doctor->first : '' }}" required>
		@endif
	</div>

	<div class="form-group col">
		<label for="second">Категория</label>
		<div id="second" class="rateYo"></div>
		@if(old('second'))
			<input type="hidden" id="second_input" name="second" value="{{ old('second') }}" required>
		@else
			<input type="hidden" id="second_input" name="second" value="{{ isset($doctor) && $doctor->second ? $doctor->second : '' }}" required>
		@endif
	</div>

	<div class="form-group col">
		<label for="third">Стаж</label>
		<div id="third" class="rateYo"></div>
		@if(old('third'))
			<input type="hidden" id="third_input" name="third" value="{{ old('third') }}" required>
		@else
			<input type="hidden" id="third_input" name="third" value="{{ isset($doctor) && $doctor->third ? $doctor->third : '' }}" required>
		@endif
	</div>

	<div class="form-group col">
		<label for="rating_end">Профессиональный рейтинг</label>
		<div id="rating_end" class="rateYo"></div>
		@if(old('prof_rating'))
			<input type="hidden" id="rating_end_input" name="prof_rating" value="{{ old('prof_rating') }}" required>
		@else
			<input type="hidden" id="rating_end_input" name="prof_rating" value="{{ isset($doctor) && $doctor->prof_rating ? $doctor->prof_rating : '' }}" required>
		@endif
	</div>
	<input type="hidden" name="attent_rating" value="0">
	<input type="hidden" name="manner_rating" value="0">
	<input type="hidden" name="time_rating" value="0">
	<input type="hidden" name="rating" value="0">
</div>

