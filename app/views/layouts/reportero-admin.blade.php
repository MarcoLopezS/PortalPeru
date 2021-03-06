<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
        | Admin
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!--[if lt IE 9]>
    {{ HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
    {{ HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
    <![endif]-->
    <!-- global css -->

    {{ HTML::style('admin/css/bootstrap.min.css') }}

    <!-- font Awesome -->
    {{ HTML::style('admin/vendors/font-awesome-4.2.0/css/font-awesome.min.css') }}
    {{ HTML::style('admin/css/styles/black.css') }}
    {{ HTML::style('admin/css/panel.css') }}
    {{ HTML::style('admin/css/metisMenu.css') }}
    <!-- end of global css -->

    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->
</head>

<body class="skin-josh">
    <header class="header">
        <a href="{{ URL::to('administrador') }}" class="logo">
            <img src="{{ asset('imagenes/logo-blanco.png') }}" alt="logo" width="70%">
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <div class="riot">
                                <div>
                                    {{ Auth::user()->profile->nombre." ".Auth::user()->profile->apellidos }}
                                    <span><i class="caret"></i></span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <p class="topprofiletext">{{ Auth::user()->profile->nombre." ".Auth::user()->profile->apellidos }}</p>
                            </li>
                            <!-- Menu Body -->
                            <li><a href="{{ route('administrador.users.profile') }}"><i class="livicon" data-name="user" data-s="18"></i>Mi perfil</a></li>
                            <li><a href="{{ route('reportero.logout') }}"><i class="livicon" data-name="sign-out" data-s="18"></i> Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar purplebg">
                <div class="page-sidebar  sidebar-nav">

                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">

                        <li {{ (Request::is('reportero-ciudadano/posts') || Request::is('reportero-ciudadano/posts/*') ? 'class="active"' : '') }}>
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
                                <span class="title">Entradas</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('reportero-ciudadano/posts') ? 'class="active"' : '') }}>
                                    <a href="{{ route('reportero-ciudadano.posts.index') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Todas las entradas
                                    </a>
                                </li>
                                <li {{ (Request::is('administrador/posts/create') ? 'class="active"' : '') }}>
                                    <a href="{{ route('reportero-ciudadano.posts.create') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Nueva entrada
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li {{ (Request::is('reportero-ciudadano/user/*') ? 'class="active"' : '') }}>
                            <a href="{{ route('reportero-ciudadano.user.profile') }}">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Mi perfil</span>
                            </a>
                        </li>

                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
        </aside>
        <aside class="right-side">

            <!-- Content -->
            @yield('content_admin')

        </aside>
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <!-- global js -->
    <script src="{{ asset('admin/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/vendors/form_builder1/js/jquery.ui.min.js') }}"></script>

    <script src="{{ asset('admin/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--livicons-->
    <script src="{{ asset('admin/vendors/livicons/minified/raphael-min.js') }}"></script>
    <script src="{{ asset('admin/vendors/livicons/minified/livicons-1.4.min.js') }}"></script>
    <script src="{{ asset('admin/js/josh.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/metisMenu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/vendors/holder-master/holder.js') }}"></script>
    <!-- end of global js -->
    <!-- begin page level js -->
    @yield('footer_scripts')
    <!-- end page level js -->
</body>
</html>