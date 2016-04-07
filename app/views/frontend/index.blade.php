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

                    <div class="popular-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                        <div class="gn-line"></div>
                        <div class="section-title">
                            <h4><a href="#">Hechos</a></h4>
                        </div>

                        {{--*/ $i = 1; /*--}}
                        @foreach($hechos as $item)
                        {{--*/
                        $post_titulo = $item->titulo;
                        $post_url = route('home.noticia', [$item->id, $item->slug_url]);
                        $post_descripcion = $item->descripcion;
                        $post_imagen = '/upload/'.$item->imagen_carpeta.'500x320/'.$item->imagen;
                        $post_fecha = date_format(new DateTime($item->published_at), 'd/m/Y');

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
                            </article>
                        </div>

                        @else
                        {{--*/ if($i==2){$post_class = 'popular-posts-first';}else{$post_class = '';} /*--}}

                        <div class="content-right {{ $post_class }}">

                            <article class="post">
                                <div class="thumb">
                                    <a href="{{ $post_url }}"><img src="{{ $post_imagen }}" alt="img"></a>
                                </div>
                                <div class="content">
                                    <h3><a href="{{ $post_url }}">{{ $post_titulo }}</a></h3>
                                    <span class="date">{{ $post_fecha }}</span>
                                </div>
                            </article>

                        </div>

                        @endif

                        {{--*/ $i++; /*--}}
                        @endforeach

                    </div>

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

                @include('frontend.partials.sidebar')

                <div class="col-md-12">
                    <div class="miraperu gnSlider gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                        <div class="flex-container-miraperu">
                            <div class="flexslider loading">
                                <ul class="slides">

                                    @foreach($galeria as $item)
                                    {{--*/
                                    $nota_titulo = $item->titulo;
                                    $nota_foto = $item->descripcion;
                                    $nota_url = route('home.noticia', [$item->id, $item->slug_url]);
                                    $nota_imagen = "upload/".$item->imagen_carpeta."1132x670/".$item->imagen;
                                    /*--}}
                                    <li>
                                        <div class="item-wrap">
                                            <img src="{{ $nota_imagen }}" alt="image">
                                            <p class="item" data-bottomtext="0">{{ $nota_titulo }} <br> Foto: {{ $nota_foto }}</p>
                                        </div>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div><!-- /.gnSlider -->
                </div><!-- /.col-md-12 -->

                <div class="col-md-8">
                    <div class="social-media-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                        <div class="gn-line"></div>
                        <div class="section-title">
                            <h4><a href="#">Tecnología</a></h4>
                        </div>

                        @foreach($tecnologia as $item)
                        {{--*/
                        $post_titulo = $item->titulo;
                        $post_url = route('home.noticia', [$item->id, $item->slug_url]);
                        $post_descripcion = $item->descripcion;
                        $post_imagen = '/upload/'.$item->imagen_carpeta.'364x244/'.$item->imagen;

                        $post_categoria = $item->category->titulo;
                        $post_categoria_url = route('home.noticia.categoria', $item->category->slug_url);
                        /*--}}
                        <article class="post">
                            <div class="thumb">
                                <a href="{{ $post_url }}"><img src="{{ $post_imagen }}" alt="{{ $post_titulo }}"></a>
                            </div>
                            <div class="content">
                                <div class="cat">
                                    <a href="{{ $post_categoria_url }}">{{ $post_categoria }}</a>
                                </div>
                                <h3><a href="{{ $post_url }}">{{ $post_titulo }}</a></h3>
                                <p class="excerpt-entry">{{ $post_descripcion }}</p>
                            </div>
                        </article>
                        @endforeach

                    </div><!-- /.social-media-posts -->
                </div><!-- /.col-md-8 -->

                <div class="col-md-4">
                    <div class="highlights-posts gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
                        <div class="gn-line"></div>
                        <div class="section-title">
                            <h4><a href="#">Entrevista</a></h4>
                        </div>

                        {{--*/ $i = 1; /*--}}
                        @foreach($entrevista as $item)
                        {{--*/
                        $post_titulo = $item->titulo;
                        $post_url = route('home.noticia', [$item->id, $item->slug_url]);
                        $post_descripcion = $item->descripcion;
                        $post_imagen = '/upload/'.$item->imagen_carpeta.'364x244/'.$item->imagen;

                        $post_categoria = $item->category->titulo;
                        $post_categoria_url = route('home.noticia.categoria', $item->category->slug_url);
                        if($i%2==0){$post_class = 'last';}else{$post_class = '';}
                        /*--}}
                        <article class="post {{ $post_class }}">
                            <div class="thumb">
                                <a href="{{ $post_url }}"><img src="{{ $post_imagen }}" alt="{{ $post_titulo }}"></a>
                            </div>
                            <div class="cat">
                                <a href="{{ $post_categoria_url }}">{{ $post_categoria }}</a>
                            </div>
                            <h3><a href="{{ $post_url }}">{{ $post_titulo }}</a></h3>
                        </article>
                        {{--*/ $i++; /*--}}
                        @endforeach

                    </div><!-- /.highlights-posts -->
                </div><!-- /.col-md-4 -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

@stop