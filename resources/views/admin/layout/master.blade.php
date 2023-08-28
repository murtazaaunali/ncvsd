<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="_token" content="{{csrf_token()}}" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=0"/>

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png')}}">
        <!-- App title -->
        <title>NCVSD</title>

        <!-- date range picker -->
        <link href="{!! '../plugins/bootstrap-daterangepicker/daterangepicker.css' !!}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

        <!--datatables -->
        <link href="{!! asset('plugins/datatables/buttons.bootstrap.min.css') !!}" rel="stylesheet" type="text/css"/>
        <link href="{!! asset('plugins/datatables/dataTables.bootstrap.min.css') !!}" rel="stylesheet" type="text/css"/>
        <link href="{!! asset('plugins/datatables/jquery.dataTables.min.css') !!}" rel="stylesheet" type="text/css"/>

        <link href="{!! asset('plugins/datatables/fixedHeader.bootstrap.min.css') !!}" rel="stylesheet" type="text/css"/>
        <link href="{!! asset('plugins/datatables/responsive.bootstrap.min.css') !!}" rel="stylesheet" type="text/css"/>
        <link href="{!! asset('plugins/datatables/scroller.bootstrap.min.css') !!}" rel="stylesheet" type="text/css"/>
        <link href="{!! asset('plugins/datatables/dataTables.colVis.css') !!}" rel="stylesheet" type="text/css"/>
        <link href="{!! asset('plugins/datatables/fixedColumns.dataTables.min.css') !!}" rel="stylesheet" type="text/css"/>

        <!--datatables -->

        <!-- App css -->
        <link href="{!! asset('assets/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('assets/css/core.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('assets/css/components.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('assets/css/morris.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('assets/css/icons.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('assets/css/pages.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('assets/css/menu.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('assets/css/custom.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('assets/css/responsive.css') !!}" rel="stylesheet" type="text/css" />
        <link href="{!! asset('../plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') !!}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{!! '../plugins/switchery/switchery.min.css' !!}">
        
        

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{!! asset('assets/js/modernizr.min.js') !!}"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    {{-- <a href="index.html" class="logo"><span>Zir<span>cos</span></span><i class="mdi mdi-layers"></i></a> --}}
                    <!-- Image logo -->
                    <a href="/dashboard" class="logo">
                        <span>
                            <img src="{!! URL::to('assets/images/header-logo.png') !!}" alt="" height="50">
                        </span>
                        <i>
                            <font style="font-size: 18px; color: #fff; font-style: normal; font-family:'Roboto';"> NC<font style="color: #e92525;">V</font>SD </font>
                             <!--<img src="{!! URL::to('assets/images/logo_sm.png') !!}" alt="" height="28"> -->
                        </i>
                    </a>
                </div>
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            <!--<li class="hidden-xs">
                                <form role="search" class="app-search">
                                    <input type="text" placeholder="Search..."
                                           class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </li>-->
                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                	@if(Auth::User()->profile != "")
		                            	<img src="{!! asset('uploads/users/'.Auth::User()->id.'/'.Auth::User()->profile) !!}"  alt="user-img" class="img-circle user-img">
		                            @else
		                            	<img src="{!! URL::to('assets/images/users/avatar-1.jpg') !!}" alt="user-img" class="img-circle user-img">
		                            @endif
                                    
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5>Hi, {{ Auth::user()->name }}</h5>
                                    </li>
                                    <li><a href="{{ route('logout') }}"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="/dashboard" class="waves-effect"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>

							 <li class="has_sub">
                                <a href="javascript:;" class="waves-effect"><i class="fas fa-users"></i> <span> Volunteers </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
									<li><a href="{{ url('dashboard/volunteers') }}">Submitted Forms</a></li>
                                </ul>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:;" class="waves-effect"><i class="fas fa-users"></i> <span> Veterans </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('dashboard/veterans') }}">Submitted Forms</a></li>
                                </ul>
                            </li>
                            @if(Auth::user()->user_type == 'Super Admin')
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-users"></i><span> User Management </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('dashboard/userslist') }}">Admin Users</a></li>
                                    <li><a href="{{ url('dashboard/adduser') }}">Add New User</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ url('dashboard/configuration') }}" class="waves-effect"><i class="fas fa-gear"></i><span> Site Configuration</span> </a>
                            </li>
                            @endif


                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
                <!-- Sidebar -left -->
            </div>
            @yield('content')
        </div>
        <div id="wrapper">
        </div>
        <!-- END wrapper -->

            <script>
            var resizefunc = [];
        </script>
		
        <!-- jQuery  -->
        @if( strpos($_SERVER['REQUEST_URI'],'/editveteran/') === false && strpos($_SERVER['REQUEST_URI'],'/editvolunteer/') === false )
        <script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
        @endif
        <script src="{!! asset('assets/js/bootstrap.min.js') !!}"></script>
        <script src="{!! asset('assets/js/detect.js') !!}"></script>
        <script src="{!! asset('assets/js/fastclick.js') !!}"></script>
        <script src="{!! asset('assets/js/jquery.blockUI.js') !!}"></script>
        <script src="{!! asset('assets/js/waves.js') !!}"></script>
        <script src="{!! asset('assets/js/jquery.slimscroll.js') !!}"></script>
        <script src="{!! asset('assets/js/jquery.scrollTo.min.js') !!}"></script>
        <script src="{!! asset('../plugins/switchery/switchery.min.js') !!}"></script>

        <!-- Counter js  -->
        <script src="{!! asset('../plugins/waypoints/jquery.waypoints.min.js') !!}"></script>
        <script src="{!! asset('../plugins/counterup/jquery.counterup.min.js') !!}"></script>

         <!--Morris Chart-->
        <script src="{!! asset('../plugins/morris/morris.min.js') !!}"></script>
        <script src="{!! asset('../plugins/raphael/raphael-min.js') !!}"></script>

        <!-- Flot chart js -->
        <script src="{!! asset('../plugins/flot-chart/jquery.flot.min.js') !!}"></script>
        <script src="{!! asset('../plugins/flot-chart/jquery.flot.time.js') !!}"></script>
        <script src="{!! asset('../plugins/flot-chart/jquery.flot.tooltip.min.js') !!}"></script>
        <script src="{!! asset('../plugins/flot-chart/jquery.flot.resize.js') !!}"></script>
        <script src="{!! asset('../plugins/flot-chart/jquery.flot.pie.js') !!}"></script>
        <script src="{!! asset('../plugins/flot-chart/jquery.flot.selection.js') !!}"></script>
        <script src="{!! asset('../plugins/flot-chart/jquery.flot.crosshair.js') !!}"></script>

        <script src="{!! asset('../plugins/moment/moment.js') !!}"></script>
        <script src="{!! asset('../plugins/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
        <script src="{!! asset('../plugins/timepicker/bootstrap-timepicker.js') !!}"></script>
        <script src="{!! asset('../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') !!}"></script>
        <script src="{!! asset('../plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}"></script>
        <script src="{!! asset('../plugins/clockpicker/js/bootstrap-clockpicker.min.js') !!}"></script>
        <script src="{!! asset('../plugins/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>


        <script src="{!! asset('../plugins/datatables/jquery.dataTables.min.js') !!}"></script>
        <script src="{!! asset('../plugins/datatables/dataTables.bootstrap.js') !!}"></script>

        <script src="{!! asset('../plugins/datatables/dataTables.buttons.min.js') !!}"></script>
        <script src="{!! asset('../plugins/datatables/buttons.bootstrap.min.js') !!}"></script>
        <script src="{!! asset('../plugins/datatables/jszip.min.js') !!}"></script>
        <script src="{!! asset('../plugins/datatables/pdfmake.min.js') !!}"></script>
        <script src="{!! asset('../plugins/datatables/vfs_fonts.js') !!}"></script>
        <script src="{!! asset('../plugins/datatables/buttons.html5.min.js') !!}"></script>
        <script src="{!! asset('../plugins/datatables/buttons.print.min.js') !!}"></script>
        <script src="{!! asset('../plugins/datatables/dataTables.fixedHeader.min.js') !!}"></script>
        <script src="{!! asset('../plugins/datatables/dataTables.keyTable.min.js') !!}"></script>
        <script src="{!! asset('../plugins/datatables/dataTables.responsive.min.js') !!}"></script>
        <script src="{!! asset('../plugins/datatables/responsive.bootstrap.min.js') !!}"></script>
        <script src="{!! asset('../plugins/datatables/dataTables.scroller.min.js') !!}"></script>
        <script src="{!! asset('../plugins/datatables/dataTables.colVis.js') !!}"></script>
        <script src="{!! asset('../plugins/datatables/dataTables.fixedColumns.min.js') !!}"></script>


        <!-- Dashboard init -->
        <!-- <script src="{!! asset('assets/pages/jquery.dashboard_2.js') !!}"></script>
        <script src="{!! asset('assets/pages/jquery.dashboard.js') !!}"></script> -->
        <script src="{!! asset('assets/pages/jquery.datatables.init.js') !!}"></script>

        <script src="{!! asset('../plugins/jquery.filer/js/jquery.filer.min.js') !!}"></script>

        <!-- App js -->
        <script src="{!! asset('assets/js/jquery.core.js') !!}"></script>
        <script src="{!! asset('assets/js/jquery.app.js') !!}"></script>
        <script src="{!! asset('assets/pages/jquery.form-pickers.init.js') !!}"></script>

        <script src="{!! asset('assets/pages/jquery.fileuploads.init.js') !!}"></script>
        
        <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
        

        @yield('footer')

        <script>
            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2016',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-success',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });

            $(document).ready(function () {

                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "../plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();
        </script>


    </body>
</html>