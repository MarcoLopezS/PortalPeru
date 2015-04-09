@extends('layouts.frontend')

@section('contenido_frontend')
<!--MAIN SECTION-->
<div class="main">
    <div class="row">
        <!--CONTENT-->
        <div class="col-md-9 col-md-12 list-page clearfix">
            <h2>Columnistas</h2>

            @foreach($columnistas as $item)
            <article class="row mid">
                <img src="/upload/columnista/200x150/{{ $item->foto }}" alt="post">
                <div class="info">
                    <h1><a href="{{ route('home.columnistas.person', [$item->id, $item->slug_url]) }}">{{ $item->nombre." ".$item->apellidos }}</a></h1>
                    <p class="text">
                        {{ $item->descripcion }}
                    </p>
                    <a href="/columnistas/{{ $item->id."-".$item->slug_url }}" class="btn btn-default">Ver columnas</a>
                </div>
            </article>
            @endforeach

            <div id="paginacion">
                {{ $columnistas->links() }}
            </div>

        </div>
        <!--END CONTENT-->

        <!--SIDEBAR-->

        <!--END SIDEBAR-->
    </div>

</div>
<!--END MAIN SECTION-->
@stop