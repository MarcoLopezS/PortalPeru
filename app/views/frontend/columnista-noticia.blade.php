@extends('layouts.frontend')

@section('contenido_frontend')

<!--MAIN SECTION-->
<div class="main post-page">
    <div class="row">

        <!--CONTENT-->
        <div class="col-md-9 col-sm-12 clearfix author">

            <h2>Columnista: <a href="/columnistas/{{ $columnista->id."-".$columnista->slug_url }}"><span>{{ $columnista->nombre." ".$columnista->apellidos }}</span></a></h2>

            <!--POST-->
            <article class="post mid fullwidth">

                <div class="row">
                    <div class="info col-md-12 col-sm-12">
                        <div class="info">
                            <h1>{{ $columna->titulo }}</h1>
                            <div class="data">
                                <p class="details">{{ date_format(new DateTime($columna->published_at), 'd/m/Y')  }}</p>
                            </div>
                            <div class="text">
                                {{ $columna->contenido }}
                            </div>

                        </div>
                    </div>
                </div>

            </article>
            <!--END POST-->

            <!-- COMENTARIOS -->
            <div class="row">
                <h3>Comentarios</h3>

                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=258988607636876";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

                <div class="fb-comments" data-href="" data-numposts="5" data-colorscheme="light"></div>
            </div>
            <!-- FIN COMENTARIOS -->

        </div>
        <!--END CONTENT-->

        <!--SIDEBAR-->

        <!--END SIDEBAR-->

    </div>

</div>
<!--END MAIN SECTION-->

@stop