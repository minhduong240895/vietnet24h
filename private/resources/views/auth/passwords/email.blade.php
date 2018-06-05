<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <base href="{{ asset('') }}">
    <title>MaterialWrap - jQuery full version</title>
    <link rel="stylesheet" href="assets/css/vendor.bundle.css">
    <link rel="stylesheet" href="assets/css/app.bundle.css">
    <link rel="stylesheet" href="assets/css/theme-a.css">
</head>
<body id="auth_wrapper" >
<div id="login_wrapper">
    <div class="logo">
        <img src="assets/img/logo/logo-icon@2x.png" alt="logo" class="logo-img">
    </div>
    <div id="login_content">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <h1 class="login-title">
            Reset Password
        </h1>
        <div class="login-body">
            {!! Form::open(array('url' => '/password/email', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {{ Form::email("email", old('email'), ['class' => 'form-control', 'placeholder' => 'E-Mail Address']) }}
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif

            </div>

            <div class="form-group">
                {{ Form::submit('Send Password Reset Link', ['class' => "btn btn-default submit"]) }}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
<script src="assets/js/vendor.bundle.js"></script>
<script src="assets/js/app.bundle.js"></script>
</body>
</html>





