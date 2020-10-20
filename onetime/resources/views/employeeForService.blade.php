@extends('layouts.master') 
@section('content')

<div class="container-fluid animated bounceInRight" id="main">
    <div class="card">
        <div class="header"> <input type="button" onclick="done({{$data['id']}});" value="Done" class="btn btn-lg bg-orange waves-effect">&nbsp;&nbsp;
            <input type="button" class="btn btn-lg bg-red waves-effect" onclick="backToMain('employee');" value="cancel">&nbsp;&nbsp;</div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    <b>{{$data['employee_name']}}</b>  Service`s.

                </h2>
               
            </div>
            <div class="body">
                <div class="clearfix m-b-20">
              
                    <select multiple="multiple" id="my-select" name="my-select[]">
                         @foreach ($data['unselected'] as $item)
                  <option value='{{$item->id}}'>{{$item->name}}</option>
                           
                       
                        @endforeach
                          @foreach ($data['selected'] as $item)
                                    <option value='{{$item->id}}' selected>{{$item->name}}</option>
                        @endforeach 
                      
                 </select>
                </div>

            </div>
        </div>
    </div>
    

</div>
<!-- Jquery Nestable -->
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
    
});

$(function () {
       
        $('#my-select').multiSelect({});
    
        // $('.dd').on('change', function () {
        //     var $this = $(this);
        //     var serializedData = window.JSON.stringify($($this).nestable('serialize'));
        // console.log('serializedData234',serializedData);

        //     $this.parents('div.body').find('textarea').val(serializedData);
        // });
        
    });
    function backToMain(){
        url=window.location.origin+window.location.pathname
    url = url.slice(0, -1)
    var name   = url.substring(0, url.lastIndexOf("/"));
    name=name.substring(0, name.lastIndexOf("/"))
    window.location.href = name;

    }
    function done(id){
        // var serializedData = window.JSON.stringify($('#selected').nestable('serialize'));
       
        // serializedData
        
        var serializedData=$('#my-select').val();
        console.log('serializedDataasdasd',  serializedData?serializedData.toString():'');

     
        var fd = new FormData();
        fd.append('service',serializedData?serializedData.toString():'')
        $.ajax({
        url: id,
        method: 'post',
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
    name=name.substring(0, name.lastIndexOf("/"))
     window.location.href = name; 

        },
        error: function (xhr) {

        }
    });
 
       // $('#selected').parents('div.body').find('textarea').val(serializedData);
    }

</script>