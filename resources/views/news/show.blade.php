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
                        <h1 class="card-title">News information</h1>
                    </header>
                    <div class="card-body p-20 p-t-0 invoice">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Title</th>
                                        <td>{{$data->title}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row">Time Created</th>
                                        <td>{{date('d M Y', strtotime($data->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status</th>
                                        <td>
                                            @if($data->status == 1)
                                                Private
                                            @elseif($data->status == 2)
                                                Public
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
                                            <h2 class="card-title m-t-0">Description</h2>
                                        </header>
                                        <div class="card-body p-t-0">
                                            <p>{!! $data->description !!}</p>
                                        </div>
                                    </div>
                                    <div class="content-body page-gallery m-t-30">
                                        <header class="card-heading">
                                            <h2 class="card-title">Images</h2>
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