@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/product">後台</a></li>
      <li class="breadcrumb-item active" aria-current="page">最新消息</li>
    </ol>
  </nav>

  <a class="btn btn-info mb-3 " href="/admin/product/create">新增最新消息</a>

  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>商品名稱</th>
            <th>商品圖片</th>
            <th>商品內容</th>
            <th>內容圖片</th>
            <th>價錢</th>
            <th>上架日期</th>
            <th>產品類別</th>
            <th>功能</th>
        </tr>
    </thead>

    <tbody>
        @foreach($product_list as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td><img width="200" src="{{$product->product_img}}"></td>
            <td>{{$product->info}}</td>
            <td><img width="200" src="{{$product->info_img}}"></td>
            <td>{{$product->price}}</td>
            <td>{{$product->date}}</td>
            <td>{{$product->product_type->name}}</td>

            <td>
                <a href="/product/edit/{{$product->id}}" class="btn btn-info">編輯</a>
                <button class="btn btn-danger btn_sm">刪除</button>
            </td>
        </tr>
        @endforeach
    </tbody>


</table>

@endsection


@section('js')

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" charset="UTF-8"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" charset="UTF-8"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

@endsection
