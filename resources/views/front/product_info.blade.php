@extends('layouts/nav_footer')


@section('css')
<link rel="stylesheet" href="./css/news_info.css">
@endsection


@section('content')

        <section class="news_info" >
            <div class="container" style="margin-top: 60px;">
            <h2 class="info_title">{{$product_which->name}}</h2>
                <div class="row">
                    <div class="col-12 my-3 my-md-0 col-md-6">
                        <div class="image_box h-100">
                            <a href="{{$product_which->info_img}}" data-lightbox="image-1" data-title="My caption">
                                <img width="100%" src="{{$product_which->info_img}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 my-3 my-md-0 col-md-6">
                        <div class="info_content">
                            <h3>{{$product_which->price}}</h3>
                            {{$product_which->info}}
                        </div>

                    </div>
                </div>
            </div>
        </section>
 @endsection

