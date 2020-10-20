@extends('layouts.master') @section('content')

<div class="container-fluid animated bounceInRight" id="main">
    <div class="row clearfix" id="display">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 " id="form">
            <div class="card">

                <div class="header">
                    <div class="row clearfix">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tab-col-purple tab-nav-right" role="tablist">
                                        <li role="presentation" class="active"><a href="#simple_setting" data-toggle="tab"><i
                                                    class="material-icons">settings</i>&nbsp;Simple Settings</a></li>
                                        {{-- <li role="presentation"><a href="#social_setting" data-toggle="tab"><i class="material-icons">tag_faces</i>&nbsp;Social
                                                Site Settings</a></li> --}}
                                        <li role="presentation"><a href="#payment_method" data-toggle="tab"><i class="material-icons">payment</i>&nbsp;Payment
                                                Method Settings</a></li>
                                        <li role="presentation"><a href="#mail_settings" data-toggle="tab"><i class="material-icons">email</i>&nbsp;Mail
                                                Settings</a></li>
                                        <li role="presentation"><a href="#one_signal" data-toggle="tab"><i class="material-icons">notifications_active</i>&nbsp;One Signal Settings</a></li>

                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane  active" id="simple_setting">
                                            <form style="margin-top:20px" name="f1" id="f1" method="POST" action="setting/update/{{$data['data']['id']}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-sm-12">
                                                    <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" value="{{$data['data']['name']}}" name="name" class="form-control" />
                                                                    <label class="form-label">Name</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" name="mobile_no" value="{{$data['data']['mobile_no']}}" class="form-control" />
                                                                    <label class="form-label">Mobile No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" value="{{$data['data']['contect_person']}}" name="contect_person" class="form-control" />
                                                                    <label class="form-label">Contect Person</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                               <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" name="email" value="{{$data['data']['email']}}" class="form-control" />
                                                                    <label class="form-label">Email</label>
                                                                </div>
                                                            </div>
                                                         
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    {{-- <input type="text" name="address" value="{{$data['data']['address']}}" class="form-control" />
                                                                    <label class="form-label">Address</label> --}}
                                                                        <textarea  name="address" id="address"  value=""  rows="4" class="form-control no-resize" >{{$data['data']['address']}}</textarea>
                                        <label class="form-label">Address</label>
                                                                </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            {{-- <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" value="{{$data['data']['detail']}}" name="detail" class="form-control" />
                                                                    <label class="form-label">Detail</label>
                                                                </div>
                                                            </div> --}}
                                                            <div class="form-group form-float form-group-lg">
                                                                 <div class="form-line">
                                                                    {{-- <input type="text" name="address" value="{{$data['data']['address']}}" class="form-control" />
                                                                    <label class="form-label">Address</label> --}}
                                                                        <textarea  name="detail" id="detail"  value=""  rows="4" class="form-control no-resize" >{{$data['data']['detail']}}</textarea>
                                        <label class="form-label">Detail</label>
                                                                </div>
                                                             </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" name="state" value="{{$data['data']['state']}}" class="form-control" />
                                                                    <label class="form-label">State</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" name="city" value="{{$data['data']['city']}}" class="form-control" />
                                                                    <label class="form-label">City</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="time" name="open_time" value="{{$data['data']['open_time']}}" class="form-control" />
                                                                    <label class="form-label">Open Time</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="time" value="{{$data['data']['close_time']}}" name="close_time" class="form-control" />
                                                                    <label class="form-label">Close Time</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  

                                                    <div class="col-sm-6">
                                                    <label >Service For</label>

                                                        <select name="available_for" class="form-control">
                                                            <option value="">-- Please select available --</option>
                                                            <option @if ($data[ 'data'][ 'available_for']=='Men' )selected="selected" @endif value="Men">Men</option>
                                                            <option @if ($data[ 'data'][ 'available_for']=='Women' )selected="selected" @endif value="Women">Women</option>
                                                            <option @if ($data[ 'data'][ 'available_for']=='Both' )selected="selected" @endif value="Both">Both</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                    <label >Status</label>

                                                        <select name="status" class="form-control ">

                                                            <option value="">-- Please select Status --</option>
                                                            <option @if ($data[ 'data'][ 'status']=='on' )selected="selected" @endif value="on">On</option>
                                                            <option @if ($data[ 'data'][ 'status']=='off' )selected="selected" @endif value="off">Off</option>


                                                        </select>
                                                    </div>
                                                    <div class="form-group form-float form-group-lg">
                                                        <div class="col-sm-3">
                                                            <label >Image</label>
    
                                                                <div class="form-line">
                                                                    <input type="file" onchange="imageSetting('insert');" name="image" id="inImage" class="form-control" />
                                                                    <label class="form-label"></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                               
                                                                <img src="{{ asset('uploadedimages/') }}/{{$data['data']['profile_image']}}" alt="" style="width:100px;height:100px">
                                                            </div>
                                                            <div class="col-sm-3">
                                                            <label > Cover Image</label>
                                                                <div class="form-line">
                                                                    <input type="file" onchange="coverImageSetting('insert');" name="cover_image" id="coinImage" class="form-control" />
                                                                    <label class="form-label"></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                
    
                                                                <img src="{{ asset('uploadedimages/') }}/{{$data['data']['cover_image']}}" alt="" style="width:100px;height:100px">
                                                        </div>
                                                      
                                                    </div>
                                                  
                                                    <div class="col-sm-12" style="margin-bottom: 0px !important;">
                                                        <input type="button" onclick="updateSetting('service');" value="Update" class="btn btn-lg bg-orange waves-effect">&nbsp;&nbsp;
                                                        <input type="reset" class="btn btn-lg bg-red waves-effect" value="Reset">&nbsp;&nbsp;
                                                       
                                                    </div>
                                                   
                                                </div>
                                            </form>
                                        </div>
                                       
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="payment_method">
                                            <form style="margin-top:20px" name="f3" id="f3" method="POST" action="setting/update/payment/{{$data['data']['id']}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-sm-12">
                                                    <b>PAYPAl Setting</b>
                                                    <div class="row m-t-20 ">
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" value="{{$data['data']['paypal_production_id']}}" name="paypal_production_id" class="form-control" />
                                                                    <label class="form-label">Paypal Production Id</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" name="paypal_sendbox_id" value="{{$data['data']['paypal_sendbox_id']}}" class="form-control" />
                                                                    <label class="form-label">Paypal Sendbox Id</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <b>STRIP Setting</b>
                                                    <div class="row m-t-20 ">
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" name="strip_publish_key" value="{{$data['data']['strip_publish_key']}}" class="form-control" />
                                                                    <label class="form-label">Strip Publish Key</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" name="strip_api_key" value="{{$data['data']['strip_api_key']}}" class="form-control" />
                                                                    <label class="form-label">Strip API Key</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <b>RAZORPAY Setting</b>
                                                    <div class="row m-t-20 ">
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" name="razorpay_key" value="{{$data['data']['razorpay_key']}}" class="form-control" />
                                                                    <label class="form-label">Razorpay Key</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                               
                                                <div class="col-sm-12" style="margin-bottom: 0px !important;">
                                                    <input type="button" onclick="updateSettingEasy('f3');" value="Update" class="btn btn-lg bg-orange waves-effect">&nbsp;&nbsp;
                                                    <input type="reset" class="btn btn-lg bg-red waves-effect" value="Reset">&nbsp;&nbsp;
                                                </div>
                                                

                                            </form>

                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="mail_settings">

                                            <form style="margin-top:20px" name="f4" id="f4" method="POST" action="setting/mail" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-sm-12">
                                                    <b>Email Configuration</b>

                                                    <div class="row m-t-20 ">

                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" value=" {{$data['env']['MAIL_HOST']}}" name="MAIL_HOST" class="form-control" />
                                                                    <label class="form-label">MAIL HOST</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" name="MAIL_PORT" value=" {{$data['env']['MAIL_PORT']}}" class="form-control" />
                                                                    <label class="form-label">MAIL PORT</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-t-20 ">
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" value=" {{$data['env']['MAIL_USERNAME']}}" name="MAIL_USERNAME" class="form-control" />
                                                                    <label class="form-label">MAIL USERNAME</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" name="MAIL_PASSWORD" value=" {{$data['env']['MAIL_PASSWORD']}}" class="form-control" />
                                                                    <label class="form-label">MAIL PASSWORD</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-sm-6">
                                                    <label >Status</label>

                                                        <select name="email_status" class="form-control ">
                                                        notification_status
                                                            <option value="">-- Please select Status --</option>
                                                            <option @if ($data[ 'data'][ 'email_status']=='on' )selected="selected" @endif value="on">On</option>
                                                            <option @if ($data[ 'data'][ 'email_status']=='off' )selected="selected" @endif value="off">Off</option>


                                                        </select>
                                                    </div>     
                                                <div class="col-sm-12" style="margin-bottom: 0px !important;">
                                                    <input type="button" onclick="updateSettingEasy('f4');" value="Update" class="btn btn-lg bg-orange waves-effect">&nbsp;&nbsp;
                                                    <input type="reset" class="btn btn-lg bg-red waves-effect" value="Reset">&nbsp;&nbsp;
                                                </div>
                                                

                                            </form>

                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="one_signal">

                                            <form style="margin-top:20px" name="f5" id="f5" method="POST" action="onesignal" enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-sm-12">
                                                    <b>One Signl Plus Configuration</b>

                                                    <div class="row m-t-20 ">

                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" value=" {{$data['oneSignal']['app_id']}}" name="app_id" class="form-control" />
                                                                    <label class="form-label">App Id</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" name="rest_api_key" value=" {{$data['oneSignal']['rest_api_key']}}" class="form-control" />
                                                                    <label class="form-label">Rest Api Key</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-t-20 ">
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-float form-group-lg">

                                                                <div class="form-line">
                                                                    <input type="text" value=" {{$data['oneSignal']['user_auth_key']}}" name="user_auth_key" class="form-control" />
                                                                    <label class="form-label">User Auth Key</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>


                                                </div>
                                                <div class="col-sm-6">
                                                    <label >Status</label>

                                                        <select name="notification_status" class="form-control ">
                                                        
                                                            <option value="">-- Please select Status --</option>
                                                            <option @if ($data[ 'data'][ 'notification_status']=='on' )selected="selected" @endif value="on">On</option>
                                                            <option @if ($data[ 'data'][ 'notification_status']=='off' )selected="selected" @endif value="off">Off</option>


                                                        </select>
                                                    </div>
                                                <div class="col-sm-12 " style="margin-bottom: 0px !important;">
                                                    <input type="button" onclick="updateSettingEasy('f5');" value="Update" class="btn btn-lg bg-orange waves-effect">&nbsp;&nbsp;
                                                    <input type="reset" class="btn btn-lg bg-red waves-effect" value="Reset">&nbsp;&nbsp;
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    var fullImage = 0;
    var coverFullImage = 0;
    function updateSetting(reqUrl) {
        var temp = $('#f1').serializeArray();
        // temp['image']=fullImage;
        
        if (coverFullImage != 0) {
            var obj = {};
            obj['name'] = 'cover_image';
            obj['value'] = coverFullImage;
            coverFullImage = 0;
            temp.push(obj);
        }
        if (fullImage != 0){
            var obj = {};
        obj['name'] = 'image';
        obj['value'] = fullImage;
        temp.push(obj);
        }
        //.serializeArray()
        var fd = new FormData();
        // fd.append('element.name', 123423);
        // form.append('image', image); 
        temp.forEach(element => {
            fd.append(element.name, element.value);

        });
    

        $.ajax({
            url: $('#f1').attr('action'),
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
             
                url=window.location.origin+window.location.pathname
    url = url.slice(0, -1)
    var name   = url.substring(0, url.lastIndexOf("/"));
    window.location.href = name+'/'+ 'mainSetting';
            

              

               
            },
            error: function (xhr) {
                $.each(xhr.responseJSON.errors, function (key, value) {
                    showNotification('bg-red', value, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut');
                });
                // alert(error);
            }
        });
    }
    
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
                url=window.location.origin+window.location.pathname
    url = url.slice(0, -1)
    var name   = url.substring(0, url.lastIndexOf("/"));
    window.location.href = name+'/'+ 'mainSetting';
          
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
    function imageSetting(forWhat) {
        fullImage = $('#inImage')[0].files[0];
    }
    function coverImageSetting(forWhat) {
        coverFullImage = $('#coinImage')[0].files[0];
    }
</script>