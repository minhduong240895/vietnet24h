@extends('layouts.home')

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
@if ($_SESSION["test"])
    <div id="content" class="container-fluid">
        <div class="content-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-danger">
                        {{ $_SESSION["test"] }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection