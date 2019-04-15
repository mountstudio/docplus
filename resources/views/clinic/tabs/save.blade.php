<div class="container">
    @include('seo', ['model' => isset($clinic) ? $clinic : null])
    <div class="row p-5">
        <div class="col-auto">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </div>
</div>