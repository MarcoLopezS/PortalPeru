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
                        <p>Somos un grupo de profesionales que busca rescatar y difundir contenido hist&oacute;rico para un conocimiento cabal de la historia del Per&uacute;, no solo en el aspecto pol&iacute;tico, sino social, econ&oacute;mico y cultural, y, adem&aacute;s, establecer un espacio de debate para el fortalecimiento de los valores ciudadanos.</p>

                        <p>El objetivo es contribuir al fortalecimiento de la democracia, la construcci&oacute;n de una identidad nacional y a la formaci&oacute;n de una cultura c&iacute;vica en el pa&iacute;s, rescatando contenido hist&oacute;rico excluido del conocimiento ciudadano y ausente en la pol&iacute;tica educativa del Estado.</p>

                        <p>El Per&uacute; es un pa&iacute;s con una riqueza hist&oacute;rica importante. Ha sido cuna del Imperio Inca, uno de los m&aacute;s importantes de la Am&eacute;rica precolombina, y centro del virreinato espa&ntilde;ol durante tres centurias. Sin embargo, este rico historial, que deber&iacute;a servir de experiencia y factor de consolidaci&oacute;n de la ciudadan&iacute;a y de los valores c&iacute;vicos, no es aprovechado adecuadamente a causa del desconocimiento o el desinter&eacute;s ciudadano. &nbsp;&nbsp;</p>

                        <p>Es un dicho popular que &ldquo;el Per&uacute; es un pa&iacute;s sin memoria&rdquo; y que no &ldquo;aprende de las lecciones del pasado&rdquo;. Y de alguna manera tales asertos tienen asidero porque muchos errores hist&oacute;ricos han sido repetidos no s&oacute;lo por los gobiernos, sino por enormes sectores de la sociedad y los propios l&iacute;deres pol&iacute;ticos y sociales que no han aprendido de las vivencias del pasado.</p>

                        <p>El Portal, que est&aacute; en funcionamiento desde el 2015, es de acceso completamente gratuito y contiene documentos, art&iacute;culos, fotos, entrevistas a grandes personajes y libros de gran valor acad&eacute;mico e hist&oacute;rico, rescatados de las principales bibliotecas de Lima y otros archivos a los que actualmente la gran mayor&iacute;a ciudadana no tiene acceso por diversas barreras, ya sean econ&oacute;micas, burocr&aacute;ticas, geogr&aacute;ficas o log&iacute;sticas.</p>

                    </div><!-- /.content-right -->
				</div><!-- /.col-md-8 -->

                @include('frontend.partials.side-bar')
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>

@stop