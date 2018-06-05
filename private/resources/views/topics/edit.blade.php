@extends('layouts.app')
@section('pageTitle', 'Chỉnh sửa danh mục con')
@section('content')
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>{{trans('Chỉnh sửa')}}</h1>
                        {{ Breadcrumbs::render('topics-edit', $data) }}
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
                            <h2 class="card-title">{{trans('Thông tin danh mục ')}}</h2>
                        </header>
                        <div class="card-body">
                            {!! Form::open(['route' => ['topics.update', 'id' => $data->id], 'files' => true, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{Form::label('name', trans('Tên danh mục'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('name', $data->name,
                                            [   'placeholder' => trans('Ex: Thời sự, Kinh tế ...'),
                                                'data-rule-required' => 'true',
                                                'minlength' => '2',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'name-error'
                                            ])
                                    }}
                                    @if ($errors->has('name'))
                                        <span id="name-error" class="help-block" style="display: inline;">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                                {{Form::label('slug', trans('Slug(không bắt buộc)'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('slug', $data->slug,
                                            [   'placeholder' => trans('Ex: thoi-su ...'),
                                                'data-rule-required' => 'true',
                                                'minlength' => '2',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'price-error'
                                            ])
                                    }}
                                    @if ($errors->has('slug'))
                                        <span id="slug-error" class="help-block" style="display: inline;">{{ $errors->first('slug') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                {{Form::label('category_id', 'Danh mục cha', ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <select class="select form-control" name="category_id">
                                        @foreach($categories as $cate)
                                            @if($cate->id == $data->category_id)
                                                <option value="{{$cate->id}}" selected>{{$cate->name}}</option>
                                                @else
                                                <option value="{{$cate->id}}">{{$cate->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span id="category_id-error" class="help-block" style="display: inline;">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {{Form::button(trans('Save'), ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                    {{link_to_route('topics.index', 'Cancel', null, array('class' => 'btn btn-default'))}}
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