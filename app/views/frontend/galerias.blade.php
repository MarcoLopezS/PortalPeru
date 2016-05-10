@extends('layouts.frontend')

@section('html_title')
    Lima en una Foto | @parent
@stop

@section('contenido_body')

            <!-- Main -->
    <section id="main" class="category-page">
        <div class="container">
            <div class="row">

                <div class="col-md-8">

                    <h2 class="title-category">Lima en una Foto</h2>

                    <div class="post-wrap">

                        <div class="row">

                            @foreach($galerias as $item)
                            {{--*/
                            $nota_titulo = $item->titulo;
                            $nota_url = route('home.fotos.lima', [$item->slug_url]);
                            $nota_descripcion = $item->descripcion;
                            $nota_imagen = "/upload/".$item->imagen_carpeta."360x244/".$item->imagen;
                            /*--}}
                            <article class="post col-md-6">
                                <div class="thumb">
                                    <a href="{{ $nota_url }}"><img src="{{ $nota_imagen }}" alt="img"></a>
                                </div>
                            </article><!--  /.post -->
                            @endforeach

                        </div>

                    </div><!-- /.social-media-posts -->

                    <div id="paginacion">
                        {{ $galerias->links() }}
                    </div>
                </div><!-- /.col-md-8 -->

                @include('frontend.partials.side-bar')

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

@stop