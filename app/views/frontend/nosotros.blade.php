@extends('layouts.frontend')

@section('html_title')
    Nosotros | @parent
@stop

@section('contenido_body')

    <!-- Main -->
	<section id="main" class="about-page">
		<div class="container">
			<div class="row">

				<div class="col-md-8">
                    <div class="entry-page">
                        <h2 class="title">Nosotros</h2>
                        <p>Somos un grupo de profesionales de la comunicaci&oacute;n que busca democratizar la informaci&oacute;n bajo el principio universal que toda persona tiene derecho, no s&oacute;lo a recibir informaci&oacute;n y opini&oacute;n, sino tambi&eacute;n a difundirla&nbsp;por cualquier medio de expresi&oacute;n.</p>

                        <p>La piedra angular sobre la que se edifica el PORTAL PER&Uacute; es el <strong><u>Periodismo Ciudadano</u></strong>, un concepto moderno que est&aacute; revolucionando las comunicaciones en el mundo.</p>

                        <p>La aplicaci&oacute;n de este concepto permite que todas las personas que tengan algo que decir o informar, participen en el portal, sin restricciones ni censuras de ning&uacute;n tipo. La idea es incluir a las&nbsp; audiencias activas dentro del entorno del medio de comunicaci&oacute;n y canalizar sus aportes. PORTAL PERU es una alternativa ante los formatos period&iacute;sticos cl&aacute;sicos.</p>

                        <p>Las puertas est&aacute;n abiertas para todos, sin distinci&oacute;n de razas, credos, ni condici&oacute;n social, siempre que se mantenga el respeto mutuo, las normas de cortes&iacute;as y las reglas idiom&aacute;ticas.</p>

                        <h5>Pueden participar:</h5>

                        <ul class="list">
                            <li>Periodistas profesionales.</li>
                            <li>Estudiantes de periodismo</li>
                            <li>P&uacute;blico en general.</li>
                        </ul>

                        <p>PORTAL PER&Uacute; proporciona el espacio y el apoyo t&eacute;cnico para la publicaci&oacute;n de las notas y art&iacute;culos de opini&oacute;n.</p>

                        <p>PORTAL PERU tendr&aacute; una plataforma de soporte profesional period&iacute;stico que se encargar&aacute; de guiar el proceso adecuado para la publicaci&oacute;n de los art&iacute;culos de los reporteros ciudadanos.</p>

                        <p>PORTAL PER&Uacute; tendr&aacute;, adem&aacute;s, un selecto equipo de periodistas que publicar&aacute;n sus columnas de opini&oacute;n con la m&aacute;s amplia libertad.</p>

                        <p>Una red de corresponsales a nivel nacional y en las principales ciudades del mundo, complementan el staff de PORTAL PERU.</p>

                    </div><!-- /.content-right -->
				</div><!-- /.col-md-8 -->

                @include('frontend.partials.sidebar')
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>

@stop