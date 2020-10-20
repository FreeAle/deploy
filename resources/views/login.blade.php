<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In</title>
    <!-- Favicon-->
    {{-- <link rel="icon" href="../../favicon.ico" type="image/x-icon"> --}}
    <link rel="icon" href="{{ asset('uploadedimages/') }}/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />
 <!-- Animation Css -->
 <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style>
    body {
        font-family: 'Roboto', sans-serif !important;
    /* font-family: "Lato-Regular"; */
    font-size: 14px;
    margin: 0;
    color: #999;
    background: url("{{ asset('uploadedimages/') }}/login-back.png" ) no-repeat center bottom;
    height: 100vh;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
}.card{
    max-height: 50vh !important;
    height: 50vh !important;
    
}.login-box{
    position: absolute; 
    left: 10vw; 
    width: 22vw; 
}.font-1{
  font-size:1.1vw;

}.font-2{
    font-size: 3vw;
}
.font-20{
    font-size: 20px !important;
}.color-black{
    color: black !important
}
    </style>
</head>

<body class="login-page" >
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b class="color-black font-2">CODER12895</b></a>
            <small class="color-black font-1">A MARKET PLACE FOR SMALL <b class="color-black">SALOON</b></small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action="login" method="POST">
                    <div class="msg font-20">Sign in to start your session</div>
                    @csrf
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" autocomplete="off" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" autocomplete="off" class="form-control" name="password" placeholder="Password" required min="8" max="25">
                        </div>
                        
                        @if (Session::has('error')))
                        <span>{{Session::get('error')}}</span>
                        @endif
                    </div>
                     <div class="row m-t-15 m-b-20 m-r-10">
                        <div class="col-12 align-right">
                         
                            <a class="color-black" href="{{url('forgot')}}">Forgot Password?</a>
                        
                            <!-- <a href="sign-up.html">Register Now!</a> -->
                        </div>
                       
                    </div>
                    <div class="row m-r-10">
                        {{-- <div class="col-xs-8 p-t-5">
                            <!-- <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label> -->
                        </div> --}}
                        <div class="col-12 align-right">
                            <button class="btn-lg  bg-black waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                   
                </form>
                <div class="msg animated pulse infinite " style="margin-bottom: 0px;font-style: italic;position: absolute;
    bottom: 10%;
    left: 20%;">Made By CODER12895 & TEAM.</div>
            </div>
        </div>

    </div>

    <!-- Jquery Core Js -->
    {{-- <script src="../../plugins/jquery/jquery.min.js"></script> --}}

    <!-- Bootstrap Core Js -->
    {{-- <script src="../../plugins/bootstrap/js/bootstrap.js"></script> --}}

    <!-- Waves Effect Plugin Js -->
    {{-- <script src="../../plugins/node-waves/waves.js"></script> --}}

    <!-- Validation Plugin Js -->
    {{-- <script src="../../plugins/jquery-validation/jquery.validate.js"></script> --}}

    <!-- Custom Js -->
    {{-- <script src="../../js/admin.js"></script> --}}
    {{-- <script src="../../js/pages/examples/sign-in.js"></script> --}}
</body>



</html>
