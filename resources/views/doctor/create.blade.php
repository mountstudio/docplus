@extends('admin.index')

@section('admin_content')

    <form action="{{ route('doctor.store') }}" method="POST">
        @csrf
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="main-tab" data-toggle="tab" href="#main" role="tab" aria-controls="main" aria-selected="true">Main</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="educations-tab" data-toggle="tab" href="#educations" role="tab" aria-controls="educations" aria-selected="false">Educations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="save-tab" data-toggle="tab" href="#save" role="tab" aria-controls="save" aria-selected="false">Save</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="main-tab">
                @include('doctor.tabs.main')
            </div>
            <div class="tab-pane fade" id="educations" role="tabpanel" aria-labelledby="educations-tab">
                @include('doctor.tabs.educations')
            </div>
            <div class="tab-pane fade" id="save" role="tabpanel" aria-labelledby="save-tab">
                @include('doctor.tabs.save')
            </div>
        </div>
    </form>

@endsection

@push('scripts')
    <script src="{{ asset('js/form-fields.js') }}"></script>
@endpush