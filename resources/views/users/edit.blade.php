@extends('layouts.app')
@section('pageTitle', 'Edit Admin')
@section('content')
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>{{trans('Edit information')}}</h1>
                        {{ Breadcrumbs::render('users-edit', $data) }}
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
                            <h2 class="card-title">{{trans('Information')}}</h2>
                        </header>
                        <div class="card-body">
                            {!! Form::open(['route' => ['users.update', 'id' => $data->id], 'files' => true, 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{Form::label('name', trans('Tên thành viên'), ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('name', $data->name,
                                            [   'placeholder' => trans('Tên thành viên'),
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

                            @if($data->avatar)
                                <div class="form-group">
                                    {{Form::label('', trans(''), ['class' => 'col-sm-2 control-label'])}}
                                    <div class="col-sm-10">
                                        <img src="{{url($data->avatar)}}" width="200" height="200" />
                                    </div>
                                </div>
                            @endif
                            <div class="form-group is-fileinput{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                {{Form::label('avatar', trans('Ảnh đại diện'), ['class' => 'col-sm-2 control-label'])}}
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
                                                    'placeholder' => trans('Tải ảnh lên...'),
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
                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                {{Form::label('phone_number', 'Số điện thoại', ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('phone_number', $data->phone_number,
                                            [   'placeholder' => trans('Số điện thoại'),
                                                'data-rule-required' => 'true',
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
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                {{Form::label('address', 'Địa chỉ', ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    {{ Form::text('address', $data->address,
                                            [   'placeholder' => trans('Ex: Số nhà 34, Ngõ 5, Quận 6, TPHCM'),
                                                'data-rule-required' => 'true',
                                                'class' => 'form-control',
                                                'aria-required' => 'true',
                                                'aria-describedby' => 'address-error'
                                            ])
                                    }}
                                    @if ($errors->has('address'))
                                        <span id="address-error" class="help-block" style="display: inline;">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
                                {{Form::label('group_id', 'Nhóm thành viên', ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <select id="group_id" name="group_id" data-rule-required="true" class="form-control select" aria-required="true" placeholder="Chọn nhóm thành viên">
                                        @foreach($listGroup as $gr)
                                            @if($gr->id == $data->group_id)
                                                <option value="{{$gr->id}}" selected>{{$gr->name}}</option>
                                            @else
                                                <option value="{{$gr->id}}">{{$gr->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @if ($errors->has('group_id'))
                                        <span id="group_id-error" class="help-block" style="display: inline;">{{ $errors->first('group_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {{Form::label('change_password', 'Thay đổi mật khẩu', ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <input type="checkbox" name="change_password" id="change_password"  >
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {{Form::label('password', 'Mật khẩu mới', ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <input class="form-control" name="password" type="password" placeholder="{{trans('Nhập mật khẩu')}}" disabled>
                                    @if ($errors->has('email'))
                                        <span id="password-error" class="help-block" style="display: inline;">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                {{Form::label('password_confirmation', 'Nhập lại mật khẩu mới', ['class' => 'col-sm-2 control-label'])}}
                                <div class="col-sm-10">
                                    <input class="form-control" name="password_confirmation" type="password" placeholder="{{trans('Nhập lại mật khẩu')}}" disabled>
                                    @if ($errors->has('email'))
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
        $('#change_password').change(function () {
            if($('input[name="change_password"]').is(':checked'))
            {
                $('input[name="password"]').removeAttr('disabled')
                $('input[name="password_confirmation"]').removeAttr('disabled')
            }else
            {
                $('input[name="password"]').attr('disabled','disabled')
                $('input[name="password_confirmation"]').attr('disabled','disabled')
            }
        })
    </script>
@endpush