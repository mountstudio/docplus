@include('user.register', ['doctor' => isset($doctor) ? $doctor : null, 'create' => $create])

<div class="form-group">
	<label for="address">Address</label>
	<input id="address" name="address" type="text" class="form-control" value="{{ isset($doctor) ? $doctor->address : '' }}" required>
</div>

<div class="form-row">
	<div class="form-group col">
		<label for="price">Price</label>
		<input id="price" name="price" type="text" class="form-control" value="{{ isset($doctor) ? $doctor->price : '' }}" required>
	</div>
	<div class="form-group col">
		<label for="discount">Discount</label>
		<input id="discount" name="discount" type="text" class="form-control" value="{{ isset($doctor) ? $doctor->discount : '' }}" required>
	</div>
	<div class="form-group col">
		<label for="age">Стаж</label>
		<input id="age" name="age" type="text" class="form-control" value="{{ isset($doctor) ? $doctor->age : '' }}" required>
	</div>
</div>
<div class="form-row justify-content-center">
	<div class="form-group col-auto">
		<label for="home">
			<input type="checkbox" name="home" id="home">
			Выезд на дом
		</label>
	</div>
	<div class="form-group col-auto">
		<label for="child">
			<input type="checkbox" name="child" id="child">
			Детский
		</label>
	</div>
</div>
<div class="form-row py-4">
	<div class="form-group col">
		<label for="first">Степень</label>
		<div id="first" class="rateYo"></div>
		<input type="hidden" id="first_input" name="first" required>
	</div>

	<div class="form-group col">
		<label for="second">Категория</label>
		<div id="second" class="rateYo"></div>
		<input type="hidden" id="second_input" name="second" required>
	</div>

	<div class="form-group col">
		<label for="third">Стаж</label>
		<div id="third" class="rateYo"></div>
		<input type="hidden" id="third_input" name="third" required>
	</div>

	<div class="form-group col">
		<label for="rating_end">Профессиональный рейтинг</label>
		<div id="rating_end" class="rateYo"></div>
		<input type="hidden" id="rating_end_input" name="prof_rating">
	</div>
	<input type="hidden" name="attent_rating" value="0">
	<input type="hidden" name="manner_rating" value="0">
	<input type="hidden" name="time_rating" value="0">
	<input type="hidden" name="rating" value="0">
</div>

