<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
	    @section('html_title')
	    {{ configWeb()->titulo }}
	    @show
	</title>

    <meta name="keywords" content="{{ configWeb()->keywords }}"/>
	<meta name="description" content="{{ configWeb()->descripcion }}"/>
	<meta name="robots" content="index,follow">
    <meta name="googlebot" content="index, follow">

    <meta property="og:title" content="{{ configWeb()->titulo." | ".configWeb()->keywords }}">
    <meta property="og:description" content="{{ configWeb()->descripcion }}">
    <meta property="og:url" content="{{ configWeb()->dominio }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ configWeb()->dominio."/imagenes/logo.png" }}">
    <meta property="og:site_name" content="{{ configWeb()->titulo }}">

    {{ HTML::style('fonts/font-awesome-4.0.3/css/font-awesome.min.css') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,600,700') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Montserrat:400,700') }}
    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/style.css') }}

    @yield('script_header')
	
</head>
<body>

	<!--HEADER-->
    <header>
        <div class="container">
            <a href="/" class="logo"><img src="/imagenes/logo.png" alt="logo"></a>

            <!--MENU-->
            <nav class="clearfix">
                <a href="" id="header-menu-button"><i class="fa fa-bars"></i></a>
                <ul class="list-inline">
                    <li class="/"><a href="">Inicio</a></li>
                    <li><a href="#">Publicidad</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="#">Nosotros</a></li>
                </ul>
            </nav>
            <!--END MENU-->

            <div class="sepheader">
                <style>
                    .pp-responsive { width: 320px; height: 50px; }
                    @media(min-width: 500px) { .pp-responsive { width: 468px; height: 60px; } }
                    @media(min-width: 800px) { .pp-responsive { width: 728px; height: 90px; } }
                </style>
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- PP - Responsive -->
                <ins class="adsbygoogle pp-responsive"
                     style="display:inline-block"
                     data-ad-client="ca-pub-3674889010429322"
                     data-ad-slot="1879845946"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    </header>
	<!--END HEADER-->

	<!--CONTAINER-->
	<div class="container">

		<!--MENU-->
        <nav class="clearfix">

            <a href="" id="menu-button"><i class="fa fa-bars"></i></a>

            <ul class="menu col-md-10 list-inline">
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><a href="/seccion/hechos">Hechos</a></li>
                <li><a href="/seccion/entrevista">Entrevista</a></li>
                <li><a href="/seccion/mira-el-peru">Mira el Perú</a></li>
                <li><a href="/seccion/bicentenario">Bicentenario</a></li>
                <li class="menu-rcid dropdown-submenu">
                    <a href="javascript:;">Reportero Ciudadano</a>
                    <ul class="dropdown-menu">
                        <li><a href="/reportero-ciudadano/noticias">Noticias</a></li>
                        <li><a target="_blank" href="/reportero-ciudadano/">Registrarse</a></li>
                        <li><a target="_blank" href="/reportero-ciudadano/login.php">Iniciar sesión</a></li>
                    </ul>
                </li>
            </ul>

            <div class="buscador form-search col-md-2">
                <script>
                    (function() {
                        var cx = '018282985496243368695:hzzjbqgus9q';
                        var gcse = document.createElement('script');
                        gcse.type = 'text/javascript';
                        gcse.async = true;
                        gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                        '//www.google.com/cse/cse.js?cx=' + cx;
                        var s = document.getElementsByTagName('script')[0];
                        s.parentNode.insertBefore(gcse, s);
                    })();
                </script>
                <gcse:searchbox-only></gcse:searchbox-only>
            </div>

        </nav>
		<!--END MENU-->
		

		@yield('contenido_frontend')


		<!--FOOTER-->
        <footer>
            <div class="row">
                <div class="about col-md-9 col-sm-6">
                    <img src="/imagenes/logo-footer.png" alt="logo" width="180">
                    <h5>Sobre Portal Perú</h5>
                    <p>
                        Portal Perú busca democratizar la información bajo el principio universal que toda persona tiene derecho, no solo a recibir información y opinión sino también a difundirla por cualquier medio de expresión.
                    </p>

                    <ul class="social list-inline">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                        <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                        <li><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                        <li><a href="#"><i class="fa  fa-tumblr"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>

                <div class="categories col-md-3 col-sm-6">
                    <h5>Categorias</h5>
                    <ul>
                        <li><a href=""></a></li>
                        <li><a href="/columnistas">Columnistas</a></li>
                        <li><a href=""></a></li>
                    </ul>
                </div>

            </div>

            <div class="rights clearfix">
                <p>© 2015 Todos los derechos reservados.</p>
                <p>Designed by <a href="http://www.grupo7peru.com">Grupo 7 Perú</a>.</p>
            </div>
        </footer>
		<!--END FOOTER-->

	</div>
	<!--END CONTAINER-->

{{ HTML::script('http://code.jquery.com/jquery-1.10.2.min.js') }}
{{ HTML::script('js/jquery.stellar.js') }}
{{ HTML::script('js/smoothscroll.js') }}
{{ HTML::script('js/flickrush.min.js') }}
{{ HTML::script('js/bootstrap.js') }}
{{ HTML::script('js/jquery.bxslider.js') }}
{{ HTML::script('js/jquery.countdown.js') }}
{{ HTML::script('js/fluidvids.js') }}
{{ HTML::script('js/retina-1.1.0.min.js') }}
{{ HTML::script('js/jquery.resizestop.min.js') }}
{{ HTML::script('js/main.js') }}

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