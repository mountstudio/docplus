<div class="container">
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="form-group">
				<label for="specializations">Specializations</label>
				<select class="form-control m-0 w-100" name="specializations[]" id="specializations" multiple="">
					@foreach($specs as $spec)
						<option value="{{ $spec->id }}">{{ $spec->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
</div>