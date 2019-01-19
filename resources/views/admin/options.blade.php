@extends('admin.index')

@section('admin_content')



@endsection

@push('scripts')

    <script>
        ClassicEditor
            .create( document.querySelector( '#description-of-site' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endpush