@extends('layouts.frontend')

@section('contenido_frontend')

<!--MAIN SECTION-->
<div class="main">

    <div class="row">

        <!--CONTENT-->
        <div class="posts col-lg-9 col-md-9 col-sm-12">

            <!-- NOTICIA SUPERIOR -->
            <div class="row">

                <!-- POST SLIDER -->
                <div class="post-slider slider-home col-lg-8 col-md-8 col-sm-12">

                    <div class="controls">
                        <p class="prev"><i class="fa fa-angle-left"></i></p>
                        <p class="next"><i class="fa fa-angle-right"></i></p>
                    </div>

                    <div class="slides">
                        @foreach($post_1 as $item)
                        <article class="big clearfix">
                            <img class="width100" src="upload/{{ $item->imagen_carpeta."540x425/".$item->imagen }}" alt="{{ $item->titulo }}">
                            <div class="info">
                                <p class="tags">
                                    <a href="seccion/{{ $item->category->slug_url }}">{{ $item->category->titulo }}</a>
                                </p>
                                <h1><a href="nota/{{ $item->id."-".$item->slug_url }}">{{ $item->titulo }}</a></h1>
                            </div>
                        </article>
                        @endforeach

                    </div>

                </div>
                <!-- FIN POST SLIDER -->

                <!-- NOTICIA CENTRAL -->
                @foreach($post_2 as $item)
                <article class="col-lg-4 col-md-4 col-sm-12 mid marginTop20">
                    <div class="img">
                        <img class="width100" src="upload/{{ $item->imagen_carpeta."280x190/".$item->imagen }}" alt="{{ $item->titulo }}">
                    </div>
                    <div class="info">
                        <p class="tags">
                            <a href="seccion/{{ $item->category->slug_url }}">{{ $item->category->titulo }}</a>
                        </p>
                        <h1><a href="nota/{{ $item->id."-".$item->slug_url }}">{{ $item->titulo }}</a></h1>
                        <p class="details hidden-sm hidden-xs">{{{ $item->updated_at->diffForHumans() }}}</p>
                        <p class="text">{{ $item->descripcion }}</p>
                    </div>
                </article>
                @endforeach
                <!-- FIN NOTICIA CENTRAL -->

            </div>
            <!-- FIN NOTICIA SUPERIOR -->

            <!-- NOTICIA CENTRAL -->
            <div class="row">

                <!-- PUBLICIDAD -->
                <article class="col-md-4 col-sm-4 mid">
                    <style type="text/css">
                        .adslot_home { width: 320px; height: 300px; }
                        @media (min-width:500px) { .adslot_home { width: 468px; height: 300px; } }
                        @media (min-width:800px) { .adslot_home { width: 255px; height: 255px; } }
                    </style>
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle adslot_home"
                         style="display:block"
                         data-ad-client="ca-pub-3674889010429322"
                         data-ad-slot="1879845946"
                         data-ad-format="auto"></ins>
                    <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </article>
                <!-- FIN PUBLICIDAD -->

                <!-- NOTICIA CENTRAL -->
                @foreach($post_3 as $item)
                <article class="col-md-4 col-sm-4 mid">
                    <div class="img">
                        <img class="width100" src="upload/{{ $item->imagen_carpeta."280x190/".$item->imagen }}" alt="{{ $item->titulo }}">
                    </div>
                    <div class="info">
                        <p class="tags">
                            <a href="seccion/{{ $item->category->slug_url }}">{{ $item->category->titulo }}</a>
                        </p>
                        <h1><a href="nota/{{ $item->id."-".$item->slug_url }}">{{ $item->titulo }}</a></h1>
                        <p class="details hidden-sm hidden-xs">{{{ $item->updated_at->diffForHumans() }}}</p>
                        <p class="text">{{ $item->descripcion }}</p>
                    </div>
                </article>
                @endforeach
                <!-- FIN NOTICIA CENTRAL -->

                <!-- NOTICIA CENTRAL -->
                @foreach($post_4 as $item)
                <article class="col-md-4 col-sm-4 mid">
                    <div class="img">
                        <img class="width100" src="upload/{{ $item->imagen_carpeta."280x190/".$item->imagen }}" alt="{{ $item->titulo }}">
                    </div>
                    <div class="info">
                        <p class="tags">
                            <a href="seccion/{{ $item->category->slug_url }}">{{ $item->category->titulo }}</a>
                        </p>
                        <h1><a href="nota/{{ $item->id."-".$item->slug_url }}">{{ $item->titulo }}</a></h1>
                        <p class="details hidden-sm hidden-xs">{{{ $item->updated_at->diffForHumans() }}}</p>
                        <p class="text">{{ $item->descripcion }}</p>
                    </div>
                </article>
                @endforeach
                <!-- FIN NOTICIA CENTRAL -->

            </div>
            <!-- FIN NOTICIA CENTRAL -->

            <!-- NOTICIA INFERIOR -->
            <div class="row">

                @foreach($post_5 as $item)
                <article class="col-md-4 col-sm-4 mid">
                    <div class="img">
                        <img class="width100" src="upload/{{ $item->imagen_carpeta."280x190/".$item->imagen }}" alt="{{ $item->titulo }}">
                    </div>
                    <div class="info">
                        <p class="tags">
                            <a href="seccion/{{ $item->category->slug_url }}">{{ $item->category->titulo }}</a>
                        </p>
                        <h1><a href="nota/{{ $item->id."-".$item->slug_url }}">{{ $item->titulo }}</a></h1>
                        <p class="details hidden-sm hidden-xs">{{{ $item->updated_at->diffForHumans() }}}</p>
                        <p class="text">{{ $item->descripcion }}</p>
                    </div>
                </article>
                @endforeach

                @foreach($galeria as $item)
                <article class="col-md-8 col-sm-8 big">
                    <div class="img">
                        <a href="lima-foto">
                            <img class="width100" src="upload/{{ $item->imagen_carpeta."540x400/".$item->imagen }}" alt="{{ $item->titulo }}">
                        </a>
                        <div class="info2">
                            <p>{{ $item->titulo }}</p>
                            <p>Foto: {{ $item->descripcion }}</p>
                        </div>
                    </div>                    
                    <div class="col-md-6 col-sm-9 col-xs-8 fotos-lima-opciones pull-left">
                        <img src="imagenes/icon-fotos-lima.png" width="250" alt="">
                    </div>
                    <div class="col-md-6 col-sm-3 col-xs-4 fotos-lima-opciones">
                        <a href="lima-foto" class="pull-right btn btn-default">Ver más</a>
                    </div>
                </article>
                @endforeach

            </div>
            <!-- FIN NOTICIA INFERIOR -->

            <!-- NOTICIA INFERIOR HORIZONTAL -->
            <div class="row">

                @foreach($post_6 as $item)
                <article class="col-md-4 col-sm-4 mid">
                    <div class="img">
                        <img class="width100" src="upload/{{ $item->imagen_carpeta."280x190/".$item->imagen }}" alt="{{ $item->titulo }}">
                    </div>
                    <div class="info">
                        <p class="tags">
                            <a href="seccion/{{ $item->category->slug_url }}">{{ $item->category->titulo }}</a>
                        </p>
                        <h1><a href="nota/{{ $item->id."-".$item->slug_url }}">{{ $item->titulo }}</a></h1>
                        <p class="details hidden-sm hidden-xs">{{{ $item->updated_at->diffForHumans() }}}</p>
                        <p class="text">{{ $item->descripcion }}</p>
                    </div>
                </article>
                @endforeach

                @foreach($post_7 as $item)
                <article class="col-md-4 col-sm-4 mid">
                    <div class="img">
                        <img class="width100" src="upload/{{ $item->imagen_carpeta."280x190/".$item->imagen }}" alt="{{ $item->titulo }}">
                    </div>
                    <div class="info">
                        <p class="tags">
                            <a href="seccion/{{ $item->category->slug_url }}">{{ $item->category->titulo }}</a>
                        </p>
                        <h1><a href="nota/{{ $item->id."-".$item->slug_url }}">{{ $item->titulo }}</a></h1>
                        <p class="details hidden-sm hidden-xs">{{{ $item->updated_at->diffForHumans() }}}</p>
                        <p class="text">{{ $item->descripcion }}</p>
                    </div>
                </article>
                @endforeach

                @foreach($post_8 as $item)
                <article class="col-md-4 col-sm-4 mid">
                    <div class="img">
                        <img class="width100" src="upload/{{ $item->imagen_carpeta."280x190/".$item->imagen }}" alt="{{ $item->titulo }}">
                    </div>
                    <div class="info">
                        <p class="tags">
                            <a href="seccion/{{ $item->category->slug_url }}">{{ $item->category->titulo }}</a>
                        </p>
                        <h1><a href="nota/{{ $item->id."-".$item->slug_url }}">{{ $item->titulo }}</a></h1>
                        <p class="details hidden-sm hidden-xs">{{{ $item->updated_at->diffForHumans() }}}</p>
                        <p class="text">{{ $item->descripcion }}</p>
                    </div>
                </article>
                @endforeach

            </div>
            <!-- FIN NOTICIA INFERIOR HORIZONTAL -->

        </div>
        <!--END CONTENT-->

        @include('frontend.sidebar')

    </div>

</div>
<!--END MAIN SECTION-->

@stop
