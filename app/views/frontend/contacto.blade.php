@extends('layouts.frontend')

@section('html_title')
Contacto | @parent
@stop

@section('contenido_frontend')

<!--MAIN SECTION-->
<div class="main post-page">

    <div class="row">

        <!--CONTENT-->
        <div class="col-md-9 col-sm-12 clearfix">
            <!--POST-->
            <article class="post mid fullwidth">
                <div class="info">
                    <h1>Contactenos</h1>
                </div>

                <div class="row">
                    <div class="info col-md-12 col-sm-12">
                        <div class="info">
                            <div class="text">
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

                            </div>
                        </div>
                    </div>
                </div>

            </article>
            <!--END POST-->

        </div>
        <!--END CONTENT-->

        @include('frontend.sidebar')

    </div>

</div>
<!--END MAIN SECTION-->

@stop