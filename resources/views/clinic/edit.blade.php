@extends('admin.index')

@section('admin_content')
    <form action="{{ route('clinic.update', $clinic) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="main-tab" data-toggle="tab" href="#main" role="tab" aria-controls="main" aria-selected="true">Main</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="services-tab" data-toggle="tab" href="#service" role="tab" aria-controls="services" aria-selected="true">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-controls="images" aria-selected="true">Images</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="save-tab" data-toggle="tab" href="#save" role="tab" aria-controls="save" aria-selected="false">Save</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="main-tab">
                @include('clinic.tabs.main')
            </div>
            <div class="tab-pane fade" id="service" role="tabpanel" aria-labelledby="services-tab">
                @include('clinic.tabs.services')
            </div>
            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                @include('clinic.tabs.images')
            </div>
            <div class="tab-pane fade" id="save" role="tabpanel" aria-labelledby="save-tab">
                @include('clinic.tabs.save')
            </div>
        </div>
    </form>

@endsection

@push('scripts')

    <script src="{{ asset('js/select2.js') }}"></script>
    <script>
        $('#services').select2({
            width: 'resolve'
        });
    </script>
    <script src="{{ asset('js/file-upload-with-preview.js') }}"></script>
    <script>
        var upload = new FileUploadWithPreview('myUniqueUploadId')
    </script>
    <script>
        var uploadLogo = new FileUploadWithPreview('myUniqueLogoUploadId')
    </script>

    <script>
        $('#categories').select2({
            width: 'resolve'
        });
        $('#doctors').select2({
            width: 'resolve'
        });
    </script>
    <script src="{{ asset('js/rateyo.js') }}"></script>
    <script>
        let rating_end = $("#rating_end").rateYo({
            rating: {{ isset($clinic) && $clinic->rating ? $clinic->rating : '' }},
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        });

        $("#clinic").rateYo({
            rating: {{ isset($clinic) && $clinic->clinic_rating ? $clinic->clinic_rating : '' }},
            fullStar: true,
            numStars: 5,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
            onSet: function(rating, rateYoInstance) {
                $('#clinic_input').val(rating);
                let comfort = $('#comfort_input').val();
                let discipline = $('#discipline_input').val();

                let rating_this = ((parseInt(comfort, 10) + parseInt(discipline, 10) + parseInt(rating, 10)) / 3).toFixed(1);

                $('#rating_end_input').val(rating_this);
                rating_end.rateYo("rating", rating_this);
            }
        });
        $("#comfort").rateYo({
            rating: {{ isset($clinic) && $clinic->comfort_rating ? $clinic->comfort_rating : '' }},
            fullStar: true,
            numStars: 5,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
            onSet: function(rating, rateYoInstance) {
                $('#comfort_input').val(rating);
                let clinic = $('#clinic_input').val();
                let discipline = $('#discipline_input').val();

                let rating_this = ((parseInt(clinic, 10) + parseInt(discipline, 10) + parseInt(rating, 10)) / 3).toFixed(1);

                $('#rating_end_input').val(rating_this);
                rating_end.rateYo("rating", rating_this);
            }
        });
        $("#discipline").rateYo({
            rating: {{ isset($clinic) && $clinic->discipline_rating ? $clinic->discipline_rating : '' }},
            fullStar: true,
            numStars: 5,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
            onSet: function(rating, rateYoInstance) {
                $('#discipline_input').val(rating);
                let comfort = $('#comfort_input').val();
                let clinic = $('#clinic_input').val();

                let rating_this = ((parseInt(comfort, 10) + parseInt(clinic, 10) + parseInt(rating, 10)) / 3).toFixed(1);

                $('#rating_end_input').val(rating_this);
                rating_end.rateYo("rating", rating_this);
            }
        });
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
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
@endpush