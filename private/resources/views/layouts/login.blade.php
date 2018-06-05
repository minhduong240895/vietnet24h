<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MaterialWrap - jQuery full version</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/vendor.bundle.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/app.bundle.css') }}">
    <style>
        #login{
            width: 30%;
            margin: auto;
        }
    </style>
    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="{{ URL::asset('assets/css/customs.css') }}">
    <!-- Icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('assets/images/apple-touch-icon-precomposed.png') }}">
    <link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}">
</head>
<body style="background:#F7F7F7;">
<div>
    <div id="wrapper">
        <div id="login" class=" form">
            <section class="login_content">

                @yield('content')

            </section>
        </div>
    </div>
</div>
<script src="{{URL::asset('assets/js/vendor.bundle.js') }}"></script>
<script src="{{URL::asset('assets/js/app.bundle.js') }}"></script>
<script>
    $(document).ready(function () {
        <!-- disable button after first click -->
        $('form').submit(function(){
            $('input[type=submit]', $(this)).prop( 'disabled', true );
        });
    });
</script>
</body>
</html>
