<div class="form-group">
    <label for="title">Title</label>
    <input id="title" type="text" class="form-control" name="title" value="{{ isset($model) && $model ? $model->title : '' }}">
</div>
<div class="form-group">
    <label for="keywords">KeyWords (Слова через запятую)</label>
    <textarea name="keywords" id="keywords" class="form-control" cols="30" rows="10">{{ isset($model) && $model ? $model->keywords : '' }}</textarea>
</div>
<div class="form-group">
    <label for="description">Description (Описание страницы)</label>
    <textarea name="description" id="description" class="form-control" style="width: 100%;">{{ isset($model) && $model ? $model->description : '' }}</textarea>
</div>

@push('scripts')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({selector:'#description'});</script>
@endpush