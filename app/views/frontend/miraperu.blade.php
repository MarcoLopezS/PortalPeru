<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @section('html_title')
        Mira el Perú | {{ configWeb()->titulo }}
        @show
    </title>
    
</head>
<body id="mira-peru">

    <!--HEADER-->
    <header>

        <!--MENU-->
        <nav class="clearfix">

            <div class="container">
                
                <a href="/" class="logo"><img src="/imagenes/logo.png" alt="Portal Perú"></a>
                
                <a href="#" class="pull-right" id="header-menu-button"><i class="fa fa-bars"></i></a>

                <ul class="header-menu list-inline pull-right">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/seccion/hechos">Hechos</a></li>
                    <li><a href="/seccion/entrevista">Entrevista</a></li>
                    <li><a href="/seccion/tecnologia">Tecnología</a></li>
                    <li><a href="mira-peru">Mira el Perú</a></li>
                    <li><a href="/seccion/bicentenario">Bicentenario</a></li>
                    <li class="menu-rcid dropdown-submenu">
                        <a href="javascript:;">Reportero Ciudadano</a>
                        <ul class="dropdown-menu">
                            <li><a href="/seccion/reportero-ciudadano">Noticias</a></li>
                            @if(Auth::check())
                            <li><a target="_blank" href="/reportero-ciudadano/admin">Subir noticias</a></li>
                            @else
                            <li><a target="_blank" href="/reportero-ciudadano/registro">Registrarse</a></li>
                            <li><a target="_blank" href="/reportero-ciudadano/login">Iniciar sesión</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>

            </div>

        </nav>
        <!--END MENU-->

        <div class="datos-foto">
            <div class="container">
                <div class="datos pull-left">
                    <p>Piura</p>
                    <h2>Mancora</h2>
                </div>
                <div class="logo-mira-peru pull-right">
                    <img src="/imagenes/logo-mira-peru.png" height="40" alt="">
                </div>
            </div>
        </div>

    </header>
    <!--END HEADER-->

    <!--CONTAINER-->
    <div class="container">


        <div class="main">
            
            <div class="row">
                
                <div class="posts col-lg-9 col-md-9 col-sm-12">

                    <!-- NOTICIA SUPERIOR -->
                    <div class="row" id="mira-peru-superior">

                        {{--*/ $i = 1; /*--}}

                        @foreach($mira_peru as $item)

                        <article id="{{ $i }}" class="">
                            <div class="img">
                                <a href="/nota/{{ $item->id."-".$item->slug_url }}">
                                    <img class="width100" data-carpeta="upload/{{ $item->imagen_carpeta }}" data-imagen="{{ $item->imagen }}" src="" alt="{{ $item->titulo }}">
                                </a>
                            </div>
                            <div class="info2">
                                <h1><a href="/nota/{{ $item->id."-".$item->slug_url }}">{{ $item->titulo }}</a></h1>
                                <p class="text">{{ $item->descripcion }}</p>
                            </div>
                        </article>

                        {{--*/ $i = $i + 1; /*--}}

                        @endforeach

                        <!-- PUBLICIDAD -->
                        <article id="publicidad-central" class="col-lg-4 col-md-4 col-sm-12 mid">
                            <style type="text/css">
                                .adslot_home { width: 320px; height: 300px; }
                                @media (min-width:500px) { .adslot_home { width: 468px; height: 300px; } }
                                @media (min-width:800px) { .adslot_home { width: 255px; height: 255px; } }
                            </style>
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <ins class="adsbygoogle adslot_home"
                                 style="display:block"
                                 data-ad-client="ca-pub-3674889010429322"
                                 data-ad-slot="1879845946"
                                 data-ad-format="auto"></ins>
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </article>
                        <!-- FIN PUBLICIDAD -->

                    </div>
                    <!-- FIN NOTICIA SUPERIOR -->

                    <!-- NOTICIA CENTRAL -->
                    <div class="row" id="mira-peru-central">                        
                    </div>
                    <!-- FIN NOTICIA CENTRAL -->

                    <!-- NOTICIA INFERIOR -->
                    <div class="row" id="mira-peru-inferior">
                    </div>
                    <!-- FIN NOTICIA INFERIOR -->

                    <!-- NOTICIA INFERIOR HORIZONTAL -->
                    <div class="row" id="mira-peru-inferior-horizontal">
                    </div>
                    <!-- FIN NOTICIA INFERIOR HORIZONTAL -->

                </div>

                @include('frontend.sidebar')

            </div>

        </div>


        <!--FOOTER-->
        <footer>
            <div class="row">
                <div class="about col-md-9 col-sm-6">
                    <img src="/imagenes/logo-footer.png" alt="logo" width="180">
                    <h5>Sobre Portal Perú</h5>
                    <p>
                        Portal Perú no se solidariza ni comparte necesariamente con las informaciones, opiniones y denuncias vertidas en las notas publicadas en este site. El autor es el único responsable del contenido de la información, opinión o denuncia.
                    </p>

                    <p>
                        Portal Perú tiene Registro de la Propiedad Industrial. Resolución N° 021065-2014/DSD-INDECOPI. Certificado N° 0008491
                    </p>

                    <ul class="social list-inline">
                        <li><a target="_blank" href="https://www.facebook.com/portalperu.pe"><i class="fa fa-facebook"></i></a></li>
                        <li><a target="_blank" href="https://plus.google.com/100548756504983774264"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>

                <div class="categories col-md-3 col-sm-6">
                    <h5>Categorias</h5>
                    <ul>
                        <li><a href="/seccion/hechos">Hechos</a></li>
                        <li><a href="/seccion/entrevista">Entrevista</a></li>
                        <li><a href="/mira-peru">Mira el Perú</a></li>
                        <li><a href="/seccion/bicentenario">Bicentenario</a></li>
                        <li><a href="/seccion/reportero-ciudadano">Reportero Ciudadano</a></li>
                        <li><a href="/columnistas">Columnistas</a></li>
                    </ul>
                </div>

            </div>

            <div class="rights clearfix">
                <p>© 2015 Todos los derechos reservados.</p>
                <p>Designed by <a href="http://www.g7consultores.com" target="_blank">G7 Consultores</a>.</p>
            </div>
        </footer>
        <!--END FOOTER-->

    </div>
    <!--END CONTAINER-->

{{-- GOOGLE FONTS --}}
{{ HTML::style('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700') }}
{{ HTML::style('https://fonts.googleapis.com/css?family=Montserrat:400,700') }}

{{-- FONT AWESOME - BOOTSTRAP --}}
{{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css') }}
{{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css') }}

{{-- ESTILOS --}}
{{ HTML::style('css/style.css') }}
{{ HTML::style('css/responsive.css') }}

{{-- JQUERY - BOOTSTRAP --}}
{{ HTML::script('//code.jquery.com/jquery-1.10.2.min.js') }}
{{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js') }}

{{-- FLICKR --}}
{{ HTML::script('js/flickrush.min.js') }}

{{-- SLIDER --}}
{{ HTML::script('js/jquery.bxslider.js') }}

{{-- RESIZETOP --}}
{{ HTML::script('js/jquery.resizestop.min.js') }}

{{-- JS --}}
{{ HTML::script('js/main.js') }}
{{ HTML::script('js/mainMiraPeru.js') }}


{{-- GOOGLE ANALYTICS --}}
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-20229980-30', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>