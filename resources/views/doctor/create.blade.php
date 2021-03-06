@extends('admin.index')

@section('admin_content')
    <form action="{{ route('doctor.store') }}" method="POST" enctype="multipart/form-data" id="validate">
        @csrf
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="main-tab" data-toggle="tab" href="#main" role="tab" aria-controls="main" aria-selected="true">Main</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="logo-tab" data-toggle="tab" href="#logo" role="tab" aria-controls="logo" aria-selected="true">Logo</a>
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
        <div class="tab-content tab-validate" id="myTabContent">
            <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="main-tab">
                @include('doctor.tabs.main', ['create' => true])
            </div>
            <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                @include('doctor.tabs.logo')
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
                price: 'required',
                address: 'required',
                age: 'required',
                discount: 'required',
                first: 'required',
                second: 'required',
                third: 'required',
                last_name: 'required',
                patronymic: 'required',
                password: 'required',
                password_confirmation: 'required',
            }
        });
    </script>
    <script src="{{ asset('js/file-upload-with-preview.js') }}"></script>
    <script>
        var upload = new FileUploadWithPreview('myUniqueUploadId');
        var logoUpload = new FileUploadWithPreview('myUniqueLogoUploadId');
    </script>
    <script src="{{ asset('js/rateyo.js') }}"></script>
    <script>
        let rating_end = $("#rating_end").rateYo({
            {{ old('prof_rating') ? 'rating: '.old('prof_rating').',': '' }}
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        });

        $("#first").rateYo({
            {{ old('first') ? 'rating: '.old('first').',': '' }}
            fullStar: true,
            numStars: 5,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
            onSet: function(rating, rateYoInstance) {
                $('#first_input').val(rating);
                let second = $('#second_input').val();
                let third = $('#third_input').val();

                let rating_this = ((parseInt(second, 10) + parseInt(third, 10) + parseInt(rating, 10)) / 3).toFixed(1);

                $('#rating_end_input').val(rating_this);
                rating_end.rateYo("rating", rating_this);
            }
        });
        $("#second").rateYo({
            {{ old('second') ? 'rating: '.old('second').',': '' }}
            fullStar: true,
            numStars: 5,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
            onSet: function(rating, rateYoInstance) {
                $('#second_input').val(rating);
                let first = $('#first_input').val();
                let third = $('#third_input').val();

                let rating_this = ((parseInt(first, 10) + parseInt(third, 10) + parseInt(rating, 10)) / 3).toFixed(1);

                $('#rating_end_input').val(rating_this);
                rating_end.rateYo("rating", rating_this);
            }
        });
        $("#third").rateYo({
            {{ old('third') ? 'rating: '.old('third').',': '' }}
            fullStar: true,
            numStars: 5,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
            onSet: function(rating, rateYoInstance) {
                $('#third_input').val(rating);
                let second = $('#second_input').val();
                let first = $('#first_input').val();

                let rating_this = ((parseInt(second, 10) + parseInt(first, 10) + parseInt(rating, 10)) / 3).toFixed(1);

                $('#rating_end_input').val(rating_this);
                rating_end.rateYo("rating", rating_this);
            }
        });
    </script>
@endpush

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/rateyo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/file-upload-with-preview.css') }}">
@endpush