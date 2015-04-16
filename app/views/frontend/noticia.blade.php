@extends('layouts.frontend')

@section('html_title')
{{ $noticia->titulo }} | @parent
@stop

{{--*/
$noticiaUrl = configWeb()->dominio."/nota/".$noticia->id."-".$noticia->slug_url;
$noticiaImg = configWeb()->dominio."/upload/".$noticia->imagen_carpeta."870x500/".$noticia->imagen;
/*--}}

@section('script_header')
<!-- Open Graph -->
<meta property="og:title" content='{{ $noticia->titulo  }}'>
<meta property="og:type" content='article' >
<meta property="og:url" content='{{ $noticiaUrl }}' >
<meta property="og:image" content='{{ $noticiaImg }}' >
<meta property="og:site_name" content='{{ configWeb()->titulo }}' >
<meta property="fb:admins" content='1434798696787255'>
<meta property="og:description" content='{{ $noticia->descripcion }}'>
<!-- fin Open Graph -->
@stop

@section('contenido_frontend')

<!--MAIN SECTION-->
<div class="main post-page">

    <div class="row">

        <!--CONTENT-->
        <div class="col-md-9 col-sm-12 clearfix">
            <!--POST-->
            <article class="post mid fullwidth">
                <div class="info">
                    <h1>{{ $noticia->titulo }}</h1>
                    <div class="text">{{ $noticia->descripcion }}</div>
                    <div class="data">
                        <p class="details">
                            {{ $noticia->category->titulo }} | {{ date_format(new DateTime($noticia->published_at), 'd/m/Y H:m')  }}
                            <span class="redaccion col-sm-12">Autor: {{ $noticia->redaccion }}</span>
                        </p>
                    </div>
                    <div class="data">
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-552dd2a835af55f3" async="async"></script>
                        <div class="addthis_native_toolbox"></div>
                    </div>
                </div>


                @if($noticia->video <> "")
                <div class="video">
                    <iframe width="100%" height="500px" src="//www.youtube.com/embed/{{ $noticia->video }}?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
                @elseif(count($noticiaFotos) > 0)
                <div class="row post-interno">
                    <div class="post-slider col-md-12 col-sm-12">
                        <div class="controls">
                            <p class="prev"><i class="fa fa-angle-left"></i></p>
                            <p class="next"><i class="fa fa-angle-right"></i></p>
                        </div>
                        <div class="slides">
                            @foreach($noticiaFotos as $item)
                            <article class="big clearfix">
                                <img src="/upload/{{ $item->imagen_carpeta."870x500/".$item->imagen }}" alt="post-image" >
                                @if($item->titulo <> "")
                                <div class="info">
                                    <p class="text">{{ $item->titulo }}</p>
                                </div>
                                @endif
                            </article>
                            @endforeach
                        </div>
                    </div>
                </div>
                @elseif(count($noticiaFotos) == 0)
                    @if($noticia->imagen <> "")
                    <div class="info imagen">
                        <img src="{{ $noticiaImg }}" alt="post-image">
                    </div>
                    @endif
                @endif

                <div class="row">
                    <div class="info col-md-12 col-sm-12">
                        <div class="info">
                            <div class="text">
                                {{ $noticia->contenido }}
                            </div>
                        </div>
                    </div>
                </div>

            </article>
            <!--END POST-->

            @if($noticia->category->slug_url == "reportero-ciudadano")
            {{--*/
            $reporteroNombreCompleto = $noticia->user->profile->nombre." ".$noticia->user->profile->apellidos;
            $reporteroUrlImg = "/upload/reportero/130x130/".$noticia->user->profile->imagen;
            $reporteroDescripcion = $noticia->user->profile->descripcion;

            //REDES SOCIALES
            $reporteroFacebook = $noticia->user->profile->social_facebook;
            $reporteroTwitter = $noticia->user->profile->social_twitter;
            $reporteroGoogle = $noticia->user->profile->social_google;
            $reporteroYoutube = $noticia->user->profile->social_youtube;
            $reporteroPinterest = $noticia->user->profile->social_pinterest;
            $reporteroInstagram = $noticia->user->profile->social_instagram;
            $reporteroLinkedin = $noticia->user->profile->social_linkedin;
            $reporteroTumblr = $noticia->user->profile->social_tumblr;
            /*--}}
            <h3>Sobre el Autor</h3>
            <article class="row mid member">
                @if($noticia->user->profile->imagen<>"")
                <img class="imgBorder50" src="{{ $reporteroUrlImg }}" alt="{{ $reporteroNombreCompleto }}">
                @else
                <img src="/imagenes/rciud/usuario.jpg" width="130" alt="Reportero Ciudadano"/>
                @endif
                <div class="info">
                    <h1><a href="#">{{ $reporteroNombreCompleto }}</a></h1>
                    <p class="text">{{{ $reporteroDescripcion }}}</p>
                    <ul class="social list-inline">
                        @if($reporteroFacebook<>"")
                        <li><a href="https://facebook.com/{{ $reporteroFacebook }}"><i class="fa fa-facebook"></i></a></li>
                        @endif
                        @if($reporteroTwitter<>"")
                        <li><a href="https://twitter.com/{{ $reporteroTwitter }}"><i class="fa fa-twitter"></i></a></li>
                        @endif
                        @if($reporteroGoogle<>"")
                        <li><a href="https://plus.google.com/{{ $reporteroGoogle }}"><i class="fa fa-google-plus"></i></a></li>
                        @endif
                        @if($reporteroYoutube<>"")
                        <li><a href="https://youtube.com/{{ $reporteroYoutube }}"><i class="fa fa-youtube"></i></a></li>
                        @endif
                        @if($reporteroYoutube<>"")
                        <li><a href="https://pinterest.com/{{ $reporteroPinterest }}"><i class="fa fa-pinterest"></i></a></li>
                        @endif
                        @if($reporteroPinterest<>"")
                        <li><a href="https://instagram.com/{{ $reporteroInstagram }}"><i class="fa fa-instagram"></i></a></li>
                        @endif
                        @if($reporteroLinkedin<>"")
                        <li><a href="https://linkedin.com/{{ $reporteroLinkedin }}"><i class="fa fa-linkedin"></i></a></li>
                        @endif
                        @if($reporteroTumblr<>"")
                        <li><a href="https://tumblr.com/{{ $reporteroTumblr }}"><i class="fa fa-tumblr"></i></a></li>
                        @endif
                    </ul>
                </div>
            </article>
            @endif

            <!-- COMENTARIOS -->
            <div class="row">
                <h3>Comentarios</h3>

                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

                <div class="fb-comments" data-href="{{ $noticiaUrl }}" data-width="840" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <!-- FIN COMENTARIOS -->

        </div>
        <!--END CONTENT-->

        @include('frontend.sidebar')

    </div>

</div>
<!--END MAIN SECTION-->

@stop