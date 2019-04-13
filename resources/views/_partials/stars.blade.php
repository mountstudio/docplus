@isset($id)
    <div class="rateYo" id="rateYo-{{ isset($id) ? $id : '' }}"></div>
@else
    <div class="rateYo"></div>
@endisset