<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-ES" lang="es-ES"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-ES" lang="es-ES"><!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>
        @section('html_title')
            {{ configWeb()->titulo }}
        @show
    </title>

    <meta name="keywords" content="{{ configWeb()->keywords }}"/>
    <meta name="description" content="{{ configWeb()->descripcion }}"/>
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="index, follow">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap  -->
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') }}

    {{-- Bootstrap --}}
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css') }}

    <!-- Theme Style -->
    {{ HTML::style('stylesheets/style.css') }}
    {{ HTML::style('stylesheets/red.css') }}
    {{ HTML::style('stylesheets/animate.css') }}

    <!-- Google Fonts -->
    {{ HTML::style('http://fonts.googleapis.com/css?family=Roboto:300,400,500,700') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700') }}

    <!--[if lt IE 9]>
    <script src="javascript/html5shiv.js"></script>
    <script src="javascript/respond.min.js"></script>
    <![endif]-->

    @yield('contenido_header')

</head>

<body>

    <!-- Header -->
    <header id="header" class="header">
        <div class="top-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div id="logo" class="logo">
                            <a href="/" rel="home" title="home">
                                <img src="/imagenes/logo.png" alt="Good News" />
                            </a>
                        </div>
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6">
                        <div class="member-area">
                            <span class="login-popup"><a href="#">Inicio</a></span>
                            <span class="login-popup"><a href="#">Publicidad</a></span>
                            <span class="login-popup"><a href="#">Contacto</a></span>
                            <span class="login-popup"><a href="#">Nosotros</a></span>
                        </div>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.top-wrap -->
        <div class="header-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav id="mainnav" class="mainnav">
                            <ul class="menu">
                                <li><a href="/"><i class="fa fa-home"></i></a></li>
                                <li><a href="/hechos">Hechos</a></li>
                                <li><a href="/entrevista">Entrevista</a></li>
                                <li><a href="/tecnologia">Tecnología</a></li>
                                <li class="menu-mira-peru"><a href="/mira-peru"><img src="/imagenes/logo-mira-peru-rojo.png" width="103" height="20" alt=""></a></li>
                                <li><a href="/bicentenario">Bicentenario</a></li>
                                <li class="has-children"><a href="/reportero-ciudadano">Reportero Ciudadano</a>
                                    <ul class="sub-menu">
                                        <li><a href="/reportero-ciudadano">Noticias</a></li>
                                        @if(Auth::check())
                                            <li><a target="_blank" href="/reportero-ciudadano/admin">Subir noticias</a></li>
                                        @else
                                            <li><a target="_blank" href="/reportero-ciudadano/registro">Registrarse</a></li>
                                            <li><a target="_blank" href="/reportero-ciudadano/login">Iniciar sesión</a></li>
                                        @endif
                                    </ul>
                                </li>
                                <li class="gn-mega-menu"><a href="javascript:;">Columnistas</a>
                                    <div class="sub-menu">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mega-item-wrap">

                                                        @foreach($columnistasDia as $item)
                                                            {{--*/
                                                            $columDia_foto = "/upload/columnista/173x116/".$item->foto;
                                                            $columDia_titulo = $item->nombre." ".$item->apellidos;
                                                            $columDia_url = route('home.columnistas.person', [$item->id, $item->slug_url]);
                                                            /*--}}

                                                            <div class="mega-item">
                                                                <img src="{{ $columDia_foto }}" alt="image">
                                                                <h5><a href="{{ $columDia_url }}">{{ $columDia_titulo }}</a></h5>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.submenu -->
                                </li>
                            </ul><!-- /.menu -->
                        </nav><!-- /nav -->
                    </div><!-- /.col-md-9 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.header-wrap -->
    </header>

    @yield('contenido_body')

    <!-- Footer -->
    <footer id="footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                        <div class="widget widget-brand">
                            <div class="logo logo-footer">
                                <a href="#"><img src="/imagenes/logo-footer.png" alt="Good News"></a>
                            </div>
                            <p>Portal Perú no se solidariza ni comparte necesariamente con las informaciones, opiniones y denuncias vertidas en las notas publicadas en este site. El autor es el único responsable del contenido de la información, opinión o denuncia.<p>
                            <p>Portal Perú tiene Registro de la Propiedad Industrial. Resolución N° 021065-2014/DSD-INDECOPI. Certificado N° 0008491</p>
                        </div><!-- /.widget-brand -->
                        <div class="widget widget-social">
                            <div class="social-list">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div><!-- /.widget-social -->
                    </div><!-- /.col-md-4 -->
                    <div class="col-md-2 gn-animation" data-animation="fadeInUp" data-animation-delay="0.6s" data-animation-offset="75%">
                        <div class="widget widget-list">
                            <h5 class="widget-title">Categorías</h5>
                            <ul class="links-list">
                                <li><a href="#">Hechos</a></li>
                                <li><a href="#">Entrevista</a></li>
                                <li><a href="#">Mira el Perú</a></li>
                                <li><a href="#">Bicentenario</a></li>
                                <li><a href="#">Reportero Ciudadano</a></li>
                                <li><a href="#">Columnistas</a></li>
                            </ul>
                        </div><!-- /.widget-list -->
                    </div><!-- /.col-md-2 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.footer-widgets -->
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        &copy; 2016 Todos los derechos reservados.
                    </div><!-- /.col-md-6 -->
                    <div class="col-md-6 text-right">
                        Designed by G7 Consultores.
                    </div><!-- /.col-md-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
    </footer>

    <!-- Go Top -->
    <a class="go-top">
        <i class="fa fa-chevron-up"></i>
    </a>

    <!-- Javascript -->
    {{ HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js') }}
    {{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') }}
    {{ HTML::script('javascript/jquery.easing.js') }}
    {{ HTML::script('javascript/matchMedia.js') }}
    {{ HTML::script('javascript/jquery-waypoints.js') }}
    {{ HTML::script('javascript/jquery.flexslider.js') }}
    {{ HTML::script('javascript/jquery.transit.js') }}
    {{ HTML::script('javascript/jquery.leanModal.min.js') }}
    {{ HTML::script('javascript/jquery.doubletaptogo.js') }}
    {{ HTML::script('javascript/smoothscroll.js') }}
    {{ HTML::script('javascript/main.js') }}

    @yield('contenido_footer')

</body>

</html>