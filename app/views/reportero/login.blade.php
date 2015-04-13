@extends('layouts.reportero')

@section('contenido_reportero')

    <div class="smart-forms smart-container wrap-3">
        
        <div class="form-header header-red">
            <h4><img src="/imagenes/logo.png" alt="logo"></h4>
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

                <div class="alert notification alert-error spacer-b10"><i class="fa fa-times"></i> Tu cuenta todavía no ha sido activada.</div>

                <div class="alert notification alert-error spacer-b10"><i class="fa fa-times"></i> El usuario y la contraseña no coinciden.</div>


            </div><!-- end .form-body section -->
            <div class="form-footer">
                <button type="submit" class="button btn-red">Iniciar sesión</button>
            </div><!-- end .form-footer section -->

        {{ Form::close() }}

    </div><!-- end .smart-forms section -->

@stop