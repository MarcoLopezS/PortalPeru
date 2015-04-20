@extends('layouts.reportero')

@section('contenido_reportero')

    <div class="smart-forms smart-container wrap-3">
        
        <div class="form-header header-red">
            <img src="/imagenes/logo.png" alt="logo">
        </div><!-- end .form-header section -->

        {{ Form::open(['route' => 'administrador.login', 'method' => 'post']) }}

            <div class="form-body theme-red">

                <div class="section">
                    <label for="email" class="field prepend-icon">
                        {{ Form::email('email', null, ['class' => 'gui-input', 'placeholder' => 'Correo electronico']) }}
                        <label for="email" class="field-icon"><i class="fa fa-user"></i></label>
                    </label>
                </div><!-- end section -->

                <div class="section">
                    <label for="password" class="field prepend-icon">
                        {{ Form::password('password', ['class' => 'gui-input', 'placeholder' => 'Conteaseña']) }}
                        <label for="password" class="field-icon"><i class="fa fa-lock"></i></label>
                    </label>
                </div><!-- end section -->

                <div class="section">
                    <label class="switch block">
                        <input type="checkbox" name="remember" id="remember" checked>
                        <label for="remember" data-on="SI" data-off="NO"></label>
                        <span>Recordarme</span>
                    </label>
                </div><!-- end section -->

                @if(Session::has('login_error'))
                    <div class="alert notification alert-error spacer-b10">
                        <i class="fa fa-check"></i> El email y/o contraseña no coinciden.
                    </div>
                @endif

            </div><!-- end .form-body section -->
            <div class="form-footer">
                <button type="submit" class="button btn-red">Iniciar sesión</button>
                <a class="button btn-red floatRight" href="{{ route('reportero.correoPassword') }}">Recuperar contraseña</a>
            </div><!-- end .form-footer section -->

        {{ Form::close() }}

    </div><!-- end .smart-forms section -->

@stop