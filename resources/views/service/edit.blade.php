@extends('admin.index')

@section('admin_content')

    <form action="{{ route('service.update', $service) }}" method="POST">
        @csrf
        @method('PUT')
        @include('seo')
        <div class="form-group">
            <label for="name_of_service"></label>
            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_service" placeholder="Название Сервиса" value="{{$service->name}}">
            @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
            @endif
        </div>

        <div class="form-group">
            <label for="category">Choose category</label>
            <select name="category_id" id="category">
                <option value="{{$service->category->id}}">{{$service->category->name}}</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input"  name="is_diagnostic" id="exampleCheck2">
            <label class="form-check-label" for="exampleCheck2">Диагностика</label>
        </div>

        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>

@endsection