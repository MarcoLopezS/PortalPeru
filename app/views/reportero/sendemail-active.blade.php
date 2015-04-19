@extends('layouts.reportero')

@section('contenido_reportero')

    <div class="smart-forms smart-container wrap-3">
        
        <div class="form-header header-red">
            <img src="/imagenes/logo.png" alt="logo">
        </div><!-- end .form-header section -->

        {{ Form::open(['route' => 'reportero.correoActivarCuenta.form', 'method' => 'post']) }}

            <div class="form-body theme-red">

                <div class="section">
                    <label for="email" class="field prepend-icon">
                        {{ Form::email('email', null, ['class' => 'gui-input', 'placeholder' => 'Correo electronico']) }}
                        <label for="email" class="field-icon"><i class="fa fa-user"></i></label>
                    </label>
                    {{ $errors->first('email', '
                    <div class="alert notification alert-error spacer-t10">
                        <span class="help-block">:message</span>
                    </div>') }}                    
                </div><!-- end section -->

                @if(Session::has('login_error'))
                    <div class="alert notification alert-error spacer-b10">
                        <i class="fa fa-check"></i> El email no está registrado.
                    </div>
                @endif

            </div><!-- end .form-body section -->
            <div class="form-footer">
                <button type="submit" class="button btn-red">Enviar correo para activación</button>
            </div><!-- end .form-footer section -->

        {{ Form::close() }}

    </div><!-- end .smart-forms section -->

@stop