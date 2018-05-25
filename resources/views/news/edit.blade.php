@extends('layouts.app')
@section('pageTitle', 'Edit News')
@section('content')
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>{{trans('Edit News')}}</h1>
                        {{ Breadcrumbs::render('news-edit', $data) }}
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
                            <h2 class="card-title">{{trans('News infomation')}}</h2>
                        </header>
                        <div class="card-body">
                            {!! Form::open(['route' => ['news.update', 'id' => $data->id], 'files' => true, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {{Form::label('title', trans('Title'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('title', $data->title,
                                            [   'placeholder' => trans('Title of schedule'),
                                                'data-rule-required' => 'true',
                                                'minlength' => '2',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'title-error'
                                            ])
                                    }}
                                    @if ($errors->has('title'))
                                        <span id="title-error" class="help-block" style="display: inline;">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {{Form::label('', trans(''), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <img src="{{url($data->image)}}" width="400" height="200" />
                                </div>
                            </div>
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

                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                {{Form::label('status', 'Status', ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <select class="select form-control" name="status" tabindex="-1" aria-hidden="true">
                                        @if($data->status == 1)
                                            <option value="1" selected>Private</option>
                                            <option value="2">Public</option>
                                        @elseif($data->status == 2)
                                            <option value="1" >Private</option>
                                            <option value="2" selected>Public</option>
                                        @endif
                                    </select>
                                    @if ($errors->has('status'))
                                        <span id="status-error" class="help-block" style="display: inline;">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>
                            </div>
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
    </script>
@endpush