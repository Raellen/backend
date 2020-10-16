@extends('layouts.app')

@section('css')

@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/">後台</a></li>
      <li class="breadcrumb-item"><a href="admin/news">最新消息</a></li>
      <li class="breadcrumb-item"><a href="admin/product">產品列表</a></li>
      <li class="breadcrumb-item active" aria-current="page">修改</li>
    </ol>
  </nav>

<form method="POST" action="/admin/product/update/{{$product->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    {{-- @foreach ($product_types as $product_type_id)
     <!-- 把舊資料套進下拉式選單 -->
     <option value="{{$product_type->id}}" @if($product_type->id == $product->product_type_)>
    @endforeach --}}

    <div class="form-group">
        <label for="title">標題</label>
        <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title"  value={{$product->title}}  required>

    </div>
    <div class="form-group">
        <label for="sub_title">副標題</label>
        <input multiple class="form-control" id="sub_title" name="sub_title" value={{$product->sub_title}} required>

    </div>
    <div class="form-group">
        <label for="img_url">現有的主要圖片</label>
        <br>
        <img src="{{$product->img_url}}">
    </div>

    <div class="form-group">
        <label for="img_url">上傳照片</label> <small>3:4</small>
        <input type="file" class="form-control-file" id="img_url" name="img_url">
    </div>
    <div class="form-group">
        <label for="content">內容</label>
        <textarea type="text" class="form-control" id="content" rows="10" name="content" required>{{$product->content}}</textarea>
    </div>



    <button type="submit" class="btn btn-primary">送出</button>
</form>


@endsection


@section('js')

@endsection
