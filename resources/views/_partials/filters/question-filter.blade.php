<form action="{{ route('question.index') }}" class="border pt-3 shadow my-4" method="get">

    <div class="px-3">
        <h5 class="h5">
            Категории
        </h5>
        @foreach($cats as $cat)
            <div class="form-check">
                <input class="form-check-input" name="catsChecked[]" type="checkbox" id="defaultCheck{{ $cat->id }}" {{ in_array($cat->id, $catsChecked) ? 'checked' : '' }} value="{{ $cat->id }}">
                <label class="form-check-label" for="defaultCheck{{ $cat->id }}">
                    {{ $cat->name }} <span class="small text-muted">({{ $cat->questions->where('active', 1)->count() }})</span>
                </label>
            </div>
        @endforeach

    </div>

    <button type="submit" class="btn btn-success rounded-0 w-100 mt-3">Применить</button>

</form>