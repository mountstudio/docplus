<div class="row  justify-content-center">
    <div class="btn-group d-none d-md-inline-flex" role="group" aria-label="Basic example">
        <a href="{{ request()->fullUrlWithQuery(['child' => $child]) }}" class="btn btn-primary {{ $child ?: 'active' }}"><i class="fas fa-baby"></i> Детские клиники</a>
        <a href="{{ request()->fullUrlWithQuery(['home' => $fullDay]) }}" class="btn btn-primary {{ $fullDay ?: 'active' }}"><i class="fas fa-ambulance"></i> Круглосуточно</a>
    </div>
    <div class="btn-group btn-group-vertical d-md-none" role="group" aria-label="Basic example">
        <a href="{{ request()->fullUrlWithQuery(['child' => $child]) }}" class="btn btn-primary {{ $child ?: 'active' }}"><i class="fas fa-baby"></i> Детские кл$fullDay </a>
        <a href="{{ request()->fullUrlWithQuery(['home' => $fullDay]) }}" class="btn btn-primary {{ $fullDay ?: 'active' }}"><i class="fas fa-ambulance"></i> Круглосуточно</a>
    </div>
</div>
ws
