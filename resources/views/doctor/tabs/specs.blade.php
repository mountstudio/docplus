<div class="container">
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="form-group">
				<label for="clinics">Clinics</label>
				<select class="form-control m-0 w-100" name="clinics[]" id="clinics" multiple="">
					@foreach($clinics as $clinic)
						<option value="{{ $clinic->id }}" {{ isset($doctor) ? $doctor->clinics->where('id', $clinic->id)->isNotEmpty() ? 'selected' : '' : '' }}>{{ $clinic->clinic_name }} | {{ $clinic->address }}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="specializations">Specializations</label>
				<select class="form-control m-0 w-100" name="specializations[]" id="specializations" multiple="">
					@foreach($specs as $spec)
						<option value="{{ $spec->id }}" {{ isset($doctor) ? $doctor->specs->where('id', $spec->id)->isNotEmpty() ? 'selected' : '' : ''}}>{{ $spec->name }}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
</div>

@include('doctor.tabs.services')

@push('scripts')
	<script src="{{ asset('js/select2.js') }}"></script>
    <script>
        $('#clinics').select2({
            width: 'resolve'
        });
        $('#specializations').select2({
            width: 'resolve'
        });
        $('#services').select2({
            width: 'resolve'
        });
    </script>
@endpush

@push('stylesheets')
	<link rel="stylesheet" href="{{ asset('css/select2.css') }}">
    <style>
        .select2-container {
            width: 100%!important;
        }
    </style>
@endpush
