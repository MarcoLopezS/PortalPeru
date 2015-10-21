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
                    <div class="col-xs-12 data">
                        <span class="col-sm-6 col-xs-12 details textAlignLeft">{{ $noticia->category->titulo }} | {{ date_format(new DateTime($noticia->published_at), 'd/m/Y H:m')  }}</span>
                        <span class="col-sm-6 col-xs-12 details textAlignRight">Autor: {{ $noticia->redaccion }}</span>
                    </div>
                    <div class="col-xs-12 data">
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
                                <img src="/upload/{{ $item->imagen_carpeta."870x500/".$item->imagen }}" alt="{{ $noticia->titulo }}" >
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
                        <img src="{{ $noticiaImg }}" alt="{{ $noticia->titulo }}">
                    </div>
                    @endif
                @endif

                <div class="row">
                    <div class="info col-md-12 col-sm-12">
                        <div class="info">
                            <div class="text texto-nota">

                                <div class="contenido-texto trdr">
                                
                                    {{ $noticia->contenido }}

                                </div>

                                <p class="nota-completa">
                                    <a id="nota-completa" href="#">Ver nota completa</a>
                                </p>

                            </div>
                        </div>

                        @if($noticiaTags<>"")
                        <div class="info tags">
                            <ul>
                                @foreach($noticiaTags as $item)
                                {{--*/ $tag = tagsNoticia($item); /*--}}
                                    <li><a href="{{ route('home.noticia.tags', [$tag->id, $tag->slug_url]) }}">{{ $tag->titulo }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="info col-sm-12">

                            <style type="text/css">
                                .adslot_nota_horizontal { width: 320px; height: 100px; } 
                                @media (min-width:500px) { .adslot_nota_horizontal { width: 468px; height: 60px; } } 
                                @media (min-width:800px) { .adslot_nota_horizontal { width: 728px; height: 90px; } }
                            </style>
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <ins class="adsbygoogle adslot_nota_horizontal"
                                 style="display:block"
                                 data-ad-client="ca-pub-3674889010429322"
                                 data-ad-slot="1879845946"
                                 data-ad-format="auto"></ins>
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>

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

            <!-- NOTICIAS RELACIONADAS -->
            <div class="best-week">

                <h3>Noticias relacionadas</h3>
                <div class="row noticias-relacionadas">

                    @foreach ($notRel as $item)
                        {{--*/
                        $imagen = "/upload/".$item->imagen_carpeta."250x200/".$item->imagen;
                        $url = "/nota/".$item->id."-".$item->slug_url;
                        $fecha = date_format(new DateTime($item->published_at), 'd/m/Y H:m');
                        /*--}}                        
                        <article class="col-md-3 col-sm-3 mid">
                            <div class="img">
                                <a href="{{ $url }}">
                                    <img src="{{ $imagen }}" alt="{{ $item->titulo }}">
                                </a>
                            </div>
                            <div class="info">
                                <h4><a href="{{ $url }}">{{ $item->titulo }}</a></h4>
                                <p class="details">{{ $fecha }}</p>
                            </div>
                        </article>

                    @endforeach

                </div>
            </div>
            <!-- FIN NOTICIAS RELACIONADAS -->

            <!-- COMENTARIOS -->
            <div class="row visible-lg">
                <h3>Comentarios</h3>

                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

                <div class="fb-comments" data-href="{{ $noticiaUrl }}" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <!-- FIN COMENTARIOS -->

        </div>
        <!--END CONTENT-->

        @include('frontend.sidebar')

    </div>

</div>
<!--END MAIN SECTION-->

@stop

@section('script_footer')

<script>
$("#nota-completa").on("click", function(e){
    e.preventDefault();    
    $(".contenido-texto").removeClass("trdr");
    $(".nota-completa").hide();
});
</script>

@stop