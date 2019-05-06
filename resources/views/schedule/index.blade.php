@extends('admin.index')

@section('admin_content')

    <div class="row mb-3 justify-content-end">
        <div class="col-auto">
            <a href="{{ route('schedule.create') }}" class="btn btn-success">Новый</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered" id="schedule-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Время записи</th>
                    <th>Дата записи</th>
                    <th>Врач</th>
                    <th>Клиника</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection

@push('stylesheets')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

@endpush

@push('scripts')
    <script>
        $(function() {
            $('#schedule-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatable.getschedules') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'time_of_record', name: 'time_of_record' },
                    { data: 'date_of_record', name: 'date_of_record' },
                    { data: 'doctor_id', name: 'doctor_id' },
                    { data: 'clinic_id', name: 'clinic_id' },
                    { data: 'action', name: 'action' }
                ]
            });
        });
    </script>

@endpush