@extends('layouts.reportero')

@section('reportero_title')
Registro | @parent
@stop

@section('contenido_reportero')

<div class="smart-forms smart-container wrap-2">

    <div class="form-header header-red">
        <img src="/imagenes/logo.png" alt="logo">
    </div><!-- end .form-header section -->

    {{ Form::open(['route' => 'reportero.register.create', 'method' => 'post', 'files' => 'true']) }}

        <div class="form-body">

            <div class="spacer-b10">
                <div class="tagline"><span>Tus datos personales</span></div><!-- .tagline -->
                <p>Integra nuestra red de reporteros, llena tus datos, información necesaria para conocernos mejor. </p>
            </div>

            @if(Session::has('errors'))
            <div class="errorMessageList spacer-b20 alert-error">
                <ul>
                @foreach($errors as $item)
                   <li>{{ $item[0] }}</li>
                @endforeach
                </ul>
            </div>
            @endif

            <div class="frm-row">

                <div class="section colm colm6">
                    <label class="field prepend-icon">
                        {{ Form::text('nombre', null, ['id' => 'nombre', 'class' => 'gui-input', 'placeholder' => 'Nombre']) }}
                        <label class="field-icon"><i class="fa fa-user"></i></label>
                    </label>
                </div><!-- end section -->

                <div class="section colm colm6">
                    <label class="field prepend-icon">
                        {{ Form::text('apellidos', null, ['id' => 'apellidos', 'class' => 'gui-input', 'placeholder' => 'Apellidos']) }}
                        <label class="field-icon"><i class="fa fa-user"></i></label>
                    </label>
                </div><!-- end section -->

            </div><!-- end frm-row section -->

            <div class="section">
                <label class="field prepend-icon">
                    {{ Form::text('direccion', null, ['id' => 'direccion', 'class' => 'gui-input', 'placeholder' => 'Dirección']) }}
                    <label class="field-icon"><i class="fa fa-home"></i></label>
                </label>
            </div><!-- end section -->

            <div class="spacer-b40">
                <div class="tagline"><span>Email y contraseña</span></div><!-- .tagline -->
            </div>

            <div class="section">
                <label class="field prepend-icon">
                    {{ Form::email('email', null, ['id' => 'email', 'class' => 'gui-input', 'placeholder' => 'Email']) }}
                    <label class="field-icon"><i class="fa fa-envelope"></i></label>
                </label>
            </div><!-- end section -->

            <div class="frm-row">

                <div class="section colm colm6">
                    <label for="password" class="field prepend-icon">
                        {{ Form::password('password', ['id' => 'direccion', 'class' => 'gui-input', 'placeholder' => 'Crea tu contraseña']) }}
                        <label for="password" class="field-icon"><i class="fa fa-lock"></i></label>
                    </label>
                </div><!-- end section -->

                <div class="section colm colm6">
                    <label for="password_confirmation" class="field prepend-icon">
                        {{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'gui-input', 'placeholder' => 'Repite tu contraseña']) }}
                        <label for="password_confirmation" class="field-icon"><i class="fa fa-unlock-alt"></i></label>
                    </label>
                </div><!-- end section -->

            </div>

            <div class="result spacer-b10"></div><!-- end .result  section -->

            <div class="section progress-section">
                <div class="progress-bar progress-animated bar-red">
                    <div class="bar"></div>
                    <div class="percent">0%</div>
                </div>
            </div><!-- end progress section -->

        </div><!-- end .form-body section -->
        <div class="form-footer">
            <button type="submit" class="button btn-red">Registrarme</button>
            <a class="button btn-red floatRight" href="{{ route('reportero.login') }}">Iniciar sesión</a>
        </div><!-- end .form-footer section -->

    {{ Form::close() }}

</div><!-- end .smart-forms section -->

@stop