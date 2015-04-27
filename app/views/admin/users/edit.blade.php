@extends('layouts.admin')

{{-- Page title --}}
@section('title')
Editar usuario
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
{{ HTML::style('admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}
{{ HTML::style('admin/css/pages/user_profile.css') }}
{{ HTML::style('admin/css/pages/form_layouts.css') }}
<!--end of page level css-->
@stop

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <h1>Editar usuario</h1>
</section>

<section class="content">

    <div class="row">

        <div class="col-lg-12">

            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#datos" data-toggle="tab">
                        <i class="livicon" data-name="notebook" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                        Datos personales
                    </a>
                </li>

                <li>
                    <a href="#clave" data-toggle="tab">
                        <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                        Cambiar contraseña
                    </a>
                </li>
            </ul>

            <div  class="tab-content mar-top">

                <div id="datos" class="tab-pane fade active in">
                    <div class="row">
                        <div class="col-md-12 pd-top">

                            {{ Form::model($user->profile, ['route' => ['administrador.users.updateData', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) }}

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

                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 text-right">
                                        {{ Form::submit('Guardar cambios', ['class' => 'btn btn-responsive btn-primary btn-md']) }}
                                        <a href="{{ route('reportero-ciudadano.user.profile') }}" class="btn btn-responsive btn-default btn-md">Cancelar</a>
                                    </div>
                                </div>

                            {{ Form::close() }}

                        </div>
                    </div>
                </div>

                <div id="clave" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12 pd-top">

                            {{ Form::open(['route' => ['administrador.users.updatePassword', $user->id], 'method' => 'post', 'class' => 'form-horizontal']) }}

                                <div class="form-body">

                                    <div class="form-group @if($errors->has('password')) has-error @endif">

                                        {{ Form::label('password', 'Contraseña *', ['class' => 'col-md-3 control-label']) }}

                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                </span>
                                                {{ Form::password('password', ['class' => 'form-control']) }}
                                            </div>
                                            {{ $errors->first('password', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                    <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                                        {{ Form::label('password_confirmation', 'Confirmar contraseña *', ['class' => 'col-md-3 control-label']) }}
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                                                </span>
                                                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                                            </div>
                                            {{ $errors->first('password_confirmation', '<span class="help-block">:message</span>') }}
                                        </div>
                                    </div>

                                </div>

                                <div class="form-actions">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                                    </div>
                                </div>

                            {{ Form::close() }}

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--row end-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
{{ HTML::script('admin/vendors/wizard/jquery-steps/js/jquery.validate.min.js') }}
{{ HTML::script('admin/vendors/wizard/jquery-steps/js/wizard.js') }}
{{ HTML::script('admin/vendors/wizard/jquery-steps/js/jquery.steps.js') }}
{{ HTML::script('admin/vendors/wizard/jquery-steps/js/form_wizard.js') }}
@stop