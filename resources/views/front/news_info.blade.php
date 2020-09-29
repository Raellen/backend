@extends('layouts/nav_footer')


@section('css')
<link rel="stylesheet" href="./css/news_info.css">
@endsection


@section('content')

        <section class="news_info" >
            <div class="container" style="margin-top: 60px;">
            <h2 class="info_title">{{$news_which->title}}</h2>
                <div class="row">
                    <div class="col-12 my-3 my-md-0 col-md-6">
                        <div class="image_box h-100">
                            <a href="{{$news_which->img_url}}" data-lightbox="image-1" data-title="My caption">
                                <img width="100%" src="{{$news_which->img_url}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 my-3 my-md-0 col-md-6">
                        <div class="info_content">
                            <h3>{{$news_which->sub_title}}</h3>
                            {{$news_which->content}}
                        </div>

                    </div>
                </div>
            </div>
        </section>
 @endsection

