<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
                <a href="homepage">
                    <img src="admin_asset_web/images/logo.png" alt="img"  width="200px">
                </a>
            </div>
            <div class="col-12 col-md-9 align-self-center fh5co_mediya_right">
                @if(Auth::user())
                <div class="text-center d-inline-block">
                    <div class="d-inline-block text-center dd_position_relative ">
                        <ul class="nav navbar-nav pull-right">
                            <ul class="navbar-nav ml-auto">
{{--                                @if(Auth::user())--}}
                                    <li class="nav-item dropdown order-first order-lg-last">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                           aria-haspopup="true" aria-expanded="false">
                                            <h6><i class="fa fa-user"></i></h6>
                                            <span class="d-inline-block d-xl-inline-block">
                                                <h6 class="nav-user-name">Welcome, {{Auth::user()->name}}</h6>
                                            </span>
                                        </a>
                                        <div
                                            class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3">
                                            @if(Auth::check())
                                                @permission('login')
                                                <a class="dropdown-item btn btn-outline-grey btn-h-lighter-secondary btn-a-lighter-secondary"
                                                   href={{route('dashboard')}}>
                                                    <i class="fa fa-tachometer text-success-m1 text-105 mr-1"></i>
                                                    Page Admin
                                                </a>
                                                <div class="dropdown-divider brc-primary-l2"></div>
                                                @endpermission
                                                <a class="dropdown-item btn btn-outline-grey btn-h-lighter-success btn-a-lighter-success"
                                                   href="{{route('user.show')}}">
                                                    <i class="fa fa-cog text-success-m1 text-105 mr-1"></i>
                                                    Settings
                                                </a>
                                                <div class="dropdown-divider brc-primary-l2"></div>
                                                <a class="dropdown-item btn btn-outline-grey btn-h-lighter-secondary btn-a-lighter-secondary"
                                                   href="logout">
                                                    <i class="fa fa-power-off text-warning-d1 text-105 mr-1"></i>
                                                    Logout
                                                </a>

                                            @endif
                                        </div>
                                    </li>
                            </ul>
                        </ul>
                    </div>
                </div>
                <div>
                    <form action="search" method="get" class="navbar-form navbar-left " role="search">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <input type="text" name="keyword"
                                   class="form-control fa fa-search" placeholder="Search">
                        </div>
                    </form>
                </div>
{{--                <div class="clearfix"></div>--}}
{{--                </div>--}}
                 @else
                        <div class="d-inline-block text-center dd_position_relative ">
                            <ul class="nav navbar-nav pull-right">
                                <ul class="navbar-nav ml-auto">
                                    {{--                                @if(Auth::user())--}}
                                    {{--                                @else--}}
                                    <li class="nav-item dropdown order-first order-lg-last">
                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                           aria-haspopup="true" aria-expanded="false">
                                            <h6><i class="fa fa-user"></i></h6>
                                            <span class="d-inline-block d-xl-inline-block">
                                                <h6 class="nav-user-name">Welcome</h6>
                                            </span>
                                        </a>
                                        <div
                                            class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3">
                                            <a href="registration"
                                               class="dropdown-item btn btn-outline-grey btn-h-lighter-success btn-a-lighter-success">
                                                <i class="fa fa-registered" aria-hidden="true"></i>
                                                Registration
                                            </a>
                                            <div class="dropdown-divider brc-primary-l2"></div>
                                            <a href="login"
                                               class="dropdown-item btn btn-outline-grey btn-h-lighter-secondary btn-a-lighter-secondary">
                                                <i class="fa fa-sign-in" aria-hidden="true"></i>
                                                Login
                                            </a>
{{--                                            @endif--}}
                                        </div>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                        <div>
                            <form action="search" method="get" class="navbar-form navbar-left " role="search">
                                <div class="form-group">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <input type="text" name="keyword"
                                           class="form-control fa fa-search" placeholder="Search">
                                </div>
                            </form>
                        </div>

                    {{--                <div class="clearfix"></div>--}}
                    {{--                </div>--}}
                 @endif
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src="admin_asset_web/images/logo.png" alt="img"
                                                  class="mobile_logo_width"/></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">


                    <li class="nav-item active">
                        <a class="nav-link" href="homepage">Trang Chủ <span class="sr-only">(current)</span></a>
                    </li>
                    @foreach($category as $c)
                        @if(count($c->categoryTypeOfNews)>0)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton2"
                                   data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    {{$c->name}}
                                    <span class="sr-only">(current)</span></a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                                    @foreach($c->categoryTypeOfNews as $t)
                                        <a class="dropdown-item" href="typeOfNews/{{$t->name_url}}">{{$t->name}}</a>
                                    @endforeach
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</div>
</div>
