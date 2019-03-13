<div class="input-group mb-3 shadow position-relative">
    <div class="input-group-prepend  d-none d-md-flex">
        <span class="input-group-text bg-white text-muted" id="basic-addon1"><i class="fas fa-search"></i></span>
    </div>
    <input type="text" id="search-input-select2" class="form-control" placeholder="Клиники Врачи Услуги" aria-label="Username" aria-describedby="basic-addon1">
    <div id="search-result" class="position-absolute bg-white border border-dark d-none"></div>
    <div class="input-group-append">
        <span class="input-group-text bg-blue-light text-white border-blue-light shadow" id="basic-addon2"><span class="d-none d-md-block">Поиск</span> <i class="fas fa-search d-md-none"></i></span>
    </div>
</div>

@push('scripts')
    <script>
        let result = $('#search-result');
        $('#search-input-select2').on('keyup', function () {
            let value = $(this).val();

            if (value != '') {
                $.ajax({
                    url: '{!! route('search') !!}',
                    data: {'search': value},
                    success: (data) => {
                        console.log(data);
                        result.removeClass('d-none');
                        result.html(data);
                    },
                    error: () => {
                        console.log('error');
                    }
                });
            } else {
                result.empty();
                result.addClass('d-none');
            }
        })
    </script>
@endpush