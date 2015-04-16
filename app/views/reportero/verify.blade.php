@extends('layouts.reportero')

@section('contenido_reportero')

<div class="smart-forms smart-container wrap-2">

    <div class="form-header header-red">
        <img src="/imagenes/logo.png" alt="logo">
    </div><!-- end .form-header section -->

    <div class="form-body">

        @if($message=="verify")
            <div class="alert notification alert-success spacer-b10"><i class="fa fa-check"></i> Te has registrador correctamente.</div>
        @elseif($message=="verify-active")
            <div class="alert notification alert-success spacer-b10"><i class="fa fa-check"></i> Tu cuenta ha sido activada satisfactoriamente.</div>
        @elseif($message=="verify-noactive")
            <div class="alert notification alert-warning spacer-b10"><i class="fa fa-times"></i> Tu cuenta ya fue activada anteriormente.</div>
        @endif

        <div class="section">

            <p>
                <a href="{{ route('reportero.login') }}">Iniciar sesion</a>
            </p>

        </div>

    </div><!-- end .form-body section -->

</div><!-- end .smart-forms section -->

@stop