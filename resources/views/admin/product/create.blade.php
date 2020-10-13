@extends('layouts.app')

@section('css')

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
        <input multiple class="form-control" id="sub_title" name="sub_title"  required>

    </div>
    <div class="form-group">
        <label for="img_url">上傳照片</label>
        <input type="file" class="form-control-file" id="img_url" name="img_url" required>
    </div>
    <div class="form-group">
        <label for="content">內容</label>        <small>3:4</small>
        <textarea type="text" class="form-control" id="content" rows="10" name="content" required></textarea>
    </div>



    <button type="submit" class="btn btn-primary">送出</button>
</form>

@endsection


@section('js')

@endsection
