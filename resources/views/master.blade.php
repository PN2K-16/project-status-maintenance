<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-focus">
<!--<![endif]-->

<head>
    <meta charset="utf-8">

    <title> HNBIT PROJECTS </title>

    <meta name="description" content="HNBIT POJECTS">
    <meta name="author" content="Nilesh Jayanandana">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <!--  <link rel="shortcut icon" href="assets/img/favicons/favicon.png"> 

        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-160x160.png" sizes="160x160">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-192x192.png" sizes="192x192">  

        <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png"> -->
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Web fonts -->
    
    
    @yield('css')
    
    
    
    <link rel="stylesheet" href="{{ URL::asset('assets/css.css') }}">

    <!-- Page JS Plugins CSS go here -->

    <!-- OneUI CSS framework -->
    <link href="{{ URL::asset('assets/css/oneui.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<style>
    
    .hiddenRow {
    padding: 0 !important;
}
    
    
    </style>


    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body onload="init()">
    <!-- Page Container -->
    <!--
            Available Classes:

            'sidebar-l'                  Left Sidebar and right Side Overlay
            'sidebar-r'                  Right Sidebar and left Side Overlay
            'sidebar-mini'               Mini hoverable Sidebar (> 991px)
            'sidebar-o'                  Visible Sidebar by default (> 991px)
            'sidebar-o-xs'               Visible Sidebar by default (< 992px)

            'side-overlay-hover'         Hoverable Side Overlay (> 991px)
            'side-overlay-o'             Visible Side Overlay by default (> 991px)

            'side-scroll'                Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (> 991px)

            'header-navbar-fixed'        Enables fixed header
        -->
    <div id="page-container" class="sidebar-l side-scroll header-navbar-inverse header-navbar-fixed "> 
        <!-- Side Overlay-->
        <aside id="side-overlay">
            <!-- Side Overlay Scroll Container -->
            <div id="side-overlay-scroll">
                <!-- Side Header -->
              
      <div class="side-header side-content">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default pull-right" type="button" data-toggle="layout" data-action="side_overlay_close">
                            <i class="fa fa-times"></i>
                        </button>
                        <span class="font-w600 push-10-l">Admin</span>
                    </div>
                    <!-- END Side Header -->

                    <!-- Side Content -->
                    <div class="side-content remove-padding-t">
                        <!-- Block -->
                        <div class="block pull-r-l">
                            <div class="block-header bg-gray-lighter">
                                <ul class="block-options">
                                    <li>
                                        <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                    </li>
                                    <li>
                                        <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                    </li>
                                </ul>
                                <h3 class="block-title">Block</h3>
                            </div>
                            <div class="block-content">
                                <p>...</p>
                            </div>
                        </div>
                        <!-- END Block -->
                    </div>
 
                <!-- END Side Content -->
            </div>
            <!-- END Side Overlay Scroll Container -->
        </aside>
        <!-- END Side Overlay -->

        <!-- Sidebar -->
        <nav id="sidebar">

            <div id="sidebar-scroll ">
                <!-- Sidebar Content -->
                <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                <div class="sidebar-content">
                    <!-- Side Header -->
                    <div class="side-header side-content bg-white-op">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times"></i>
                        </button>
                        <!-- Themes functionality initialized in App() -> uiHandleTheme()  
                            <div class="btn-group pull-right" hidden="true" >
                                <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button" >
                                    <i class="si si-drop"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide" hidden="true">
                                    <li>
                                        <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-default pull-right"></i> <span class="font-w600">Default</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-amethyst pull-right"></i> <span class="font-w600">Amethyst</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/city.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/flat.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/modern.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-modern pull-right"></i> <span class="font-w600">Modern</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-smooth pull-right"></i> <span class="font-w600">Smooth</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                        <a class="h5 text-white" href="start_backend.html">
                            <span class="h4 font-w600 sidebar-mini-hide">  Sales Force                               
                             
</span>
                        </a>
                    </div>
                    <!-- END Side Header -->

                    <!-- Side Content -->
                    <div class="side-content">
                        <ul class="nav-main">
                            <li hidden="true">
                                <a href="start_backend.html"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</span></a>
                            </li>
                            <li class="nav-main-heading"><span class="sidebar-mini-hide"></span></li>

                            <li>
                                <a id="pmart" class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-badge"></i><span class="sidebar-mini-hide">Policies Mart</span></a>
                                <ul>
                                    <li>
                                        <a id="pmart1" href="policy-inquiry">Policy Inquiry</a>
                                    </li>
                                    <li>
                                        <a id="pmart2" href="premium-inforce">Premium - Inforced</a>
                                    </li>
                                    <li>
                                        <a id="pmart3" href="premium-lapsed">Premium - Lapsed</a>
                                    </li>
                                    <li>
                                        <a id="pmart4" href="premium-modemix">Premium - ModeMix</a>
                                    </li>
                                    <li>
                                        <a id="pmart5" href="work-flow">Work Flow</a>
                                    </li>
                                    <li>
                                        <a id="pmart6" href="proposal-detail">Proposal Detail - IBT</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-main-heading"><span class="sidebar-mini-hide"></span></li>

                            <li>
                                <a id="activityMart" class="nav-submenu" data-toggle="nav-submenu" href="#"><i class=" fa fa-bar-chart-o"></i><span class="sidebar-mini-hide">Activity Mart</span></a>
                                <ul>
                                    <li>
                                        <a href="start_backend.html">Sales Plan</a>
                                    </li>
                                    <li>
                                        <a href="start_backend.html">Activity Result</a>
                                    </li>
                                    <li>
                                        <a href="start_backend.html">Activity Plan Summary</a>
                                    </li>
                                    <li>
                                        <a href="start_backend.html">Lead Management</a>
                                    </li>
                                    <li>
                                        <a href="start_backend.html">Lead Followup</a>
                                    </li>

                                </ul>
                            </li>

                            <li class="nav-main-heading"><span class="sidebar-mini-hide"></span></li>

                            <li>
                                <a id="gwp" class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-docs"></i><span class="sidebar-mini-hide">GWP Mart</span></a>
                                <ul>
                                    <li>
                                        <a href="start_backend.html">Daily Performance</a>
                                    </li>
                                    <li>
                                        <a href="start_backend.html">Rank Report</a>
                                    </li>
                                    <li>
                                        <a href="start_backend.html">GWP Progress</a>
                                    </li>
                                    <li>
                                        <a href="start_backend.html">GWP Report</a>
                                    </li>


                                </ul>
                            </li>

                            <li class="nav-main-heading"><span class="sidebar-mini-hide"></span></li>

                            <li>
                                <a id="attendance" class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-user"></i><span class="sidebar-mini-hide">Attendance</span></a>
                                <ul>
                                    <li>
                                        <a href="start_backend.html">Edit Attendance</a>
                                    </li>
                                    <li>
                                        <a href="start_backend.html">Attendance Report</a>
                                    </li>
                                    <li>
                                        <a href="start_backend.html">HR - Edit Attendance</a>
                                    </li>
                                    <li>
                                        <a href="start_backend.html">Edit User Details</a>
                                    </li>


                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- END Side Content -->
                </div>
                <!-- Sidebar Content -->
            </div>

        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="header-navbar" class="content-mini content-mini-full">
            <!-- Header Navigation Right -->
           <!-- <ul class="nav-header pull-right">


                <li>
                    <div class="btn-group">
                        <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                            <img src="{{ URL::asset('assets/img/mb-dooky.com-avatar.png')}}" alt="Avatar">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-header">Profile</li>

                            <li>
                                <a tabindex="-1" href="base_pages_profile.html">
                                    <i class="si si-user pull-right"></i> Profile
                                </a>
                            </li>
                            <li>
                                <a tabindex="-1" href="javascript:void(0)">
                                    <i class="si si-settings pull-right"></i>Settings
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Actions</li>

                            <li>
                                <a tabindex="-1" href="base_pages_login.html">
                                    <i class="si si-logout pull-right"></i>Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <!-- Layout API, functionality initialized in App() -> uiLayoutApi()  
                    <button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
                        <i class="fa fa-tasks"></i>
                    </button>
                </li>
            </ul>-->
            <!-- END Header Navigation Right -->
<ul class="nav-header pull-left">
<li class="header-content">
<a class="h5" href="{{ URL::asset('/')}}">
<i class="fa fa-circle-o-notch text-primary"></i> <span class="h4 font-w600  ">PROJECTS</span><span class="h6 font-w300  ">  &nbsp;&nbsp;IT Division</span>
</a>
</li>
</ul>
            <!-- Header Navigation Left -->
            <ul class="nav-header pull-right">
                <li class="hidden-md hidden-lg">
                    <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                    <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                        <i class="fa fa-navicon"></i>
                    </button>
                </li>
                <li class="hidden-xs hidden-sm" hidden="true">
                    <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                    <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                        <i class="fa fa-ellipsis-v"></i>
                    </button>
                </li>
                
                  
                <li class="visible-xs">
                    <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
                    <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </li>
                <li class="js-header-search header-search" hidden="true">
                    <form class="form-horizontal" action="start_backend.html" method="post">
                        <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                            <input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="Search.." disabled>
                            <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                        </div>
                    </form>
                </li>
            </ul>
            <!-- END Header Navigation Left -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Header -->
          <!--  <div class="content bg-gray-lighter">
                <div class="row items-push">
                    <div class="col-sm-7">
                        <h1 class="page-heading">
                               @yield('title') <small> @yield('subtitle')</small>
                            </h1>
                    </div>
                    <div class="col-sm-5 text-right hidden-xs">
                        @yield('crumbs')

                    </div>
                </div>
            </div>-->
            <!-- END Page Header -->

            <!-- Page Content -->
            <div class="content">
                <!-- My Block -->
                @yield('content')


                <!-- END My Block -->
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
            <div class="pull-right">

            </div>
            <div class="pull-left">
                <a class="font-w600" href=" " target="_blank"> HNBIT </a> &copy; <span class="js-year-copy"></span>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
    <script src="{{ URL::asset('assets/js/oneui.min.js') }}"></script>
    @yield('scripts')


    <script>
        function init() {


        

            if ($(window).width() < 992 &&  $(window).width() > 400) {

                document.getElementById("sidebar").setAttribute("style", "width:50%");


            } else {

                document.getElementById("sidebar").removeAttribute("style", "width:50%");


            }
                @yield('init')
        }
    </script>


    @yield('js')
    <!-- Page JS Plugins + Page JS Code -->
</body>

</html>