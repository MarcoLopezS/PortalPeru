@extends('layouts.frontend')

@section('contenido_body')

    <!-- Main -->
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="noticias gnSlider gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                        <div class="flex-container-noticias">
                            <div class="flexslider loading">
                                <ul class="slides">
                                    @foreach($bicentenarioSup as $item)
                                    {{--*/
                                    $nota_titulo = $item->titulo;
                                    $nota_url = route('home.noticia', [$item->id, $item->slug_url]);
                                    $nota_imagen = "upload/".$item->imagen_carpeta."750x445/".$item->imagen;
                                    /*--}}
                                    <li>
                                        <div class="item-wrap">
                                            <a href="{{ $nota_url }}">
                                                <img src="{{ $nota_imagen }}" alt="image">
                                                <p class="item" data-bottomtext="0">{{ $nota_titulo }}</p>
                                            </a>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div><!-- /.gnSlider -->

                    <div class="featured-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                        <div class="gn-line"></div>
                        <div class="section-title">
                            <h4><a href="#">Bicentenario</a></h4>
                        </div>

                        {{--*/ $i = 1; /*--}}
                        @foreach($bicentenarioInf as $item)
                            {{--*/
                            $post_titulo = $item->titulo;
                            $post_url = route('home.noticia', [$item->id, $item->slug_url]);
                            $post_descripcion = $item->descripcion;
                            $post_imagen = '/upload/'.$item->imagen_carpeta.'460x320/'.$item->imagen;

                            $post_categoria = $item->category->titulo;
                            $post_categoria_url = route('home.noticia.categoria', $item->category->slug_url);
                            /*--}}

                            @if($i == 1)

                                <div class="content-left">
                                    <article class="post">
                                        <div class="thumb">
                                            <a href="{{ $post_url }}"><img src="{{ $post_imagen }}" alt="img"></a>
                                        </div>
                                        <div class="cat">
                                            <a href="{{ $post_categoria_url }}">{{ $post_categoria }}</a>
                                        </div>
                                        <h3><a href="{{ $post_url }}">{{ $post_titulo }}</a></h3>
                                        <p class="excerpt-entry">{{ $post_descripcion }}</p>
                                    </article><!--  /.post -->
                                </div><!-- /.content-left -->

                            @else

                                <div class="content-right">
                                    <article class="post">
                                        <div class="thumb">
                                            <a href="{{ $post_url }}"><img src="{{ $post_imagen }}" alt="img"></a>
                                        </div>
                                        <div class="cat">
                                            <a href="{{ $post_categoria_url }}">{{ $post_categoria }}</a>
                                        </div>
                                        <h3><a href="{{ $post_url }}">{{ $post_titulo }}</a></h3>
                                    </article>
                                </div>

                            @endif

                            {{--*/ $i++; /*--}}
                        @endforeach

                    </div><!-- /.featured-posts -->

                </div><!-- /.col-md-8 -->

                @include('frontend.partials.side-bar')

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

@stop