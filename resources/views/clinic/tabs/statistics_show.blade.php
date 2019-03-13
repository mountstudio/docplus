<div class="p-4">
    <span class="h3">Количество записей {{$records->count()}}</span>
</div>
@foreach($records as $record)
    <div class="row">
        <div class="col-12 my-2">
            <div class="card shadow-sm p-3">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-10">
                            <p>К вам записывался пользователь {{ $record->name }} с номером {{ $record->phone_number }}.</p>
                            <p>{{$record->created_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach