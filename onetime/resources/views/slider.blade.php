@extends('layouts.master') @section('content')

<div class="container-fluid animated bounceInRight" id="main">

<div class="row clearfix" id="display">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <!-- With Captions -->
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>SLIDER IN HOME PAGE</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a  id="new" href="javascript:void(0);">ADD NEW IMAGE</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            @if (count($data)==0)
                                <h1>NO IMAGE FOR SLIDER</h1>
                            @else
                                
                           
                            <div id="carousel-example-generic_2" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                @foreach ($data as $item)
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic_2" data-slide-to="{{$loop->index}}" @if($loop->first)  class="active" @endif></li>
                                   
                                </ol>
                                @endforeach
                                
                                <!-- Wrapper for slides -->
                               
                                <div class="carousel-inner" role="listbox">
                                        @foreach ($data as $item)
                                    <div  @if($loop->first)  class="item active" @else class="item" @endif>
                                        <img style="width:100%;height:74vh" src="{{ asset('uploadedimages/') }}/{{$item['image']}}" />
                                        <div class="carousel-caption">
                                            <h3 style=" color: white;
                                            text-shadow: 2px 2px 4px #000000;">{{$item['title']}}</h3>
                                            <p><button onclick="delete2('{{$item->id}}','slider');" class="deleteConf btn bg-red btn-circle-lg waves-effect waves-circle waves-float row_{{$loop->index}}"
                                                    id="slider/{{$item->id}}"> <i class="material-icons add-icon ">delete</i></button></p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-example-generic_2" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-example-generic_2" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- #END# With Captions -->
</div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="form">
    <div class="card">
        <button type="button" class="btn bg-brown btn-circle-lg waves-effect waves-circle waves-float" id="cancel">
            <i class="material-icons add-icon" style="top: 0%">keyboard_backspace</i>
        </button>
        <div class="header">
            <div class="row clearfix">
                <form id="f1" enctype="multipart/form-data">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group form-float form-group-lg">
                            <div class="form-line">
                                <input type="text" name="title" class="form-control" />
                                <label class="form-label">Title</label>
                            </div>
                        </div>
                       
                        <div class="form-group form-float form-group-lg">
                        <label >Image</label>
                                <div class="form-line">
                                    <input type="file" name="image" id="inImage" class="form-control" onchange="imageStore('insert');" />
                                    <label class="form-label"></label>
                                </div>
                        </div>
                      
                        <div class="col-sm-12 m-t-25 align-center">
                        <input type="button" value="Submit" class="btn btn-lg bg-orange waves-effect" onclick="insertFormSubmit('slider');" id="f1Submit">&nbsp;&nbsp;
                        <input type="Reset" class="btn btn-lg bg-red waves-effect" value="reset">&nbsp;&nbsp;
                    </div>
                   
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
<script>
function delete2(id, reqUrl) {
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
                    setTimeout(() => {
                        url=window.location.origin+window.location.pathname
    url = url.slice(0, -1)
    var name   = url.substring(0, url.lastIndexOf("/"));
    window.location.href = name+'/'+ reqUrl;
                        
                    }, 2000);
                   
                },
        error: function (xhr) {
            if (xhr.status == 400) {
                showNotification('bg-red', xhr.responseText, 'top', 'right', 'animated lightSpeedIn', 'animated lightSpeedOut');
            }
            //alert(error);
        }
            });
        }
    });
}
</script>
