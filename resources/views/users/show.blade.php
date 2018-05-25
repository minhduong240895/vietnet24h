@extends('layouts.app')
@section('pageTitle', 'Users')
@section('content')
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>Thông tin thành viên</h1>
                        {{ Breadcrumbs::render('users-show', $data) }}

                    </header>
                </div>
            </div>
        </div>
    </div>
    <div id="content" class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="card card-transparent">
                    <div class="card-body wrapper">
                        <div class="row">
                            <div class="col-md-12 col-lg-3">
                                <div class="card type--profile">
                                    <header class="card-heading">
                                        @if($data->avatar)
                                            <img src="{{url($data->avatar)}}" alt="" class="img-circle">
                                        @else
                                            <img src="{{url('assets/img/profiles/user.png')}}" alt="" class="img-circle">
                                        @endif
                                        <ul class="card-actions icons right-top">
                                            <li class="dropdown">
                                                <a href="javascript:void(0)" data-toggle="dropdown">
                                                    <i class="zmdi zmdi-more-vert"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right btn-primary">
                                                    <li>
                                                        <a href="{{ route("users.edit", ['id' => $data->id]) }}">Edit Profile</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </header>
                                    <div class="card-body">
                                        <h3 class="name">{{$data->name}}</h3>
                                        @if($data->group)
                                            <span class="title">{{$data->group->name}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-8">
                                <div class="card">
                                    <header class="card-heading p-0">
                                        <div class="tabpanel m-b-30">
                                            <ul class="nav nav-tabs nav-justified">
                                                <li class="active" role="presentation" class=""><a href="#profile-about" data-toggle="tab" aria-expanded="false">Thông tin liên hệ<div class="ripple-container"></div></a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fadeIn active" id="profile-about">
                                                    <div class="card card-transparent">
                                                        <div class="card-body p-t-0">
                                                            <div class="p-l-30">
                                                                <dl class="dl-horizontal">
                                                                    <dt>Địa chỉ</dt>
                                                                    <dd>{{$data->address}}</dd>
                                                                </dl>
                                                                <dl class="dl-horizontal">
                                                                    <dt>Số điện thoại</dt>
                                                                    <dd>{{$data->phone_number}}</dd>
                                                                </dl>
                                                                <dl class="dl-horizontal">
                                                                    <dt>Email</dt>
                                                                    <dd>{{$data->email}}</dd>
                                                                </dl>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </header></div>
                            </div>
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