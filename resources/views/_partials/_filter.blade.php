<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="{{ request()->fullUrlWithQuery(['child' => $child]) }}" class="btn btn-primary {{ $child ?: 'active' }}"><i class="fas fa-baby"></i> Детский</a>
                <a href="{{ request()->fullUrlWithQuery(['home' => $home]) }}" class="btn btn-primary {{ $home ?: 'active' }}"><i class="fas fa-ambulance"></i> На дом</a>

            </div>
        </div>
    </div>

</div>