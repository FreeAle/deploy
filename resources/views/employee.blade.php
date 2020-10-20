@extends('layouts.master') @section('content')

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

    <div class="row">


        <div class="row clearfix" id="display">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Employee
                        </h2>
                        <button type="button" class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float add-btn" id="new">
                            <i class="material-icons add-icon" style="top: 0%">add</i>
                        </button>
                    </div>
                </div>

                    @foreach($data as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 " >
                            <div class="card" style="border-radius: 13px">
                                <div class="header bg-pink" style="border-top-left-radius: 13px;border-top-right-radius: 13px;">
                                    <h2>
                                            {{$item->name}} <small> {{substr($item->detail, 0, 100)}}... </small>
                                    </h2>
                                    <ul class="header-dropdown m-r--5" >
                                            
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <ul class="dropdown-menu pull-right">
                            <li><a href="{{ url('/employee/service/' . $item->id) }}">View Service</a></li>
                            <li><a onclick="update1('{{$item->id}}','employee');" class="update " id="{{$item->id}}">Edit
                                    Employee</a></li>
                            <li><a onclick="deleteWithCard('{{$item->id}}','employee','card_{{$item->id}}');"
                                    class="deleteConf " id="employee/{{$item->id}}">Delete Employee</a></li>
                        </ul>
                                            </li>
                                        </ul>
                                </div>
                                <div class="body align-center">
                                        
                                     
                                            <div class="row m-b-0">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    Mobile No
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                    :-
                                                </div>
                                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                    {{$item->mobile_no}}
                                                </div>
                                            </div>
                                            <div class="row m-b-0">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    Gender
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                    :-
                                                </div>
                                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                    {{$item->gender}}
                                                </div>
                                            </div>
                                            <div class="row m-b-0">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    City
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                    :-
                                                </div>
                                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                    {{$item->city}}
                                                </div>
                                            </div>
                                            <div class="row m-b-0">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    State
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                    :-
                                                </div>
                                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                    {{$item->state}}
                                                </div>
                                            </div>
                                            <div class="row m-b-0">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    Status
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                                    :-
                                                </div>
                                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                                    @if ($item->status == "off")
                                                    <button type="button" class="btn btn-danger waves-effect" disabled="disabled">OFF</button>
            
            
                                                    @else
                                                    <button type="button" class="btn btn-success waves-effect" disabled="disabled">ON</button>
                                                    @endif
                                                </div>
                                            </div>
                                </div>
                                <div class="header" >
                                        <div class="row m-b-0">

                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 align-center">
                                                        <label>Display Image </label>
                                                        <img style="height:100px;width:100px" src="{{ asset('uploadedimages/') }}/{{$item->image}}" alt="">
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                                  
                                                </div>
                                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 align-center">
                                                        <label >Cover Image </label>
                                                        <img style="height:100px;width:100px" src="{{ asset('uploadedimages/') }}/{{$item->cover_image}}" alt="">
                                                </div>
                                            </div>
                                    </div>
                            </div>
                          </div>
                    {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 " id="card_{{$item->id}}">
                        <div class="card" style="width: 25vw;">
                            <div class="header bg-blue-grey" style="    background-size: contain;background-repeat: no-repeat; background-position:center;height: 20vh;background-image: url({{ asset('uploadedimages/') }}/{{$item->cover_image}})">
                                <h2>
                                  //   {{$item->name}}<small>{{$item->description}}</small>
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <i class="material-icons">skip_next</i>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>

                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="{{ url('/employee/service/' . $item->id) }}">View Service</a></li>
                                            <li><a onclick="update1('{{$item->id}}','employee');" class="update " id="{{$item->id}}">Edit
                                                    Employee</a></li>
                                            <li><a onclick="deleteWithCard('{{$item->id}}','employee','card_{{$item->id}}');"
                                                    class="deleteConf " id="employee/{{$item->id}}">Delete Employee</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                               
                                
                            </div>
                        </div>
                    </div> --}}
                    @endforeach

                

            </div>

        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="form">
            <div class="card">
                <button type="button" class="btn bg-brown btn-circle-lg waves-effect waves-circle waves-float" id="cancel">
                    <i class="material-icons add-icon" style="top: 0%">keyboard_backspace</i>
                </button>
                <div class="header">
                    <div class="row clearfix">
                        <form id="f1" method="post" action="employee" enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-12">
                                <div class="form-group form-float form-group-lg">
                                    <div class="form-line">
                                        <input type="text" name="name" class="form-control" />
                                        <label class="form-label">Name</label>
                                    </div>
                                </div>

                                <div class="form-group form-float form-group-lg">
                                    <div class="form-line">
                                    <textarea  name="detail"  rows="4" class="form-control no-resize" ></textarea>
                                       
                                        <label class="form-label">Description</label>
                                    </div>
                                </div>


                                <div class="form-group form-float form-group-lg">
                                    <div class="col-sm-6 p-l-0">
                                        <div class="form-line">
                                            <input type="text" name="city" class="form-control" />
                                            <label class="form-label">City</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group form-float form-group-lg">
                                    <div class="col-sm-6 ">
                                        <div class="form-line">
                                            <input type="text" name="state" class="form-control" />
                                            <label class="form-label">State </label>
                                        </div>
                                    </div>
                                </div>


                                <div style="margin-top:9rem;">
                                    <div class="col-sm-6 p-l-0 ">
                                           
                                        <select name="gender" style="margin-top: 5px" class="form-control ">
                                            <option value="">-- Please select Gender --</option>
                                            <option value="Men">Men</option>
                                            <option value="Women">Women</option>
                                            <option value="Both">Other</option>

                                        </select>
                                    </div>

                                    <div class="form-group form-float form-group-lg">
                                        <div class="col-sm-6">
                                            <div class="form-line">
                                                <input type="text" name="mobile_no" class="form-control" />
                                                <label class="form-label">Mobile No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group form-float form-group-lg">
                                <div class="col-sm-6 ">
                                        <label>Image</label>

                                    <div class="form-line">
                                        <input type="file" name="image" id="inImage" class="form-control" onchange="imageStore('insert');" />
                                        <label class="form-label"></label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                        <label>Cover Image</label>

                                    <div class="form-line">
                                        <input type="file" name="cover_image" id="coinImage" class="form-control" onchange="coverImageStore('insert');" />
                                        <label class="form-label"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 " style="margin-top: 25px">
                                    <label>Status</label>

                                    <select name="status"  class="form-control ">
                                        <option value="">-- Please select Status --</option>
                                        <option value="on">On</option>
                                        <option value="off">Off</option>
                                        

                                    </select>
                          </div>
                            <div class="col-sm-12 m-t-25 align-center" >
                                <input type="button" onclick="insertFormSubmit('employee');" value="Submit" class="btn btn-lg bg-orange waves-effect">&nbsp;&nbsp;
                                <input type="Reset" class="btn btn-lg bg-red waves-effect" value="reset">&nbsp;&nbsp;
                            </div>
                          



                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="update">
        <div class="card">
            <button type="button" class="btn bg-brown btn-circle-lg waves-effect waves-circle waves-float" id="cancelUpdate">
                <i class="material-icons add-icon" style="top: 0%">keyboard_backspace</i>
            </button>
            <div class="header">
                <div class="row clearfix">
                    <form id="uf1" name="uf1" action="update" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-12">
                        <input name="_method" type="hidden" value="PUT">

                        <div class="form-group form-float form-group-lg">
                            <div class="form-line">
                                <input type="text" id="name" name="name" class="form-control" />
                                <label class="form-label">Name</label>
                            </div>
                        </div>

                        <div class="form-group form-float form-group-lg">
                            <div class="form-line">
                                    <textarea id="detail"  name="detail"  rows="4" class="form-control no-resize" ></textarea>
                                <label class="form-label">Description</label>
                            </div>
                        </div>


                        <div class="form-group form-float form-group-lg">
                            <div class="col-sm-6 p-l-0">
                                <div class="form-line">
                                    <input type="text" id="city" name="city" class="form-control" />
                                    <label class="form-label">City</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-float form-group-lg">
                            <div class="col-sm-6 ">
                                <div class="form-line">
                                    <input type="text" id="state" name="state" class="form-control" />
                                    <label class="form-label">State </label>
                                </div>
                            </div>
                        </div>


                        <div style="margin-top:9rem;">
                            <div class="col-sm-6 p-l-0 ">
                                <select name="gender" id="gender" style="margin-top: 5px" class="form-control ">
                                    <option value="">-- Please select Gender --</option>
                                    <option value="Men">Men</option>
                                    <option value="Women">Women</option>
                                    <option value="Both">Other</option>

                                </select>
                            </div>

                            <div class="form-group form-float form-group-lg">
                                <div class="col-sm-6">
                                    <div class="form-line">
                                        <input type="text" id="mobile_no" name="mobile_no" class="form-control" />
                                        <label class="form-label">Mobile No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                



                {{--
            </div> --}}
            <div class="form-group form-float form-group-lg">
                <div class="col-sm-6">
                        <label >Image</label>

                    <div class="form-line">
                        <input type="file" name="image" id="upImage" class="form-control" onchange="imageStore('update');" />
                        <label class="form-label"></label>
                    </div>
                </div>
                <div class="col-sm-6">
                        <label >Cover Image</label>

                    <div class="form-line">
                        <input type="file" name="cover_image" id="coupImage" class="form-control" onchange="coverImageStore('update');" />
                        <label class="form-label"></label>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 " style="margin-top: 25px">
                    <label >Status</label>

                    <select name="status" id="status"  class="form-control ">
                        <option value="">-- Please select Status --</option>
                        <option value="on">On</option>
                        <option value="off">Off</option>
                        

                    </select>
          </div>
            <div class="col-sm-12 m-t-25 align-center">
                <input type="button" onclick="updateFormSubmit('employee');" value="Update" class="btn btn-lg bg-orange waves-effect">&nbsp;&nbsp;
                <input type="reset" class="btn btn-lg bg-red waves-effect" value="Reset">&nbsp;&nbsp;
            </div>
         
        </div>
        </div>
        </div>
        </form>

    </div>
</div>
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

    function DataTableUpdated(data, reqUrl) {
        
        $("#main").html(data);
    }
    function deleteWithCard(id, reqUrl, cardid) {

        var table = $('#table').DataTable();

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: reqUrl + '/' + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        showNotification('bg-green', data.msg, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut');
                        location.reload();
                    },
        error: function (xhr) {
            if (xhr.status == 400) {
                showNotification('bg-red', xhr.responseText, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut');
            }
        }
                });
            }
        });
    }

</script>