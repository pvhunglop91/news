@extends('Admin.layouts.index')

@section('menu')

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href={{route('dashboard')}} class="nav-link">
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
                <a class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                        Type Of News
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href={{route('type_of_news.list') }} class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>
                    @permission('type-of-news-create')
                    <li class="nav-item">
                        <a href={{route('type_of_news.create')}} class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add</p>
                        </a>
                    </li>
                    @endpermission
                </ul>
            </li>
            @endpermission
            @permission('news-list')
            <li class="nav-item menu-open">
                <a class="nav-link active">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        News
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('news.list')}}" class="nav-link active">
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
                <a class="nav-link ">
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
                        <a href="{{route('user.create')}}"  class='nav-link'>
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
                <a class="nav-link">
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
                <a class="nav-link ">
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

@endsection

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> News <small class="page-info text-secondary-d2">
                            <i class="fa fa-angle-double-right text-80"></i>
                            {{$news->title}}
                        </small></h1>
                </div>

            </div>
        </div>
    </section>

    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3>Edit News</h3>
            </div>
            <form action="{{ route('news.update' ,['id'=> $news->id]) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="card-body">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control form-control" name="category" id="Category">
                            @foreach($category as $tl)
                                <option
                                    @if($news->newsTypeOfNews->typeOfNewsCategory->id==$tl->id)
                                        {{"selected"}}
                                    @endif

                                    value="{{$tl->id}}">{{$tl->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type of news</label>
                        <select class="form-control form-control" name="typeOfNews" id="TypeOfNews">
                        </select>
                        @if($errors->has('typeOfNews'))
                            <div class="error text-danger">{{ $errors->first('typeOfNews') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{$news->title}}"
                               placeholder="Enter title ">
                        @if($errors->has('title'))
                            <div class="error text-danger">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Summary</label>
                        <input type="text" class="form-control" name="summary" placeholder="Enter summary " value="{!!$news->summary!!}">
                    @if($errors->has('summary'))
                            <div class="error text-danger">{{ $errors->first('summary') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="summernote1" name="content">{!!$news->content!!} </textarea>
                        @if($errors->has('content'))
                            <div class="error text-danger">{{ $errors->first('content') }}</div>
                        @endif
                    </div>
                    {{-- <div class="form-group">
                        <label>Summary</label>
                        <textarea id="summernote1" name="summary">
                    {!!$news->summary!!}
                   </textarea>
                        @if($errors->has('summary'))
                            <div class="error text-danger">{{ $errors->first('summary') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="editor" name="content">
                    {!!$news->content!!}
                   </textarea>
                        @if($errors->has('content'))
                            <div class="error text-danger">{{ $errors->first('content') }}</div>
                        @endif
                    </div> --}}
                    <div class="form-group">
                        <label>Image : </label>
                        <input name="image" type="file" value="{{$news->image}}"/>
                        <p><img width="200px" src="{{'storage/images/'.$news->image}}"/></p>
                        @if($errors->has('image'))
                            <div class="error text-danger">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label>Image</label>--}}
{{--                        <div class="input-group">--}}
{{--                            <input id="ckfinder-input-1" class="form-control" value="{{$news->image}}" name="image"--}}
{{--                                   type="text"--}}
{{--                                   placeholder="Image" style="width:60%">--}}
{{--                            <div class="input-group-append">--}}
{{--                                <button type="button" id="ckfinder-popup-1" class="btn btn-success">Browse Server--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <img width="200px" src="{{$news->image}}"/></p>--}}
{{--                        @if($errors->has('image'))--}}
{{--                            <div class="error text-danger">{{ $errors->first('image') }}</div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
                    <!-- {{asset($news->image)}} asset = laravel.loca -->

                    <div class="form-group" style="margin-top: 3px;">
                        <label>Hightlight</label>
                        <div class="ml-3">
                            <label class="radio-inline mr-3">
                                <input name="highlight" value="{{config('constants.highlight.no')}}"
                                       @if($news ->highlight == config('constants.highlight.no'))
                                           {{"checked"}}
                                       @endif
                                       type="radio" class="mr-1">No
                            </label>
                            <label class="radio-inline">
                                <input name="highlight" value="{{config('constants.highlight.yes')}}"
                                       @if($news ->highlight == config('constants.highlight.yes'))
                                           {{"checked"}}
                                       @endif
                                       type="radio" class="mr-1">Yes
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Comment <small class="page-info text-secondary-d2">
                            <i class="fa fa-angle-double-right text-80"></i>
                            List
                        </small></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User</th>
                                    <th>Content</th>
                                    <th>Date</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($news->newsComment as $c)
                                    <tr>
                                        <td>
                                            <span class="text-105">{{$c->id}}</span>
                                        </td>
                                        <td class="text-grey">
                                            {{$c->commentUser->name}}
                                        </td>
                                        <td class="text-grey">
                                            {{$c->content}}
                                        </td>
                                        </td>
                                        <td class="text-grey">
                                            {{$c->created_at}}
                                        </td>
                                        <td>
                                            <a href=" {{ route('comment.delete' ,['id'=> $c->id,'id_news'=>$news->id ]) }}"
                                               onclick="return confirm('Are you sure ?');"><i
                                                    class="fas fa-trash-alt text-danger-m1"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(function (){
            // var  editor = CKEDITOR.replace('editor');
            // CKFinder.setupCKEditor(editor);
            TypeOfNewsCategory.getTypeOfNews();

            $('#Category').on('change', function (){
                TypeOfNewsCategory.getTypeOfNews();
            })
        });

        const TypeOfNewsCategory = (function () {
            let modules = {};

            modules.getTypeOfNews = function () {
                let idCategory = $('#Category').val();

                $.ajax({
                    url: getRoute(idCategory),
                    method: 'GET',
                    success: function (response) {
                        appendTypeOfNewsCategory(response.data);
                    },
                    error: function (response) {
                        console.log(response);
                    },
                });
            }

            function getRoute(idCategory){
                return `/admin/category/${idCategory}/type_of_news`;
            }

            function appendTypeOfNewsCategory(data) {
                if (data.length) {
                    let html = "";
                    $.each(data, function (key, typeOfNew) {
                            html += `<option value="${typeOfNew.id}">${typeOfNew.name}</option>`;
                        }
                    )
                    $('#TypeOfNews').html(html);
                }
            }
            return modules;
        })();
    </script>
@endsection 
@section('script')
{{--    <script type="text/javascript">--}}
{{--        $(function (){--}}
{{--            var  editor = CKEDITOR.replace('editor');--}}
{{--            CKFinder.setupCKEditor(editor);--}}
{{--            TypeOfNewsCategory.getTypeOfNews();--}}

{{--            $('#Category').on('change', function (){--}}
{{--                TypeOfNewsCategory.getTypeOfNews();--}}
{{--            })--}}
{{--        });--}}

{{--        const TypeOfNewsCategory = (function () {--}}
{{--            let modules = {};--}}

{{--            modules.getTypeOfNews = function () {--}}
{{--                let idCategory = $('#Category').val();--}}

{{--                $.ajax({--}}
{{--                    url: getRoute(idCategory),--}}
{{--                    method: 'GET',--}}
{{--                    success: function (response) {--}}
{{--                        appendTypeOfNewsCategory(response.data);--}}
{{--                    },--}}
{{--                    error: function (response) {--}}
{{--                        console.log(response);--}}
{{--                    },--}}
{{--                });--}}
{{--            }--}}

{{--            function getRoute(idCategory){--}}
{{--                return `/admin/category/${idCategory}/type_of_news`;--}}
{{--            }--}}

{{--            function appendTypeOfNewsCategory(data) {--}}
{{--                if (data.length) {--}}
{{--                    let html = "";--}}
{{--                    $.each(data, function (key, typeOfNew) {--}}
{{--                            html += `<option value="${typeOfNew.id}">${typeOfNew.name}</option>`;--}}
{{--                        }--}}
{{--                    )--}}
{{--                    $('#TypeOfNews').html(html);--}}
{{--                }--}}
{{--            }--}}
{{--            return modules;--}}
{{--        })();--}}
{{--    </script>--}}
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function () {--}}
{{--            var button1 = document.getElementById('ckfinder-popup-1');--}}
{{--            button1.onclick = function () {--}}
{{--                selectFileWithCKFinder('ckfinder-input-1');--}}
{{--            };--}}

{{--            function selectFileWithCKFinder(elementId) {--}}
{{--                CKFinder.popup({--}}
{{--                    chooseFiles: true,--}}
{{--                    width: 800,--}}
{{--                    height: 600,--}}
{{--                    onInit: function (finder) {--}}
{{--                        finder.on('files:choose', function (evt) {--}}
{{--                            var file = evt.data.files.first();--}}
{{--                            var output = document.getElementById(elementId);--}}
{{--                            var fullurl = new URL(file.getUrl());--}}
{{--                            output.value = fullurl.pathname;--}}
{{--                            console.log(output.value);--}}
{{--                        });--}}
{{--                        finder.on('file:choose:resizedImage', function (evt) {--}}
{{--                            var output = document.getElementById(elementId);--}}
{{--                            output.value = evt.data.resizedUrl;--}}
{{--                        });--}}
{{--                    }--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}

@endsection
