<div class="py-5 container">
    <div id="selects">
    </div>
    <div class="form-group text-center">
        <a href="#" id="create-select" class="btn btn-primary"><i class="fas fa-plus"></i></a>

    </div>
</div>
@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/selectize.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/selectize.min.js') }}"></script>
    <script>
        let option = [];
        let arrayServiceIds = [];

        initServices();

        function initServices() {
            let query = '';
            arrayServiceIds ? $.each(arrayServiceIds, (index, item) => {
                if (index == 0) {
                    query += '?ids[]=';
                } else {
                    query += '&ids[]=';
                }
                query += item;
            }) : '';
            console.log(query)
            $.ajax({
                url: '/api/services' + query,
                method: 'GET',
                success: function (res) {
                    console.log(res);
                    let services = res.services;

                    for (let i = 0; i < services.length; i++) {
                        option.push('<option value="' + services[i].id + '">' + services[i].name + '</option>');
                    }
                },
                error: function () {
                    console.log('error');
                }
            });
            console.log(option);
        }

        let createBtn = $('#create-select');

        createBtn.click(function(e) {
            e.preventDefault();

            appendSelect();
        });

        let selectId = 0;

        function appendSelect() {
            let formRow = '<div class="form-row position-relative" id="new-row-' + selectId + '"></div>';
            let formGroupSelect = '<div class="form-group col-6" id="new-select-group-' + selectId + '"></div>';
            let formGroupInput = '<div class="form-group col-6" id="new-input-group-' + selectId + '"></div>';
            let input = '<label for="new-input-\' + selectId + \'">Цена услуги</label><input name="prices[]" type="text" id="new-input-' + selectId + '" class="form-control" required>';
            let selectLabel = '<label for="new-select-\' + selectId + \'">Услуга</label>';
            let select = $('<select name="services[]" class="new-select" id="new-select-' + selectId + '" required></select>');
            const removeBtn = $('<div class="btn btn-danger position-absolute" data-id="' + selectId + '" style="right: -40px; bottom: 22px;"><i class="fas fa-times"></i></div>');

            $('#selects').append(formRow);
            $('#new-row-'+selectId).append(formGroupSelect).append(formGroupInput).append(removeBtn);
            removeSelect(removeBtn);
            $('#new-select-group-'+selectId).append(selectLabel).append(select);
            $('#new-input-group-'+selectId).append(input);
            registerSelect(select);
            appendOptions();
            selectId++;
        }

        function appendOptions() {
            let select = $('#new-select-'+selectId);
            select.append(option);
            select.selectize();

            updateOption();
            initServices();
        }

        function registerSelect(item) {
            item.change(function (e) {
                updateOption();
                initServices();
            });
        }

        function updateOption() {
            option = [];
            arrayserviceIds = [];
            $('select.new-select').each(function () {
                arrayserviceIds.push($(this).val());
            });
            console.log(arrayserviceIds);
        }

        function removeSelect(item) {
            item.click(function (e) {
                e.preventDefault();

                let id = $(this).data('id');
                let selectId = $('#new-select-'+id).val();

                $('#new-row-'+id).remove();

                option = [];
                let index = arrayserviceIds.indexOf(selectId);
                if (index !== -1) arrayserviceIds.splice(index, 1);
                initServices();
            });
        }
    </script>
@endpush