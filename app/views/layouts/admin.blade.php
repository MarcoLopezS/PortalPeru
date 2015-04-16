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
                                    {{ Auth::user()->first_name." ".Auth::user()->last_name }}
                                    <span><i class="caret"></i></span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header bg-light-blue">
                                <p class="topprofiletext">{{ Auth::user()->first_name." ".Auth::user()->last_name }}</p>
                            </li>
                            <!-- Menu Body -->
                            <li><a href="{{ route('administrador.users.profile') }}"><i class="livicon" data-name="user" data-s="18"></i>Mi perfil</a></li>
                            <li><a href="{{ route('administrador.logout') }}"><i class="livicon" data-name="sign-out" data-s="18"></i> Salir</a></li>
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

                        <li {{ (Request::is('administrador') ? 'class="active"' : '') }}>
                            <a href="{{ route('administrador.index') }}">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>

                        <li {{ (Request::is('administrador/columnist') || Request::is('administrador/columnist/*') ? 'class="active"' : '') }}>
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
                                <span class="title">Columnistas</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('administrador/columnist') ? 'class="active"' : '') }}>
                                    <a href="{{ route('administrador.columnist.index') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Todas los columnistas
                                    </a>
                                </li>
                                <li {{ (Request::is('administrador/columnist/create') ? 'class="active"' : '') }}>
                                    <a href="{{ route('administrador.columnist.create') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Nuevo columnista
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li {{ (Request::is('administrador/posts') || Request::is('administrador/posts/*') || Request::is('administrador/categories') || Request::is('administrador/categories/*') || Request::is('administrador/tags') || Request::is('administrador/tags/*') || Request::is('administrador/reportero') ? 'class="active"' : '') }}>
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
                                <span class="title">Noticias</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('administrador/posts') ? 'class="active"' : '') }}>
                                    <a href="{{ route('administrador.posts.index') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Todas las noticias
                                    </a>
                                </li>
                                <li {{ (Request::is('administrador/posts/create') ? 'class="active"' : '') }}>
                                    <a href="{{ route('administrador.posts.create') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Nueva noticia
                                    </a>
                                </li>
                                <li {{ (Request::is('administrador/categories') || Request::is('administrador/categories/*') ? 'class="active"' : '') }}>
                                    <a href="{{ route('administrador.categories.index') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Categorías
                                    </a>
                                </li>
                                <li {{ (Request::is('administrador/tags') || Request::is('administrador/tags/*') ? 'class="active"' : '') }}>
                                    <a href="{{ route('administrador.tags.index') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Etiquetas
                                    </a>
                                </li>
                                <li {{ (Request::is('administrador/reportero') ? 'class="active"' : '') }}>
                                    <a href="{{ route('administrador.reportero.list') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Reportero ciudadano <span class="badge badge-danger">{{ reporteroCountNoPuplic() }}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li {{ (Request::is('administrador/gallery') || Request::is('administrador/gallery/*') ? 'class="active"' : '') }}>
                            <a href="#">
                                <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
                                <span class="title">Galería de Fotos</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('administrador/gallery') ? 'class="active"' : '') }}>
                                    <a href="{{ route('administrador.gallery.index') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Todas las entradas
                                    </a>
                                </li>
                                <li {{ (Request::is('administrador/gallery/create') ? 'class="active"' : '') }}>
                                    <a href="{{ route('administrador.gallery.create') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Nueva entrada
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li {{ (Request::is('administrador/pages') || Request::is('administrador/pages/*') ? 'class="active"' : '') }}>
                            <a href="{{ route('administrador.pages.index') }}">
                                <i class="livicon" data-name="doc-portrait" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Paginas</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li {{ (Request::is('administrador/pages') ? 'class="active"' : '') }}>
                                    <a href="{{ route('administrador.pages.index') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Todas las páginas
                                    </a>
                                </li>
                                <li {{ (Request::is('administrador/pages/create') ? 'class="active"' : '') }}>
                                    <a href="{{ route('administrador.pages.create') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Nueva página
                                    </a>
                                </li>
                            </ul>
                        </li>

                        @if(is_admin())
                        <li {{ (Request::is('administrador/config/*') ? 'class="active"' : '') }}>
                            <a href="{{ route('administrador.config.edit',1) }}">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Configuración</span>
                            </a>
                        </li>
                        @endif

                        <li {{ ( Request::is('administrador/users') || Request::is('administrador/users/*') || Request::is('administrador/profile') || Request::is('administrador/profile/*') ? 'class="active"' : '') }}>
                            <a href="#">
                                <i class="livicon" data-name="brush" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
                                <span class="title">Usuarios</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                @if(is_admin())
                                <li {{ (Request::is('administrador/users') ? 'class="active"' : '') }}>
                                    <a href="{{ route('administrador.users.index') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Todos los usuarios
                                    </a>
                                </li>
                                <li {{ (Request::is('administrador/users/create') ? 'class="active"' : '') }}>
                                    <a href="{{ route('administrador.users.create') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Nuevo usuario
                                    </a>
                                </li>
                                @endif
                                <li {{ (Request::is('administrador/profile') ? 'class="active"' : '') }}>
                                    <a href="{{ route('administrador.users.profile') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Mi Perfil
                                    </a>
                                </li>
                            </ul>
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