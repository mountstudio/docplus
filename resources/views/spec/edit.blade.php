@extends('admin.index')

@section('admin_content')

    <form action="{{ route('spec.update', $spec) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name_of_spec"></label>
            <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name_of_spec" placeholder="Название Сервиса" value="{{ $spec->name }}">
            @if($errors->has('name'))
                <span class="invalid-feedback" role="alert">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
            @endif
        </div>

        <div class="form-group">
            <label for="category">Choose category</label>
            <select name="category_id" id="category">
                <option value="{{ $spec->category->id }}">{{ $spec->category->name }}</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="description">Description (Описание специализации)</label>
            <textarea name="description" id="description" class="form-control" style="width: 100%;">{{ isset($model) && $model ? $model->description : '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>

@endsection

@push('scripts')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({selector:'#description'});</script>
@endpush