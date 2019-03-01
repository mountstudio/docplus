<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="col-6 form-group">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="col-6 form-group">
            <label for="last_name">Last name</label>
            <input id="last_name" name="last_name" type="text" class="form-control" value="{{ $user->last_name }}">
        </div>
    </div>

    <button type="submit">Отправить</button>
</form>
