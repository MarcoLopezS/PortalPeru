@extends('layouts.reportero-admin')

{{-- Page title --}}
@section('title')
Mi Perfil
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
{{ HTML::style('admin/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}
{{ HTML::style('admin/css/pages/user_profile.css') }}
{{ HTML::style('admin/css/pages/form_layouts.css') }}
<!--end of page level css-->

{{ HTML::style('admin/vendors/gallery/basic/source/jquery.fancybox.css?v=2.1.5') }}
@stop

{{-- Page content --}}
@section('content_admin')
<section class="content-header">
    <h1>Mi Perfil</h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav  nav-tabs ">
                <li class="active">
                    <a href="#perfil" data-toggle="tab">
                        <i class="livicon" data-name="user" data-size="16" data-c="#000" data-hc="#000" data-loop="true"></i>
                        Mi Perfil
                    </a>
                </li>

                <li>
                    <a href="#datos" data-toggle="tab">
                        <i class="livicon" data-name="notebook" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                        Datos personales
                    </a>
                </li>

                <li>
                    <a href="#redes" data-toggle="tab">
                        <i class="livicon" data-name="globe" data-size="16" data-loop="true" data-c="#000" data-hc="#000"></i>
                        Redes sociales
                    </a>
                </li>

                <li>
                    <a href="#foto" data-toggle="tab">
                        <i class="livicon" data-name="imagen" data-size="16" data-loop="false" data-c="#000" data-hc="#000"></i>
                        Cambiar foto
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

                <div id="perfil" class="tab-pane fade active in">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel">

                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        {{ $user->profile->nombre." ".$user->profile->apellidos }}
                                    </h3>
                                </div>

                                <div class="panel-body">

                                    <div class="col-md-4">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail img-file">
                                                @if($user->profile->imagen == "")
                                                <img src="/imagenes/rciud/usuario.jpg" height="150" alt="">
                                                @else
                                                <img src="/upload/reportero/{{ $user->profile->imagen }}" alt="...">
                                                @endif
                                            </div>
                                            <div>
                                                {{ $user->profile->descripcion }}
                                            </div>
                                            <div class="table-responsive">

                                                <h2>Noticias</h2>

                                                <table class="table table-bordered table-striped">

                                                    <tr>
                                                        <td>Enviadas</td>
                                                        <td>{{ $user->post->count() }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Publicadas</td>
                                                        <td>{{ $user->postPublicar() }}</td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="panel-body">
                                            <div class="table-responsive">

                                                <table class="table table-bordered table-striped" id="users">
    
                                                    <tr>
                                                        <td>Nombres</td>
                                                        <td>{{ $user->profile->nombre }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Apellidos</td>
                                                        <td>{{ $user->profile->apellidos }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>{{ $user->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dirección</td>
                                                        <td>{{ $user->profile->direccion }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Facebook</td>
                                                        <td>{{ $user->profile->social_facebook }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Twitter</td>
                                                        <td>{{ $user->profile->social_twitter }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Google+</td>
                                                        <td>{{ $user->profile->social_google }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Youtube</td>
                                                        <td>{{ $user->profile->social_youtube }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pinterest</td>
                                                        <td>{{ $user->profile->social_pinterest }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Instagram</td>
                                                        <td>{{ $user->profile->social_instagram }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Linkedin</td>
                                                        <td>{{ $user->profile->social_linkedin }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tumblr</td>
                                                        <td>{{ $user->profile->social_tumblr }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="datos" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12 pd-top">

                            {{ Form::model($user->profile, ['route' => ['reportero-ciudadano.user.profileData'], 'method' => 'PUT', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) }}

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

                                <div class="form-group @if($errors->has('direccion')) has-error @endif">
                                    {{ Form::label('direccion', 'Dirección', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        {{ Form::text('direccion', null, ['class' => 'form-control']) }}
                                        {{ $errors->first('direccion', '<span class="help-block">:message</span>') }}
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

                <div id="redes" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12 pd-top">

                            {{ Form::model($user->profile, ['route' => ['reportero-ciudadano.user.profileSocial'], 'method' => 'PUT', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) }}

                                <div class="form-group @if($errors->has('social_facebook')) has-error @endif">
                                    {{ Form::label('social_facebook', 'Facebook', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">https://www.facebook.com/</span>
                                            {{ Form::text('social_facebook', null, ['class' => 'form-control']) }}
                                        </div>
                                        {{ $errors->first('social_facebook', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('social_twitter')) has-error @endif">
                                    {{ Form::label('social_twitter', 'Twitter', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">https://www.twitter.com/</span>
                                            {{ Form::text('social_twitter', null, ['class' => 'form-control']) }}
                                        </div>
                                        {{ $errors->first('social_twitter', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('social_google')) has-error @endif">
                                    {{ Form::label('social_google', 'Google+', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">https://www.plus.google.com/</span>
                                            {{ Form::text('social_google', null, ['class' => 'form-control']) }}
                                        </div>
                                        {{ $errors->first('social_google', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('social_youtube')) has-error @endif">
                                    {{ Form::label('social_youtube', 'Youtube', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">https://www.youtube.com/</span>
                                            {{ Form::text('social_youtube', null, ['class' => 'form-control']) }}
                                        </div>
                                        {{ $errors->first('social_youtube', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('social_pinterest')) has-error @endif">
                                    {{ Form::label('social_pinterest', 'Pinterest', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">https://www.pinterest.com/</span>
                                            {{ Form::text('social_pinterest', null, ['class' => 'form-control']) }}
                                        </div>
                                        {{ $errors->first('social_pinterest', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('social_instagram')) has-error @endif">
                                    {{ Form::label('social_instagram', 'Instagram', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">https://www.instagram.com/</span>
                                            {{ Form::text('social_instagram', null, ['class' => 'form-control']) }}
                                        </div>
                                        {{ $errors->first('social_instagram', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('social_linkedin')) has-error @endif">
                                    {{ Form::label('social_linkedin', 'Linkedin', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">https://www.linkedin.com/</span>
                                            {{ Form::text('social_linkedin', null, ['class' => 'form-control']) }}
                                        </div>
                                        {{ $errors->first('social_linkedin', '<span class="help-block">:message</span>') }}
                                    </div>
                                </div>

                                <div class="form-group @if($errors->has('social_tumblr')) has-error @endif">
                                    {{ Form::label('social_tumblr', 'Tumblr', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">https://www.tumblr.com/</span>
                                            {{ Form::text('social_tumblr', null, ['class' => 'form-control']) }}
                                        </div>
                                        {{ $errors->first('social_tumblr', '<span class="help-block">:message</span>') }}
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

                <div id="foto" class="tab-pane fade">
                    <div class="row">
                        <div class="col-md-12 pd-top">

                            {{ Form::model($user->profile, ['route' => ['reportero-ciudadano.user.profilePhoto'], 'method' => 'PUT', 'class' => 'form-horizontal form-bordered', 'files' => 'true']) }}

                                <div class="form-group @if($errors->has('imagen')) has-error @endif">
                                    {{ Form::label('imagen_actual', 'Foto actual', ['class' => 'col-md-3 control-label']) }}
                                    <div class="col-md-9">
                                        <a class="fancybox" href="/upload/reportero/{{ $user->profile->imagen }}">
                                            <img src="/upload/reportero/200x200/{{ $user->profile->imagen }}" alt="" />
                                        </a>
                                        {{ Form::hidden('imagen_actual', $user->profile->imagen) }}
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

                            {{ Form::open(['route' => 'reportero-ciudadano.user.profilePassword', 'method' => 'post', 'class' => 'form-horizontal']) }}

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
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
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