@extends('layouts.master')
 @section('content')

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
                                        <li role="presentation" class="active"><a href="#service_review" data-toggle="tab"><i
                                                    class="material-icons">room_service</i>&nbsp;Service Review</a></li>
                                        <li role="presentation"><a href="#employee_review" data-toggle="tab"><i class="material-icons">group</i>&nbsp;Employee Review</a></li>
                                        <!-- <li role="presentation"><a href="#payment_method" data-toggle="tab"><i class="material-icons">payment</i>Payment
                                                Method Settings</a></li> -->

                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane  active" id="service_review">
                                        <div class="table-responsive">
                        <table class="display table" id="table" >
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>User Name</th>
                                    <th>Appoitment No.</th>
                                    <th>Service</th>
                                    <th>Star</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>No.</th>
                                    <th>User Name</th>
                                    <th>Appoitment No.</th>
                                    <th>Service</th>
                                    <th>Star</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($data['service'] as $item)
                             
                                <tr class="{{$item['id']}}">
                                <td>{{$loop->index }}</td>
                                <td>{{$item['user']}}</td>
                                <td>{{$item['appointment_id']}}</td>
                                <td>{{$item['serviceName']}}</td>
                                <td>{{$item['star']}}</td>
                                <td>{{$item['comment']}}</td>
                                    <td>
                                    <button onclick="deleteReview('review/service/delete/{{$item['id']}}');" class="deleteConf btn bg-red btn-circle-lg waves-effect waves-circle waves-float row_{{$loop->index}}"
                                            id="category/{{$item['id']}}"> <i class="material-icons add-icon ">delete</i></button>
                                  </td>
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated flipInX" id="employee_review">
                                        <div class="table-responsive">
                        <table class="display table" id="table2" >
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>User Name</th>
                                    <th>Appoitment No.</th>
                                    <th>Employee</th>
                                    <th>Star</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>No.</th>
                                    <th>User Name</th>
                                    <th>Appoitment No.</th>
                                    <th>Employee</th>
                                    <th>Star</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($data['emp'] as $temp)
                                <tr class="{{$item['id']}}">
                                    <td>{{$loop->index }}</td>
                                    <td>{{$temp['user']}}</td>
                                    <td>{{$temp['appointment_id']}}</td>
                                    <td>{{$temp['empName1']}}</td>
                                    <td>{{$temp['star']}}</td>
                                    <td>{{$temp['comment']}}</td>
                                    <td>
                                            <button onclick="deleteReview('review/employee/delete/{{$temp['id']}}');" class="deleteConf btn bg-red btn-circle-lg waves-effect waves-circle waves-float row_{{$loop->index}}"
                                                    id="category/{{$item['id']}}"> <i class="material-icons add-icon ">delete</i></button>
                                          </td>
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
  $('table.display').DataTable();

            var table = $('#table').DataTable(); 
            var table2 = $('#table2').DataTable(); 
  
            });
            function deleteReview(reqUrl) {
   
  // var table = $('#table').DataTable();

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
           // var id = $(this).attr('id');
           $.ajax({
               type: "get",
               url: reqUrl,
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               success: function (data) {
                url=window.location.origin+window.location.pathname
    url = url.slice(0, -1)
    var name   = url.substring(0, url.lastIndexOf("/"));
    window.location.href = name+'/'+ 'review';
                
           
               }
           });
       }
   });
}
            </script>
