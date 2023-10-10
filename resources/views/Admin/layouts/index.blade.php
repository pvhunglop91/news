<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
{{--    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">--}}
{{--    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="admin_asset_web/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="admin_asset_web/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="admin_asset_web/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin_asset_web/dist/css/adminlte.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="admin_asset_web/plugins/summernote/summernote-bs4.min.css">
    <!-- toastr -->
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">--}}
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
{{--    <link rel="stylesheet" href="codemirror/codemirror-5.65.3/lib/codemirror.css">--}}

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
            @yield('menu')
        </div>
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        @yield('content')
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
{{--    <script src="js/ckfinder/ckfinder.js"></script>--}}
{{--    <script src="admin_asset_web/ckeditor/ckeditor.js"></script>--}}
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
    <!-- AdminLTE App -->
    <script src="admin_asset_web/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="admin_asset_web/dist/js/demo.js"></script>
    <!-- Summernote -->
    <script src="admin_asset_web/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- Page specific script -->
    <!-- bs-custom-file-input -->
    <script src="admin_asset_web/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
{{--    <script src="codemirror/codemirror-5.65.3/lib/codemirror.js"></script>--}}
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "order": [0,"desc"],
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });

        $(function () {
            var table = $('#yajra-datatable').DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                order: [0,'desc'],
                processing: true,
                serverSide: true,
                ajax: "{{ route('news.list') }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function (data){
                            return `<img width="100px" src="storage/images/${data}">`
                        }
                    },
                    {
                        data: 'summary',
                        name: 'summary',
                    },
                    {
                        data: 'typeOfNews',
                        name: 'typeOfNews',
                        render: function (data){
                            return data.category.name;
                        }
                    },
                    {
                        data: 'typeOfNews',
                        name: 'typeOfNews',
                        render: function (data){
                            return data.name;
                        }
                    },
                    {
                        data: 'view',
                        name: 'view'
                    },
                    {
                        data: 'highlight',
                        name: 'highlight',
                        render: function (data){
                            return data;
                        }
                    },
                    {
                        data: function (row){
                            let editUrl = '{{\Illuminate\Support\Facades\URL::to('/')}}/admin/news/edit/';
                            let deleteUrl = '{{\Illuminate\Support\Facades\URL::to('/')}}/admin/news/delete/';
                            return `
                                <a href="${editUrl}${row.id}">
                                    <i class="fa fa-edit text-blue-m1 text-120"></i>
                                </a>
                                <i class="fas fa-trash-alt text-danger-m1 delete" style="color:red" data-toggle="modal" data-id="${row.id}" data-route="${deleteUrl}${row.id}"></i>
                            `;
                        },
                        orderable: true,
                        searchable: true
                    },
                ]
            });

            $(document).on('click', '.delete', function (e) {
                e.preventDefault();
                $("#myModalDelete").modal('show');
                let url = $(this).attr('data-route');
                $(document).on('click', '.js-btn-delete', function (event) {
                    event.preventDefault();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        method: 'POST',
                        data: {
                            '_method': 'DELETE'
                        }
                    })
                        .done(function() {
                            $("#myModalDelete").modal('hide');
                            toastr.options =
                                {
                                    "positionClass": 'toast-top-center',
                                    "closeButton" : true,
                                    "progressBar" : true
                                }
                            toastr.success("Delete news success !");
                            location.reload();
                        })
                });
            })
        });
    //summernote
        $(function () {
            $('#summernote').summernote()
        })
        $(function () {
            $('#summernote1').summernote()
        })
        $(function () {
            bsCustomFileInput.init();
        });
    </script>
{{--    <script src=admin_asset_web\ckeditor\ckeditor.js></script>--}}
    <script>
        {{--CKEDITOR.replace('editor', {--}}
        {{--    filebrowserBrowseUrl: "{{ route('ckfinder_browser') }}",--}}
        {{--    filebrowserImageBrowseUrl: "{{ route('ckfinder_browser') }}?type=Images&token=123",--}}
        {{--    filebrowserFlashBrowseUrl: "{{ route('ckfinder_browser') }}?type=Flash&token=123",--}}
        {{--    filebrowserUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files",--}}
        {{--    filebrowserImageUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images",--}}
        {{--    filebrowserFlashUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Flash",--}}
        {{--};--}}
        {{--CKEDITOR.replace( 'editor2', {--}}
        {{--    filebrowserBrowseUrl: "{{ route('ckfinder_browser') }}",--}}
        {{--    filebrowserUploadUrl: "{{ route('ckfinder_connector') }}?command=QuickUpload&type=Files",--}}
        {{--};--}}
    </script>
{{--    @include('ckfinder::setup')--}}
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function () {--}}
{{--            var button1 = document.getElementById('ckfinder-popup-1');--}}

{{--            button1.onclick = function () {--}}
{{--                selectFileWithCKFinder('ckfinder-input-1');--}}
{{--            };--}}
{{--            function selectFileWithCKFinder( elementId ) {--}}
{{--                CKFinder.popup( {--}}
{{--                    chooseFiles: true,--}}
{{--                    width: 800,--}}
{{--                    height: 600,--}}
{{--                    onInit: function( finder ) {--}}
{{--                        finder.on( 'files:choose', function( evt ) {--}}
{{--                            var file = evt.data.files.first();--}}
{{--                            var output = document.getElementById( elementId );--}}
{{--                            output.value = file.getUrl();--}}
{{--                        } );--}}

{{--                        finder.on( 'file:choose:resizedImage', function( evt ) {--}}
{{--                            var output = document.getElementById( elementId );--}}
{{--                            output.value = evt.data.resizedUrl;--}}
{{--                        } );--}}
{{--                    }--}}
{{--                } );--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
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
</body>
</html>
