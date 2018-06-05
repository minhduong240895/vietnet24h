@extends('layouts.home')
@section('pageTitle', 'Vietnet24h')
@section('content')
    <div class="content container">
        <section class="cat_header clearfix">
            <ul class="map-breadcrumb left">
                <li class="start">
                    <h4>
                        <a href="{{url('danh-muc/'.$currentCate->slug)}}">{{$currentCate->name}}</a>
                    </h4>
                </li>
                <li>
                    <h4>
                        <a href="javascript:void(0)">{{$currentTopic->name}}</a>
                    </h4>
                </li>
            </ul>
        </section>
        <section class="cat_header clearfix">
            <span class="btn_sub_menu active"><i class="ic ic-caret-2-down"></i></span>

            @if($first_hot_news)
                <section class="hot_news">
                    <div class="row">
                        <div class="category-content">
                            <div class="col-sm-6">
                                <article>
                                    <div class="thumb_big">
                                        <a class="thumb thumb_5x3" title="{{$first_hot_news->title}}" href="{{url('tin-tuc/'.$first_hot_news->slug.'.html')}}">
                                            <img src="{{url($first_hot_news->image)}}" alt="{{$first_hot_news->title}}" width="100%">
                                            <h1 class="title_news">{{$first_hot_news->title}}</h1>
                                        </a>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-6">
                                <div class="list-hot-news row">
                                    @if(count($listHotNews) > 0)
                                        @foreach($listHotNews as $hotNew)
                                            <article class="col-sm-6">
                                                <div class="thumb_big">
                                                    <a class="thumb thumb_5x3" title="{{$hotNew->title}}" href="{{url('tin-tuc/'.$hotNew->slug.'.html')}}">
                                                        <img src="{{url($hotNew->image)}}" alt="{{$hotNew->title}}" width="100%">
                                                        <h1 class="title_news">{{$hotNew->title}}</h1>
                                                    </a>
                                                </div>
                                            </article>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="ads-middle">
                    <a href="{{$ads_1->link}}"><img src="{{url($ads_1->image)}}" alt="{{$ads_1->title}}"></a>
                </section>

                <section class="list-news ">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="row">
                                @if(count($listNews) > 0)
                                    @foreach($listNews as $New)
                                        <div class="news">
                                            <div class="col-sm-4 img">
                                                <a href="{{url('tin-tuc/'.$hotNew->slug.'.html')}}"><img src="{{url($New->image)}}"></a>
                                            </div>
                                            <div class="col-sm-8">

                                                <div class="item-info">
                                                    <h3 class="title-news"><a href="{{url('tin-tuc/'.$hotNew->slug.'.html')}}">{{$hotNew->title}}</a></h3>
                                                    <p> {{$hotNew->capo}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr style="margin-left: 15px;">
                                    @endforeach
                                @endif
                            </div>
                            <div class="clearfix text-center">
                                {{$listNews->links()}}
                            </div>
                        </div>
                        <div class="col-sm-3 ads">
                            <a href="{{$ads_2->link}}"><img src="{{url($ads_2->image)}}" alt="{{$ads_2->title}}"></a>
                            <a href="{{$ads_3->link}}"><img src="{{url($ads_3->image)}}" alt="{{$ads_3->title}}"></a>
                        </div>
                    </div>
                </section>

            @else
                    <h3>Chuyên mục này hiện chưa có tin tức</h3>
            @endif
    </div>
@endsection
@push('scripts')
    <script>
    </script>
@endpush