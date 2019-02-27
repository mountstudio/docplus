@include('user.register')

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
<div class="form-row py-4">
	<div class="form-group col">
		<label for="attent">Внимание</label>
		<div id="attent" class="rateYo"></div>
		<input type="hidden" id="attent_input" name="attent_rating">
	</div>

	<div class="form-group col">
		<label for="manner">Манеры</label>
		<div id="manner" class="rateYo"></div>
		<input type="hidden" id="manner_input" name="manner_rating">
	</div>

	<div class="form-group col">
		<label for="time">Время ожидания</label>
		<div id="time" class="rateYo"></div>
		<input type="hidden" id="time_input" name="time_rating">
	</div>

	<div class="form-group col">
		<label for="rating_end">Итоговый рейтинг</label>
		<div id="rating_end" class="rateYo"></div>
		<input type="hidden" id="rating_end_input" name="rating">
	</div>
</div>

