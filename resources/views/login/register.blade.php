<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wilddog Back-Office</title>
    @include('layouts.header')
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
            <form action="{{ url('register') }}" class="form-horizontal" method="POST" novalidate>
                    {!! csrf_field() !!}
                    @method('POST')
                    <h1>Register Form</h1>
                    @if (session('msg'))
                        <div class="alert alert-danger">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <div class="item form-group">
                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" data-validate-words="1" name="name" placeholder="Name" required="required" type="text">
                    </div>
                    <div class="item form-group">
                        <input type="email" id="email" name="email" required="required" value="" placeholder="Email" class="form-control col-md-7 col-xs-12">
                    </div>
                    <div class="item form-group">
                        <input id="password" type="password" name="password" placeholder="Password" data-validate-length="6,7" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                    <div class="item form-group">
                        <input id="password2" type="password" name="password2" placeholder="Re Password" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                    </div>
                        <button type="submit" class="btn btn-default" style="width:100%;">Register</button>
                        <a class="btn btn-default" href="{{url('auth/login')}}" style="width:100%;">Log In</a>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </section>
        </div>
    </div>
</div>
@include('layouts.script')
</body>
</html>