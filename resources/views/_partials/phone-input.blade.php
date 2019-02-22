<input type="text" class="phone">





@push('scripts')

    <script src="{{ asset('js/cleave.min.js') }}"></script>
    <script src="{{ asset('js/cleave-phone.kg.js') }}"></script>

    <script>
        var cleave = new Cleave('.phone', {
            phone: true,
            phoneRegionCode: '{KG}'
        });
    </script>


@endpush
