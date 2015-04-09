@extends('layouts.frontend')

@section('script_header')
<!-- Open Graph -->
<meta property="og:type" content='article' >
<meta property="og:site_name" content='' >
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
                        <span class="redaccion">{{ $noticia->redaccion }}</span></p>
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
                  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=258988607636876";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

                <div class="fb-comments" data-href="" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <!-- FIN COMENTARIOS -->

        </div>
        <!--END CONTENT-->

        <!--SIDEBAR-->
        <aside class="col-md-3 col-sm-12">

            <!-- COLUMNISTAS -->
            <div class="most-discussed col-md-12 col-sm-6 columnistas">
                <h4>Columnistas</h4>

                <article class="small clearfix">
                    <img src="" alt="post" width="75">
                    <div class="info">
                        <h1><a href=""></a></h1>
                        <p class="details">
                            <a href=""></a>
                        </p>
                    </div>
                </article>
                <a href="columnistas" class="btn btn-default">Ver todos</a>
            </div>
            <!-- FIN COLUMNISTAS -->

            <!-- PUBLICIDAD -->
            <div class="banner visible-xs visible-md visible-lg">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- PP - Responsive - 271x350 -->
                <ins class="adsbygoogle"
                     style="display:inline-block;width:271px;height:350px"
                     data-ad-client="ca-pub-3674889010429322"
                     data-ad-slot="4554110744"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            <!-- PUBLICIDAD -->

            <div class="hidden-xs hidden-sm hidden-md hidden-lg"></div>

            <!-- GALERIA DE FOTOS -->
            <div class="flickr col-md-12 col-sm-6">
                <h4>Galería de Imágenes</h4>
            </div>
            <!-- FIN GALERIA DE FOTOS -->

            <!-- SUSCRIPCION -->
            <div class="newsletter visible-md visible-lg">
                <h3>Mantente al dia</h3>
                <p>Suscribe y recive por mail lo ultimo en informacion y participa de nuestros sorteos</p>
                <form action="POST">
                    <input type="email" class="form-control" placeholder="Enter your email">
                    <input type="submit" value="suscribete" class="btn btn-default btn-block">
                </form>
            </div>
            <!-- FIN SUSCRIPCION -->

        </aside>
        <!--END SIDEBAR-->

    </div>

</div>
<!--END MAIN SECTION-->

@stop