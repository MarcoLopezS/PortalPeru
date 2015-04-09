<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Portal Perú</title>

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
                    <li><a href="nosotros">Nosotros</a></li>
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
                <li><a href="/seccion/noticia">Noticia</a></li>
                <li><a href="/seccion/informe">Informe</a></li>
                <li><a href="/seccion/entrevista">Entrevista</a></li>
                <li><a href="/columnistas">Columnista</a></li>
                <li><a href="/seccion/portal-tv">Portal TV</a></li>
                <li><a href="/seccion/mira-el-peru">Mira el Perú</a></li>
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
                <div class="about col-md-3 col-sm-6">
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

                <div class="events col-md-3 col-sm-6">
                    <h5>Eventos</h5>
                    <div class="event">
                        <div class="col">
                            <h1><a href="">21</a></h1>
                            <p>nov</p>
                        </div>
                        <div class="info">
                            <h2><a href="">jkdfvndj jn jdvjknkjf</a></h2>
                            <p>mdflknvjvndkjvn  jn jn dj jdnf j n d k dkn dkjn dj fdjh dj .</p>
                        </div>
                    </div>
                    <div class="event">
                        <div class="col">
                            <h1><a href="">17</a></h1>
                            <p>nov</p>
                        </div>
                        <div class="info">
                            <h2><a href="">nfdjn jdnjd f</a></h2>
                            <p>dfnvjkdfnv jdfnvjfnjd nvfjvndj kvndfjn jnjkfdn vjkj.</p>
                        </div>
                    </div>
                    <div class="event">
                        <div class="col">
                            <h1><a href="">25</a></h1>
                            <p>nov</p>
                        </div>
                        <div class="info">
                            <h2><a href="">dfijvn jnvid</a></h2>
                            <p>Tnfdjnvvj vjdnvkjdfbj fdkbkjdf fjvndjkvn .</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <h5>Calendario</h5>
                    <div class="calendar">
                        <div class="header clearfix">
                            <h1>Marzo 2014</h1>
                            <div class="calendar-nav">
                                <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
                                <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="calendar-body">
                            <table>
                                <tr>
                                    <td><a href="" class="prev-month">30</a></td>
                                    <td><a href="" class="prev-month">31</a></td>
                                    <td><a href="">1</a></td>
                                    <td><a href="">2</a></td>
                                    <td><a href="">3</a></td>
                                    <td><a href="">4</a></td>
                                    <td><a href="">5</a></td>
                                </tr>
                                <tr>
                                    <td><a href="">6</a></td>
                                    <td><a href="">7</a></td>
                                    <td><a href="">8</a></td>
                                    <td><a href="">9</a></td>
                                    <td><a href="">10</a></td>
                                    <td><a href="">11</a></td>
                                    <td><a href="">12</a></td>
                                </tr>
                                <tr>
                                    <td><a href="">13</a></td>
                                    <td><a href="">14</a></td>
                                    <td><a href="">15</a></td>
                                    <td><a href="">16</a></td>
                                    <td><a href="">17</a></td>
                                    <td><a href="">18</a></td>
                                    <td><a href="">19</a></td>
                                </tr>
                                <tr>
                                    <td><a href="">20</a></td>
                                    <td><a href="">21</a></td>
                                    <td><a href="">22</a></td>
                                    <td><a href="">23</a></td>
                                    <td><a href="">24</a></td>
                                    <td><a href="">25</a></td>
                                    <td><a href="">26</a></td>
                                </tr>
                                <tr>
                                    <td><a href="">27</a></td>
                                    <td><a href="">28</a></td>
                                    <td><a href="">29</a></td>
                                    <td><a href="">30</a></td>
                                    <td><a href="" class="next-month">1</a></td>
                                    <td><a href="" class="next-month">2</a></td>
                                    <td><a href="" class="next-month">3</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rights clearfix">
                <p>© 2014 Todos los derechos reservados.</p>
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

</body>
</html>