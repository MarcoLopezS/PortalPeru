@extends('layouts.reportero')

@section('contenido_reportero')

    	<div class="smart-forms smart-container wrap-2">
        
        	<div class="form-header header-red">
            	<h4><img src="/imagenes/logo.png" alt="logo"></h4>
          </div><!-- end .form-header section -->
            
            <form method="post" action="php/smartprocess.php" id="smart-form" enctype="multipart/form-data">
            	<div class="form-body">
                
                    <div class="alert notification alert-success spacer-b10"><i class="fa fa-check"></i> Tu cuenta ha sido activada satisfactoriamente.</div>
                    <div class="alert notification alert-error spacer-b10"><i class="fa fa-times"></i> Tu cuenta ya fue activada anteriormente.</div>

                </div><!-- end .form-body section -->
            </form>
            
        </div><!-- end .smart-forms section -->
    </div><!-- end .smart-wrap section -->

@stop