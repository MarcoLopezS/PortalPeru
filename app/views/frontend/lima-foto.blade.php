@extends('layouts.frontend')

@section('html_title')
    {{ $galeria->titulo }} | @parent
@stop

{{--*/
$noticia_titulo = $galeria->titulo;
$noticia_url = route('home.noticia', [$galeria->id, $galeria->slug_url]);
$noticia_descripcion = $galeria->descripcion;
$noticia_img = configWeb()->dominio."upload/".$galeria->imagen_carpeta.$galeria->imagen;
$noticia_fecha = date_format(new DateTime($galeria->published_at), 'd/m/Y H:m');
/*--}}

@section('contenido_header')
<!-- Open Graph -->
<meta property="og:title" content='{{ $noticia_titulo  }}'>
<meta property="og:type" content='article' >
<meta property="og:url" content='{{ $noticia_url }}' >
<meta property="og:image" content='{{ $noticia_img }}' >
<meta property="og:site_name" content='{{ configWeb()->titulo }}' >
<meta property="fb:admins" content='1434798696787255'>
<meta property="og:description" content='{{ $noticia_descripcion }}'>
<!-- fin Open Graph -->
@stop

@section('contenido_body')

	<!-- Main -->
	<section id="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="posts post-single">
						<article class="post">

							<div class="head-post">
								<h2>{{ $noticia_titulo }}</h2>
                                <p>Foto: {{ $noticia_descripcion }}</p>

                                <div class="meta">
                                    <span class="time">Publicado el: {{ $noticia_fecha }}</span>
                                </div>

                                <div class="info imagen">
                                    <img src="{{ $noticia_img }}" alt="{{ $noticia_titulo }}">
                                </div>

							</div><!-- /.head-post -->

							<div class="body-post">

								<div class="main-post">

                                    {{-- AddThis --}}
                                    <div class="addthis_native_toolbox"></div>

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

								</div><!-- /.main-post -->
							</div><!-- /.body-post -->
						</article><!-- /.post -->
					</div><!-- /.post-wrap -->
				</div><!-- /.col-md-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>

@stop