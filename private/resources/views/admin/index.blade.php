@extends('layouts.app')
@section('pageTitle', 'Vietnet24h')
@section('content')
<div id="header_wrapper" class="header-sm">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <header id="header">
                    <h1>Dashboards</h1>
                </header>
            </div>
            <div class="clear-both"></div>
        </div>
    </div>
</div>
@if (session("status"))
    <div id="content" class="container-fluid">
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-danger">
                        {{ session("status") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if (session("success"))
    <div id="content" class="container-fluid">
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-success">
                        {{ session("success") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection