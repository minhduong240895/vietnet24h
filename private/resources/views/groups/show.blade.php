@extends('layouts.app')
@section('pageTitle', 'Members')
@section('content')
    <div id="header_wrapper" class="header-md ecom-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <header id="header">
                        <h1>Member information</h1>
                        {{ Breadcrumbs::render('members-show', $data) }}
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
                                        <img src='{{url($data->avatar)}}' alt="" class="img-circle">
                                        <ul class="card-actions icons right-top">
                                            <li class="dropdown">
                                                <a href="javascript:void(0)" data-toggle="dropdown">
                                                    <i class="zmdi zmdi-more-vert"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right btn-primary">
                                                    <li>
                                                        <a href="{{ route("members.edit", ['id' => $data->id]) }}">Edit Profile</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </header>
                                    <div class="card-body">
                                        <h3 class="name">{{$data->name}}</h3>
                                        <span class="title">{{$data->email}}</span>
                                        <span class="phone-wrapper">{{$data->phone_number}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-8">

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