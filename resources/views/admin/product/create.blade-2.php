@extends('layouts.app')

@section('css')
    {{-- summernote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin/product">後台</a></li>
            <li class="breadcrumb-item"><a href="admin/product">產品管理</a></li>
            <li class="breadcrumb-item active" aria-current="page">新增頁面</li>
        </ol>
    </nav>


    <form method="POST" action="/admin/product/store" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">標題</label>
            <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title" required>

        </div>
        <div class="form-group">
            <label for="sub_title">副標題</label>
            <input multiple class="form-control" id="sub_title" name="sub_title" required>

        </div>
        <div class="form-group">
            <label for="img_url">上傳照片</label>
            <input type="file" class="form-control-file" id="img_url" name="img_url" required>
        </div>
        <div class="form-group">
            <label for="content">內容</label> <small>3:4</small>
            <textarea type="text" class="form-control" id="content" rows="10" name="content" required></textarea>
        </div>



        <button type="submit" class="btn btn-primary">送出</button>
    </form>

@endsection


@section('js')
    {{-- //summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="/lang/summernote-zh-TW.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/lang/summernote-zh-TW.min.js"></script>

    <script>
        $(document).ready(function() {
            // 要跟textarea的id一樣
            $('#content').summernote({
                height: 150,
                lang: 'zh-TW',
                popover: {
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ],
                    link: [
                        ['link', ['linkDialogShow', 'unlink']]
                    ],
                    table: [
                        ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                        ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                    ],
                    air: [
                        ['color', ['color']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['para', ['ul', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture']]
                    ]
                },
                callbacks: {
                    onImageUpload: function(files) {
                        for (let i = 0; i < files.length; i++) {
                            $.upload(files[i]);
                        }
                    },
                    onMediaDelete: function(target) {
                        $.delete(target[0].getAttribute("src"));
                    }
                },
            });


            $.upload = function(file) {
                let out = new FormData();
                out.append('file', file, file.name);

                //埋一個csef TOKEN避免傳資料無法驗證
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax_upload_img',
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: out,
                    success: function(img) {
                        $('#content').summernote('insertImage', img);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            };

            $.delete = function(file_link) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax_delete_img',
                    data: {
                        file_link: file_link
                    },
                    success: function(img) {
                        console.log("delete:", img);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            }
        });

    </script>



@endsection
