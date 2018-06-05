@extends('layouts.app')
@section('pageTitle', 'Sửa tin tức')
@section('content')
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>{{trans('Sửa tin bài')}}</h1>
                        {{ Breadcrumbs::render('news-create') }}
                    </header>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="container-fluid">
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="card">
                        <header class="card-heading ">
                            <h2 class="card-title">{{trans('Tin tức')}}</h2>
                        </header>
                        <div class="card-body">
                            {!! Form::open(['route' => ['news.update', 'id' => $data->id], 'files' => true, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

                            <div class="form-group{{ $errors->has('capo') ? ' has-error' : '' }}">
                                {{Form::label('capo', trans('Sapo'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('capo', $data->capo,
                                            [   'placeholder' => trans('Capo mô tả tin tức'),
                                                'data-rule-required' => 'true',
                                                'minlength' => '2',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'title-error'
                                            ])
                                    }}
                                    @if ($errors->has('capo'))
                                        <span id="capo-error" class="help-block" style="display: inline;">{{ $errors->first('capo') }}</span>
                                    @endif
                                </div>
                            </div>@if($data->image)
                                <div class="form-group">
                                    {{Form::label('', trans(''), ['class' => 'col-sm-2 control-label'])}}
                                    <div class="col-sm-10">
                                        <img src="{{url($data->image)}}" width="300" height="200" />
                                    </div>
                                </div>
                            @endif
                            <div class="form-group is-fileinput{{ $errors->has('image') ? ' has-error' : '' }}">
                                {{Form::label('image', trans('Image'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        {{Form::file('image',
                                            [
                                                'data-buttontext' => trans('Choose file'),
                                                'data-buttonname' => 'btn-outline btn-primary',
                                                'data-iconname' => 'ion-image mr-5',
                                                'data-rule-required' => 'true',
                                                'data-rule-accept' => 'image/*',
                                                'aria-required' => 'true',
                                                'class' => 'filestyle',
                                                'aria-describedby' => 'image-error'
                                            ])}}
                                        <div class="input-group{{ $errors->has('') ? ' has-error' : '' }}">
                                            {{ Form::text('image', '',
                                                [
                                                    'placeholder' => trans('Choose file...'),
                                                    'readonly' => '',
                                                    'class' => 'form-control'
                                                ])
                                            }}
                                            <span class="input-group-btn input-group-sm">
                                                    {{Form::button('<i class="zmdi zmdi-attachment-alt"></i>', ['type' => 'button', 'class' => 'btn btn-primary btn-fab btn-fab-sm'])}}
                                                </span>
                                        </div>
                                        @if ($errors->has('image'))
                                            <span id="image-error" class="help-block" style="display: inline;">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('source') ? ' has-error' : '' }}">
                                {{Form::label('source', trans('Nguồn bài viết'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('source', $data->source,
                                            [   'placeholder' => trans('Ex: google.com.vn, bbc.com ...'),
                                                'data-rule-required' => 'true',
                                                'minlength' => '2',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'source-error'
                                            ])
                                    }}
                                    @if ($errors->has('source'))
                                        <span id="source-error" class="help-block" style="display: inline;">{{ $errors->first('source') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                                {{Form::label('nickname', trans('Bút danh'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('nickname', $data->nickname,
                                            [   'placeholder' => trans('Ex: Bút danh tác giả'),
                                                'data-rule-required' => 'true',
                                                'minlength' => '2',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'nickname-error'
                                            ])
                                    }}
                                    @if ($errors->has('nickname'))
                                        <span id="nickname-error" class="help-block" style="display: inline;">{{ $errors->first('nickname') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('seo_title') ? ' has-error' : '' }}">
                                {{Form::label('seo_title', trans('Seo Title'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('seo_title', $data->seo_title,
                                            [
                                                'data-rule-required' => 'true',
                                                'minlength' => '2',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'seo_title-error'
                                            ])
                                    }}
                                    @if ($errors->has('seo_title'))
                                        <span id="seo_title-error" class="help-block" style="display: inline;">{{ $errors->first('seo_title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('seo_keyword') ? ' has-error' : '' }}">
                                {{Form::label('seo_keyword', trans('Seo Keyword'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('seo_keyword', $data->seo_keyword,
                                            [
                                                'data-rule-required' => 'true',
                                                'minlength' => '2',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'seo_keyword-error'
                                            ])
                                    }}
                                    @if ($errors->has('seo_keyword'))
                                        <span id="seo_keyword-error" class="help-block" style="display: inline;">{{ $errors->first('seo_keyword') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('seo_description') ? ' has-error' : '' }}">
                                {{Form::label('seo_description', trans('Seo Description'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('seo_description', $data->seo_description,
                                            [
                                                'data-rule-required' => 'true',
                                                'minlength' => '2',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'seo_description-error'
                                            ])
                                    }}
                                    @if ($errors->has('seo_description'))
                                        <span id="seo_description-error" class="help-block" style="display: inline;">{{ $errors->first('seo_description') }}</span>
                                    @endif
                                </div>
                            </div>
                            @if(Auth::user()->group_id == 1)
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    {{Form::label('price', trans('Nhuận bút'), ['class' => 'col-sm-2 control-label'])}}
                                    <div class="col-sm-10">
                                        {{ Form::text('price', $data->price,
                                                [
                                                    'data-rule-required' => 'true',
                                                    'minlength' => '2',
                                                    'class' => 'form-control',
                                                    'aria-required' => 'true',
                                                    'aria-describedby' => 'seo_description-error'
                                                ])
                                        }}
                                        @if ($errors->has('price'))
                                            <span id="price-error" class="help-block" style="display: inline;">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                    {{Form::label('price', trans('Nhuận bút'), ['class' => 'col-sm-2 control-label'])}}
                                    <div class="col-sm-10">
                                        {{ Form::text('price', $data->price,
                                                [
                                                    'data-rule-required' => 'true',
                                                    'minlength' => '2',
                                                    'class' => 'form-control',
                                                    'aria-required' => 'true',
                                                    'aria-describedby' => 'seo_description-error',
                                                    'disabled'
                                                ])
                                        }}
                                        @if ($errors->has('price'))
                                            <span id="price-error" class="help-block" style="display: inline;">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {{Form::label('description', trans('Description'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <textarea id="description" name="description" >{!! $data->description !!}</textarea>
                                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('description',{
                                            filebrowserBrowseUrl :'/plugin/ckfinder/ckfinder.html',
                                            filebrowserImageBrowseUrl : '/plugin/ckfinder/ckfinder.html?type=Images',
                                            filebrowserFlashBrowseUrl : '/plugin/ckfinder/ckfinder.html?type=Flash',
                                            filebrowserUploadUrl : '/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                            filebrowserImageUploadUrl : '/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                            filebrowserFlashUploadUrl : '/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                                        });
                                    </script>﻿
                                    @if ($errors->has('description'))
                                        <span id="description-error" class="help-block" style="display: inline;">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                            @if(Auth::user()->group_id == 1 ||Auth::user()->group_id == 2)
                                <div class="form-group{{ $errors->has('hot') ? ' has-error' : '' }}">
                                    {{Form::label('hot', 'Tin nổi bật', ['class' => 'col-sm-2 control-label'])}}
                                    <div class="col-sm-10">
                                        <select id="hot" name="hot" data-rule-required="true" class="form-control select" >
                                            @if($data->hot == 2)
                                                <option value="1">Không</option>
                                                <option value="2" selected>Có</option>
                                            @else
                                                <option value="1" selected>Không</option>
                                                <option value="2">Có</option>
                                            @endif
                                        </select>
                                        @if ($errors->has('hot'))
                                            <span id="hot-error" class="help-block" style="display: inline;">{{ $errors->first('hot') }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                {{Form::label('status', 'Thay đổi trạng thái', ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <select id="status" name="status" data-rule-required="true" class="form-control select" >
                                        @foreach($arrStatus as $id => $stt)
                                            @if($id == $data->status)
                                                <option value="{{$id}}" selected>{{$stt}}</option>
                                            @else
                                                <option value="{{$id}}">{{$stt}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('group_id'))
                                        <span id="group_id-error" class="help-block" style="display: inline;">{{ $errors->first('group_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {{Form::button(trans('Save'), ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                    {{link_to_route('news.index', 'Cancel', null, array('class' => 'btn btn-default'))}}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2(
            );
            $('#related_news').select2({
                    maximumSelectionLength : 2
                }
            );
            $('#sibling_news').select2({
                    maximumSelectionLength : 4
                }
            );
            $('#category').change(function(){
                var id = $('#category').val();
                var url = '{!! route('categories.gettopics') !!}';
                var dataSent = {
                    id : id,
                    _token: $('#token').val(),
                    name: 'demo',
                }
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: dataSent,
                    success: function(data, TextStatus){
                        var html = '<option value="">--Chọn danh mục con--</option>';
                        data.forEach(function(item){
                            html += '<option value="'+item.id+'">'+item.name+'</option>';
                        })
                        html += '</select></div>'
                        $( "#topic").html(html);
                        $('.basic-single').select2();
                    },
                    error: function(){
                        alert('Fail to get list Topic!');
                    }
                });
            });
            $('#tags').change(function(){
                $( "#sibling_news").html(null);
                $( "#related_news").html(null);
                var idArr = $('#tags').val();
                var url = '{!! route('tags.getnews') !!}';
                var dataSent = {
                    idArr : idArr,
                    _token: $('#token').val(),
                    name: 'demo'
                }
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: dataSent,
                    success: function(data, TextStatus){
                        var html = '';
                        data.forEach(function(item){
                            html += '<option value="'+item.id+'">'+item.title+'</option>';
                        })
                        html += '</select></div>'
                        $( "#sibling_news").html(html);
                        $( "#related_news").html(html);
                        $('.basic-single').select2();
                    },
                    error: function(){
                        alert('Fail to get list News!');
                    }
                });
            });
        });
    </script>
@endpush