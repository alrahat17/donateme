<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{asset('donate_back/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('donate_back/vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('donate_back/vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('donate_back/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('donate_back/vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('donate_back/vendors/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.32.2/sweetalert2.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

      @include('sweet::alert')
    


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    


    <link rel="stylesheet" href="{{asset('donate_back/assets/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="/admins"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">UI elements</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Settings</a>
                        <ul class="sub-menu children dropdown-menu">
                      
                           
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{URL::to('/general_settings/')}}">General Settings</a></li>
                     
                            <li><i class="fa fa-id-badge"></i><a href="{{URL::to('/payment_settings/')}}">Payment Settings</a></li>
                            <li><i class="fa fa-bars"></i><a href="{{URL::to('/media_settings/')}}"> Media Settings</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{URL::to('/categories')}}" > <i class="menu-icon fa fa-table"></i> Categories</a>
                    </li>
                    <li>
                        <a href="/pages"> <i class="menu-icon fa fa-th"></i>Pages</a>
                    </li>

                    
                    
                    <li>
                        <a href="{{URL::to('/all_user')}}"> <i class="menu-icon ti-user"></i> Users </a>
                    </li>
                    <li>
                        <a href="{{URL::to('/blogs')}}" ><i class="menu-icon fa fa-keyboard-o"></i> Blogs</a>
                    </li>

                    <li>
                        <a href="{{URL::to('/galleries')}}"> <i class="menu-icon fa fa-picture-o"></i>Gallery</a>
                       
                    </li>
                    
                    <li>
                        <a href="{{URL::to('/campaigns')}}"></i> Campaigns</a>
                    </li>

                     <li>
                        <a href="{{URL::to('/donations')}}"></i> Donations</a>
                    </li>

                     <li>
                        <a href="{{URL::to('/withdrawals')}}"></i> Withdrawals</a>
                    </li>
                    <li>
                        <a href="{{URL::to('/testimonials')}}"></i> Testimonials</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{URL::to(Auth::user()->photo)}}">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Admin Panel</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @yield('admin_content')

        
    
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
     <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
   

    <script src="{{asset('donate_back/vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('donate_back/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('donate_back/assets/js/main.js')}}"></script>
    <script src="{{asset('donate_back/vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('donate_back/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('donate_back/assets/js/widgets.js')}}"></script>
    <script src="{{asset('donate_back/vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('donate_back/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{asset('donate_back/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   
   
    
</body>

</html>
