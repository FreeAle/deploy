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


    <div class="row clearfix" id="display">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                    Appointment
                    </h2>
                    <!-- <button type="button" class="btn bg-green btn-circle-lg waves-effect waves-circle waves-float add-btn" id="new">
                        <i class="material-icons add-icon" style="top: 0%">add</i>
                    </button> -->
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table" id="table" >
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Appoiment No</th>
                                    <th>Client</th>
                                    <th>Employee</th>
                                    <th>Service</th>
                                    <th>Total</th>
                                    <th>Discount</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Payment Status</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Appoiment No</th>
                                    <th>Client</th>
                                    <th>Employee</th>
                                    <th>Service</th>
                                    <th>Total</th>
                                    <th>Discount</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Payment Status</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($data as $item)
                                <tr class="{{$item->id}}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->appoiment_no}}</td>
                                <td>{{$item->user_name}}</td>
                                <td>{{$item->empName}}</td>
                                <td>{{$item->serviceName}}</td>
                                <td>{{$item->grandTotal}}</td>
                                <td>{{$item->grandDiscount}}</td>
                                <td>{{$item->orignalStartTime}}</td>
                                <td>{{$item->orignalEndTime}}</td>
                                <td>@if($item->payment_status == 1)<span class="label label-success">Complate</span> @else <span class="label label-danger">Not Complate</span>@endif</td>

                                <td>{{$item->payment_method}}</td>

                                <td>@if($item->status == 1)<span class="label label-success">Complate</span> 
                                    @elseif ($item->status == 0)<span class="label label-primary">Witing for turn</span> 
                                    @else
                                    <span class="label label-danger">Cancel</span>
                                    @endif</td>  


                                    <td>@if ($item->status==1 || $item->status==2 )
                                    <a  i href="appointment/invoice/{{$item->appoiment_no}}"  class=" deleteConf btn bg-Purple btn-circle-lg waves-effect waves-circle waves-float row_{{$loop->index}}"
                                            id="category/{{$item->id}}"> <i class="material-icons add-icon m-t-5 ">visibility</i></a>
                                    @else
                                    <a   href="appointment/done/{{$item->appoiment_no}}" class="confirmation update btn bg-green btn-circle-lg waves-effect waves-circle waves-float"
                                        id="{{$item->id}}"> <i style="top:5px" class="material-icons add-icon  m-t-5">done_all</i></a>
                                        <a  i href="appointment/invoice/{{$item->appoiment_no}}"  class=" deleteConf btn bg-Purple btn-circle-lg waves-effect waves-circle waves-float row_{{$loop->index}}"
                                            id="category/{{$item->id}}"> <i class="material-icons add-icon m-t-5 ">visibility</i></a>
                                   
                                    @if ($item->payment_status == 0)
                                    <a  href="appointment/cancel/{{$item->appoiment_no}}" class="confirmation deleteConf btn bg-red btn-circle-lg waves-effect waves-circle waves-float row_{{$loop->index}}"
                                            id="category/{{$item->id}}"> <i class="material-icons add-icon  m-t-5 " style="top:5px"s>cancel</i></a>
                                    @endif </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
    </script>