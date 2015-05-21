@extends('layouts.frontend')

@section('html_title')
{{ $categoria->titulo }} |
@parent
@stop

@section('contenido_frontend')

<!--MAIN SECTION-->
<div class="main">
    <div class="row">
        <!--CONTENT-->
        <div class="col-md-9 col-md-12 list-page clearfix">
            <h2>{{ $categoria->titulo }}</h2>

            @foreach($noticias as $item)
            <article class="row mid categoria-nota">
                @if($item->imagen <> "")
                <img src="/upload/{{ $item->imagen_carpeta."200x150/".$item->imagen }}" alt="{{ $item->titulo }}">
                @endif
                <div class="info">
                    <h1><a href="/nota/{{ $item->id."-".$item->slug_url }}">{{ $item->titulo }}</a></h1>
                    <p class="details">{{ date_format(new DateTime($item->published_at), 'd/m/Y H:m')  }}</p>
                    <p class="text width100">
                        {{ $item->descripcion }}
                    </p>
                </div>
            </article>
            @endforeach

            <div id="paginacion">
                {{ $noticias->links() }}
            </div>

        </div>
        <!--END CONTENT-->

        @include('frontend.sidebar')

    </div>

</div>
<!--END MAIN SECTION-->

@stop