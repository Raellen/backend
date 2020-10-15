@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">後台</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="/admin/product_type">商品管理</a></li>
      <li class="breadcrumb-item active" aria-current="page">新增</li>
    </ol>
  </nav>

  <a class="btn btn-info mb-3 " href="/admin/product_type/create">新增最新消息</a>

  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>類別名稱</th>
            <th>排序</th>
            <th>功能</th>
        </tr>
    </thead>

    <tbody>
        @foreach($product_types as $product_type)
        <tr>
        <td>{{$product_type->name}}</td>
        <td>{{$product_type->sort}}</td>


            <td>
                <a href="/admin/product_type/{{$product_type->id}}/edit" class="btn btn-info">編輯</a>

                <button class="btn btn-danger btn_sm btn-delete" data-ptid="{{$product_type->id}}">刪除</button>
                {{-- <form id="delete-form_{{$product_type->id}}" action="/admin/product_type/{{$product_type->id}}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form> --}}

                <form id="delete-form-{{$product_type->id}}" action="/admin/product_type/{{$product_type->id}}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>


</table>

@endsection


@section('js')

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" charset="UTF-8"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" charset="UTF-8"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable();

    $("#example").on("click",".btn-delete", function(){

        var product_type_id = this.dataset.ptid;
        console.log(product_type_id);

        Swal.fire({
            title:'Are you sure?',
            text: "You won't be able to revert this!，如果刪除該類別，旗下所有產品也會一併刪除！",
            icon:'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) =>{
            if(result.isConfirmed){
                $('#delete-form-'+product_type_id).submit();
            }
        })

    })
} );



</script>

@endsection
