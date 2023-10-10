<ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
            <form class="form-inline">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
        </a>
    </li>
    <li class="nav-item dropdown order-first order-lg-last">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false">
            <i class="nav-icon fas fa-user"></i>
            <span class="d-inline-block d-lg-none d-xl-inline-block">
                 <span class="nav-user-name">Welcome, {{Auth::user()->name}}</span>
             </span>
            <i class="caret fa fa-angle-left d-block d-lg-none"></i>
        </a>
        <div class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3">
            @if(Auth::check())
                <a class="dropdown-item btn btn-outline-grey btn-h-lighter-success btn-a-lighter-success"  href="homepage" data-target="#id-ace-settings-modal">
                    <i class="fa fa-home text-success-m1 text-105 mr-1"></i>
                    Homepage
                </a>
                <a class="dropdown-item btn btn-outline-grey btn-h-lighter-success btn-a-lighter-success"  href="{{route('user.edit.myself', ['id'=> Auth::user()->id])}}" data-target="#id-ace-settings-modal">
                    <i class="fa fa-cog text-success-m1 text-105 mr-1"></i>
                    Edit Account
                </a>
                <a class="dropdown-item btn btn-outline-grey btn-h-lighter-secondary btn-a-lighter-secondary" href={{route("signOut")}}>
                    <i class="fa fa-power-off text-warning-d1 text-105 mr-1"></i> Logout
                </a>
                <div class="dropdown-divider brc-primary-l2"></div>
            @endif
        </div>
    </li><!-- /.nav-item:last -->

</ul>
