@extends('layouts.master') @section('content')


<div class="container-fluid animated bounceInRight" id="main">
<div class="row clearfix" id="display">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-pink hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">TODAY`S APPOINTMENT</div>
                            <div class="number">{{$data['today']}}</div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-blue hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">next_week</i>
                        </div>
                        <div class="content">
                            <div class="text">TOMMOROW`S WORK</div>
                            <div class="number">{{$data['tomorrow']}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-indigo hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">face</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL USER</div>
                            <div class="number">{{$data['user']}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-green hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL REVENUE</div>
                            <div class="number">{{$data['total']}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
             
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-brown hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">subject</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL CATEGORY</div>
                            <div class="number">{{$data['cat']}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-teal hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">room_service</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL SERVICE</div>
                            <div class="number">{{$data['ser']}}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="info-box-2 bg-deep-orange hover-zoom-effect hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">group</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL EMPLOYEE</div>
                            <div class="number">{{$data['emp']}}</div>
                        </div>
                    </div>

                </div>
            </div>
            </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card ">
                    <div class="header">
                        <h2>EMPLOYEE WORKING CHART</h2>
                    </div>
                    <div class="body">
                        <div id="bar_chart" class="graph"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>SERVICE FOR</h2>
                    </div>
                    <div class="body">
                        <div id="donut_chart" class="graph"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>APPOINTMENT STATUS</h2>
                    </div>
                    <div class="body">
                        <div id="donut_chart1" class="graph"></div>
                    </div>
                </div>
            </div>
            

                

         
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            element='donut_chart';
            Morris.Donut({
            element: element,
            data: {!! $data['available_for'] !!},
            colors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(255, 152, 0)'],
           
            formatter: function (y) {
                return y 
            }
        });
        element='donut_chart1';
            Morris.Donut({
              
            element: element,
            data: {!! $data['statusChart'] !!},
            colors: [ 'rgb(255, 152, 0)', 'rgb(0, 150, 136)','rgb(233, 30, 99)'],
            formatter: function (y) {
                return y 
            }
        });
        element='bar_chart'; 
        Morris.Bar({
            element: element,
            data: {!! $data['empWOrk'] !!},
            xkey: 'x',
            ykeys: ['y'],
            labels: ['TOTAL' ],
            //barColors: ['rgb(233, 30, 99)', 'rgb(0, 188, 212)', 'rgb(0, 150, 136)'],
        });
       
            $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
           
            });
           
    </script>
<script>
 
</script>
