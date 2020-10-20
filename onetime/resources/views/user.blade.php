@extends('layouts.master')
 @section('content')
 <div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader pl-size-l">
            <div class="spinner-layer pl-purple">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Someone Is Coming...</p>
    </div>
</div>
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
                             
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane  active" id="service_review">
                                        <div class="table-responsive">
                        <table class="display table" id="table" >
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>Gender</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach($data as $item)
                             
                                <tr class="{{$item['id']}}">
                                <td>{{$loop->index }}</td>
                                <td>{{$item['name']}}</td>
                                <td>{{$item['email']}}</td>
                                <td>{{$item['mobile_no']}}</td>
                                <td>{{$item['gender']}}</td>
                               
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
    window.location.href = name+'/'+'review';
               
           
               }
           });
       }
   });
}
            </script>
