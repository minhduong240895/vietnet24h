@extends('layouts.app')
@section('pageTitle', 'Chỉnh sửa tag')
@section('content')
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>{{trans('Chính sửa tag')}}</h1>
                        {{ Breadcrumbs::render('tags-edit', $data) }}
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
                            <h2 class="card-title">{{trans('Thông tin tag')}}</h2>
                        </header>
                        <div class="card-body">
                            {!! Form::open(['route' => ['tags.update', 'id' => $data->id], 'files' => true, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{Form::label('name', trans('Tên tag'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('name', $data->name,
                                            [
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
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {{Form::button(trans('Save'), ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                    {{link_to_route('tags.index', 'Cancel', null, array('class' => 'btn btn-default'))}}
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