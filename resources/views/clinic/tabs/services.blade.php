<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="form-group">
                <label for="services">Services</label>
                <select class="form-control m-0 w-100" name="services[]" id="services" multiple="">
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>
    </div>
</div>