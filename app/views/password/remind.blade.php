@extends('layouts.reportero')

@section('contenido_reportero')

    <div class="smart-forms smart-container wrap-3">
        
        <div class="form-header header-red">
            <img src="/imagenes/logo.png" alt="logo">
        </div><!-- end .form-header section -->

        <form action="{{ action('RemindersController@postRemind') }}" method="POST">
        	<div class="form-body theme-red">
	            
	            <div class="section">
                    <label for="email" class="field prepend-icon">
                        {{ Form::email('email', null, ['class' => 'gui-input', 'placeholder' => 'Correo electronico']) }}
                        <label for="email" class="field-icon"><i class="fa fa-user"></i></label>
                    </label>
                </div><!-- end section -->

                @if(Session::has('error'))
                    <div class="alert notification alert-error spacer-b10">
                        <i class="fa fa-check"></i> El email no está registrado.
                    </div>
                @endif

                @if(Session::has('status'))
                    <div class="alert notification alert-success spacer-b10">
                        <i class="fa fa-check"></i> Se ha enviado un mensaje al correo que has indicado.
                    </div>
                @endif

        	</div>        	

        	<div class="form-footer">
                <button type="submit" class="button btn-red">Recuperar contraseña</button>
            </div><!-- end .form-footer section -->			

        </form>

    </div><!-- end .smart-forms section -->

@stop