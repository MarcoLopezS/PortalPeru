@extends('layouts.frontend')

@section('html_title')
    Publicidad | @parent
@stop

@section('contenido_body')

    <!-- Main -->
	<section id="main" class="about-page">
		<div class="container">
			<div class="row">

				<div class="col-md-8">
                    <div class="entry-page">
                        <h2 class="title">Publicidad</h2>
                        <table border="0" cellpadding="2" cellspacing="2" style="height:20px; width:100%">
                            <tbody>
                            <tr>
                                <td>Jaime Tipe S&aacute;nchez</td>
                                <td>jtipe@portalperu.pe</td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- /.content-right -->
				</div><!-- /.col-md-8 -->

                @include('frontend.partials.side-bar')
			</div><!-- /.row -->
		</div><!-- /.container -->
	</section>

@stop