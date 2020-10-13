@extends('layouts/nav_footer')


@section('css')
    <link rel="stylesheet" href="./css/news.css">
@endsection


@section('content')
    <section class="news">
        <div class="container">
            <h2 class="news_title">商品列表</h2>
            <div class="row">

                @foreach ($product_list as $product)
                    <div class="col-md-4">
                        <div class="product_list">
                            {{-- <h2>{{$product->product_type->name}}</h2> --}}
                            <h3>{{ $product->name }}</h3>
                            <img width="100%" src="{{ $product->product_img}}" alt="{{ $product->name }}">
                            <h2>{{$product->price}}</h2>
                            <h4>{{ $product->date }}</h4>
                            <p class="product_content">{{ $product->info}}</p>
                            <a class="btn btn-success" href="/product_info/{{$product->id}}" role="button">點擊查看更多 &raquo;</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
