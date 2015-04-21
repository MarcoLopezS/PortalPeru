@extends('layouts.frontend')

@section('html_title')
{{ $columna->titulo }} | @parent
@stop

{{--*/
$noticiaUrl = configWeb()->dominio."/columnistas/".$columnista->id."-".$columnista->slug_url."/".$columna->id."-".$columna->slug_url;
$noticiaImg = configWeb()->dominio."/upload/columnista/200x200/".$columnista->foto;
/*--}}

@section('script_header')
<!-- Open Graph -->
<meta property="og:title" content='{{ $columna->titulo  }}'>
<meta property="og:type" content='article' >
<meta property="og:url" content='{{ $noticiaUrl }}' >
<meta property="og:image" content='{{ $noticiaImg }}' >
<meta property="og:site_name" content='{{ configWeb()->titulo }}' >
<meta property="fb:admins" content='1434798696787255'>
<meta property="og:description" content='{{ $columna->descripcion }}'>
<!-- fin Open Graph -->
@stop

@section('contenido_frontend')

<!--MAIN SECTION-->
<div class="main post-page">

    <div class="row">

        <!--CONTENT-->
        <div class="col-md-9 col-sm-12 clearfix author">

            <h2>
                Columnista: <a href="/columnistas/{{ $columnista->id."-".$columnista->slug_url }}">
                <span>{{ $columnista->nombre." ".$columnista->apellidos }}</span></a>
            </h2>

            <!--POST-->
            <article class="post mid fullwidth">

                <div class="info">
                    <h1>{{ $columna->titulo }}</h1>
                    <div class="data">
                        <p class="details">{{ date_format(new DateTime($columna->published_at), 'd/m/Y')  }}</p>
                    </div>
                    <div class="data">
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-552dd2a835af55f3" async="async"></script>
                        <div class="addthis_native_toolbox"></div>
                    </div>
                </div>

                @if($columna->imagen <> "")
                <div class="info imagen">
                    <img src="/upload/{{ $columna->imagen_carpeta."840x500/".$columna->imagen }}" alt="{{ $columna->titulo }}">
                </div>
                @endif

                <div class="row">
                    <div class="info col-md-12 col-sm-12">
                        <div class="info">
                            <div class="text texto-nota">
                                {{ $columna->contenido }}
                            </div>
                        </div>
                    </div>
                </div>

            </article>
            <!--END POST-->

            <!-- COMENTARIOS -->
            <div class="row visible-lg">
                <h3>Comentarios</h3>

                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.3";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

                <div class="fb-comments" data-href="{{ $noticiaUrl }}" data-width="840" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <!-- FIN COMENTARIOS -->

        </div>
        <!--END CONTENT-->

        @include('frontend.sidebar')

    </div>

</div>
<!--END MAIN SECTION-->

@stop