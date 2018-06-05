@extends('layouts.app')
@section('pageTitle', 'Bình luận')
@section('content')
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>News Management</h1>
                        {{ Breadcrumbs::render('comments-show', $data) }}
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
                        <h1 class="card-title">Thông tin bình luận</h1>
                    </header>
                    <div class="card-body p-20 p-t-0 invoice">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Họ tên người gửi</th>
                                        <td>{{$data->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{$data->email}}</td>
                                    </tr>
                                    <tr>
                                        @if($news != null)
                                            <th scope="row">Bài viết</th>
                                            <td>{{$news}}</td>
                                        @else
                                            <th scope="row">Bài viết</th>
                                            <td>Không tìm thấy bài viết</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th scope="row">Thời gian viết bình luận</th>
                                        <td>{{date('H:i d m Y', strtotime($data->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Trạng thái</th>
                                        <td>
                                            @if($data->status == 1)
                                                Chờ duyệt
                                            @elseif($data->status == 2)
                                                Hiển thị
                                            @elseif($data->status == 3)
                                                Ẩn
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fadeIn active" id="profile-about">
                                    <div class="card card-transparent m-b-0">
                                        <header class="card-heading">
                                            <h2 class="card-title m-t-0">Nội dung</h2>
                                        </header>
                                        <div class="card-body p-t-0">
                                            <p>{!! $data->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fadeIn active" id="profile-about">
                                    <div class="card card-transparent m-b-0">
                                        <header class="card-heading">
                                            <h2 class="card-title m-t-0">Change Status</h2>
                                        </header>
                                        <div class="card-body btn-demo">
                                            <section class="syntax-highlighter">
                                              <pre><code class="language-html">
                                                &lt;!-- Markup for Raised Buttons-->
                                                &lt;button class="btn btn-info">Info&lt;/button>
                                                &lt;button class="btn btn-danger">Danger&lt;/button>
                                                &lt;button class="btn btn-danger">success&lt;/button>
                                              </code></pre>
                                            </section>
                                            @if($data->status == 1)
                                                <a href="{{route("{$route}.changestatus", ['id' => $data->id, 'value' => 2])}}" class="btn btn-success">Hiển thị</a>
                                                <a href="{{route("{$route}.changestatus", ['id' => $data->id, 'value' => 3])}}" class="btn btn-danger">Ẩn</a>
                                            @elseif($data->status == 2)
                                                <a href="{{route("{$route}.changestatus", ['id' => $data->id, 'value' => 1])}}" class="btn btn-warning">Chờ duyệt</a>
                                                <a href="{{route("{$route}.changestatus", ['id' => $data->id, 'value' => 3])}}" class="btn btn-danger">Ẩn</a>
                                            @else
                                                <a href="{{route("{$route}.changestatus", ['id' => $data->id, 'value' => 1])}}" class="btn btn-warning">Chờ duyệt</a>
                                                <a href="{{route("{$route}.changestatus", ['id' => $data->id, 'value' => 2])}}" class="btn btn-success">Hiển thị</a>
                                            @endif
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