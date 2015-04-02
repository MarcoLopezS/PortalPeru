@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Advanced Data Tables
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
    <a href="{{ route('administrador.post.photosupload', $posts->id) }}" class="btn btn-md btn-default">
        <span class="glyphicon glyphicon-plus"></span>
        Agregar fotos
    </a>
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

                                        @foreach($photos as $item)

                                        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-3 gallery-border">
                                            <a class="fancybox-effects-a" href="/upload/{{ $item->imagen_carpeta."".$item->imagen }}" title="Click aside to exit popup">
                                                <img height="100" width="100" src="/upload/{{ $item->imagen_carpeta }}100x100/{{ $item->imagen }}" class="gallery-style" alt="Image"></a>
                                        </div>

                                        @endforeach


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
{{ HTML::script('admin/vendors/gallery/basic/source/jquery.fancybox.pack.js?v=2.1.5') }}
{{ HTML::script('admin/vendors/gallery/basic/lib/jquery.mousewheel.pack.js?v=3.1.3') }}
<script type="text/javascript">
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