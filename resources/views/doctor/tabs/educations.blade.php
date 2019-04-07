<div class="full_edu">
    <p>{{ $doctor->educations ? implode(', ', $doctor->educations) : '' }}</p>
</div>
<div id="edu">

</div>
<div class="form-row justify-content-center my-5">
	<a href="#" id="add-form-field" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
</div>

@push('scripts')
	<script src="{{ asset('js/form-fields-doctor-education.js') }}"></script>
@endpush
