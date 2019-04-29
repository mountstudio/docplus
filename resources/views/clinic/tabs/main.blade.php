
@include('user.register', ['doctor' => isset($clinic) ? $clinic : null, 'create' => $create])
<div class="form-row">
    <div class="form-group col">
        <label for="name_of_clinic"></label>
        <input name="clinic_name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_clinic" placeholder="Название Клиники" value="{{ isset($clinic) ? $clinic->clinic_name : old('clinic_name') }}" required>
        @if($errors->has('clinic_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('clinic_name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col">
        <label for="address_of_clinic"></label>
        <input name="address" type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" id="address_of_clinic" placeholder="Адрес Клиники" value="{{ isset($clinic) ? $clinic->address : old('address') }}" required>
        @if($errors->has('address'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group col">
        <label for="phones_of_clinic"></label>
        <input name="phones" type="text" class="form-control {{ $errors->has('phones') ? 'is-invalid' : '' }}" id="phones_of_clinic" placeholder="Телефон Клиники" value="{{ isset($clinic) ? $clinic->phones : old('phones') }}" required>
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
            <input type="checkbox" name="fullDay" id="fullDay" {{ (isset($clinic) && $clinic->fullDay) || old('fullDay') ? 'checked' : '' }}>
            Круглосуточно
        </label>
    </div>
    <div class="form-group col-auto">
        <label for="child">
            <input type="checkbox" name="child" id="child" {{ (isset($clinic) && $clinic->child) || old('child') ? 'checked' : '' }}>
            Детский
        </label>
    </div>
</div>

<div class="form-row">
<div class="form-group col">
    <label for="type">Type</label>
    <input name="type" type="text" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" id="type_of_clinic" placeholder="Тип клиника" value="{{ isset($clinic) ? $clinic->type : old('type') }}">
    @if($errors->has('type'))
        <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
    @endif
</div>
<div class="form-group col">
    <label for="branch_id">Branch</label>
    <select class="form-control m-0 w-100" name="branch_id" id="branch_id">
        <option value="{{ null }}">Нет</option>
        @foreach($branches as $branch)
            <option value="{{ $branch->id }}" {{ isset($clinic) && $clinic->branch_id ? 'selected' : '' }}>{{ $branch->name }}</option>
        @endforeach
    </select>
</div>
</div>

<div class="form-group">
    <label for="doctors">Doctors</label>
    <select class="form-control m-0 w-100" name="doctors[]" id="doctors" multiple="">
        @foreach($doctors as $doctor)

            <option value="{{ $doctor->id }}" {{ isset($clinic) && !$clinic->doctors->where('id', $doctor->id)->isEmpty() ? 'selected' : '' }}>{{ $doctor->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-row py-5">
    <div class="form-group col-3">
        <label for="latitude">Latitude</label>
        <input type="text" id="latitude" name="latitude" class="form-control">
    </div>
    <div class="form-group col-3">
        <label for="longtitude">Longtitude</label>
        <input type="text" id="longtitude" name="longtitude" class="form-control">
    </div>
    <div class="form-group col">
        <div id="map" style="width: 100%; height: 400px;"></div>
    </div>
</div>

<div class="form-row">
    <div class="form-group col">
        <label for="clinic">Состояние клиники</label>
        <div id="clinic" class="rateYo p-1"></div>
        @if(old('clinic_raing'))
            <input type="hidden" id="clinic_input" name="clinic_rating" class="rating_input" value="{{ old('clinic_rating') }}" required>
        @else
            <input type="hidden" id="clinic_input" name="clinic_rating" class="rating_input" value="{{ isset($clinic) && $clinic->clinic_rating ? $clinic->clinic_rating : '' }}" required>
        @endif
    </div>

    <div class="form-group col">
        <label for="comfort">Комфорт</label>
        <div id="comfort" class="rateYo p-1"></div>
        @if(old('comfort_raing'))
            <input type="hidden" id="comfort_input" name="comfort_rating" class="rating_input" value="{{ old('comfort_rating') }}" required>
        @else
            <input type="hidden" id="comfort_input" name="comfort_rating" class="rating_input" value="{{ isset($clinic) && $clinic->comfort_rating ? $clinic->comfort_rating : '' }}" required>
        @endif
    </div>

    <div class="form-group col">
        <label for="discipline">Персонал</label>
        <div id="discipline" class="rateYo p-1"></div>
        @if(old('discipline_raing'))
            <input type="hidden" id="discipline_input" name="discipline_rating" class="rating_input" value="{{ old('discipline_rating') }}" required>
        @else
            <input type="hidden" id="discipline_input" name="discipline_rating" class="rating_input" value="{{ isset($clinic) && $clinic->discipline_rating ? $clinic->discipline_rating : '' }}" required>
        @endif
    </div>

    <div class="form-group col">
        <label for="rating_end">Итоговый рейтинг</label>
        <div id="rating_end" class="rateYo p-1"></div>
        @if(old('raing'))
            <input type="hidden" id="rating_end_input" name="rating" class="rating_input" value="{{ old('rating') }}">
        @else
            <input type="hidden" id="rating_end_input" name="rating" class="rating_input" value="{{ isset($clinic) && $clinic->rating ? $clinic->rating : '' }}">
        @endif
    </div>
</div>

@push('scripts')
    <script>
        ymaps.ready(init);

        function init() {
            var myPlacemark,
                myMap = new ymaps.Map('map', {
                    center: [42.865388923088396, 74.60104350048829],
                    zoom: 12
                }, {
                    searchControlProvider: 'yandex#search'
                });

            // Слушаем клик на карте.
            myMap.events.add('click', function (e) {
                var coords = e.get('coords');

                $('#latitude').val(coords[0]);
                $('#longtitude').val(coords[1]);

                // Если метка уже создана – просто передвигаем ее.
                if (myPlacemark) {
                    myPlacemark.geometry.setCoordinates(coords);
                }
                // Если нет – создаем.
                else {
                    myPlacemark = createPlacemark(coords);
                    myMap.geoObjects.add(myPlacemark);
                    // Слушаем событие окончания перетаскивания на метке.
                    myPlacemark.events.add('dragend', function () {
                        getAddress(myPlacemark.geometry.getCoordinates());
                    });
                }
                getAddress(coords);
            });

            // Создание метки.
            function createPlacemark(coords) {
                return new ymaps.Placemark(coords, {
                    iconCaption: 'поиск...'
                }, {
                    preset: 'islands#violetDotIconWithCaption',
                    draggable: true
                });
            }

            // Определяем адрес по координатам (обратное геокодирование).
            function getAddress(coords) {
                myPlacemark.properties.set('iconCaption', 'поиск...');
                ymaps.geocode(coords).then(function (res) {
                    var firstGeoObject = res.geoObjects.get(0);

                    console.log(firstGeoObject.getAddressLine());
                    myPlacemark.properties
                        .set({
                            // Формируем строку с данными об объекте.
                            iconCaption: [
                                // Название населенного пункта или вышестоящее административно-территориальное образование.
                                firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                                // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
                                firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                            ].filter(Boolean).join(', '),
                            // В качестве контента балуна задаем строку с адресом объекта.
                            balloonContent: firstGeoObject.getAddressLine()
                        });
                });
            }
        }

    </script>
@endpush

