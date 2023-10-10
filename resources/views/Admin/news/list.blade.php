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
                        <a href={{route('news.list')}} class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>List</p>
                        </a>
                    </li>
                    @permission('news-create')
                    <li class="nav-item">
                        <a href={{route('news.create')}} class="nav-link">
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
                        <a href={{route('user.create')}}   class='nav-link '>
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
                    <h1>News <small class="page-info text-secondary-d2">
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
                            <table id="yajra-datatable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Summary</th>
                                    <th>Category</th>
                                    <th>Type of news</th>
                                    <th>View</th>
                                    <th>Highlight</th>
                                    <th>Action</th>
                                   {{-- <th>Edit</th>
                                   <th>Delete</th> --}}
                                </tr>
                                </thead>
                                {{-- <tbody>

                               @foreach($news as $n)
                                   <tr>
                                       <td>
                                           <span class="text-105">{{$n->id}}</span>
                                       </td>
                                       <td class="text-grey">
                                           <p> {{$n->title}}</p>
                                           <img width="100px" src="{{asset('storage/images/'.$n->image)}}"/>
                                       </td>
                                       <td class="text-grey">
                                           {!!$n->summary!!}
                                       </td>
                                       <td class="text-grey">
                                           {{$n->newsTypeOfNews->typeOfNewsCategory->name}}

                                       </td>
                                       <td class="text-grey">
                                           {{$n->newsTypeOfNews->name}}
                                       </td>
                                       <td class="text-grey">
                                           {{$n->view}}
                                       </td>
                                       <td class="text-grey">
                                           @if($n->highlight == 0)
                                               {{'No'}}
                                           @else
                                               {{'Yes'}}
                                           @endif
                                       </td>
                                       <td>
                                           <a href="{{ route('news.edit',['id'=> $n->id ]) }}"><i
                                                   class="fa fa-edit text-blue-m1 text-120"></i></a>
                                       </td>
                                       <td>
                                           <a href="{{ route('news.delete',['id'=> $n->id ]) }}"
                                              onclick="return confirm('Are you sure ?');"><i
                                                   class="fas fa-trash-alt text-danger-m1" style="color:red"></i></a>
                                       </td>
                                   </tr>
                               @endforeach
                                </tbody> --}}
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
    <!-- Modal -->
    <div class="modal" method="POST" id="myModalDelete" tabindex="-1" role="dialog">
        @csrf
        @method('post')
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger js-btn-delete" >Delete</button>
                    <button type="button" class="btn btn-secondary" id="xx" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
