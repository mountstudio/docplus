<div class="input-group mb-1 shadow position-relative">
    <div class="input-group-prepend  d-none d-md-flex">
        <span class="input-group-text bg-white text-muted" id="basic-addon1"><i class="fas fa-search"></i></span>
    </div>
    <input type="text" autocomplete="off" id="search-input-select2" class="form-control" placeholder="Клиники Врачи Услуги" aria-label="Username" aria-describedby="basic-addon1">
    <div id="search-result" class="position-absolute bg-white border border-dark d-none"></div>
    <div class="input-group-append">
        <a href="{{ route('search') }}" class="input-group-text bg-doc2 text-white shadow" id="search-btn"><span class="d-none d-md-block">Поиск</span> <i class="fas fa-search d-md-none"></i></a>
    </div>

</div>
<p class="small text-white text-center m-0">Например: стоматолог | кариес</p>

@push('scripts')
    <script>
        let result = $('#search-result');
        $('#search-input-select2').on('keyup', function () {
            let value = $(this).val();

            if (value != '') {
                let searchBtn = $('#search-btn');
                searchBtn.prop('href', '');
                searchBtn.prop('href', '/search?search=' + value);
                $.ajax({
                    url: '{!! route('search') !!}',
                    data: {'search': value},
                    success: (data) => {
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