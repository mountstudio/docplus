@extends('layouts.app')

@section('content')

    <form action="{{ route('schedule.store') }}" method="POST" class="col-8" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
        <div class="form-group col-6">
                <label for="name_of_stock">Врач</label>
                <select id="id" class="form-control {{ $errors->has('doctor_id') ? 'is-invalid' : '' }}">
                    <option value="{{ null }}" {{ old('doctor_id') ? '' : 'selected' }} disabled>Выберите врача...</option>
                    @foreach($doctors as $doctor)
                        <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->name }} {{$doctor->last_name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group col-6">
                <label for="start_date">Дата расписания</label>
                <input class="form-control" type="date" id="schedule_date" name="schedule_date" required>
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
            let input = '<label for="new-input-\' + selectId + \'">Время записи</label><input name="times[]" type="time" id="new-input-' + selectId + '" class="form-control" required>';
            const removeBtn = $('<div class="btn btn-danger position-absolute" data-id="' + selectId + '" style="right: -40px; bottom: 22px;"><i class="fas fa-times"></i></div>');

            $('#selects').append(formRow);
            $('#new-row-'+selectId).append(formGroupSelect).append(formGroupInput).append(removeBtn);
            removeSelect(removeBtn);
            $('#new-input-group-'+selectId).append(input);
            appendOptions();
            selectId++;
        }

        function appendOptions() {
            let select = $('#new-select-'+selectId);
            select.append(option);
            select.selectize();

            updateOption();
            initProducts();
        }

        function registerSelect(item) {
            item.change(function (e) {
                updateOption();
                initProducts();
            });
        }

        function updateOption() {
            option = [];
            arrayProductIds = [];
            $('select.new-select').each(function () {
                arrayProductIds.push($(this).val());
            });
            console.log(arrayProductIds);
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