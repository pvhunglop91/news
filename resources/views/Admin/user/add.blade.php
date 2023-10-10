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
            <li class="nav-item">
                <a class="nav-link ">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        News
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href={{route('news.list')}} class="nav-link ">
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
            <li class="nav-item menu-open">
                <a class="nav-link active">
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
                        <a href={{route('user.create')}}   class='nav-link active'>
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
                    <h1>User <small class="page-info text-secondary-d2">
                            <i class="fa fa-angle-double-right text-80"></i>
                            Add
                        </small></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container">
        <div class="card card-primary">
            <div class="card-header">
                <h3>Add User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('user.store')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label> Name</label><span class="text-danger"> *</span>
                        <input class="form-control" name="name" placeholder="Enter name"/>
                        @if($errors->has('name'))
                            <div class="error text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label> Email</label><span class="text-danger"> *</span>
                        <input type="email" class="form-control" name="email" placeholder="Enter email"/>
                        @if($errors->has('email'))
                            <div class="error text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label><span class="text-danger"> *</span>
                        <input class="form-control" type="password" name="password" placeholder="Enter password"/>
                        @if($errors->has('password'))
                            <div class="error text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label> Password again</label><span class="text-danger"> *</span>
                        <input class="form-control" type="password" name="passwordAgain"
                               placeholder="Enter password again"/>
                        @if($errors->has('passwordAgain'))
                            <div class="error text-danger">{{ $errors->first('passwordAgain') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Position</label>
                        <div class="ml-3">
                            <label class="radio-inline mr-3">
                                <input name="position" value="0" checked="" type="radio" class="mr-1">User
                            </label>
                            <label class="radio-inline">
                                <input name="position" value="1" type="radio" class="mr-1">Admin
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Roles</label>
                        <div class="row">
                            @foreach($role as $r)
                                <div class="form-group form-check ml-3">
                                    <input type="checkbox" class="form-check-input " value="{{ $r->id }}"
                                           name="role_id[]" id="{{ $r->name }}">
                                    <label for="{{ $r->name }}" class="form-check-label mr-2 ">{{ $r->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer ">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
    </div>

@endsection
