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


    <div class="row clearfix animated bounceInRight" id="display">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                      Service Catagory
                    </h2>
                    <button type="button" class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float add-btn" id="new">
                        <i class="material-icons add-icon" style="top: 0%">add</i>
                    </button>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table" id="table" >
                            <thead>
                                <tr>
                                    <th >No.</th>
                                    <th >Name</th>
                                    <th>Detail</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th >No.</th>
                                    <th >Name</th>
                                    <th>Detail</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>


                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($data as $item)
                                <tr class="{{$item->id}}">
                                        <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td> 
                                    <img height='100' width='100px' src="{{ asset('uploadedimages/') }}/{{$item->image}}" class="img-responsive" alt="Image">
                                    </td>
                                    <td> @if ($item->status == "off")
                                        <button type="button" class="btn btn-danger waves-effect" disabled="disabled">OFF</button>
                                
                                        
                                    @else
                                    <button type="button" class="btn btn-success waves-effect" disabled="disabled">ON</button>
                                    @endif
                                
                                </td>
                                    <td><button onclick="update1('{{$item->id}}','category');" class="update btn bg-purple btn-circle-lg waves-effect waves-circle waves-float"
                                            id="{{$item->id}}"> <i class="material-icons add-icon ">edit</i></button>
                                        &nbsp;&nbsp; <button onclick="delete1('{{$item->id}}','category');" class="deleteConf btn bg-red btn-circle-lg waves-effect waves-circle waves-float row_{{$loop->index}}"
                                            id="category/{{$item->id}}"> <i class="material-icons add-icon ">delete</i></button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
                                    <input type="text" name="name" class="form-control" />
                                    <label class="form-label">Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float form-group-lg">
                                    <div class="form-line">
                                    <textarea  name="description"   rows="4" class="form-control no-resize" ></textarea>
                                        <label class="form-label">Description</label>
                                    </div>
                            </div>
                            <div class="form-group form-float form-group-lg">
                            <label >Image</label>
                                    <div class="form-line">
                                        <input type="file" name="image" id="inImage" class="form-control" onchange="imageStore('insert');" />
                                        <label class="form-label"></label>
                                    </div>
                            </div>
                            <div class="col-sm-6">
                            <label >Status</label>
                                    <select name="status"  class="form-control ">
                                            <option value="">-- Please select Status --</option>
                                            <option value="on">On</option>
                                            <option value="off">Off</option>
                                            
                    
                                        </select>
                                </div>
                                <div class="col-sm-12 m-t-25 align-center">
                            <input type="button" value="Submit" class="btn btn-lg bg-orange waves-effect" onclick="insertFormSubmit('category');" id="f1Submit">&nbsp;&nbsp;
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
                    <form id="uf1" action="update">
                        @csrf
                        <input name="_method" type="hidden" value="put">
                        <div class="col-sm-12">
                            <div class="form-group form-float form-group-lg">
                                <div class="form-line">
                                    <input type="text" id="name" name="name" class="form-control" />
                                    <label class="form-label">Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float form-group-lg">
                                    <div class="form-line">
                                    <textarea  name="description" id="description"  rows="4" class="form-control no-resize" ></textarea>
                                        <label class="form-label">Description</label>
                                    </div>
                            </div>
                            <div class="form-group form-float form-group-lg">
                            <label >Image</label>
                                    <div class="form-line">
                                        <input type="file" name="image" id="upImage" class="form-control" onchange="imageStore('update');" />
                                        <label class="form-label"></label>
                                    </div>
                            </div>
                            <div class="col-sm-6">
                            <label >Status</label>
                                    <select name="status" id="status"  class="form-control ">
                                            <option value="">-- Please select Status --</option>
                                            <option value="on">On</option>
                                            <option value="off">Off</option>
                                            
                    
                                        </select>
                                </div>
                                <div class="col-sm-12 m-t-25 align-center">
                            <input type="button" onclick="updateFormSubmit('category')" value="Update" id="UpdateForm" class="btn btn-lg bg-orange waves-effect">&nbsp;&nbsp;
                            <input type="Reset" class="btn btn-lg bg-red waves-effect" value="reset">&nbsp;&nbsp;

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
          
            $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
            var table = $('#table').DataTable(); 
  
            });

                    function DataTableUpdated(data,reqUrl) {
    $('#table').DataTable().destroy();
    table = jQuery('#table').DataTable({
        retrieve: true,
        processing: true, // control the processing indicator.
        data: data,
        autoWidth: false,
        columns: [
            { data: null },
            { data: 'name' },
            { data: 'description' },
            {
                className: 'table',
                orderable: false,
                data: null,
                defaultContent: ''
            },
        ],
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: 0
            },
            {
                targets: 3,
                data: null,
                render: function (data, type, row, meta) {
                   
                    var base_url = window.location.origin;
                
                    base_url=base_url+'/uploadedimages/'+data.image;
                    return `<img height='100' width='100px' src="`+base_url+`" class="img-responsive" alt="Image">`;
                }
            },
            {
                targets: 4,
                data: null,
                render: function (data, type, row, meta) {
                    if(data.status == "off"){
                        return `<button type="button" class="btn btn-danger waves-effect" disabled="disabled">OFF</button>`;
                                
                                        
                                    } else{
                                        return ` <button type="button" class="btn btn-success waves-effect" disabled="disabled">ON</button>`;
                                     }   
                }
            },
            {
                targets: 5,
                data: null,
                render: function (data, type, row, meta) {
                    return `<button onclick="update1('` + data.id + `','`+reqUrl+`');" class="update btn bg-red btn-circle-lg waves-effect waves-circle waves-float"id="upd_'` + data.id + `'+"> <i class="material-icons add-icon ">edit</i></button>&nbsp;&nbsp;`
                    +
                    `<button onClick="delete1('` + data.id + `','`+reqUrl+`')" class="deleteConf btn bg-red btn-circle-lg waves-effect waves-circle waves-float row_'` + data.id + `'" id="del_'` + data.id + `'"> <i class="material-icons add-icon ">delete</i></button>`;
                }
            },
        ],
        createdRow: function (row, data, index) {
          

            $(row).addClass('' + data.id);
        },
        order: [[1, 'asc']]
    });
    table.columns.adjust().draw();
    table.on('order.dt search.dt', function () {
        table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
}   
    </script>