@extends('layouts.app')

@section('css')

@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">後台</a></li>
      <li class="breadcrumb-item"><a href="/admin/product_type">商品類別</a></li>
      <li class="breadcrumb-item active" aria-current="page">修改</li>
    </ol>
  </nav>

<form method="POST" action="/admin/product_type/{{$product_type->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
      {{-- 一定要加method put!!!! --}}

    {{-- @foreach ($product_types as $product_type_id)
     <!-- 把舊資料套進下拉式選單 -->
     <option value="{{$product_type->id}}" @if($product_type->id == $product->product_type_)>
    @endforeach --}}

        <div class="form-group">
            <label for="title">商品類別名稱</label>
        <input type="text" class="form-control" id="title" aria-describedby="Productname" value="{{$product_type->name}}" name="name" required>
        </div>

        <div class="form-group">
            <label for ="sort">
                排序
            </label>
            <input type="number" min="0" step="1" class="form-control" id="sort" name="sort" value="{{$product_type->sort}}" required >
        </div>

    <button type="submit" class="btn btn-primary">送出</button>
</form>


@endsection


@section('js')

@endsection
