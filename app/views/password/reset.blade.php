@extends('layouts.reportero')

@section('contenido_reportero')

    <div class="smart-forms smart-container wrap-3">
        
        <div class="form-header header-red">
            <img src="/imagenes/logo.png" alt="logo">
        </div><!-- end .form-header section -->

        <form action="{{ action('RemindersController@postReset') }}" method="POST">
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="email" name="email">
            <input type="password" name="password">
            <input type="password" name="password_confirmation">
            <input type="submit" value="Reset Password">
        </form>

    </div><!-- end .smart-forms section -->

@stop