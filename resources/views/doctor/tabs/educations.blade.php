<div class="row mt-4">
    <div class="col-6 border-right text-center">
        <p>Образование</p>
        <div id="edu">

        </div>
        <div class="form-row justify-content-center my-5">
            <a href="#" id="add-form-field" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
        </div>
    </div>

    <div class="col-6 text-center">
        <p>Опыт работы</p>
        <div id="exp">

        </div>
        <div class="form-row justify-content-center my-5">
            <a href="#" id="add-form-field2" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
        </div>
    </div>

    <div class="col-6 border-right text-center">
        <p>Квалификация</p>
        <div id="qual">

        </div>
        <div class="form-row justify-content-center my-5">
            <a href="#" id="add-form-field3" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        var doctorId = '{!! $doctor->id ?? '' !!}';
    </script>
    <script src="{{ asset('js/form-fields-doctor-education.js') }}"></script>
    <script src="{{ asset('js/form-fields-doctor-experience.js') }}"></script>
    <script src="{{ asset('js/form-fields-doctor-qualification.js') }}"></script>
@endpush
