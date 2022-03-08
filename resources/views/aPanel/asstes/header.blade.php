<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin_asset/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('admin_asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin_asset\plugins\select2\css\select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('admin_asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-compress"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../index/index.php" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../index.php" target="_blank" role="button" data-toggle="tooltip" data-placement="left" title="view page">
                        <i class="far fa-paper-plane text-info"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li>
                    <form method="Post" action="{{route('admin.logOut')}}">
                        @csrf
                        <button class="btn btn-danger">Log out</button>
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a class="brand-link" style="color: #FFF !important;">
                <img src="{{asset('assets\img\logo\company_1.svg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin Panel</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('admin_asset/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="" class="d-block">User</a>
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

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-chart-bar"></i>
                                <p>
                                    Skills
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.skills.add')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Skill</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.skills')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Skills List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.skills.categories')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Skills Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- about section -->
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    About
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.about')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Edit Details</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- number section -->
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Numbers
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.number')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>view Numbers</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- History section -->
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-user-graduate"></i>
                                <p>
                                    History
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.histories')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Histories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.histories.add')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Histories</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.history.categories')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Histories Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- services section -->
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-hands-helping"></i>
                                <p>
                                    Services
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.services')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Details</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.services.add')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Edit/Add Details</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Portfolios section -->
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fab fa-product-hunt"></i>
                                <p>
                                    Portfolios
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.portfolios')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Details</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.portfolio.add')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Details</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.portfolio.categories')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Portfolio Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- cleints section -->
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fab fa-product-hunt"></i>
                                <p>
                                    Cleints
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.clients')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Details</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.client.add')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Details</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- Companies section -->

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Companies
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.companies')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>view Companies</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-globe nav-icon"></i>
                                <p>
                                    Fllow Me
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.fllows')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>view FllowMe</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="fas fa-phone-square-alt nav-icon"></i>
                                <p>
                                    Contact Me
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.contacts')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>view Contact Me</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <section class="content-wrapper">
