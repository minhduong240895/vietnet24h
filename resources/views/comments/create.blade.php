@extends('layouts.app')
@section('pageTitle', 'Add Member')
@section('content')
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>{{trans('Add member')}}</h1>
                        {{ Breadcrumbs::render('members-create') }}
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
                            <h2 class="card-title">{{trans('Member information')}}</h2>
                        </header>
                        <div class="card-body">
                            {!! Form::open(['route' => ['members.store'], 'files' => true, 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{Form::label('name', trans('Name'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('name', '',
                                            [   'placeholder' => trans('Name'),
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
                            <div class="form-group is-fileinput{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                {{Form::label('avatar', trans('Avatar'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        {{Form::file('avatar',
                                            [
                                                'data-buttontext' => trans('Choose file'),
                                                'data-buttonname' => 'btn-outline btn-primary',
                                                'data-iconname' => 'ion-image mr-5',
                                                'data-rule-required' => 'true',
                                                'data-rule-accept' => 'image/*',
                                                'aria-required' => 'true',
                                                'class' => 'filestyle',
                                                'aria-describedby' => 'avatar-error'
                                            ])}}
                                        <div class="input-group{{ $errors->has('') ? ' has-error' : '' }}">
                                            {{ Form::text('avatar', '',
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
                                        @if ($errors->has('avatar'))
                                            <span id="avatar-error" class="help-block" style="display: inline;">{{ $errors->first('avatar') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{Form::label('email', 'Email', ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('email', '',
                                            [   'placeholder' => trans('Ex: contact@company.com'),
                                                'data-rule-required' => 'true',
                                                'minlength' => '10',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'email-error'
                                            ])
                                    }}
                                    @if ($errors->has('email'))
                                        <span id="email-error" class="help-block" style="display: inline;">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                {{Form::label('phone_number', trans('Phone number'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('phone_number', '',
                                            [   'placeholder' => trans('Ex: 0983251253'),
                                                'data-rule-required' => 'true',
                                                'minlength' => '10',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'phone_number-error'
                                            ])
                                    }}
                                    @if ($errors->has('phone_number'))
                                        <span id="phone_number-error" class="help-block" style="display: inline;">{{ $errors->first('phone_number') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {{Form::label('password', 'Password', ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <input class="form-control" name="password" type="password" placeholder="{{trans('Nhập mật khẩu')}}">
                                    @if ($errors->has('password'))
                                        <span id="password-error" class="help-block" style="display: inline;">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                {{Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <input class="form-control" name="password_confirmation" type="password" placeholder="{{trans('Nhập lại mật khẩu')}}">
                                    @if ($errors->has('comfirm_password'))
                                        <span id="password_confirmation-error" class="help-block" style="display: inline;">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {{Form::button(trans('Save'), ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                                    {{link_to_route('users.index', 'Cancel', null, array('class' => 'btn btn-default'))}}
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