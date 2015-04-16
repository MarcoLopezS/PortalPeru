@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Agregar nuevo columnista
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
{{ HTML::style('admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}
{{ HTML::style('admin/css/pages/form_layouts.css') }}

{{-- DATETIME PICKER --}}
{{ HTML::style('admin/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}

{{-- TAGS --}}
{{ HTML::style('admin/vendors/tags/bower_components/bootstrap/assets/css/docs.css') }}
{{ HTML::style('admin/vendors/tags/dist/bootstrap-tagsinput.css') }}
{{ HTML::style('admin/vendors/tags/assets/app.css') }}
@stop


{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <!--section starts-->
    <h1>Agregar nuevo columnista</h1>
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
                    {{ Form::open(['route' => 'administrador.columnist.store', 'method' => 'POST', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) }}

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

                        <div class="form-group @if($errors->has('imagen')) has-error @endif">
                            {{ Form::label('imagen', 'Foto', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::file('imagen') }}
                                {{ $errors->first('imagen', '<span class="help-block">:message</span>') }}
                            </div>
                        </div>

                        <div class="form-group @if($errors->has('imagen_portada')) has-error @endif">
                            {{ Form::label('imagen_portada', 'Imagen Portada', ['class' => 'col-md-3 control-label']) }}
                            <div class="col-md-9">
                                {{ Form::file('imagen_portada') }}
                                {{ $errors->first('imagen_portada', '<span class="help-block">:message</span>') }}
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
                                {{ Form::submit('Guardar', ['class' => 'btn btn-responsive btn-primary btn-md']) }}
                                <a href="{{ route('administrador.columnist.index') }}" class="btn btn-responsive btn-default btn-md">Cancelar</a>
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
{{ HTML::script('admin/vendors/ckeditor/ckeditor.js') }}
{{ HTML::script('admin/vendors/ckeditor/adapters/jquery.js') }}
{{ HTML::script('admin/js/pages/editor.js') }}

{{-- DATETIME PICKER --}}
{{ HTML::script('admin/vendors/datetimepicker/js/bootstrap-datetimepicker.js') }}
<script>
$(".form_datetime4").datetimepicker({
      format: "dd MM yyyy - hh:ii",
      linkField: "mirror_field",
      linkFormat: "yyyy-mm-dd hh:ii:00"
});
</script>

{{-- TAGS --}}
{{ HTML::script('admin/js/forms/jquery.tagsinput.min.js') }}
{{ HTML::script('admin/js/forms/jquery.select2.min.js') }}
<script>
$(".selectMultiple").select2();
</script>
@stop