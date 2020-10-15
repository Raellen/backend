@extends('layouts.app')

@section('css')

@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/">後台</a></li>
      <li class="breadcrumb-item"><a href="/admin/product">產品管理</a></li>
      <li class="breadcrumb-item active" aria-current="page">新增頁面</li>
    </ol>
  </nav>


<form method="POST" action="/admin/product_type" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="title">商品類別名稱</label>
    <input type="text" class="form-control" id="title" aria-describedby="Productname" name="name" required>
    </div>

    <div class="form-group">
        <label for ="sort">
            排序
        </label>
        <input type="number" min="0" step="1" class="form-control" id="sort" name="sort" required >
    </div>


    <button type="submit" class="btn btn-primary">新增</button>
</form>

@endsection


@section('js')

@endsection
