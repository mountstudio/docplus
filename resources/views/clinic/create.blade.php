@extends('admin.index')

@section('admin_content')

    <form action="{{ route('clinic.store') }}" method="POST">
        @csrf
        @include('seo')
        @include('user.register', ['withOutName' => true])
        <div class="form-row">
            <div class="form-group col">
                <label for="name_of_clinic"></label>
                <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_clinic" placeholder="Название Клиники" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col">
                <label for="address_of_clinic"></label>
                <input name="address" type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address_of_clinic" placeholder="Адрес Клиники" value="{{ old('address') }}">
                @if($errors->has('address'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col">
                <label for="phones_of_clinic"></label>
                <input name="phones" type="text" class="form-control {{ $errors->has('phones') ? 'is-invalid' : '' }}" id="phones_of_clinic" placeholder="Телефон Клиники" value="{{ old('phones') }}">
                @if($errors->has('phones'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phones') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        @include('clinic.tabs.services')


        <div class="form-group">
            <label for="categories">Сategories</label>
            <select class="form-control m-0 w-100" name="categories[]" id="categories" multiple="">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="doctors">Doctors</label>
            <select class="form-control m-0 w-100" name="doctors[]" id="doctors" multiple="">
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->user->fullName }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-row">
            <div class="form-group col">
                <label for="clinic">Состояние клиники</label>
                <div id="clinic" class="rateYo"></div>
                <input type="hidden" id="clinic_input" name="clinic_rating">
            </div>

            <div class="form-group col">
                <label for="comfort">Комфорт</label>
                <div id="comfort" class="rateYo"></div>
                <input type="hidden" id="comfort_input" name="comfort_rating">
            </div>

            <div class="form-group col">
                <label for="discipline">Персонал</label>
                <div id="discipline" class="rateYo"></div>
                <input type="hidden" id="discipline_input" name="discipline_rating">
            </div>

            <div class="form-group col">
                <label for="rating_end">Итоговый рейтинг</label>
                <div id="rating_end" class="rateYo"></div>
                <input type="hidden" id="rating_end_input" name="rating">
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Создать</button>
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
            readOnly: true,
            ratedFill: "red",
            starWidth: "20px",
            spacing: "5px",
        });

        $("#clinic").rateYo({
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