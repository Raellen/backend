@extends('layouts.app')

@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/news">後台</a></li>
      <li class="breadcrumb-item active" aria-current="page">最新消息</li>
    </ol>
  </nav>

  <a class="btn btn-info mb-3 " href="/admin/news/create">新增最新消息</a>

  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>標題</th>
            <th>副標題</th>
            <th>圖片</th>
            <th>功能</th>
        </tr>
    </thead>
    <tbody>
        @foreach($news_list as $news)
        <tr>
            <td>{{$news->title}}</td>
            <td>{{$news->sub_title}}</td>
            <td><img width="200" src="{{$news->img_url}}"></td>
            <td>
                <a href="news/edit/{{$news->id}}" class="btn btn-info">編輯</a>
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
