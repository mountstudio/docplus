@extends('layouts.app')

@section('content')

    <div class="container-fluid py-5 position-relative" id="backgrounder" style="background-position: center center; background-size: cover;">
        <div class="backdrop"></div>
        <div class="row py-5 my-5 justify-content-center align-items-end" style="height: 300px;">
            <div class="col-10">
                <h1 id="title_view" class="text-center font-weight-bold text-white"></h1>
            </div>
        </div>
    </div>

    <div class="container bg-white">
        <div class="row">
            <form class="col-12 py-5" action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="col-12">Креатив
                        <input name="image" id="image" type="file" class="form-control" onchange="readURL(this)" required>
                    </label>
                </div>

                <div class="form-group">
                    <label class="col-12">Название статьи
                        <input class="form-control" type="text" name="title" id="title" required>
                    </label>
                </div>

                <div class="form-group">
                    <label class="col-12">Контент
                        <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                    </label>
                </div>

                <button type="submit" class="btn btn-success col-auto">Создать</button>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        $('#title').keyup((e) => {
            $('#title_view').text($(e.target).val());
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#backgrounder')
                        .css('background', 'url(' + e.target.result + ')')
                        .css('background-size', 'cover')
                        .css('background-position', 'center center');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


        tinymce.init({
            selector: '#content',
            height: 500,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ],
            image_title: true,
            automatic_uploads: true,
            relative_urls: false,
            remove_script_host: false,
            image_class_list: [
                {title: 'Fluid image', value: 'img-fluid'},
            ],
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '/image-upload-tiny');
                xhr.setRequestHeader("X-CSRF-Token", "{{ csrf_token() }}");

                xhr.onload = function() {
                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            },
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });
    </script>

@endpush