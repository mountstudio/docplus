@isset($id)
    <div class="rateYo-{{ isset($class) ? $class : '' }}" id="rateYo"></div>
@else
    <div class="rateYo-{{ isset($class) ? $class : '' }}"></div>
@endisset