
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

