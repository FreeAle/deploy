<!DOCTYPE html>
<html>

<head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="UTF-8">
<script src="{{asset('plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
<script src="{{asset('js/admin.js')}}"></script>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">
</head>

<body class="login-page" style="max-width: 100%">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>CODER12895</b></a>
            <small>A MARKET PLACE FOR SMALL <b>SALOON</b></small>
        </div>
    </div>
    <div class="container-fluid animated bounceInRight" id="main">
            <div class="row clearfix" id="display">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-md-offset-3 col-lg-offset-3 " id="form">
                    <div class="card">
                            <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-12">
                                            <!-- Nav tabs -->
                                            <!-- <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                                <li role="presentation" class="active"><a href="#home_animation_1" data-toggle="tab">HOME</a></li>
                                                <li role="presentation"><a href="#profile_animation_1" data-toggle="tab">PROFILE</a></li>
                                                <li role="presentation"><a href="#messages_animation_1" data-toggle="tab">MESSAGES</a></li>
                                                <li role="presentation"><a href="#settings_animation_1" data-toggle="tab">SETTINGS</a></li>
                                            </ul> -->
        
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane animated flipInX active" id="home_animation_1">
                                                   
                                                    <form style="margin-top:20px" name="f4" id="f4" method="POST" action="/setting/db" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="col-sm-12">
                                                            <b>DB Configuration</b>
        
                                                            <div class="row m-t-20 ">
        
                                                                <div class="col-sm-6">
                                                                    <div class="form-group form-float form-group-lg">
        
                                                                        <div class="form-line">
                                                                            <input type="text"  name="DB_HOST" class="form-control" value="127.0.0.1" />
                                                                            <label class="form-label">DB HOST</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group form-float form-group-lg">
        
                                                                        <div class="form-line">
                                                                            <input type="text" name="DB_DATABASE" class="form-control" value="demo" />
                                                                            <label class="form-label">DB NAME</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row m-t-20 ">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group form-float form-group-lg">
        
                                                                        <div class="form-line">
                                                                            <input type="text"  name="DB_USERNAME" class="form-control" value="root" />
                                                                            <label class="form-label">DB USERNAME</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group form-float form-group-lg">
        
                                                                        <div class="form-line">
                                                                            <input type="password" name="DB_PASSWORD"  class="form-control" />
                                                                            <label class="form-label">DB PASSWORD</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
        
        
                                                        </div>
                                                      
                                                        <div class="col-sm-12" style="margin-bottom: 0px !important;">
                                                            <input id="submit" type="button" onclick="updateSettingEasy('f4');" value="SURE" class="btn btn-lg bg-orange waves-effect">&nbsp;&nbsp;
                                                            <input type="reset" class="btn btn-lg bg-red waves-effect" value="Reset">&nbsp;&nbsp;
                                                            <a href="#profile_animation_1" id="next" data-toggle="tab" class="btn btn-lg bg-pink waves-effect">NEXT</a>
                                                        </div>
                                                        
        
                                                    </form>
                                                </div>
                                                <div role="tabpanel" class="tab-pane animated flipInX" id="profile_animation_1">
                                                        <div class="col-sm-12">
                                                    <b>YOUR CREDENTIALS</b>
                                                    <div class="row m-t-20 ">
        
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input disabled type="text"  name="email" class="form-control" value="admin@admin.com" />
                                                                    <label class="form-label">Email</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input disabled type="text" name="password" class="form-control" value="admin12345" />
                                                                    <label class="form-label">Password</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12" style="margin-bottom: 0px !important;">
                                                        {{-- <input id="submit" type="button" onclick="updateSettingEasy('f4');" value="Update" class="btn btn-lg bg-orange waves-effect">&nbsp;&nbsp;
                                                        <input type="reset" class="btn btn-lg bg-red waves-effect" value="Reset">&nbsp;&nbsp; --}}
                                                        <a href="#profile_animation_1" data-toggle="tab" class="btn btn-lg bg-pink waves-effect">Go TO LOGIN</a>
                                                    </div>
                                                </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane animated flipInX" id="messages_animation_1">
                                                    <b>Message Content</b>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent
                                                        aliquid pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere
                                                        gubergren sadipscing mel.
                                                    </p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane animated flipInX" id="settings_animation_1">
                                                    <b>Settings Content</b>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent
                                                        aliquid pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere
                                                        gubergren sadipscing mel.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                    </div>

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
    <script src="../../js/pages/examples/sign-in.js"></script>
</body>

<script>

    
     $("#next").hide();
function updateSettingEasy(formID) {
    var temp = $('#' + formID).serializeArray();
    var fd = new FormData();
    temp.forEach(element => {
       
        fd.append(element.name, element.value);
    });
    $.ajax({
        url: $('#' + formID).attr('action'),
        method: 'post',
        enctype: "multipart/form-data",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: fd,
        processData: false,
        contentType: false,
        success: function (result) {
            var base_url = window.location.origin;
            $('#submit').attr('disabled',true);
     $("#next").show();

            alert("click to next");
           // window.location.href = base_url + '/' + 'mainSetting';
        },
        error: function (xhr) {
        
            if (xhr.status == 400) {
                showNotification('bg-red', xhr.responseText, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut');
            }

            $.each(xhr.responseJSON.errors, function (key, value) {
                showNotification('bg-red', value, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut');
            });
        }
    });
}
</script>
</html>
