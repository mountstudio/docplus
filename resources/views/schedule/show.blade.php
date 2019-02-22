<div class="container">
    <div class="row schedule">

        @foreach($schedules as $schedule)
            <div class="col-auto my-1">
                @if($schedule->active == 1)
                    <a href="/record/{{$schedule->id}}" class="btn btn-sm btn-danger disabled" disabled>{{ \Carbon\Carbon::make($schedule->time_of_record)->format('H:i') }}</a>
                @else
                    <button type="submit" data-id="{{ $schedule->id }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#recordModal">{{ \Carbon\Carbon::make($schedule->time_of_record)->format('H:i') }}</button>
                @endif
            </div>
        @endforeach
    </div>
</div>
<div class="modal fade" id="recordModal" tabindex="-1" role="form" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-secondary" id="exampleModalLabel">Введите свои данные</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body">
                    <form class="text-secondary" action="{{route('record.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Введите ваше имя:</label>
                            <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Ваше имя" value="{{ Auth::check() ? Auth::user()->name : '' }}" required {{ Auth::check() ? 'disabled' : '' }}>
                            @auth
                                <input type="hidden" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                            @endauth
                        </div>
                        <input type="hidden" name="schedule_id" id="schedule_id">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Введите ваш телефон:</label>
                            <input type="tel" name="phone_number" class="form-control" placeholder="Номер телефона">
                        </div>
                        <p class=" h6">*на указанный вами номер будет отправлено SMS с кодом подтверждения</p>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-outline-success my-4">Отправить</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>

        $('#recordModal').on('show.bs.modal', (e) => {
            let btn = $(e.relatedTarget);
            let id = btn.data('id');
            let input = $('#schedule_id');

            input.val(id);
        })

    </script>

@endpush
