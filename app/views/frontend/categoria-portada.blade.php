@extends('layouts.frontend-portada')

@section('html_title')
{{ $categoria->titulo }} |
@parent
@stop

@section('portada_titulo')
{{--*/
$descripcion = explode('-', $categoria->imagen_descripcion);
$imagenP = $descripcion[0];
$imagenH2 = $descripcion[1];
/*--}}
<div class="datos-foto">
    <div class="container">
        <div class="datos pull-left">
            <p>{{ $imagenP }}</p>
            <h2>{{ $imagenH2 }}</h2>
        </div>
        <div class="logo-mira-peru pull-right">
            <img src="/upload/{{ $categoria->logo }}" height="40" alt="">
        </div>
    </div>
</div>
@stop

@section('contenido_frontend_portada')
<div class="posts col-lg-9 col-md-9 col-sm-12">

    <!-- NOTICIA SUPERIOR -->
    <div class="row" id="mira-peru-superior">

        {{--*/ $i = 1; /*--}}

        @foreach($noticias as $item)

        <article id="{{ $i }}" class="">
            <div class="img">
                <a href="/nota/{{ $item->id."-".$item->slug_url }}">
                    <img class="width100" data-carpeta="/upload/{{ $item->imagen_carpeta }}" data-imagen="{{ $item->imagen }}" src="" alt="{{ $item->titulo }}">
                </a>
                
                <div class="info2">
                    <h1><a href="/nota/{{ $item->id."-".$item->slug_url }}">{{ $item->titulo }}</a></h1>
                    <p class="text">{{ $item->descripcion }}</p>
                </div>
            </div>
        </article>

        {{--*/ $i = $i + 1; /*--}}

        @endforeach

        <!-- PUBLICIDAD -->
        <article id="publicidad-central" class="col-lg-4 col-md-4 col-sm-12 mid">
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

    </div>
    <!-- FIN NOTICIA SUPERIOR -->

    <!-- NOTICIA CENTRAL -->
    <div class="row" id="mira-peru-central">                        
    </div>
    <!-- FIN NOTICIA CENTRAL -->

    <!-- NOTICIA INFERIOR -->
    <div class="row" id="mira-peru-inferior">
    </div>
    <!-- FIN NOTICIA INFERIOR -->

    <!-- NOTICIA INFERIOR HORIZONTAL -->
    <div class="row" id="mira-peru-inferior-horizontal">
    </div>
    <!-- FIN NOTICIA INFERIOR HORIZONTAL -->

    <div id="paginacion">
        {{ $noticias->links() }}
    </div>

</div>
@stop