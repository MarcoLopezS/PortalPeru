@extends('layouts.frontend')

@section('script_header')
<!-- Open Graph -->
<meta property="og:type" content='article' >
<meta property="og:site_name" content='Portal Perú' >
<meta property="og:title" content='{{ $noticia->titulo  }}'>
<meta property="og:description" content='{{ $noticia->descripcion }}'>
<meta property="og:url" content='' >
<meta property="og:image" content='' >
<meta property="fb:admins" content='1434798696787255'>
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
                        <p class="details">{{ $noticia->category->titulo }} | {{ $noticia->published_at }}
                        <span class="redaccion">Autor: {{ $noticia->redaccion }}</span></p>
                    </div>
                </div>


                @if($noticia->video <> "")
                <div class="video">
                    <iframe width="100%" height="500px" src="//www.youtube.com/embed/{{ $noticia->video }}?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
                @elseif(count($noticiaFotos) > 0)
                <div class="row">
                    <div class="post-slider col-md-12 col-sm-12">
                        <div class="controls">
                            <p class="prev"><i class="fa fa-angle-left"></i></p>
                            <p class="next"><i class="fa fa-angle-right"></i></p>
                        </div>
                        <div class="slides">
                            @foreach($noticiaFotos as $item)
                            <img src="/upload/{{ $item->imagen_carpeta."870x500/".$item->imagen }}" alt="post-image" >
                            @endforeach
                        </div>
                    </div>
                </div>
                @elseif(count($noticiaFotos) == 0)
                    @if($noticia->imagen <> "")
                    <div class="info imagen">
                        <img src="/upload/{{ $noticia->imagen_carpeta."870x500/".$noticia->imagen }}" alt="post-image">
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
            <h3>Sobre el Autor</h3>
            <article class="row mid member">
                <img src="img/author.jpg" alt="author">
                <div class="info">
                    <h1><a href="author.html">@{{ }}</a></h1>
                    <p class="text">@{{  }}</p>
                    <ul class="social list-inline">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa  fa-tumblr"></i></a></li>
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

                <div class="fb-comments" data-href="/nota/{{ $noticia->id."-".$noticia->slug_url }}" data-width="840" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <!-- FIN COMENTARIOS -->

        </div>
        <!--END CONTENT-->

        @include('frontend.sidebar')

    </div>

</div>
<!--END MAIN SECTION-->

@stop