@extends('layouts.frontend')

@section('html_title')
    Contacto | @parent
@stop

@section('contenido_body')

    <!-- Main -->
	<section id="main" class="about-page">
		<div class="container">
			<div class="row">

				<div class="col-md-8">
                    <div class="entry-page">
                        <h2 class="title">Contacto</h2>
                        <table border="0" cellpadding="2" cellspacing="2" style="height:20px; width:100%">
                            <tbody>
                            <tr>
                                <td>Director</td>
                                <td>V&iacute;ctor Tipe S&aacute;nchez</td>
                                <td>vtipe@portalperu.pe</td>
                            </tr>
                            <tr>
                                <td>Editor Gr&aacute;fico</td>
                                <td>Roberto Guerrero Espinoza</td>
                                <td>rguerrero@portalperu.pe</td>
                            </tr>
                            <tr>
                                <td>Gerente de Sistemas</td>
                                <td>Julio De la Cruz</td>
                                <td>jdelacruz@portalperu.pe</td>
                            </tr>
                            <tr>
                                <td>Jefe de Informaciones</td>
                                <td>Johan P&eacute;rez</td>
                                <td>informaciones@portalperu.pe</td>
                            </tr>
                            <tr>
                                <td>Director Gerente</td>
                                <td>Jaime Tipe S&aacute;nchez</td>
                                <td>jtipe@portalperu.pe</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.content-right -->
				</div><!-- /.col-md-8 -->

                @include('frontend.partials.sidebar')
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>

@stop