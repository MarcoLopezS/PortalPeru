@extends('layouts.frontend')

@section('contenido_frontend')
<!--MAIN SECTION-->
<div class="main">
    <div class="row">

        <!--CONTENT-->
        <div class="col-md-9 col-sm-12 author">
            <h2>Columnista: <span>{{ $columnista->nombre." ".$columnista->apellidos }}</span></h2>
            <div class="row">
                <article class="col-md-4 col-sm-4 mid member">
                    <div class="img">
                        <img src="/upload/columnista/{{ $columnista->imagen_portada }}" alt="post2">
                    </div>
                    <div class="info">
                        <h1>{{ $columnista->nombre." ".$columnista->apellidos }}</h1>
                        <p class="text">
                            {{ $columnista->descripcion }}
                        </p>
                    </div>
                    <ul class="social list-inline">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa  fa-tumblr"></i></a></li>
                    </ul>
                </article>
                <!--POSTS-->
                <div class="posts col-md-8 col-sm-8">
                    <h3>Columnas</h3>

                    @foreach($columnas as $item)
                    <article class="row mid">

                        <div class="info">
                            <h1><a href="/columnistas/{{ $columnista->id."-".$columnista->slug_url."/".$item->id."-".$item->slug_url }}">{{ $item->titulo }}</a></h1>

                            <p class="details">{{ date_format(new DateTime($item->published_at), 'd/m/Y')  }}</p>

                            <p class="text">
                                {{ $item->descripcion }}
                            </p>
                            <a href="" class="btn btn-default">Leer más...</a>

                        </div>
                    </article>
                    @endforeach

                    <ul id="pagination">
                        {{ $columnas->links() }}
                    </ul>

                </div>
                <!--END POSTS-->
            </div>
        </div>
        <!--END CONTENT-->

        <!--SIDEBAR-->

        <!--END SIDEBAR-->

        </div>

</div>
<!--END MAIN SECTION-->

@stop