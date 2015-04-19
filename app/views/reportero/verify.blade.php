@extends('layouts.reportero')

@section('contenido_reportero')

<div class="smart-forms smart-container wrap-2">

    <div class="form-header header-red">
        <img src="/imagenes/logo.png" alt="logo">
    </div><!-- end .form-header section -->

    <div class="form-body">

        @if($message=="verify")
            <div class="alert notification alert-success spacer-b10"><i class="fa fa-check"></i> Te has registrador correctamente. Revisa tu correo para que puedas activar tu cuenta. Si el mensaje no se encuentra en tu bandeja de entrada, revisa en las carpetas de Correo no deseado o SPAM.</div>
        @elseif($message=="verify-active")
            <div class="alert notification alert-success spacer-b10"><i class="fa fa-check"></i> Tu cuenta ha sido activada satisfactoriamente.</div>
        @elseif($message=="verify-noactive")
            <div class="alert notification alert-warning spacer-b10"><i class="fa fa-times"></i> Tu cuenta ya fue activada anteriormente.</div>
        @endif

        <div class="section textAlignCenter">
            <p>¿No has recibido el mensaje para activar tu cuenta?</p>
            <p><a class="button btn-red" href="{{ route('reportero.correoActivarCuenta.form') }}">Enviar mensaje para activar cuenta</a></p>
        </div>

        <div class="section">
            <a class="button btn-red" href="{{ route('reportero.login') }}">Iniciar sesion</a>
            <a class="button btn-red floatRight" href="{{ route('reportero.login') }}">Recuperar contraseña</a>
        </div>



    </div><!-- end .form-body section -->

</div><!-- end .smart-forms section -->

@stop