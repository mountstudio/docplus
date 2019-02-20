@extends('admin.index')

@section('admin_content')

    <form action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="main-tab" data-toggle="tab" href="#main" role="tab" aria-controls="main" aria-selected="true">Main</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-controls="images" aria-selected="true">Images</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="educations-tab" data-toggle="tab" href="#educations" role="tab" aria-controls="educations" aria-selected="false">Educations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="specs-tab" data-toggle="tab" href="#specs" role="tab" aria-controls="specs" aria-selected="false">Specializations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="save-tab" data-toggle="tab" href="#save" role="tab" aria-controls="save" aria-selected="false">Save</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="main-tab">
                @include('doctor.tabs.main')
            </div>
            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                @include('doctor.tabs.images')
            </div>
            <div class="tab-pane fade" id="educations" role="tabpanel" aria-labelledby="educations-tab">
                @include('doctor.tabs.educations')
            </div>
            <div class="tab-pane fade" id="specs" role="tabpanel" aria-labelledby="specs-tab">
                @include('doctor.tabs.specs')
            </div>
            <div class="tab-pane fade" id="save" role="tabpanel" aria-labelledby="save-tab">
                @include('doctor.tabs.save')
            </div>
        </div>
    </form>

@endsection

@push('scripts')

    <script src="{{ asset('js/select2.js') }}"></script>
    <script>
        $('#specializations').select2({
            width: 'resolve'
        });
    </script>
    <script src="{{ asset('js/file-upload-with-preview.js') }}"></script>
    <script>
        var upload = new FileUploadWithPreview('myUniqueUploadId')
    </script>
@endpush

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">
    <style>
        .select2-container {
            width: 100%!important;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/file-upload-with-preview.css') }}">
@endpush