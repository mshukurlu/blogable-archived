<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blogable</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset("/blogable/backend/css/bootstrap.min.css")}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("/blogable/backend/css/font-awesome.min.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset("/blogable/backend/css/ionicons.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("/blogable/backend/css/AdminLTE.min.css")}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset("/blogable/backend/css/skins/_all-skins.min.css")}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS sidebar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-blue  sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Blogable</b> Admin</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a onclick="document.getElementById('logout').submit();" class="btn btn-default btn-flat">Sign out</a>

                                    <form style="display: none" id="logout" action="{{route("backend.auth.logout")}}" method="POST">

                                        {{csrf_field()}}
                                        <button class="btn btn-default deleteItem" type="submit"></button>
                                    </form>

                                </div>
                            </li>


                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel" style="height: 41px">
                <div class="pull-left image">

                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>

                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{route('backend.dashboard.index')}}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>

                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Pages</span>
                        <span class="pull-right-container">
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('backend.posts.create')}}"><i class="fa fa-circle-o"></i> Add new</a></li>
                        <li><a href="{{route('backend.posts.index')}}"><i class="fa fa-circle-o"></i> See All</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i>
                        <span>Categories</span>

                    </a>
                    <ul class="treeview-menu" >
                        <li><a href="{{route('backend.category.create')}}"><i class="fa fa-circle-o"></i> Add New</a></li>
                        <li><a href="{{route('backend.category.index')}}"><i class="fa fa-circle-o"></i> See All</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i>
                        <span>Menus</span>
                        <span class="pull-right-container">

            </span>
                    </a>
                    <ul class="treeview-menu" >
                        <li><a href="{{route('backend.menus.index')}}"><i class="fa fa-circle-o"></i> See All</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i>
                        <span>Options</span>
                        <span class="pull-right-container">

            </span>
                    </a>
                    <ul class="treeview-menu" >
                        <li><a href="{{route('backend.options.index')}}"><i class="fa fa-circle-o"></i> See All</a></li>
                    </ul>
                </li>

                <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>


    <div class="content-wrapper">
    @yield('content')

    </div>


    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b>0.1
        </div>
        <strong>Copyright &copy; 2019 <a href="https://adminlte.io">Blogable</a>.</strong> All rights
        reserved.
    </footer>


    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset("/blogable/backend/js/lib/jquery.min.js")}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset("/blogable/backend/js/lib/bootstrap.min.js")}}"></script>
<!-- SlimScroll -->
<script src="{{asset("/blogable/backend/js/lib/jquery.slimscroll.min.js")}}"></script>
<!-- FastClick -->
<script src="{{asset("/blogable/backend/js/lib/fastclick.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("/blogable/backend/js/adminlte.min.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset("/blogable/backend/js/demo.js")}}"></script>

@yield('scripts')
</body>
</html>
