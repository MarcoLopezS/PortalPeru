@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Fotos de noticia {{ $posts->titulo }}
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
{{-- GALLERY --}}
<!-- fancyBox -->
{{ HTML::style('admin/vendors/gallery/basic/source/jquery.fancybox.css?v=2.1.5') }}
@stop

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <!--section starts-->
    <h1>Galería de Fotos</h1>
    <h4>{{ $posts->titulo }}</h4>
    <a href="{{ route('administrador.post.photosupload', $posts->id) }}" class="btn btn-md btn-default mgBt10">
        <span class="glyphicon glyphicon-plus"></span>
        Agregar fotos
    </a>
    <div class="alert alert-dismissable"></div>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary tabtop">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <div class="tab-pane active gallery-padding">
                                    <div class="col-md-12">

                                        <ul id="listPhotos" data-url="{{ route('administrador.post.photosOrder', [$posts->id]) }}">

                                            @foreach($photos as $item)

                                            <li id="listPhoto_{{ $item->id }}" class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">

                                                <img height="100" width="100" src="/upload/{{ $item->imagen_carpeta }}100x100/{{ $item->imagen }}" class="gallery-style" alt="Image">

                                                <div class="slider-options">
                                                    <a class="photos-move handle" title="Mover">
                                                        <span class="glyphicon glyphicon-move"></span>
                                                    </a>

                                                    <a class="fancybox-effects-a" href="/upload/{{ $item->imagen_carpeta."".$item->imagen }}" title="Ver imagen">
                                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                                    </a>

                                                    <a href="{{ route('administrador.post.photosEdit', [$posts->id, $item->id]) }}" title="Editar imagen">
                                                        <span class="glyphicon glyphicon-pencil"></span>
                                                    </a>

                                                    {{ Form::open(['route' => ['administrador.post.photosuploadDelete', $posts->id, $item->id], 'method' => 'delete', 'class' => 'FormDeletePhotos']) }}
                                                        <button type="submit"><span class="glyphicon glyphicon-remove"></span></button>
                                                    {{ Form::close() }}
                                                </div>

                                            </li>

                                            @endforeach

                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row-->
</section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script>
$(document).on("ready", function(){
    $('.alert').hide();
    $("#listPhotos").sortable({
        handle : '.handle',
        serialize: { key: 'listPhoto' },
        revert: true,
        stop: function(evt, ui){
            var sorted =  $("#listPhotos").sortable('serialize');
            var gotoURL = $(this).data('url');
            $.ajax({
                url: gotoURL,
                data: sorted,
                type: 'POST',
                success: function(success) {
                    $(".alert").show().addClass('alert-success').text('Los cambios se realizaron con éxito.');
                }, error: function (xhr, textStatus, thrownError) {
                    $(".alert").show().addClass('alert-danger').text("Error");
                }
            });
        }
    });
});
</script>

{{ HTML::script('admin/vendors/gallery/basic/source/jquery.fancybox.pack.js?v=2.1.5') }}
{{ HTML::script('admin/vendors/gallery/basic/lib/jquery.mousewheel.pack.js?v=3.1.3') }}
<script>
$(document).ready(function() {
      $(".fancybox-effects-a").fancybox({
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