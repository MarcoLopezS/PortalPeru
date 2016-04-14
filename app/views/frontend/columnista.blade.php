@extends('layouts.frontend')

{{--*/
$columnista_nombre = $columnista->nombre." ".$columnista->apellidos;
$columnista_url = route('home.columnistas.person', [$columnista->id, $columnista->slug_url]);
$columnista_foto = '/upload/columnista/'.$columnista->imagen_portada;
$columnista_descripcion = $columnista->descripcion;
/*--}}

@section('html_title')
    {{ $columnista_nombre }} | @parent
@stop

@section('contenido_body')

	<!-- Main -->
	<section id="main" class="about-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="about-page-wrap">

                        <div class="content-right entry-page category-page">

                            <div class="post-wrap">

                                @foreach($columnas as $item)
                                    {{--*/
                                    $nota_titulo = $item->titulo;
                                    $nota_url = route('home.columnistas.column', [$columnista->id, $columnista->slug_url, $item->id, $item->slug_url]);
                                    $nota_descripcion = $item->descripcion;
                                    $nota_imagen = "/upload/".$item->imagen_carpeta."364x220/".$item->imagen;
                                    $nota_fecha = date_format(new DateTime($item->created_at), 'd/m/Y');
                                    /*--}}
                                    <article class="post">
                                        <div class="thumb">
                                            <a href="{{ $nota_url }}"><img src="{{ $nota_imagen }}" alt="img"></a>
                                        </div>
                                        <div class="content">
                                            <div class="cat"><a href="javascript;;">{{ $nota_fecha }}</a></div>
                                            <h3><a href="{{ $nota_url }}">{{ $nota_titulo }}</a></h3>
                                            <p class="excerpt-entry">{{ $nota_descripcion }}</p>
                                        </div>
                                    </article><!--  /.post -->
                                @endforeach

                            </div>

                            <div id="paginacion">
                                {{ $columnas->links() }}
                            </div>

						</div><!-- /.content-right -->

                        <div class="content-left">
                            <img src="{{ $columnista_foto }}" alt="{{ $columnista_nombre }}" class="border-radius">
                            <h5 class="title">{{ $columnista_nombre }}</h5>
                            <p>{{ $columnista_descripcion }}</p>
						</div><!-- /.content-left -->

					</div><!-- /.about-page-wrap -->
				</div><!-- /.col-md-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>

@stop