<div class="row">
    <h1>История записей</h1>
</div>
@foreach($records as $record)
    <div class="row">
        <div class="col-12 my-2">
            <div class="card shadow-sm p-3">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-10">
                            Вы записывались к {{\App\User::getDoctorName($record->doctor_id) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach