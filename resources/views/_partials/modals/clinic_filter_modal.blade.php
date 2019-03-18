<!-- Modal -->
<div class="modal fade" id="filterClinicsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Настройка поиска</h5>
                @include('_partials.modal_close_btn')
            </div>
            <div class="modal-body pb-0 px-0">
                @include('_partials.filters.clinic_filter')
            </div>
        </div>
    </div>
</div>
