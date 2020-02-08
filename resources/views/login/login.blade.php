<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wilddog Back-Office</title>

    <!-- Bootstrap -->
    <link href="{{asset ("gentelella/vendors/bootstrap/dist/css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset ("gentelella/vendors/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset ("gentelella/vendors/nprogress/nprogress.css")}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset ("gentelella/vendors/animate.css/animate.min.css")}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset ("gentelella/build/css/custom.min.css")}}" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="{{ url('login') }}" method="POST">
                    {!! csrf_field() !!}
                    <h1>Login Form</h1>
                    @if (session('msg'))
                        <div class="alert alert-danger">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <div>
                        <input type="text" class="form-control" placeholder="Email" name="email" required/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required/>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-default" style="width:100%;">Log In</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>