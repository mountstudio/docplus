    <form action="{{ route('') }}" method="POST" enctype="multipart/form-data">
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
        <div class="form-row">
        <div class="col-6 form-group">
            <label for="address">Address</label>
            <input id="address" name="address" type="text" class="form-control" value="{{ $user->doctor->address }}">
        </div>
            <div class="form-group col-6">
                <label for="price">Price</label>
                <input id="price" name="price" type="text" class="form-control" value="{{ $user->doctor->price }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-6">
                <label for="discount">Discount</label>
                <input id="discount" name="discount" type="text" class="form-control" value="{{ $user->doctor->discount }}">
            </div>
        </div>
        <button type="submit">Отправить</button>
    </form>
