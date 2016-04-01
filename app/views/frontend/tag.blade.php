@extends('layouts.frontend')

@section('html_title')
    {{ $categoria->titulo }} | @parent
@stop

@section('contenido_body')

            <!-- Main -->
    <section id="main" class="category-page">
        <div class="container">
            <div class="row">

                <div class="col-md-8">

                    <h2 class="title-category">{{ $categoria->titulo }}</h2>

                    <div class="post-wrap">

                        @foreach($noticias as $item)
                        {{--*/
                        $nota_titulo = $item->titulo;
                        $nota_url = route('home.noticia', [$item->id, $item->slug_url]);
                        $nota_descripcion = $item->descripcion;
                        $nota_imagen = "/upload/".$item->imagen_carpeta."364x244/".$item->imagen;
                        /*--}}
                        <article class="post">
                            <div class="thumb">
                                <a href="{{ $nota_url }}"><img src="{{ $nota_imagen }}" alt="img"></a>
                            </div>
                            <div class="content">
                                <h3><a href="{{ $nota_url }}">{{ $nota_titulo }}</a></h3>
                                <p class="excerpt-entry">{{ $nota_descripcion }}</p>
                            </div>
                        </article><!--  /.post -->
                        @endforeach

                    </div><!-- /.social-media-posts -->

                    <div id="paginacion">
                        {{ $noticias->links() }}
                    </div>
                </div><!-- /.col-md-8 -->

                @include('frontend.partials.sidebar')

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

@stop