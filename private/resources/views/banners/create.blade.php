@extends('layouts.app')
@section('pageTitle', 'Thêm mới ảnh quảng cáo')
@section('content')
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>{{trans('Thêm mới')}}</h1>
                        {{ Breadcrumbs::render('banners-create') }}
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
                            <h2 class="card-title">{{trans('Thông tin ảnh')}}</h2>
                        </header>
                        <div class="card-body">
                            {!! Form::open(['route' => ['banners.store'], 'files' => true, 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {{Form::label('title', trans('Title'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('title', '',
                                            [   'placeholder' => trans('Title of image ...'),
                                                'data-rule-required' => 'true',
                                                'minlength' => '2',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'title-error',
                                            ])
                                    }}
                                    @if ($errors->has('title'))
                                        <span id="title-error" class="help-block" style="display: inline;">{{ $errors->first('title') }}</span>
                                    @endif
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
                            <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                {{Form::label('position', 'Vị trí hiển thị', ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <select class="select form-control" name="position">
                                        <option value="">---Chọn vị trí---</option>
                                        <option value="home-1">Home - 1</option>
                                        <option value="home-2">Home - 2</option>
                                        <option value="home-3">Home- 3</option>
                                        <option value="home-4">Home - 4</option>
                                        <option value="category-1">Category - 1</option>
                                        <option value="category-2">Category - 2</option>
                                        <option value="category-3">Category - 3</option>
                                        <option value="detail-1">Detail - 1</option>
                                    </select>
                                    @if ($errors->has('position'))
                                        <span id="position-error" class="help-block" style="display: inline;">{{ $errors->first('position') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                {{Form::label('link', trans('Link'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('link', '',
                                            [   'placeholder' => trans('Ex: vietnet24h.vn, youtube.com ...'),
                                                'data-rule-required' => 'true',
                                                'minlength' => '2',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'title-error',
                                            ])
                                    }}
                                    @if ($errors->has('link'))
                                        <span id="link-error" class="help-block" style="display: inline;">{{ $errors->first('link') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {{Form::button(trans('Save'), ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                    {{link_to_route('banners.index', 'Cancel', null, array('class' => 'btn btn-default'))}}
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