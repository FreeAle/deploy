<!DOCTYPE html>
<html>

<head>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".confirmation").click(function (e) {
                e.preventDefault();
                swal({
                    title: 'Are you sure?',
                    text: "You won't run this action!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, i am sure!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: $(this).attr("href"),
                            success: function (xhr) {
                                url = window.location.origin + window.location
                                    .pathname
                                url = url.slice(0, -1)
                                var name = url.substring(0, url.lastIndexOf("/"));
                                window.location.href = name + '/' + 'appointment';

                            },
                            error: function (error) {
                                alert(error);
                            }
                        });
                    } else {
                        return false;
                    }
                });

            });
        });

    </script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{Session::get('adminName')}} | haven of salon booking</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('uploadedimages/') }}/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->

    <script src=" {{asset('plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{asset('plugins/morrisjs/morris.css')}}" rel="stylesheet" />

    <link href="{{asset('plugins/nestable/jquery-nestable.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/css/multi-select.min.css" />



    <!-- Custom Css -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('css/themes/all-themes.css')}}" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="{{asset('plugins/morrisjs/morris.css')}}" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
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
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header animated  fadeInRightBig ">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{ url('/') }}">{{Session::get('adminName')}}
                    {{Session::get('empName')}}</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">



                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i
                                class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info" style=" padding: 13px 15px 12px 15px;
    white-space: nowrap;
    position: relative;
    border-bottom: 1px solid #e9e9e9;
    /* background: url('{{ asset('uploadedimages/') }}/user-img-background.jpg') no-repeat no-repeat; */
       background: linear-gradient(to bottom, #F44336, #93291e);
    height: 135px;">
                <div class="image">
                    <img src="{{ asset('uploadedimages/') }}/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Session::get('adminContect_person')}}</div>
                    <div class="email">{{Session::get('adminEmail')}} {{Session::get('empEmail')}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{url('/password')}}"><i class="material-icons">mode_edit</i>Change Pass.</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('/logout')}}"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="menu animated bounceInUp " style="overflow-y: hidden;">
                <ul class="list">
                    <li class="header">MENU</li>
                    @if (Session::get('role') == 'admin')


                    <li {{{ (Request::is('dashboard') ? 'class=active' : '') }}}>
                        <a href="{{ url('/') }}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('appointment') ? 'class=active' : '') }}}>
                        <a href="{{ url('/appointment') }}">
                            <i class="material-icons">monetization_on</i>
                            <span>Appointment</span>
                        </a>
                    </li>

                    <li {{{ (Request::is('category') ? 'class=active' : '') }}}>
                        <a href="{{ url('/category') }}">
                            <i class="material-icons">view_list</i>
                            <span>Service Category</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('service') ? 'class=active' : '') }}}>
                        <a href="{{ url('/service') }}">
                            <i class="material-icons">room_service</i>
                            <span>Service</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('employee') ? 'class=active' : '') }}}>
                        <a href="{{ url('/employee') }}">
                            <i class="material-icons">group</i>
                            <span>Employee</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('setting') ? 'class=active' : '') }}}>
                        <a href="{{ url('/setting') }}">
                            <i class="material-icons">settings_applications</i>
                            <span>Genral Setting</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('slider') ? 'class=active' : '') }}}>
                        <a href="{{ url('/slider') }}">
                            <i class="material-icons">image</i>
                            <span>Slider</span>
                        </a>
                    </li>

                    <li {{{ (Request::is('review') ? 'class=active' : '') }}}>
                        <a href="{{ url('/review') }}">
                            <i class="material-icons">rate_review</i>
                            <span>Review</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('user') ? 'class=active' : '') }}}>
                        <a href="{{ url('/user') }}">
                            <i class="material-icons">person</i>
                            <span>User</span>
                        </a>
                    </li>
                    @endif
                    @if (Session::get('role') == 'employee')


                    <li {{{ (Request::is('emp/dashboard') ? 'class=active' : '') }}}>
                        <a href="{{ url('emp/dashboard') }}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li {{{ (Request::is('emp/appointment') ? 'class=active' : '') }}}>
                        <a href="{{ url('/emp/appointment') }}">
                            <i class="material-icons">monetization_on</i>
                            <span>Appoitment</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('emp/service') ? 'class=active' : '') }}}>
                        <a href="{{ url('/emp/service') }}">
                            <i class="material-icons">room_service</i>
                            <span>Service</span>
                        </a>
                    </li>
                    <li {{{ (Request::is('emp/profile') ? 'class=active' : '') }}}>
                        <a href="{{ url('/emp/profile') }}">
                            <i class="material-icons">person</i>
                            <span>Profile</span>
                        </a>
                    </li>
                    @endif




                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - {{ date("y")}} <br>
                    Powerd By :-<a href=""> CODER12895 </a>
                </div>
                <div class="version">
                    <b>Version: </b> 6.1.73
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>

            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content ">
        @yield('content')

    </section>

    <!-- Jquery Core Js -->
    <script src="https://code.jquery.com/jquery-2.2.4.js"
        integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>


    <!-- Custom Js -->

    <!-- Chart Plugins Js -->
    <script src="{{asset('plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->

    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src=" {{asset('plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('plugins/morrisjs/morris.js')}}"></script>

    <!-- ChartJs -->
    <script src="{{asset('plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('plugins/flot-charts/jquery.flot.time.js')}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src=" {{asset('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>
    <script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('plugins/morrisjs/morris.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/crud.js')}}"></script>
    <script src="{{asset('js/pages/index.js')}}"></script>
    <script src="{{asset('js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="{{asset('plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>
    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{asset('plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{asset('js/demo.js')}}"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.11/dist/sweetalert2.all.min.js"></script>
    <script src="{{asset('plugins/nestable/jquery.nestable.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/multi-select/0.9.12/js/jquery.multi-select.min.js"></script>

    <!-- Jquery DataTable Plugin Js -->

    <!-- Compiled and minified JavaScript
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script> -->

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script>
        let activeTheme = window.localStorage.getItem('active-theme') || '';
        if (activeTheme.length > 1) {
            $('body').addClass(activeTheme);
            $('.right-sidebar .demo-choose-skin li').each(function () {

                if (activeTheme == 'theme-' + $(this).data('theme')) {

                    $(this).addClass('active');
                } else {
                    $(this).removeClass('active')
                }
            })
        }
        $('.right-sidebar .demo-choose-skin li').on('click', function () {
            var $body = $('body');
            var $this = $(this);
            var existTheme = $('.right-sidebar .demo-choose-skin li.active').data('theme');
            $('.right-sidebar .demo-choose-skin li').removeClass('active');
            $body.removeClass('theme-' + existTheme);
            $this.addClass('active');
            $body.addClass('theme-' + $this.data('theme'));
            window.localStorage.setItem('active-theme', 'theme-' + $this.data('theme'));
        });

    </script>
</body>

</html>
