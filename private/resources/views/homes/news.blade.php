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
        <section class="news-detail clearfix">
            <div class="row">
                <div class="col-sm-9">
                    <div class="news-content">
                        <h1 class="title_news_detail mb10">
                            {{$news->title}}
                        </h1>
                        <p class="time">
                            {{date('d/m/Y, H:i')}}</p>
                        <h2 class="capo">{{$news->capo}}</h2>
                            @if(count($related_news) > 0)
                                @foreach($related_news as $key => $related_new)
                                <p class="related_news">
                                    <a href="{{url('tin-tuc/'.$related_new->slug.'.html')}}" title="{{$related_new->title}}">{{$related_new->title}}</a>
                                </p>
                                @endforeach
                            @endif
                        <p class="content">
                        <div id="news-description">
                            {!! $news->description !!}
                        </div>
                        <p class="author">{{$news->nickname}}</p>
                        <hr>
                    </div>
                    <section class="bottom_detail">
                        <div class="related-list-news">
                            <section class="cat_header clearfix">
                                <ul class="map-breadcrumb left">
                                    <li class="start">
                                        <h4>
                                            <a href="javascript:">Bài liên quan</a>
                                        </h4>
                                    </li>
                                </ul>
                            </section>
                            <div class="list">
                                @if(count($sibling_news) > 0)
                                    @foreach($sibling_news as $sibling_new)
                                        <article class="col-sm-3">
                                            <div class="item">
                                                <a class="thumb" title="{{$sibling_new->title}}" href="{{url('tin-tuc/'.$sibling_new->slug.'.html')}}">
                                                    <img src="{{url($sibling_new->image)}}" alt="{{$sibling_new->title}}" width="100%">
                                                    <h1 class="title-related-news">{{$sibling_new->title}}</h1>
                                                </a>
                                            </div>
                                        </article>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <!--comment-->
                        <div style="padding-right:0px;" class="width_common space_bottom_20 box_comment_vne" id="box_comment_vne" data-component-value="{&quot;type&quot;:&quot;comment&quot;,&quot;article_id&quot;:&quot;3752223&quot;,&quot;article_type&quot;:&quot;1&quot;,&quot;site_id&quot;:1002565,&quot;category_id&quot;:&quot;1002581&quot;,&quot;sign&quot;:&quot;dbf5e8f1a0baa7d26aac97bd417f27f6&quot;,&quot;limit&quot;:24}">
                            <div class="ykien_vietnet width_common" style="">
                                <div class="left"><strong rel="time">Ý kiến bạn đọc</strong> (<label id="total_comment">{{$cout_cmt}}</label>)</div>
                            </div>
                            <div class="scroll-wrapper box_comment_vne width_common scrollbar-inner" style="position: relative;">
                                <div class="box_comment_vne width_common scrollbar-inner scroll-content" id="box_comment" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 995px;">
                                    <div class="main_show_comment width_common mb10" id="list_comment">
                                        @if(count($comments) > 0)
                                            @foreach($comments as $cmt)
                                                <div class="comment_item width_common">
                                                    <p class="full_content">{{$cmt->description}}</p>
                                                    <div class="user_status width_common" data-user-type="8">
                                                        <span class="left txt_666 txt_14">
                                                            <a class="nickname txt_666" href="javascript:void(0)" title="Xem trang ý kiến của Đông June" target="_blank">
                                                                <b>{{$cmt->name}}</b>
                                                            </a> - {{$cmt->created_at}}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="comment_item width_common">
                                                <p class="full_content">chưa có bình luận nào.</p>
                                            </div>
                                        </div>
                                        @endif
                                    </div>

                                    <div class="clearfix text-center">
                                        <input type="hidden" id="count_cmt" name="count_cmt" value="2">
                                        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                                        <a href="javascript:void(0)" id="load_more_cmt">Xem thêm bình luận</a>
                                    </div>
                                </div>
                                <!--Main Input form-->
                                <div class="input_comment width_common">
                                    <form id="comment_post_form">
                                        <textarea id="txtComment" placeholder="Ý kiến của bạn" rows="" cols=""></textarea>
                                        <div class="width_common block_relative">
                                            <div class="right block_btn_send">
                                                <button type="button" value="Gửi" data-toggle="modal" data-target="#post-comment" class="btn_send_comment btn_vne" id="comment_button">Gửi</button>
                                            </div>
                                            <div class="left counter_world" style="display: none;"><strong>20</strong>/1000</div>
                                        </div>
                                    </form>
                                </div>
                                <!--End Main Input form-->
                            </div> <!--End comment-->
                            <!--Tags-->
                            <div class="block_tag width_common">
                                @if(count($tags) > 0)
                                    @foreach($tags as $tag)
                                        <div class="txt_tag">
                                            <i class="fa fa-tags"></i>&nbsp;{{$tag->name}}
                                        </div>
                                    @endforeach
                                @endif
                            </div> <!--End Tags-->
                    </section>
                </div>
                <div class="col-sm-3">
                    <div class="right-news">
                        <div class="title_box_category">
                            <h4><a title="Tin tức nôi bật" href="javscript:void(0)" class="first">Tin tức nôi bật</a></h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                @if(count($hot_news) > 0)
                                    @foreach($hot_news as $hot_new)
                                        <div class="item">
                                            <a href="{{url('tin-tuc/'.$hot_new->slug.'.html')}}"><img src="{{url($hot_new->image)}}" width="100%"></a>
                                            <h2><a href="#">{{$hot_new->title}}</a></h2>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                    </div>
                    <a href="{{$ads_1->link}}"><img src="{{url($ads_1->image)}}" alt="{{$ads_1->title}}"></a>
                </div>
                <div class="modal fade image-slide" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" id="image-modal">

                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="post-comment" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Gửi bình luận</h4>
                            </div>
                            <div class="modal-body">
                                    {!! Form::open(['route' => ['post.comment'], 'files' => true, 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                                    <div class="form_group" id="myvne_comment_email_check">
                                        <input type="text" class="txt-login" name="comment_email" id="comment_email"  placeholder="Email">
                                    </div>
                                    <div class="form_group" id="myvne_comment_fullname_check">
                                        <input type="fullname" class="txt-login" name="comment_name" id="comment_name"  placeholder="Họ và tên">
                                    </div>
                                    <input type="hidden" name="cmt_description" id="cmt_description" value="">
                                    <input type="hidden" name="news_id" id="news_id" value="">
                                    <div class="form_group complete">
                                        <button class="my_btn" type="submit" id="send_comment">Hoàn tất</button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="sent_comment" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Thông báo</h4>
                            </div>
                            <div class="modal-body">
                                <p>Gửi bình luận thành công, bình luận của bạn đang được xét duyệt.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('script')
    <script>
        var sent_cmt = '{{session('sent_cmt')}}';
        if(sent_cmt == 1){
            $(window).load(function(){
                $('#sent_comment').modal('show');
            });
        }
        $(document).ready(function() {
            var i = 1
            $("#news-description img").each(function () {
                var img = $(this);
                img.attr("data-toggle", "modal");
                img.attr("data-target", '.image-slide');
                img.attr("slide-index", "slide-"+i);
                img.removeAttr("height");
                img.removeAttr("width");
                var html = '<div class="item" id="slide-'+i+'"><img src="'+img.attr("src")+'"></div>';
                console.log(html);
                $( "#image-modal" ).append( html);
                i++
            });
            $("#news-description img").click(function(){
                var idSlide = $(this).attr("slide-index");
                $("#image-modal .item").removeClass("active");
                $( "#"+idSlide ).addClass( "active");

            });
            $("#comment_button").click(function(){
                var description = $("#txtComment").val();
                if(description == ''){
                    $( "#txtComment" ).after( "<p class='alert-danger'>Vui lòng nhập nội dung bình luận</p>" );
                    return false
                }
            });
            $("#load_more_cmt").click(function(){
                var currentItem = $('#count_cmt').val();
                var url = '{!! route('homes.getmorecmt') !!}';
                var cout_cmt = '{{$cout_cmt}}';
                var dataSent = {
                    currentItem : currentItem,
                    newsID : '{{$news->id}}',
                    _token: $('#_token').val()
                }
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: dataSent,
                    success: function(data, TextStatus){
                        var html = '';
                        data.forEach(function(item){
                            html += '<div class="comment_item width_common"><p class="full_content">'+item.description+'</p>' +
                                '<div class="user_status width_common" data-user-type="8">' +
                                '<span class="left txt_666 txt_14">' +
                                '<a class="nickname txt_666" href="javascript:void(0)" target="_blank">' +
                                '<b>'+item.name+'</b></a> - '+item.created_at+'</span></div></div>';
                        })
                        html += '</select></div>'
                        $('#count_cmt').val(data.length);
                        if(data.length == Number(cout_cmt)){
                            $("#load_more_cmt").remove()
                        }

                        $( "#list_comment").html(html);
                    },
                    error: function(){
                        alert('Fail to get list News!');
                    }
                });
            });
            $("#send_comment").click(function(){
                if($("#comment_email").val() == ''){
                    $( "#comment_email" ).after( "<p class='alert-danger'>Vui lòng nhập email của bạn</p>" );
                    return false
                }
                if($("#comment_name").val() == ''){
                    $( "#comment_name" ).after( "<p class='alert-danger'>Vui lòng nhập họ tên</p>" );
                    return false
                }
                var description = $("#txtComment").val();
                $("#cmt_description").val(description);
                $("#news_id").val({{$news->id}});
            });
        });
    </script>
@endpush