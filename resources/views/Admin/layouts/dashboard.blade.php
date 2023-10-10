<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="admin_asset_web/images/logo.png">
    <title>24H News - Admin</title>
    <base href="{{asset('')}}">
    @yield('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin_asset_web/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="admin_asset_web/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="admin_asset_web/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="admin_asset_web/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin_asset_web/dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="admin_asset_web/plugins/summernote/summernote-bs4.min.css">
    <!-- toastr -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('admin_asset_web/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="homepage" class="nav-link">Home</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
        @include('Admin.layouts.header')
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href={{route('dashboard')}} class="brand-link">
                <img src="admin_asset_web/images/logo.png" alt="News Logo" class="brand-image img-circle img-bordered elevation-6 mr-3 bg-white" style="opacity: .8">
                <span class="brand-text font-weight-light"> 24H NEWS </span>
                <div class="text-center brand-text font-weight-light" style="opacity: .6">Read - Everything</div>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/admin_asset_web/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{route('user.edit.myself', ['id'=> Auth::user()->id])}}" class="d-block">{{Auth::user()->name}}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{route('dashboard')}}" class="nav-link active">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @permission('category-list')
                        <li class="nav-item">
                            <a class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Category
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{route('category.list')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                @permission('category-create')
                                <li class="nav-item">
                                    <a href={{route('category.create')}} class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add</p>
                                    </a>
                                </li>
                                @endpermission
                            </ul>
                        </li>
                        @endpermission
                        @permission('type-of-news-list')
                        <li class="nav-item">
                            <a  class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Type Of News
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('type_of_news.list') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                @permission('type-of-news-create')
                                <li class="nav-item">
                                    <a href="{{route('type_of_news.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                @endpermission
                            </ul>
                        </li>
                        @endpermission
                        @permission('news-list')
                        <li class="nav-item">
                            <a  class="nav-link ">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>
                                    News
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('news.list')}}" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>List</p>
                                    </a>
                                </li>
                                @permission('news-create')
                                <li class="nav-item">
                                    <a href="{{route('news.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                @endpermission
                            </ul>
                        </li>
                        @endpermission

                        @permission('user-list')
                        <li class="nav-item">
                            <a  class="nav-link ">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    User
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{route('user.list')}}  class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                @permission('user-create')
                                <li class="nav-item ">
                                    <a href="{{route('user.create')}} "  class='nav-link '>
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add</p>
                                    </a>
                                </li>
                                @endpermission
                            </ul>
                        </li>
                        @endpermission
                        @permission('role-list')
                        <li class="nav-item">
                            <a  class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Role
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{route('role.list')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                @permission('role-create')
                                <li class="nav-item">
                                    <a href={{route('role.create')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                @endpermission
                            </ul>
                        </li>
                        @endpermission
                        @permission('video-news-list')
                        <li class="nav-item">
                            <a  class="nav-link ">
                                <i class="nav-icon fas fa-video"></i>
                                <p>
                                    Video News
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href={{route('video-news.list')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List</p>
                                    </a>
                                </li>
                                @permission('video-news-create')
                                <li class="nav-item">
                                    <a href={{route('video-news.create')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                @endpermission
                            </ul>
                        </li>
                        @endpermission
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    <!-- Content Wrapper. Contains page content -->
    <div>

    </div>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="ml-2">Dashboard</h1>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Content Header (Page header) -->
                <!-- Main content -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> {{session('success')}}!</h5>

                        </div>
                    @endif
                <div class="row">
                    <div class="col-lg-2 col-4">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner" data-count="{{$userCount}}">
                                <h3 >{{$userCount}}</h3>
                                <p>User</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href={{route('user.list')}} class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-4">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner" data-count="{{$categoryCount}}">
                                <h3>{{$categoryCount}}</h3>

                                <p>Category</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href={{route('category.list')}} class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-4">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner" data-count="{{$typeOfNewsCount}}">
                                <h3>{{$typeOfNewsCount}}</h3>
                                <p>Type Of News</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href={{route('type_of_news.list')}} class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-4">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner" data-count="{{$newsCount}}">
                                <h3>{{$newsCount}}</h3>
                                <p>News</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href={{route('news.list')}} class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-4">
                        <!-- small box -->
                        <div class="small-box bg-navy">
                            <div class="inner" data-count="{{$commentCount}}">
                                <h3>{{$commentCount}}</h3>
                                <p>Comment</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-2 col-4">
                        <!-- small box -->
                        <div class="small-box bg-purple">
                            <div class="inner" data-count="{{$videoNewsCount}}">
                                <h3>{{$videoNewsCount}}</h3>

                                <p>Video News</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href={{route('video-news.list')}} class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    {{--                </div>--}}
                </div>
                <div class="row">
                    <div class="ml-5">
                        <form action="{{route('searchNews')}}" method="post" class="navbar-form navbar-left " role="search">
                            <div class="form-group">
                                <label for="start">Tìm kiếm theo tháng:</label>
                                @csrf
                                <input type="month" id="start" name="start" min="2018-03" value={{$dataSearch}}>
                                <button id="submit" style="color: #fff;
                                background-color: #111110;" class="btn"> <span> <i class="fa fa-search"></i></span></button>
                            </div>
                        </form>
                    </div>
                    <section class="col-lg-12">
                        <div class="text-center text-2xl text-bold">
                            <p>Biểu đồ thống kê dữ liệu theo tháng</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Bar Chart</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                            <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 649px;" width="649" height="250" class="chartjs-render-monitor"></canvas>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Donut Chart</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- /.content-wrapper -->
                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->

                </aside>
                <!-- /.control-sidebar -->
            </div>
        </section>
    </div>
    <script src="js/ckfinder/ckfinder.js"></script>
    <script src="admin_asset_web/ckeditor/ckeditor.js"></script>
    <script src="admin_asset_web/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin_asset_web/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="admin_asset_web/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="admin_asset_web/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="admin_asset_web/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="admin_asset_web/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="admin_asset_web/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="admin_asset_web/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="admin_asset_web/plugins/jszip/jszip.min.js"></script>
    <script src="admin_asset_web/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="admin_asset_web/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="admin_asset_web/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="admin_asset_web/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="admin_asset_web/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="admin_asset_web/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="admin_asset_web/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="admin_asset_web/dist/js/demo.js"></script>
    <!-- Summernote -->
    <script src="admin_asset_web/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Page specific script -->
    <!-- bs-custom-file-input -->
    <script src="admin_asset_web/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <script>
        @if(Session::has('message'))
            toastr.options =
            {
                "positionClass": 'toast-top-center',
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @endif
        @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif
        @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.info("{{ session('info') }}");
        @endif
        @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
        @yield('script')
<script>

    $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //-------------
        //- BAR CHART -
        //-------------

        let data = @json($data);
        const barChartCanvas = document.getElementById('barChart').getContext('2d');
        const myChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: {
                labels: ['User', 'Category', 'Type Of News', 'News', 'Comment', 'Video News'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [data.user, data.category, data.type, data.new, data.comment, data.video],
                    fill: false,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    indexAxis: 'y'
                }
            }
        });
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: ['User', 'Category', 'Type Of News', 'News', 'Comment', 'Video News'],
            datasets: [
                {
                    data: [data.user, data.category, data.type, data.new, data.comment, data.video],
                    backgroundColor: ['#33a2b8', '#4fa845', '#fec135', '#dd4145', '#001f3f', '#7253c1'],
                }
            ]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

    });
</script>
</body>
</html>
