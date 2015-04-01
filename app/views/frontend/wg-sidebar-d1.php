<?php

//COLUMNISTAS
if(date("N")==1){ $rst_columselect=mysql_query("SELECT * FROM lndd_columnista WHERE dia_lunes=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==2){ $rst_columselect=mysql_query("SELECT * FROM lndd_columnista WHERE dia_martes=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==3){ $rst_columselect=mysql_query("SELECT * FROM lndd_columnista WHERE dia_miercoles=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==4){ $rst_columselect=mysql_query("SELECT * FROM lndd_columnista WHERE dia_jueves=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==5){ $rst_columselect=mysql_query("SELECT * FROM lndd_columnista WHERE dia_viernes=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==6){ $rst_columselect=mysql_query("SELECT * FROM lndd_columnista WHERE dia_sabado=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==7){ $rst_columselect=mysql_query("SELECT * FROM lndd_columnista WHERE dia_domingo=1 AND publicar=1 ORDER BY id ASC;", $conexion);}

?>
<aside class="col-md-3 col-sm-12">

	 <!-- COLUMNISTAS -->
	<div class="most-discussed col-md-12 col-sm-6 columnistas">
		<h4>Columnistas</h4>

			<?php while($fila_columselect=mysql_fetch_array($rst_columselect)){
                $columSelect_id=$fila_columselect["id"];
                $columSelect_url=$fila_columselect["url"];
                $columSelect_titulo=$fila_columselect["nombre_completo"];
                $columSelect_imagen=$fila_columselect["imagen_portada"];
                
                //COLUMNA
                $rst_columna=mysql_query("SELECT * FROM lndd_columnista_columna WHERE columnista=$columSelect_id ORDER BY id DESC LIMIT 1;", $conexion);
                $fila_columna=mysql_fetch_array($rst_columna);

                //VARIABLES
                $columna_id=$fila_columna["id"];
                $columna_url=$fila_columna["url"];
                $columna_titulo=$fila_columna["titulo"];

                //URLS
                $columSelect_webImg=$web."imagenes/columnistas/".$columSelect_imagen;
                $columSelect_webUrl=$web."columna/".$columna_id."-".$columna_url;
                $columSelect_webUrlColumnista=$web."columnista/".$columSelect_url;
        	?>
			<article class="small clearfix">
				<img src="<?php echo $columSelect_webImg; ?>" alt="post" width="75">
				<div class="info">
					<h1><a href="<?php echo $columSelect_webUrlColumnista; ?>"><?php echo $columSelect_titulo; ?></a></h1>
					<p class="details">
						<a href="<?php echo $columSelect_webUrl; ?>"><?php echo $columna_titulo; ?></a>
					</p>
				</div>
			</article>
			<?php } ?>
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