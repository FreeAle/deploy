@extends('layouts.master')
@section('content')


<div class="container-fluid animated bounceInRight" id="main">

    <div class="block-header">
        <!-- <h2>DASHBOARD</h2> -->
        @if ($errors->any())
        <div class="alert alert-danger col-sm-4 ">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
        @endif @if (session('status'))
        <div class="alert alert-success col-sm-4">
            {{ session('status') }}
        </div>
        @endif
    </div>


    <div class="row clearfix align-center" id="display">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 align-center">
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 align-center">
            <div class="card" style="padding:15px">
                <div class="header">
                    <h2>
                        Change Password
                    </h2>
                </div>
                <form style="margin-top:20px" name="f5" id="f5" method="POST" action="/password" enctype="multipart/form-data">
                    @csrf

                    <div class="row m-t-20 ">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group form-float form-group-lg">

                                <div class="form-line">
                                    <input type="text" name="old_password" class="form-control" />
                                    <label class="form-label">Enter Old Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group form-float form-group-lg">

                                <div class="form-line">
                                    <input type="text" name="password" class="form-control" />
                                    <label class="form-label">New Password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input type="button" onclick="changePassword();" value="Change" class="btn btn-lg bg-orange waves-effect">&nbsp;&nbsp;
                        <input type="reset" class="btn btn-lg bg-red waves-effect" value="reset">&nbsp;&nbsp;
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 align-center">
        </div>
    </div>
</div>






@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $(window).keydown(function (event) {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }

        });


        var table = $('#table').DataTable();

    });

    function changePassword() {
        var temp = $('#f5').serializeArray();
        var fd = new FormData();
        temp.forEach(element => {
            fd.append(element.name, element.value);
        });
        $.ajax({
            url: 'password',
            method: 'post',
            enctype: "multipart/form-data",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: fd,
            processData: false,
            contentType: false,
            success: function (result) {
                url=window.location.origin+window.location.pathname
    url = url.slice(0, -1)
    var name   = url.substring(0, url.lastIndexOf("/"));
    window.location.href = name+'/'+ 'category';
           
            },
            error: function (xhr) {
                if (xhr.status == 400) {
                    showNotification('bg-red', xhr.responseText, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut');
                }
                $.each(xhr.responseJSON.errors, function (key, value) {
                    showNotification('bg-red', value, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut');
                });
                // alert(error);
            }
        });
    }


</script>