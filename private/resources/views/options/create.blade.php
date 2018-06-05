@extends('layouts.app')
@section('pageTitle', 'Thêm mới thành phần')
@section('content')
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>{{trans('Thêm mới')}}</h1>
                        {{ Breadcrumbs::render('options-create') }}
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
                            <h2 class="card-title">{{trans('Thông tin thành phần')}}</h2>
                        </header>
                        <div class="card-body">
                            {!! Form::open(['route' => ['options.store'], 'files' => true, 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{Form::label('name', trans('Tên thành phần'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('name', '',
                                            [   'placeholder' => trans('Ex: Địa chỉ, Hotline ...'),
                                                'data-rule-required' => 'true',
                                                'minlength' => '2',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'name-error',
                                            ])
                                    }}
                                    @if ($errors->has('name'))
                                        <span id="name-error" class="help-block" style="display: inline;">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {{Form::label('description', trans('Description'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <textarea id="description" name="description" ></textarea>
                                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('description',{
                                            filebrowserBrowseUrl :'/plugin/ckfinder/ckfinder.html',
                                            filebrowserImageBrowseUrl : '/plugin/ckfinder/ckfinder.html?type=Images',
                                            filebrowserFlashBrowseUrl : '/plugin/ckfinder/ckfinder.html?type=Flash',
                                            filebrowserUploadUrl : '/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                            filebrowserImageUploadUrl : '/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                            filebrowserFlashUploadUrl : '/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                            toolbar : [
                                                [ 'Bold', 'Italic', '-', 'Link', 'Unlink'
                                                ],
                                                [ 'FontSize', 'TextColor', 'BGColor', 'Styles' ]
                                            ]
                                        });
                                    </script>﻿
                                    @if ($errors->has('description'))
                                        <span id="description-error" class="help-block" style="display: inline;">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {{Form::button(trans('Save'), ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                    {{link_to_route('options.index', 'Cancel', null, array('class' => 'btn btn-default'))}}
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