@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Editar registro
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
	<h1>Editar registro</h1>
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
					{{ Form::model($post, ['route' => ['administrador.post.videos.update', $posts->id, $post->id], 'method' => 'PUT', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) }}

                        <div class="form-group @if($errors->has('titulo')) has-error @endif">
                            {{ Form::label('titulo', 'Titulo', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::text('titulo', null, ['class' => 'form-control']) }}
                                {{ $errors->first('titulo', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('video_actual', 'Video actual', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                @if ($post->video <> "")
                                <iframe width="400" height="200" src="//www.youtube.com/embed/{{ $post->video }}" frameborder="0" allowfullscreen></iframe>
                                @else
                                No hay video
                                @endif
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('video')) has-error @endif">
                            {{ Form::label('video', 'Video (Youtube)', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-6">
                                <div class="form-group input-group">
                                    <span class="input-group-addon">https://www.youtube.com/watch?v=</span>
                                    {{ Form::text('video', null, ['class' => 'form-control']) }}
                                </div>
                                {{ $errors->first('video', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                {{ Form::submit('Guardar cambios', ['class' => 'btn btn-responsive btn-primary btn-md']) }}
                                <a href="{{ route('administrador.post.videos.index', $posts->id) }}" class="btn btn-responsive btn-default btn-md">Cancelar</a>
                            </div>
                        </div>

					{{ Form::close() }}
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

{{-- CKEDITOR --}}}
{{ HTML::script('admin/vendors/ckeditor/ckeditor.js') }}
{{ HTML::script('admin/vendors/ckeditor/adapters/jquery.js') }}
{{ HTML::script('admin/js/pages/editor.js') }}

{{-- DATETIME PICKER --}}
{{ HTML::script('admin/libs/datetimepicker/jquery.datetimepicker.js') }}
<script>
$(document).ready(function() {
    $('#datetimepicker').datetimepicker({
        lang: 'es',
        i18n:{
            de:{
                months:[
                    'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'
                ],
                dayOfWeek:[
                    "Do", "Lu", "Ma", "Mi","Ju", "Vi", "Sa"
                ]
            }
        },
        format:'Y-m-d H:i:s'
    });
});
</script>

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

{{-- TAGS --}}
{{ HTML::script('admin/js/forms/jquery.tagsinput.min.js') }}
{{ HTML::script('admin/js/forms/jquery.select2.min.js') }}
<script>
$(".selectMultiple").select2();
</script>
@stop