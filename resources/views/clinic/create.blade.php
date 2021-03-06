@extends('admin.index')

@section('admin_content')
    <form action="{{ route('clinic.store') }}" method="POST" enctype="multipart/form-data" id="validate">
        @csrf
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="main-tab" data-toggle="tab" href="#main" role="tab" aria-controls="main" aria-selected="true">Главное</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="worktimes-tab" data-toggle="tab" href="#worktime" role="tab" aria-controls="worktime" aria-selected="true">Режим работы</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="services-tab" data-toggle="tab" href="#service" role="tab" aria-controls="services" aria-selected="true">Услуги</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="images-tab" data-toggle="tab" href="#images" role="tab" aria-controls="images" aria-selected="true">Изображения</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="save-tab" data-toggle="tab" href="#save" role="tab" aria-controls="save" aria-selected="false">Сохранение</a>
            </li>
        </ul>
        <div class="tab-content tab-validate" id="myTabContent">
            <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="main-tab">
                @include('clinic.tabs.main', ['create' => true])
            </div>
            <div class="tab-pane fade" id="worktime" role="tabpanel" aria-labelledby="worktimes-tab">
                @include('clinic.tabs.working_hours')
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
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script>
        $('#validate').validate({
            ignore: [],
            errorPlacement: function() {},
            invalidHandler: function() {
                setTimeout(function() {
                    $('.nav-tabs a small.required').remove();
                    let validatePane = $('.tab-content.tab-validate .tab-pane:has(input.error)').each(function() {
                        let id = $(this).attr('id');
                        $('.nav-tabs').find('a[href^="#' + id + '"]').append(' <small class="required">***</small>');
                    });

                    let rateYoValidations = $('.rating_input').each(function () {
                        let id = $(this).siblings('label').attr('for');
                        console.log($(this).hasClass('error'));
                        if ($(this).hasClass('error')) {
                            $('#'+id).addClass('border border-danger');
                        } else {
                            $('#'+id).removeClass('border border-danger');
                        }
                    });
                });
            },
            rules: {
                name: 'required',
                email: {
                    required: true,
                    email: true
                },
                clinic_name: 'required',
                address: 'required',
                phones: 'required',
                clinic_rating: 'required',
                comfort_rating: 'required',
                discipline_rating: 'required',
                last_name: 'required',
                patronymic: 'required',
                password: 'required',
                password_confirmation: 'required',
            }
        });
    </script>
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
        $('#branches').select2({
            width: 'resolve'
        });
        $('#doctors').select2({
            width: 'resolve'
        });
    </script>
    <script src="{{ asset('js/rateyo.js') }}"></script>
    <script>
        let rating_end = $("#rating_end").rateYo({
        {{ old('rating') ? 'rating: '.old('rating').',': '' }}
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        });

        $("#clinic").rateYo({
            {{ old('clinic_rating') ? 'rating: '.old('clinic_rating').',': '' }}
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
            {{ old('comfort_rating') ? 'rating: '.old('comfort_rating').',': '' }}
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
            {{ old('discipline_rating') ? 'rating: '.old('discipline_rating').',': '' }}
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