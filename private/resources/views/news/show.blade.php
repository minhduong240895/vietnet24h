@extends('layouts.app')
@section('pageTitle', 'News')
@section('content')
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>News Management</h1>
                        {{ Breadcrumbs::render('news-show', $data) }}
                    </header>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <header class="card-heading">
                        <h1 class="card-title">Thông tin bài viết</h1>
                    </header>
                    <div class="card-body p-20 p-t-0 invoice">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Tiêu đề</th>
                                        <td>{{$data->title}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sapo</th>
                                        <td>{{$data->capo}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tags</th>
                                        <td>{{$tags}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Danh mục</th>
                                        <td>{{$category}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Danh mục con</th>
                                        <td>{{$topic}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Loại tin bài</th>
                                        <td>{{$type}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tác giả</th>
                                        <td>{{$data->nickname}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Bút danh</th>
                                        <td>{{$data->nickname}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nguồn</th>
                                        <td>{{$data->source}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nhuận bút</th>
                                        <td>{{number_format($data->price)}},000 VND</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Thời gian tạo</th>
                                        <td>{{date('H:i d m Y', strtotime($data->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Chỉnh sửa lần cuối</th>
                                        <td>{{date('H:i d m Y', strtotime($data->updated_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Thời gian xuất bản</th>
                                        <td>{{$data->public_time}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Trạng thái</th>
                                        <td>
                                            @if($data->status == 1)
                                                Bài nháp
                                            @elseif($data->status == 2)
                                                Chờ biên tập
                                            @elseif($data->status == 3)
                                                Cần chỉnh sửa
                                            @elseif($data->status == 4)
                                                Chờ xuất bản
                                            @elseif($data->status == 5)
                                                Đã xuất bản
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fadeIn active" id="profile-about">

                                    <div class="content-body page-gallery m-t-30">
                                        <header class="card-heading">
                                            <h2 class="card-title">Hình ảnh hiển thị</h2>
                                        </header>
                                        <div id="photo-gallery" class="gallery row" itemscope="" itemtype="http://schema.org/ImageGallery">
                                            <figure class="col-xs-6 col-sm-3" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                                <div class="card image-over-card m-t-30">
                                                    <div class="card-image">
                                                        <a href="{{url($data->image)}}" data-caption="<div class='text-center'>Place your caption here.<br><em class='text-muted'><i class='zmdi zmdi-favorite'></i> Material Wrap</em></div>" data-width="1600" data-height="1068" itemprop="contentUrl">
                                                            <img src="{{$data->image}}" itemprop="thumbnail" alt="Image description">
                                                        </a>
                                                    </div>
                                                </div>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="card card-transparent m-b-0">
                                        <header class="card-heading">
                                            <h2 class="card-title m-t-0">Nội dung</h2>
                                        </header>
                                        <div class="card-body p-t-0">
                                            <p>{!! $data->description !!}</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="card card-transparent m-b-0">
                                        <header class="card-heading">
                                            <h2 class="card-title m-t-0">Tin liên quan</h2>
                                        </header>
                                        <div class="card-body p-t-0">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($related_news as $news)
                                                        <tr>
                                                            <td>{{$news->id}}</td>
                                                            <td>{{$news->title}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-transparent m-b-0">
                                        <header class="card-heading">
                                            <h2 class="card-title m-t-0">Bài liên quan</h2>
                                        </header>
                                        <div class="card-body p-t-0">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Title</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($sibling_news as $news)
                                                        <tr>
                                                            <td>{{$news->id}}</td>
                                                            <td>{{$news->title}}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <button class="pswp__button pswp__button--share" title="Share"></button>
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
@push('css')
    <style>
        #content .dl-horizontal{
            font-size: 16px;
        }
        #content .section img{
            padding-bottom: 20px;
        }
    </style>
@endpush