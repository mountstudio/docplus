<div class="form-group">
    <label for="title">Title</label>
    <input id="title" type="text" class="form-control" name="title" value="{{ isset($doctor) ? $doctor->title : '' }}">
</div>
<div class="form-group">
    <label for="keywords">KeyWords (Слова через запятую)</label>
    <textarea name="keywords" id="keywords" class="form-control" cols="30" rows="10">{{ isset($doctor) ? $doctor->keywords : '' }}</textarea>
</div>
<div class="form-group">
    <label for="description">Description (Описание страницы)</label>
    <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ isset($doctor) ? $doctor->description : '' }}</textarea>
</div>
