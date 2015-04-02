@extends('layouts.frontend')

@section('contenido_frontend')

<div class="posts col-lg-9 col-md-9 col-sm-12">

	<!-- NOTICIA SUPERIOR -->
	<div class="row">

		<!-- POST SLIDER -->
		<div class="post-slider slider-home col-lg-12 col-md-8 col-sm-8">

			<div class="controls">
				<p class="prev"><i class="fa fa-angle-left"></i></p>
				<p class="next"><i class="fa fa-angle-right"></i></p>
			</div>

			<div class="slides">

			    @foreach($post_1 as $item)
				<article class="big clearfix">
					<img src="upload/{{ $item->imagen_carpeta."870x500/".$item->imagen }}" alt="">
					<div class="info">
						<p class="tags">
							<a href="seccion/{{ $item->category->slug_url }}">{{ $item->category->titulo }}</a>
						</p>
						<h1><a href="nota/{{ $item->id."-".$item->slug_url }}">{{ $item->titulo }}</a></h1>
					</div>
				</article>
				@endforeach

			</div>

		</div>
		<!-- FIN POST SLIDER -->

	</div>
	<!-- FIN NOTICIA SUPERIOR -->

	<!-- NOTICIA CENTRAL -->
	<div class="row">

		<!-- PUBLICIDAD -->
		<article class="col-md-4 col-sm-4 mid">

			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- PP - 250 x 250 -->
			<ins class="adsbygoogle"
			     style="display:inline-block;width:250px;height:250px"
			     data-ad-client="ca-pub-3674889010429322"
			     data-ad-slot="9772725943"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>

		</article>
		<!-- FIN PUBLICIDAD -->

		<!-- NOTICIA CENTRAL -->
		<article class="col-md-4 col-sm-4 mid">
			<div class="img">
				<img src="" alt="">
			</div>
			<div class="info">
				<p class="tags">
					<a href="">					</a>
				</p>
				<h1><a href=""></a></h1>
				<p class="details"></p>
				<p class="text">
				</p>
			</div>
		</article>
		<!-- FIN NOTICIA CENTRAL -->

		<!-- NOTICIA CENTRAL -->
		<article class="col-md-4 col-sm-4 mid">
			<div class="img">
				<img src="">
			</div>
			<div class="info">
				<p class="tags">
					<a class="cat-rciud" href=""></a>
				</p>
				<h1><a href=""></a></h1>
				<p class="details"></p>
				<p class="text"></p>
			</div>
		</article>
		<!-- FIN NOTICIA CENTRAL -->

	</div>
	<!-- FIN NOTICIA CENTRAL -->

	<!-- NOTICIA INFERIOR -->
	<div class="row">

		<article class="col-md-8 col-sm-8 big">
			<div class="img">
				<img src="" alt="">
			</div>
			<div class="info2">
				<p class="tags">
					<a class="cat-rciud" href=""></a>
				</p>
				<h1><a href=""></a></h1>
			</div>
		</article>

		<article class="col-md-4 col-sm-4 mid">
			<div class="img">
				<img src="" alt="">
			</div>
			<div class="info">
				<p class="tags">
					<a class="cat-rciud" href=""></a>
				</p>
				<h1><a href=""></a></h1>
				<p class="details"></p>
				<p class="text">
				</p>
			</div>
		</article>		

	</div>
	<!-- FIN NOTICIA INFERIOR -->

	<!-- NOTICIA INFERIOR HORIZONTAL -->
	<div class="row">
		
		<article class="col-md-4 col-sm-4 mid">
			<div class="img">
				<img src="" alt="">
			</div>
			<div class="info">
				<p class="tags">
					<a class="cat-rciud" href=""></a>
				</p>
				<h1><a href=""></a></h1>
				<p class="details"></p>
				<p class="text">
					
				</p>
			</div>
		</article>

		<article class="col-md-4 col-sm-4 mid">
			
			<div class="img">
				<img src="" alt="">
			</div>
			
			<div class="info">
				<p class="tags">
					
					<a class="cat-rciud" href="">
						</a>
				</p>
				<h1><a href=""></a></h1>
				<p class="details"></p>
				<p class="text">
					
				</p>
			</div>
		</article>

		<article class="col-md-4 col-sm-4 mid">
			
			<div class="img">
				<img src="" alt="">
			</div>
			
			<div class="info">
				<p class="tags">
					
					<a class="cat-rciud" href="">
						</a>
				</p>
				<h1><a href=""></a></h1>
				<p class="details"></p>
				<p class="text">
					
				</p>
			</div>
		</article>

	</div>
	<!-- FIN NOTICIA INFERIOR HORIZONTAL -->

</div>

<aside class="col-md-3 col-sm-12">

	 <!-- COLUMNISTAS -->
	<div class="most-discussed col-md-12 col-sm-6 columnistas">
		<h4>Columnistas</h4>

			<article class="small clearfix">
				<img src="" alt="post" width="75">
				<div class="info">
					<h1><a href=""></a></h1>
					<p class="details">
						<a href=""></a>
					</p>
				</div>
			</article>
		<a href="columnistas" class="btn btn-default">Ver todos</a>
	</div>
	<!-- FIN COLUMNISTAS -->

	<!-- PUBLICIDAD -->
	<div class="banner visible-xs visible-md visible-lg">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- PP - Responsive - 271x350 -->
		<ins class="adsbygoogle"
		     style="display:inline-block;width:271px;height:350px"
		     data-ad-client="ca-pub-3674889010429322"
		     data-ad-slot="4554110744"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
	<!-- PUBLICIDAD -->

	<div class="hidden-xs hidden-sm hidden-md hidden-lg"></div>

	<!-- GALERIA DE FOTOS -->
	<div class="flickr col-md-12 col-sm-6">
		<h4>Galería de Imágenes</h4>
	</div>
	<!-- FIN GALERIA DE FOTOS -->

	<!-- SUSCRIPCION -->
	<div class="newsletter visible-md visible-lg">
		<h3>Mantente al dia</h3>
		<p>Suscribe y recive por mail lo ultimo en informacion y participa de nuestros sorteos</p>
		<form action="POST">
			<input type="email" class="form-control" placeholder="Enter your email">
			<input type="submit" value="suscribete" class="btn btn-default btn-block">
		</form>
	</div>
	<!-- FIN SUSCRIPCION -->

</aside>

@stop