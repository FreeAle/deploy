<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Forgot Password </title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

<!-- Bootstrap Core Css -->
<link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />
<!-- Animation Css -->
<link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />

<!-- Custom Css -->
<link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
        <a href="javascript:void(0);"><b>CODER12895</b></a>
            <small>A MARKET PLACE FOR SMALL <b>SALOON</b></small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST">
                    <div class="msg">
                        Click Below Button
                        link to reset your password. <br>
                        @if (Session::has('msg')))
                    <b style="color:green;">{{Session::get('msg')}}</b>
                    @endif
                    </div>


                <a href="{{url('/giveOTP')}}" class="btn btn-block btn-lg bg-pink waves-effect">RESET MY PASSWORD</a>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="{{url('/')}}">Sign In!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/examples/forgot-password.js"></script>
</body>

</html>