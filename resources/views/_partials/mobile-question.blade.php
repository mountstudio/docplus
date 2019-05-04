<a href="" class="btn btn-primary text-light w-100" data-toggle="modal" data-target="#infoModal">
    О специализации &nbsp;
    <i class="fas fa-info-circle fa-lg"></i>
</a>

<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">О специализации</h5>
                @include('_partials.modal_close_btn')
            </div>

            {!! $spec->description !!}

            <div class="modal-footer justify-content-center py-2 bg-danger" style="cursor:pointer;" data-dismiss="modal" aria-label="Close">
                <p class="font-weight-bold h3 text-light">
                    Закрыть
                </p>
            </div>
        </div>
    </div>
</div>

