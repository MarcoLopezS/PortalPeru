@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Editar columnista
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
{{ HTML::style('admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}
{{ HTML::style('admin/css/pages/form_layouts.css') }}
{{ HTML::style('admin/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}
{{ HTML::style('admin/vendors/gallery/basic/source/jquery.fancybox.css?v=2.1.5') }}
@stop


{{-- Page content --}}
@section('content_admin')
<section class="content-header">
	<!--section starts-->
	<h1>Editar columnista</h1>
</section>
<!--section ends-->
<section class="content">
	<!--main content-->
	<div class="row">
		<!--row starts-->
		<div class="col-lg-12">

		    <ul class="nav  nav-tabs ">
                <li class="active"><a href="#tab1" data-toggle="tab">Datos generales</a></li>
                <li><a href="#tab2" data-toggle="tab">Foto</a></li>
                <li><a href="#tab3" data-toggle="tab">Imagen portada</a></li>
            </ul>

            <div  class="tab-content mar-top">
                <div id="tab1" class="tab-pane fade active in">

                    <!--basic form starts-->
                    <div class="panel panel-danger">
                        <div class="panel-body border">
                            {{ Form::model($post, ['route' => ['administrador.columnist.update', $post->id], 'method' => 'PUT', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) }}

                                <div class="form-group @if($errors->has('nombre')) has-error @endif">
                                    {{ Form::label('nombre', 'Nombre', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::text('nombre', null, ['class' => 'form-control']) }}
                                        {{ $errors->first('nombre', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('apellidos')) has-error @endif">
                                    {{ Form::label('apellidos', 'Apellidos', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::text('apellidos', null, ['class' => 'form-control']) }}
                                        {{ $errors->first('apellidos', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('descripcion')) has-error @endif">
                                    {{ Form::label('descripcion', 'Descripción', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '3',
                                        'onkeydown' => 'limitText(this.form.descripcion,this.form.countdown,220);',
                                        'onkeyup' => 'limitText(this.form.descripcion,this.form.countdown,220);']) }}
                                        <span class="help-block">Caracteres permitidos:
                                            <strong>
                                                <input name="countdown" type="text" style="border:none; background:none;" value="220" size="3" readonly id="countdown">
                                            </strong>
                                        </span>
                                        {{ $errors->first('descripcion', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('', 'Dias a publicar', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        <label>
                                            {{ Form::hidden('dia_lunes', 0) }}
                                            {{ Form::checkbox('dia_lunes', '1', null,  ['id' => 'dia_lunes']) }}
                                            Lunes
                                        </label>
                                        <label>
                                            {{ Form::hidden('dia_martes', 0) }}
                                            {{ Form::checkbox('dia_martes', '1', null,  ['id' => 'dia_martes']) }}
                                            Martes
                                        </label>
                                        <label>
                                            {{ Form::hidden('dia_miercoles', 0) }}
                                            {{ Form::checkbox('dia_miercoles', '1', null,  ['id' => 'dia_miercoles']) }}
                                            Miercoles
                                        </label>
                                        <label>
                                            {{ Form::hidden('dia_jueves', 0) }}
                                            {{ Form::checkbox('dia_jueves', '1', null,  ['id' => 'dia_jueves']) }}
                                            Jueves
                                        </label>
                                        <label>
                                            {{ Form::hidden('dia_viernes', 0) }}
                                            {{ Form::checkbox('dia_viernes', '1', null,  ['id' => 'dia_viernes']) }}
                                            Viernes
                                        </label>
                                        <label>
                                            {{ Form::hidden('dia_sabado', 0) }}
                                            {{ Form::checkbox('dia_sabado', '1', null,  ['id' => 'dia_sabado']) }}
                                            Sábado
                                        </label>
                                        <label>
                                            {{ Form::hidden('dia_domingo', 0) }}
                                            {{ Form::checkbox('dia_domingo', '1', null,  ['id' => 'dia_domingo']) }}
                                            Domingo
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('publicar')) has-error @endif">
                                    {{ Form::label('publicar', 'Publicar', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        <label class="checkbox-inline">
                                            {{ Form::radio('publicar', '1', null,  ['id' => 'publicar']) }}
                                            Si
                                        </label>
                                        <label class="checkbox-inline">
                                            {{ Form::radio('publicar', '0', null,  ['id' => 'publicar']) }}
                                            No
                                        </label>
                                        {{ $errors->first('publicar', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        {{ Form::submit('Guardar cambios', ['class' => 'btn btn-responsive btn-primary btn-md']) }}
                                        <a href="{{ route('administrador.columnist.index') }}" class="btn btn-responsive btn-default btn-md">Cancelar</a>
                                    </div>
                                </div>

                            {{ Form::close() }}
                        </div>
                    </div>

                </div>
                <div id="tab2" class="tab-pane fade">

                    <!--basic form starts-->
                    <div class="panel panel-danger">
                        <div class="panel-body border">
                            {{ Form::open(['route' => ['administrador.columnist.imagen', $post->id], 'method' => 'POST', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) }}

                                <div class="form-group @if($errors->has('imagen')) has-error @endif">
                                    {{ Form::label('imagen_actual', 'Foto actual', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        <a class="fancybox" href="/upload/columnista/{{ $post->foto }}" title="{{ $post->titulo }}">
                                            <img src="/upload/columnista/200x100/{{ $post->foto }}" alt="" />
                                        </a>
                                        {{ Form::hidden('imagen_actual', $post->foto) }}
                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('imagen')) has-error @endif">
                                    {{ Form::label('imagen', 'Foto', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::file('imagen') }}
                                        {{ $errors->first('imagen', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        {{ Form::submit('Guardar cambios', ['class' => 'btn btn-responsive btn-primary btn-md']) }}
                                        <a href="{{ route('administrador.columnist.index') }}" class="btn btn-responsive btn-default btn-md">Cancelar</a>
                                    </div>
                                </div>

                            {{ Form::close() }}
                        </div>
                    </div>

                </div>

                <div id="tab3" class="tab-pane fade">

                    <!--basic form starts-->
                    <div class="panel panel-danger">
                        <div class="panel-body border">
                            {{ Form::open(['route' => ['administrador.columnist.imagenPortada', $post->id], 'method' => 'POST', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) }}

                                <div class="form-group @if($errors->has('imagen')) has-error @endif">
                                    {{ Form::label('imagen_actual', 'Imagen portada actual', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        <a class="fancybox" href="/upload/columnista/{{ $post->imagen_portada }}" title="{{ $post->titulo }}">
                                            <img src="/upload/columnista/200x100/{{ $post->imagen_portada }}" alt="" />
                                        </a>
                                        {{ Form::hidden('imagen_actual', $post->imagen_portada) }}
                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('imagen')) has-error @endif">
                                    {{ Form::label('imagen', 'Imagen portada', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::file('imagen') }}
                                        {{ $errors->first('imagen', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        {{ Form::submit('Guardar cambios', ['class' => 'btn btn-responsive btn-primary btn-md']) }}
                                        <a href="{{ route('administrador.columnist.index') }}" class="btn btn-responsive btn-default btn-md">Cancelar</a>
                                    </div>
                                </div>

                            {{ Form::close() }}
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