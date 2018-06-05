@extends('layouts.home')
@section('pageTitle', 'Vietnet24h')
@section('content')
    <div class="content container">
        <section class="cat_header clearfix">
            <ul class="map-breadcrumb left">
                <li class="start">
                    <h4>
                        <a href="javascript:void(0)">Tin tức nổi bật</a>
                    </h4>
                </li>
            </ul>
        </section>
        <section class="cat_header clearfix">
            <span class="btn_sub_menu active"><i class="ic ic-caret-2-down"></i></span>

            <section class="hot_news">
                <div class=" blogs-content">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="main-item">
                                <a href="{{url('tin-tuc/'.$first_hot_news->slug.'.html')}}"><img src="{{url($first_hot_news->image)}}"></a>
                                <h2><a href="{{url('tin-tuc/'.$first_hot_news->slug.'.html')}}">{{$first_hot_news->title}}</a></h2>
                                <p> {{$first_hot_news->capo}}.</p>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="list-news">
                                @foreach($hot_news as $key => $news)
                                    <h2><a href="{{url('tin-tuc/'.$news->slug.'.html')}}">{{App\Helpers\Common::subTitle($news->title,100)}}...</a></h2>
                                    @if($key != count($hot_news))
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-3 ads-top">
                            <a href="{{$ads_1->link}}"><img src="{{url($ads_1->image)}}" alt="{{$ads_1->title}}"></a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="ads-middle">
                <a href="{{$ads_2->link}}"><img src="{{url($ads_2->image)}}" alt="{{$ads_2->title}}"></a>
            </section>

            <section class="list-category-middle">
                <div class="row">
                    <div class="col-sm-10">
                        <div class="row">
                            @if(count($categories) > 0)
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($categories as $cat)
                                    @if($i %  2 == 0 && $i > 0)
                                        <div class="clearfix"></div>
                                    @endif
                                    <div class="col-sm-6">
                                        <div class="blogs-content">
                                            <div class="title_box_category">
                                                <h4><a title="{{$cat->name}}" href="{{url('danh-muc/'.$cat->slug)}}" class="first">{{$cat->name}}</a></h4>
                                                @php
                                                    $topics = App\Models\Topic::where('category_id', $cat->id)->take(4)->get();
                                                    $arrTopicID = [];
                                                    foreach ($topics as $topic){
                                                        $arrTopicID[] = $topic->id;
                                                    }
                                                    $cate_news = App\Models\News::whereIn('topic_id', $arrTopicID)->orderBy('id', 'desc')->take(4)->get();
                                                    $hot_news = $cate_news->values()->get(count($cate_news) - 1);
                                                @endphp
                                                @foreach($topics as $topic)
                                                    <h5>
                                                        <a title="{{$topic->name}}" target="" href="{{url('chuyen-muc/'.$topic->slug)}}">
                                                            {{$topic->name}}
                                                        </a>
                                                    </h5>
                                                @endforeach
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="main-item">
                                                        <a href="{{url('tin-tuc/'.$hot_news['slug'].'.html')}}"><img src="{{$hot_news['image']}}"></a>
                                                        <h2><a href="{{url('tin-tuc/'.$hot_news['slug'].'.html')}}">{{$hot_news['title']}}</a></h2>
                                                        <p> {{$hot_news['capo']}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="list-news">
                                                        @foreach($cate_news as $key => $news)
                                                            @if($key != count($cate_news) -1)
                                                                <h2><a href="{{url('tin-tuc/'.$news['slug'].'.html')}}">{{App\Helpers\Common::subTitle($news->title,120)}}...</a></h2>
                                                                @if($key < count($cate_news) - 2)
                                                                    <hr>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="row">
                            <div class="col-sm-12 ads">
                                <a href="{{$ads_3->link}}"><img src="{{url($ads_3->image)}}" alt="{{$ads_3->title}}"></a>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-sm-12 ads" >
                                <a href="{{$ads_4->link}}"><img src="{{url($ads_4->image)}}" alt="{{$ads_4->title}}"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
@endsection
@push('scripts')
    <script>
    </script>
@endpush