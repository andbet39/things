<html>
<head>
    <title>App Name - @yield('title')</title>

    <link href="/admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/lte/dist/css/AdminLTE.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/admin/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="/lte/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    @yield('head')

</head>


<body class="skin-green sidebar-mini">

@section('sidebar')

<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/lte/pages//lte/pages/index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/lte/pages//lte/pages/dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">{{Auth::User()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/lte/pages//lte/pages/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                                <p>
                                    {{Auth::User()->name}}
                                    <small>Member since {{Auth::User()->created_at}}</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">

                                    @if(Auth::check())
                                        <a href="/auth/logout" class="btn btn-default btn-flat">Sign out</a>
                                    @else
                                        <a href="/auth/login" class="btn btn-default btn-flat">Sign in</a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </li>
                    @else
                            <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="/auth/login"><i class="fa fa-sign-in"></i> Login</a>
                        </li>
                        @endif
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/lte/pages//lte/pages/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>-->

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/lte/pages//lte/pages/index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                        <li><a href="/lte/pages//lte/pages/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                    </ul>
                </li>
                @if(Auth::check())
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-money"></i>
                        <span>Movimenti</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/entry"><i class="fa fa-list"></i>Lista</a></li>
                        <li><a href="/entry/create"><i class="fa fa-plus-square-o"></i> Nuovo</a></li>
                    </ul>
                </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-money"></i>
                            <span>Task</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/task"><i class="fa fa-list"></i>Lista</a></li>
                            <li><a href="/task/create"><i class="fa fa-plus-square-o"></i> Nuovo</a></li>
                            <li><a href="/angular/task"><i class="fa fa-plus-square-o"></i> AngularApp</a></li>
                        </ul>
                    </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder-o"></i>
                        <span>Categorie</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/category"><i class="fa fa-list"></i>Lista</a></li>
                        <li><a href="/category/create"><i class="fa fa-plus-square-o"></i> Nuovo</a></li>
                    </ul>
                </li>
                @endif
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Layout Options</span>
                        <span class="label label-primary pull-right">4</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/lte/pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                        <li><a href="/lte/pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                        <li><a href="/lte/pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                        <li><a href="/lte/pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Layout Options</span>
                        <span class="label label-primary pull-right">4</span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/lte/pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                        <li><a href="/lte/pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                        <li><a href="/lte/pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                        <li><a href="/lte/pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/lte/pages/widgets.html">
                        <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Charts</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/lte/pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                        <li><a href="/lte/pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                        <li><a href="/lte/pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                        <li><a href="/lte/pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i>
                        <span>UI Elements</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/lte/pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                        <li><a href="/lte/pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                        <li><a href="/lte/pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                        <li><a href="/lte/pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                        <li><a href="/lte/pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                        <li><a href="/lte/pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Forms</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/lte/pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                        <li><a href="/lte/pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                        <li><a href="/lte/pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>Tables</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                        <li class="active"><a href="data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                    </ul>
                </li>
                <li>
                    <a href="/lte/pages/calendar.html">
                        <i class="fa fa-calendar"></i> <span>Calendar</span>
                        <small class="label pull-right bg-red">3</small>
                    </a>
                </li>
                <li>
                    <a href="/lte/pages/mailbox/mailbox.html">
                        <i class="fa fa-envelope"></i> <span>Mailbox</span>
                        <small class="label pull-right bg-yellow">12</small>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-folder"></i> <span>Examples</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="/lte/pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                        <li><a href="/lte/pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                        <li><a href="/lte/pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                        <li><a href="/lte/pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                        <li><a href="/lte/pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                        <li><a href="/lte/pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                        <li><a href="/lte/pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Multilevel</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    </ul>
                </li>
                <li><a href="/lte/pages//lte/pages/documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                <li class="header">LABELS</li>
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>


@show
    <div class="content-wrapper">

    @yield('content')
</div>


<!-- jQuery -->
<script src="/admin/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>


<!-- AdminLTE App -->
<script src="/lte/dist/js/app.min.js" type="text/javascript"></script>


@yield('footer')



</body>
</html>
