@extends('layouts.frontend')

@section('html_title')
    {{ $noticia->titulo }} | @parent
@stop

{{--*/
$noticia_titulo = $noticia->titulo;
$noticia_url = route('home.noticia', [$noticia->id, $noticia->slug_url]);
$noticia_descripcion = $noticia->descripcion;
$noticia_img = configWeb()->dominio."/upload/".$noticia->imagen_carpeta."870x500/".$noticia->imagen;
$noticia_contenido = $noticia->contenido;

$noticia_categoria = $noticia->category->titulo;
$noticia_categoria_url = route('home.noticia.categoria', [$noticia->category->slug_url]);
/*--}}

@section('contenido_header')
<!-- Open Graph -->
<meta property="og:title" content='{{ $noticia_titulo  }}'>
<meta property="og:type" content='article' >
<meta property="og:url" content='{{ $noticia_url }}' >
<meta property="og:image" content='{{ $noticia_img }}' >
<meta property="og:site_name" content='{{ configWeb()->titulo }}' >
<meta property="fb:admins" content='1434798696787255'>
<meta property="og:description" content='{{ $noticia->descripcion }}'>
<!-- fin Open Graph -->
@stop

@section('contenido_body')

	<!-- Main -->
	<section id="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="post-wrap posts post-single">
						<article class="post">

							<div class="head-post">
								<h2>{{ $noticia_titulo }}</h2>
                                <p>{{ $noticia_descripcion }}</p>

                                <div class="meta">
                                    <span class="author"><a href="{{ $noticia_categoria_url }}">{{ $noticia_categoria }}</a></span>
                                    <span class="time">| Publicado el: {{ date_format(new DateTime($noticia->published_at), 'd/m/Y H:m')  }}</span>
                                </div>

                                @if($noticia->video <> "")
                                    <div class="video">
                                        <iframe width="100%" height="500px" src="//www.youtube.com/embed/{{ $noticia->video }}?rel=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                @elseif(count($noticiaFotos) > 0)
                                    <div class="noticias gnSlider gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                                        <div class="flex-container-noticias">
                                            <div class="flexslider loading">
                                                <ul class="slides">
                                                    @foreach($noticiaFotos as $item)
                                                        {{--*/
                                                        $nota_titulo = $item->titulo;
                                                        $nota_url = route('home.noticia', [$item->id, $item->slug_url]);
                                                        $nota_imagen = "/upload/".$item->imagen_carpeta."870x600/".$item->imagen;
                                                        /*--}}
                                                        <li>
                                                            <div class="item-wrap">
                                                                <a href="{{ $nota_url }}">
                                                                    <img src="{{ $nota_imagen }}" alt="image">
                                                                </a>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!-- /.gnSlider -->
                                @elseif(count($noticiaFotos) == 0)
                                    @if($noticia->imagen <> "")
                                        <div class="info imagen">
                                            <img src="{{ $noticia_img }}" alt="{{ $noticia->titulo }}">
                                        </div>
                                    @endif
                                @endif

							</div><!-- /.head-post -->

							<div class="body-post">

                                <div class="share-post">
									<ul>
										<li class="count-share"><span class="numb">23</span><span>shares</span></li>
										<li class="email"><a href="">Email</a></li>
										<li class="facebook"><a href="">Facebook</a></li>
										<li class="twitter"><a href="">Twitter</a></li>
										<li class="more"><a href="">More</a></li>
									</ul>
								</div><!-- /.share-post -->

								<div class="main-post">

                                    <div class="entry-post">
                                        {{ $noticia_contenido }}
									</div><!-- /.entry-post -->

									<div class="help-post">
                                        @if($noticiaTags<>"")
                                            <div class="tags">

                                                @foreach($noticiaTags as $item)
                                                    {{--*/ $tag = tagsNoticia($item); /*--}}
                                                    <a href="{{ route('home.noticia.tags', [$tag->id, $tag->slug_url]) }}">{{ $tag->titulo }}</a>
                                                @endforeach

                                            </div>
                                        @endif
									</div><!-- /.help-post -->

                                    @if($noticia->category->slug_url == "reportero-ciudadano")
                                        {{--*/
                                        $reporteroNombreCompleto = $noticia->user->profile->nombre." ".$noticia->user->profile->apellidos;
                                        $reporteroUrlImg = "/upload/reportero/150x165/".$noticia->user->profile->imagen;
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
                                        <div class="author-post">
                                            <div class="avatar-author">
                                                @if($noticia->user->profile->imagen<>"")
                                                    <img class="imgBorder50" src="{{ $reporteroUrlImg }}" alt="{{ $reporteroNombreCompleto }}">
                                                @else
                                                    <img src="/imagenes/rciud/usuario.jpg" height="100%" alt="Reportero Ciudadano"/>
                                                @endif
                                            </div>

                                            <div class="info-author">
                                                <h4>{{ $reporteroNombreCompleto }}</h4>
                                                <p>{{{ $reporteroDescripcion }}}</p>
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
                                        </div><!-- /.author-post -->
                                    @endif

					               	<div class="comment-post">
                                        <div id="fb-root"></div>
                                        <script>(function(d, s, id) {
                                                var js, fjs = d.getElementsByTagName(s)[0];
                                                if (d.getElementById(id)) return;
                                                js = d.createElement(s); js.id = id;
                                                js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3";
                                                fjs.parentNode.insertBefore(js, fjs);
                                            }(document, 'script', 'facebook-jssdk'));</script>

                                        <div class="fb-comments" data-href="{{ $noticia_url }}" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
					            	</div><!-- /.comment-post -->

					            	<div class="relate-posts">
						            	<div class="section-title">
											<h4><a href="#">Noticias Relacionadas</a></h4>
										</div>
										<div class="post-wrap">

                                            @foreach ($notRel as $item)
                                                {{--*/
                                                $titulo = $item->titulo;
                                                $descripcion = $item->descripcion;
                                                $imagen = "/upload/".$item->imagen_carpeta."172x120/".$item->imagen;
                                                $url = "/nota/".$item->id."-".$item->slug_url;
                                                $fecha = date_format(new DateTime($item->published_at), 'd/m/Y H:m');
                                                /*--}}

                                                <article class="post">
                                                    <div class="thumb">
                                                        <a href="{{ $url }}"><img src="{{ $imagen }}" alt="img"></a>
                                                    </div>
                                                    <div class="content">
                                                        <h3><a href="{{ $url }}">{{ $titulo }}</a></h3>
                                                        <p class="excerpt-entry">{{ $descripcion }}</p>
                                                        <div class="post-meta">
                                                            <span class="time">{{ $fecha }}</span>
                                                        </div>
                                                    </div>
                                                </article><!-- /.post -->

                                            @endforeach

										</div>
					            	</div><!-- /.relate-posts -->

								</div><!-- /.main-post -->
							</div><!-- /.body-post -->
						</article><!-- /.post -->
					</div><!-- /.post-wrap -->
				</div><!-- /.col-md-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>

@stop