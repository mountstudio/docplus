
@include('user.register', ['doctor' => isset($clinic) ? $clinic : null])
<div class="form-row">
    <div class="form-group col">
        <label for="name_of_clinic"></label>
        <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_clinic" placeholder="Название Клиники" value="{{ isset($clinic) ? $clinic->name : old('name') }}">
        @if($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col">
        <label for="address_of_clinic"></label>
        <input name="address" type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address_of_clinic" placeholder="Адрес Клиники" value="{{ isset($clinic) ? $clinic->address : old('address') }}">
        @if($errors->has('address'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col">
        <label for="phones_of_clinic"></label>
        <input name="phones" type="text" class="form-control {{ $errors->has('phones') ? 'is-invalid' : '' }}" id="phones_of_clinic" placeholder="Телефон Клиники" value="{{ isset($clinic) ? $clinic->phones : old('phones') }}">
        @if($errors->has('phones'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phones') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-row justify-content-center">
    <div class="form-group col-auto">
        <label for="fullDay">
            <input type="checkbox" name="fullDay" id="fullDay" {{ isset($clinic) && $clinic->fullDay ? 'checked' : '' }}>
            Круглосуточно
        </label>
    </div>
    <div class="form-group col-auto">
        <label for="child">
            <input type="checkbox" name="child" id="child" {{ isset($clinic) && $clinic->child ? 'checked' : '' }}>
            Детский
        </label>
    </div>
</div>

<div class="form-group">
    <label for="categories">Сategories</label>
    <select class="form-control m-0 w-100" name="categories[]" id="categories" multiple="">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ isset($clinic) && !$clinic->categories->where('id', $category->id)->isEmpty() ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="doctors">Doctors</label>
    <select class="form-control m-0 w-100" name="doctors[]" id="doctors" multiple="">
        @foreach($doctors as $doctor)

            <option value="{{ $doctor->id }}" {{ isset($clinic) && !$clinic->doctors->where('id', $doctor->id)->isEmpty() ? 'selected' : '' }}>{{ $doctor->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-row">
    <div class="form-group col">
        <label for="clinic">Состояние клиники</label>
        <div id="clinic" class="rateYo"></div>
        <input type="hidden" id="clinic_input" name="clinic_rating" value="{{ isset($clinic) && $clinic->clinic_rating ? $clinic->clinic_rating : '' }}">
    </div>

    <div class="form-group col">
        <label for="comfort">Комфорт</label>
        <div id="comfort" class="rateYo"></div>
        <input type="hidden" id="comfort_input" name="comfort_rating" value="{{ isset($clinic) && $clinic->comfort_rating ? $clinic->comfort_rating : '' }}">
    </div>

    <div class="form-group col">
        <label for="discipline">Персонал</label>
        <div id="discipline" class="rateYo"></div>
        <input type="hidden" id="discipline_input" name="discipline_rating" value="{{ isset($clinic) && $clinic->discipline_rating ? $clinic->discipline_rating : '' }}">
    </div>

    <div class="form-group col">
        <label for="rating_end">Итоговый рейтинг</label>
        <div id="rating_end" class="rateYo"></div>
        <input type="hidden" id="rating_end_input" name="rating" value="{{ isset($clinic) && $clinic->rating ? $clinic->rating : '' }}">
    </div>
</div>

