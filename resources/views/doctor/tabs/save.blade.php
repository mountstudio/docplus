<div class="container">
	@include('seo', ['model' => isset($doctor) ? $doctor : null])
	<div class="row p-5">
		<div class="col-auto">
			<button type="submit" class="btn btn-success">Save</button>
		</div>
	</div>
</div>