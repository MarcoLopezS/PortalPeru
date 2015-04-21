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

                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <style type="text/css">
                        .adslot_home { width: 320px; height: 300px; }
                        @media (min-width:500px) { .adslot_home { width: 468px; height: 300px; } }
                        @media (min-width:800px) { .adslot_home { width: 255px; height: 255px; } }
                    </style>
                    <ins class="adsbygoogle adslot_home"
                         style="display:block"
                         data-ad-client="ca-pub-8629542769595128"
                         data-ad-slot="1421908493"
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

                @foreach($post_6 as $item)
                <article class="col-md-8 col-sm-8 big">
                    <div class="img">
                        <a href="/nota/{{ $item->id."-".$item->slug_url }}">
                            <img class="width100" src="upload/{{ $item->imagen_carpeta."540x360/".$item->imagen }}" alt="{{ $item->titulo }}">
                        </a>
                    </div>
                    <div class="info2">
                        <p class="tags">
                            <a href="/seccion/{{ $item->category->slug_url }}">{{ $item->category->titulo }}</a>
                        </p>
                        <h1><a href="/nota/{{ $item->id."-".$item->slug_url }}">{{ $item->titulo }}</a></h1>
                    </div>
                </article>
                @endforeach

            </div>
            <!-- FIN NOTICIA INFERIOR -->

            <!-- NOTICIA INFERIOR HORIZONTAL -->
            <div class="row">

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

                @foreach($post_9 as $item)
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
