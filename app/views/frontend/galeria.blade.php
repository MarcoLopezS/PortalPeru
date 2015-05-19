@extends('layouts.frontend')

@section('html_title')
Lima en una Foto | @parent
@stop

@section('script_header')
{{ HTML::style('admin/vendors/gallery/basic/source/jquery.fancybox.css?v=2.1.5') }}
@stop

@section('contenido_frontend')

<!--MAIN SECTION-->
<div class="main">
    <div class="row">
        <!--CONTENT-->
        <div class="col-md-9 col-md-12 clearfix">
            
            <div class="fullwidth galeria-titulo">

                <h2 class="pull-left">
                    <img src="/imagenes/icon-fotos-lima.png" height="30" alt="">
                </h2>

                <p class="pull-right">
                    Envía tus fotos a: fotografia@portalperu.pe
                </p>

            </div>

            <div class="fullwidth galeria-destacada">
                <div class="info imagen">
                    <img src="/upload/{{ $galeria->imagen_carpeta."870x500/".$galeria->imagen }}" alt="{{ $galeria->titulo }}">
                </div>
                <h3>{{ $galeria->titulo }}</h3>
                <p>Foto: {{ $galeria->descripcion }}</p>
            </div>

            @foreach($galerias as $item)

                <article class="col-md-4 col-sm-4 galeria mid">
                    @if($item->imagen <> "")
                        <a class="fancybox" href="/upload/{{ $item->imagen_carpeta."".$item->imagen }}" title="{{ $item->titulo }}">
                            <img src="/upload/{{ $item->imagen_carpeta."274x200/".$item->imagen }}" alt="{{ $item->titulo }}">
                        </a>
                    @endif
                    <div class="info">
                        <h1>
                            <a class="fancybox" href="/upload/{{ $item->imagen_carpeta."".$item->imagen }}" title="{{ $item->titulo }}">
                                {{ $item->titulo }}
                            </a>
                        </h1>
                        <p>
                            Foto: {{ $item->descripcion }}
                        </p>
                    </div>
                </article>

            @endforeach

            <div id="paginacion">
                {{ $galerias->links() }}
            </div>

        </div>
        <!--END CONTENT-->

        @include('frontend.sidebar')

    </div>

</div>
<!--END MAIN SECTION-->

@stop

@section('script_footer')
{{-- FANCYBOX --}}
{{ HTML::script('admin/vendors/gallery/basic/source/jquery.fancybox.pack.js?v=2.1.5') }}
{{ HTML::script('admin/vendors/gallery/basic/lib/jquery.mousewheel.pack.js?v=3.1.3') }}
<script type="text/javascript">
$(document).ready(function() {
    $(".fancybox").fancybox({
        helpers: {
            title: {
                type: 'outside'
            },
            overlay: {
                speedOut: 0
            }
        }
    });
});
</script>
@stop