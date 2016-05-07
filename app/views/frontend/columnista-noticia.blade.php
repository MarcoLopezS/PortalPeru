@extends('layouts.frontend')

{{--*/
$columnista_nombre = $columnista->nombre." ".$columnista->apellidos;
$columnista_url = route('home.columnistas.person', [$columnista->id, $columnista->slug_url]);
$columnista_foto = '/upload/columnista/'.$columnista->imagen_portada;
$columnista_descripcion = $columnista->descripcion;

$noticia_titulo = $columna->titulo;
$noticia_url = route('home.columnistas.column', [$columnista->id, $columnista->slug_url, $columna->id, $columna->slug_url]);
$noticia_descripcion = $columna->descripcion;
$noticia_img = configWeb()->dominio."/upload/".$columna->imagen_carpeta."870x500/".$columna->imagen;
$noticia_contenido = $columna->contenido;
$noticia_fecha = date_format(new DateTime($columna->created_at), 'd/m/Y H:m');
/*--}}

@section('html_title')
    {{ $noticia_titulo }} | @parent
@stop

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
	<section id="main" class="about-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

                    <div class="about-page-wrap nota">

					    <div class="content-right post-wrap posts post-single">

                            <article class="post">

                                <div class="head-post">
                                    <h2>{{ $noticia_titulo }}</h2>
                                    <p>{{ $noticia_descripcion }}</p>

                                    <div class="meta">
                                        <span class="time">Publicado el: {{ $noticia_fecha }}</span>
                                    </div>

                                    {{-- AddThis --}}
                                    <div class="addthis_native_toolbox"></div>

                                    @if($columna->imagen <> "")
                                        <div class="info imagen">
                                            <img src="{{ $noticia_img }}" alt="{{ $noticia_titulo }}">
                                        </div>
                                    @endif

                                </div><!-- /.head-post -->

                                <div class="body-post">

                                    <div class="main-post">

                                        <div class="entry-post">
                                            {{ $noticia_contenido }}
                                        </div><!-- /.entry-post -->

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

                        <div class="content-left">
                            <span class="author"><a href="{{ $columnista_url }}">{{ $columnista_nombre }}</a></span>
                            <img src="{{ $columnista_foto }}" alt="{{ $columnista_nombre }}" class="border-radius">
                            <p>{{ $columnista_descripcion }}</p>
                        </div><!-- /.content-left -->

                    </div>
				</div><!-- /.col-md-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>

@stop