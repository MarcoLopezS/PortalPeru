@extends('layouts.reportero')

@section('contenido_reportero')

    <div class="smart-forms smart-container wrap-3">
        
        <div class="form-header header-red">
            <img src="/imagenes/logo.png" alt="logo">
        </div><!-- end .form-header section -->

        <form action="{{ action('RemindersController@postReset') }}" method="POST">
            <input type="hidden" name="token" value="{{ $token }}">
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
                    <label for="password_confirmation" class="field prepend-icon">
                        {{ Form::password('password_confirmation', ['class' => 'gui-input', 'placeholder' => 'Repetir conteaseña']) }}
                        <label for="password_confirmation" class="field-icon"><i class="fa fa-lock"></i></label>
                    </label>
                </div><!-- end section -->

                @if(Session::has('error'))
                    <div class="alert notification alert-error spacer-b10">
                        <i class="fa fa-check"></i> El email ingresado no es correcto.
                    </div>
                @endif

            </div>

            <div class="form-footer">
                <button type="submit" class="button btn-red">Cambiar contraseña</button>
            </div><!-- end .form-footer section -->

        </form>

    </div><!-- end .smart-forms section -->

@stop