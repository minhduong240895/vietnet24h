
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <base href="{{ asset('') }}">
    <title>Motel Management system</title>
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
        <div class="login-body">
            {!! Form::open(array('url' => '/login', 'method' => 'POST')) !!}

            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {{ Form::email("email", old('email'), ['class' => 'form-control', 'placeholder' => 'E-Mail Address']) }}
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <br>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {{ Form::password("password", ['class' => 'form-control', 'placeholder' => 'Password']) }}
                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('remember', '1') }} Remember Me
                    </label>
                </div>
            </div>

            <div class="form-group">
                {{ Form::submit('Login', ['class' => "btn btn-default submit"]) }}
            </div>

            <div class="clearfix"></div>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <p>Login failed!</p>
                </div>
            @endif
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script src="assets/js/vendor.bundle.js"></script>
<script src="assets/js/app.bundle.js"></script>
</body>
</html>
