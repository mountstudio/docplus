@extends('layouts.app')

@section('content')

    <form action="{{ route('schedule.store') }}" method="POST" class="col-8 mt-5 pt-5" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
        <div class="form-group col-4">
                <label for="name_of_stock">Врач</label>
                <select id="doctor_id" name="doctor_id">
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-4">
                <label for="start_date">Дата расписания</label>
                <input class="form-control" type="date" id="date_of_record" name="schedule_date" required>
            </div>

            <div id="hidden-select" class="form-group mx-4 d-none">
                <label for="child-category">Выберите клинику</label>
                <select name="clinic_id" id="clinic_id" class="form-control {{ $errors->has('clinic_id') ? 'is-invalid' : '' }}"></select>
                @if($errors->has('clinic_id'))
                    <span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('clinic_id') }}</strong>
					</span>
                @endif
            </div>
        </div>

        <div id="selects">

        </div>

        <div class="form-group text-center">
            <a href="#" id="create-select" class="btn btn-primary"><i class="fas fa-plus"></i></a>
        </div>
        <!-- TODO create inputs with jquery ajax -->

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

@endsection

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/selectize.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script src="{{ asset('js/select_clinic.js') }}"></script>
    <script>
        let option = [];
        let arrayProductIds = [];

        let createBtn = $('#create-select');

        createBtn.click(function(e) {
            e.preventDefault();

            appendSelect();
        });

        let selectId = 0;

        function appendSelect() {
            let formRow = '<div class="form-row position-relative" id="new-row-' + selectId + '"></div>';
            let formGroupSelect = '<div class="form-group" id="new-select-group-' + selectId + '"></div>';
            let formGroupInput = '<div class="form-group col-6" id="new-input-group-' + selectId + '"></div>';
            let input = '<label for="new-input-\' + selectId + \'">Время записи</label><input name="time_of_records[]" type="time" id="new-input-' + selectId + '" class="form-control" required>';
            const removeBtn = $('<div class="btn btn-danger position-absolute" data-id="' + selectId + '" style="right: -40px; bottom: 22px;"><i class="fas fa-times"></i></div>');

            $('#selects').append(formRow);
            $('#new-row-'+selectId).append(formGroupSelect).append(formGroupInput).append(removeBtn);
            removeSelect(removeBtn);
            $('#new-input-group-'+selectId).append(input);
            selectId++;
        }


        function removeSelect(item) {
            item.click(function (e) {
                e.preventDefault();

                let id = $(this).data('id');
                let selectId = $('#new-select-'+id).val();

                $('#new-row-'+id).remove();

                option = [];
                let index = arrayProductIds.indexOf(selectId);
                if (index !== -1) arrayProductIds.splice(index, 1);
            });
        }
    </script>
@endpush