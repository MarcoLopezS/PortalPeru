<!DOCTYPE html>
<html lang="es">
  <head>
  	<title>
  	    @section('reportero_title')
            {{ configWeb()->titulo }}
        @show
  	</title>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{ HTML::style('libs/smartform/css/smart-forms.css') }}
    {{ HTML::style('libs/smartform/css/smart-themes/red.css') }}
    {{ HTML::style('libs/smartform/css/font-awesome.min.css') }}

    <!--[if lte IE 9]>
        {{ HTML::script('libs/smartform/js/jquery.placeholder.min.js') }}
    <![endif]-->

    <!--[if lte IE 8]>
        {{ HTML::style('libs/smartform/css/smart-forms-ie8.css') }}
    <![endif]-->
       
</head>

<body class="woodbg">

	<div class="smart-wrap">

    @yield('contenido_reportero')

	</div><!-- end .smart-wrap section -->

	{{ HTML::script('libs/smartform/js/jquery-1.9.1.min.js') }}

</body>
</html>
