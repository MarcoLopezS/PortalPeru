@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Ver columna
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
{{ HTML::style('admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}
{{ HTML::style('admin/css/pages/form_layouts.css') }}
{{ HTML::style('admin/vendors/gallery/basic/source/jquery.fancybox.css?v=2.1.5') }}
@stop

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <!--section starts-->
    <h1>Ver columna</h1>
</section>
<!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <!--row starts-->
        <div class="col-lg-12">

            <!--basic form starts-->
            <div class="panel panel-danger">
                <div class="panel-body border">

                    <div class="form-horizontal form-bordered">

                        <div class="form-group">
                            {{ Form::label('titulo', 'Titulo', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::text('titulo', $columna->titulo, ['class' => 'form-control', 'disabled']) }}
                            </div>
                        </div>

                        <div class="form-group">
                              {{ Form::label('descripcion', 'Descripción', ['class' => 'col-md-3 control-label']) }}
                              <div class="col-md-9">
                                    {{{ $columna->descripcion }}}
                              </div>
                        </div>

                        <div class="form-group">
                              {{ Form::label('contenido', 'Contenido', ['class' => 'col-md-3 control-label']) }}
                              <div class="col-md-9">
                                    {{ $columna->contenido }}
                              </div>
                        </div>

                        <div class="form-group">
                              {{ Form::label('imagen', 'Imagen', ['class' => 'col-md-3 control-label']) }}
                              <div class="col-md-9">
                                    <a class="fancybox" href="/upload/{{ $columna->imagen_carpeta."".$columna->imagen }}" title="{{ $columna->titulo }}">
                                          <img src="/upload/{{ $columna->imagen_carpeta."200x150/".$columna->imagen }}" alt=""/>
                                    </a>
                              </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('publicar', 'Publicar', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                @if ($columna->publicar == 1)
                                <label class="checkbox-inline">Si</label>
                                @else
                                <label class="checkbox-inline">No</label>
                                @endif
                            </div>
                        </div>

                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('administrador.columns.edit', [$columnista->id, $columna->id]) }}" class="btn btn-responsive btn-primary btn-md">Editar</a>
                                <a href="{{ route('administrador.columns.list', [$columnista->id]) }}" class="btn btn-responsive btn-default btn-md">Ver registros</a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
        <!--md-6 ends-->

    </div>
    <!--main content ends-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
{{ HTML::script('admin/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}

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