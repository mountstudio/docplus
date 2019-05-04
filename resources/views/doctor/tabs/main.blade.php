@include('user.register', ['doctor' => isset($doctor) ? $doctor : null, 'create' => $create, 'errors' => $errors])

<div class="form-group">
	<label for="address">Address</label>
	<input id="address" name="address" type="text" class="form-control" value="{{ isset($doctor) ? $doctor->address : old('address') }}" required>
</div>

<div class="form-row">
	<div class="form-group col">
		<label for="price">Price</label>
		<input id="price" name="price" type="text" class="form-control" value="{{ isset($doctor) ? $doctor->price : old('price') }}" required>
	</div>
	<div class="form-group col">
		<label for="second_price">Цена за выезд (необязательно)</label>
		<input id="second_price" name="second_price" type="text" class="form-control" value="{{ isset($doctor) ? $doctor->second_price : old('second_price') }}">
	</div>
	<div class="form-group col">
		<label for="discount">Discount</label>
		<input id="discount" name="discount" type="text" class="form-control" value="{{ isset($doctor) ? $doctor->discount : old('discount') }}" required>
	</div>
	<div class="form-group col">
		<label for="age">Стаж</label>
		<input id="age" name="age" type="text" class="form-control" value="{{ isset($doctor) ? $doctor->age : old('age') }}" required>
	</div>
</div>
<div class="form-row align-items-center justify-content-center">
	<div class="form-group col-4 mr-5">
		<select name="level_id" id="level_of_doctor" class="form-control">
			<option value="{{ null }}">Выберите степень врача...</option>
			@foreach($levels as $level)
				<option value="{{ $level->id }}" {{ isset($doctor) && $doctor->level_id == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group col-auto">
		<label for="home">
			<input type="checkbox" name="home" id="home" {{ (isset($doctor) && $doctor->home) || old('home') ? 'checked' : '' }}>
			Выезд на дом
		</label>
	</div>
	<div class="form-group col-auto">
		<label for="child">
			<input type="checkbox" name="child" id="child" {{ (isset($doctor) && $doctor->child) || old('child') ? 'checked' : '' }}>
			Детский
		</label>
	</div>
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

<div class="form-row py-4">
	<div class="form-group col">
		<label for="first">Степень</label>
		<div id="first" class="rateYo p-1"></div>
		@if(old('first'))
			<input type="hidden" id="first_input" name="first" class="rating_input" value="{{ old('first') }}" required>
		@else
			<input type="hidden" id="first_input" name="first" class="rating_input" value="{{ isset($doctor) && $doctor->first ? $doctor->first : '' }}" required>
		@endif
	</div>

	<div class="form-group col">
		<label for="second">Категория</label>
		<div id="second" class="rateYo p-1"></div>
		@if(old('second'))
			<input type="hidden" id="second_input" name="second" class="rating_input" value="{{ old('second') }}" required>
		@else
			<input type="hidden" id="second_input" name="second" class="rating_input" value="{{ isset($doctor) && $doctor->second ? $doctor->second : '' }}" required>
		@endif
	</div>

	<div class="form-group col">
		<label for="third">Стаж</label>
		<div id="third" class="rateYo p-1"></div>
		@if(old('third'))
			<input type="hidden" id="third_input" name="third" class="rating_input" value="{{ old('third') }}" required>
		@else
			<input type="hidden" id="third_input" name="third" class="rating_input" value="{{ isset($doctor) && $doctor->third ? $doctor->third : '' }}" required>
		@endif
	</div>

	<div class="form-group col">
		<label for="rating_end">Профессиональный рейтинг</label>
		<div id="rating_end" class="rateYo"></div>
		@if(old('prof_rating'))
			<input type="hidden" id="rating_end_input" name="prof_rating" value="{{ old('prof_rating') }}" required>
		@else
			<input type="hidden" id="rating_end_input" name="prof_rating" value="{{ isset($doctor) && $doctor->prof_rating ? $doctor->prof_rating : '' }}" required>
		@endif
	</div>
	<input type="hidden" name="attent_rating" value="0">
	<input type="hidden" name="manner_rating" value="0">
	<input type="hidden" name="time_rating" value="0">
	<input type="hidden" name="rating" value="0">
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
