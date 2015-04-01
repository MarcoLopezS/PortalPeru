<?php
require_once("panel@lndd/conexion/conexion.php");
require_once("panel@lndd/conexion/funciones.php");

//NOTICIA DESTACADA
$rst_not_dest=mysql_query("SELECT * FROM lndd_noticia WHERE destacada=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 4", $conexion);

/*=================================================================================
===================================================================================*/

//NOTICIA SUPERIOR 1
$rst_not_sup1=mysql_query("SELECT * FROM lndd_noticia WHERE superior_1=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup1=mysql_fetch_array($rst_not_sup1);

//VARIABLES
$notSup1_id=$fila_not_sup1["id"];
$notSup1_url=$fila_not_sup1["url"];
$notSup1_titulo=$fila_not_sup1["titulo"];
$notSup1_contenido=$fila_not_sup1["contenido_corto"];
$notSup1_imagen=$fila_not_sup1["imagen"];
$notSup1_imagen_carpeta=$fila_not_sup1["imagen_carpeta"];
$notSup1_categoria=$fila_not_sup1["categoria"];
$notSup1_web=$web."noticia/".$notSup1_id."-".$notSup1_url;
$notSup1_web_img=$web."imagenes/upload/".$notSup1_imagen_carpeta."thumb/".$notSup1_imagen;

//FECHA PUBLICACION
$notSup1_fecha=$fila_not_sup1["fecha_publicacion"];
if($notSup1_fecha=="0000-00-00 00:00:00"){
	$notSup1_fecha=$fila_not_sup1["fecha"];
}else{ $notSup1_fecha=notaTiempo($notSup1_fecha);} 

//CATEGORIA
$fila_notsup1_cat=seleccionTabla($notSup1_categoria, "id", "lndd_noticia_categoria", $conexion);
$notSup1Cat_url=$fila_notsup1_cat["url"];
$notSup1Cat_titulo=$fila_notsup1_cat["categoria"];
$notSup1Cat_web=$web."seccion/".$notSup1Cat_url;

/*=================================================================================
===================================================================================*/

//NOTICIA SUPERIOR 2
$rst_not_sup2=mysql_query("SELECT * FROM lndd_noticia WHERE superior_2=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup2=mysql_fetch_array($rst_not_sup2);

//VARIABLES
$notSup2_id=$fila_not_sup2["id"];
$notSup2_url=$fila_not_sup2["url"];
$notSup2_titulo=$fila_not_sup2["titulo"];
$notSup2_contenido=$fila_not_sup2["contenido_corto"];
$notSup2_imagen=$fila_not_sup2["imagen"];
$notSup2_imagen_carpeta=$fila_not_sup2["imagen_carpeta"];
$notSup2_categoria=$fila_not_sup2["categoria"];
$notSup2_web=$web."noticia/".$notSup2_id."-".$notSup2_url;
$notSup2_web_img=$web."imagenes/upload/".$notSup2_imagen_carpeta."thumb/".$notSup2_imagen;

//FECHA PUBLICACION
$notSup2_fecha=$fila_not_sup2["fecha_publicacion"];
if($notSup2_fecha=="0000-00-00 00:00:00"){
	$notSup2_fecha=$fila_not_sup2["fecha"];
}else{ $notSup2_fecha=notaTiempo($notSup2_fecha);} 

//CATEGORIA
$fila_notsup2_cat=seleccionTabla($notSup2_categoria, "id", "lndd_noticia_categoria", $conexion);
$notSup2Cat_url=$fila_notsup2_cat["url"];
$notSup2Cat_titulo=$fila_notsup2_cat["categoria"];
$notSup2Cat_web=$web."seccion/".$notSup2Cat_url;

/*=================================================================================
===================================================================================*/

//NOTICIA SUPERIOR 3
$rst_not_sup3=mysql_query("SELECT * FROM lndd_noticia WHERE superior_3=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup3=mysql_fetch_array($rst_not_sup3);

//VARIABLES
$notSup3_id=$fila_not_sup3["id"];
$notSup3_url=$fila_not_sup3["url"];
$notSup3_titulo=$fila_not_sup3["titulo"];
$notSup3_contenido=$fila_not_sup3["contenido_corto"];
$notSup3_imagen=$fila_not_sup3["imagen"];
$notSup3_imagen_carpeta=$fila_not_sup3["imagen_carpeta"];
$notSup3_categoria=$fila_not_sup3["categoria"];
$notSup3_web=$web."noticia/".$notSup3_id."-".$notSup3_url;
$notSup3_web_img=$web."imagenes/upload/".$notSup3_imagen_carpeta."thumb/".$notSup3_imagen;

//FECHA PUBLICACION
$notSup3_fecha=$fila_not_sup3["fecha_publicacion"];
if($notSup3_fecha=="0000-00-00 00:00:00"){
	$notSup3_fecha=$fila_not_sup3["fecha"];
}else{ $notSup3_fecha=notaTiempo($notSup3_fecha);} 

//CATEGORIA
$fila_notsup3_cat=seleccionTabla($notSup3_categoria, "id", "lndd_noticia_categoria", $conexion);
$notSup3Cat_url=$fila_notsup3_cat["url"];
$notSup3Cat_titulo=$fila_notsup3_cat["categoria"];
$notSup3Cat_web=$web."seccion/".$notSup3Cat_url;

/*=================================================================================
===================================================================================*/

//NOTICIA SUPERIOR 4
$rst_not_sup4=mysql_query("SELECT * FROM lndd_noticia WHERE superior_4=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup4=mysql_fetch_array($rst_not_sup4);

//VARIABLES
$notSup4_id=$fila_not_sup4["id"];
$notSup4_url=$fila_not_sup4["url"];
$notSup4_titulo=$fila_not_sup4["titulo"];
$notSup4_contenido=$fila_not_sup4["contenido_corto"];
$notSup4_imagen=$fila_not_sup4["imagen"];
$notSup4_imagen_carpeta=$fila_not_sup4["imagen_carpeta"];
$notSup4_categoria=$fila_not_sup4["categoria"];
$notSup4_web=$web."noticia/".$notSup4_id."-".$notSup4_url;
$notSup4_web_img=$web."imagenes/upload/".$notSup4_imagen_carpeta."thumb/".$notSup4_imagen;

//FECHA PUBLICACION
$notSup4_fecha=$fila_not_sup4["fecha_publicacion"];
if($notSup4_fecha=="0000-00-00 00:00:00"){
	$notSup4_fecha=$fila_not_sup4["fecha"];
}else{ $notSup4_fecha=notaTiempo($notSup4_fecha);} 

//CATEGORIA
$fila_notsup4_cat=seleccionTabla($notSup4_categoria, "id", "lndd_noticia_categoria", $conexion);
$notSup4Cat_url=$fila_notsup4_cat["url"];
$notSup4Cat_titulo=$fila_notsup4_cat["categoria"];
$notSup4Cat_web=$web."seccion/".$notSup4Cat_url;

/*=================================================================================
===================================================================================*/

//NOTICIA SUPERIOR 5
$rst_not_sup5=mysql_query("SELECT * FROM lndd_noticia WHERE superior_5=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup5=mysql_fetch_array($rst_not_sup5);

//VARIABLES
$notSup5_id=$fila_not_sup5["id"];
$notSup5_url=$fila_not_sup5["url"];
$notSup5_titulo=$fila_not_sup5["titulo"];
$notSup5_contenido=$fila_not_sup5["contenido_corto"];
$notSup5_imagen=$fila_not_sup5["imagen"];
$notSup5_imagen_carpeta=$fila_not_sup5["imagen_carpeta"];
$notSup5_categoria=$fila_not_sup5["categoria"];
$notSup5_web=$web."noticia/".$notSup5_id."-".$notSup5_url;
$notSup5_web_img=$web."imagenes/upload/".$notSup5_imagen_carpeta."thumb/".$notSup5_imagen;

//FECHA PUBLICACION
$notSup5_fecha=$fila_not_sup5["fecha_publicacion"];
if($notSup5_fecha=="0000-00-00 00:00:00"){
	$notSup5_fecha=$fila_not_sup5["fecha"];
}else{ $notSup5_fecha=notaTiempo($notSup5_fecha);} 

//CATEGORIA
$fila_notsup5_cat=seleccionTabla($notSup5_categoria, "id", "lndd_noticia_categoria", $conexion);
$notSup5Cat_url=$fila_notsup5_cat["url"];
$notSup5Cat_titulo=$fila_notsup5_cat["categoria"];
$notSup5Cat_web=$web."seccion/".$notSup5Cat_url;

/*=================================================================================
===================================================================================*/

//NOTICIA SUPERIOR 6
$rst_not_sup6=mysql_query("SELECT * FROM lndd_noticia WHERE superior_6=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup6=mysql_fetch_array($rst_not_sup6);

//VARIABLES
$notSup6_id=$fila_not_sup6["id"];
$notSup6_url=$fila_not_sup6["url"];
$notSup6_titulo=$fila_not_sup6["titulo"];
$notSup6_contenido=$fila_not_sup6["contenido_corto"];
$notSup6_imagen=$fila_not_sup6["imagen"];
$notSup6_imagen_carpeta=$fila_not_sup6["imagen_carpeta"];
$notSup6_categoria=$fila_not_sup6["categoria"];
$notSup6_web=$web."noticia/".$notSup6_id."-".$notSup6_url;
$notSup6_web_img=$web."imagenes/upload/".$notSup6_imagen_carpeta."thumb/".$notSup6_imagen;

//FECHA PUBLICACION
$notSup6_fecha=$fila_not_sup6["fecha_publicacion"];
if($notSup6_fecha=="0000-00-00 00:00:00"){
	$notSup6_fecha=$fila_not_sup6["fecha"];
}else{ $notSup6_fecha=notaTiempo($notSup6_fecha);} 

//CATEGORIA
$fila_notsup6_cat=seleccionTabla($notSup6_categoria, "id", "lndd_noticia_categoria", $conexion);
$notSup6Cat_url=$fila_notsup6_cat["url"];
$notSup6Cat_titulo=$fila_notsup6_cat["categoria"];
$notSup6Cat_web=$web."seccion/".$notSup6Cat_url;

/*=================================================================================
===================================================================================*/

//NOTICIA SUPERIOR 7
$rst_not_sup7=mysql_query("SELECT * FROM lndd_noticia WHERE superior_7=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup7=mysql_fetch_array($rst_not_sup7);

//VARIABLES
$notSup7_id=$fila_not_sup7["id"];
$notSup7_url=$fila_not_sup7["url"];
$notSup7_titulo=$fila_not_sup7["titulo"];
$notSup7_contenido=$fila_not_sup7["contenido_corto"];
$notSup7_imagen=$fila_not_sup7["imagen"];
$notSup7_imagen_carpeta=$fila_not_sup7["imagen_carpeta"];
$notSup7_categoria=$fila_not_sup7["categoria"];
$notSup7_web=$web."noticia/".$notSup7_id."-".$notSup7_url;
$notSup7_web_img=$web."imagenes/upload/".$notSup7_imagen_carpeta."thumb/".$notSup7_imagen;

//FECHA PUBLICACION
$notSup7_fecha=$fila_not_sup7["fecha_publicacion"];
if($notSup7_fecha=="0000-00-00 00:00:00"){
	$notSup7_fecha=$fila_not_sup7["fecha"];
}else{ $notSup7_fecha=notaTiempo($notSup7_fecha);} 

//CATEGORIA
$fila_notsup7_cat=seleccionTabla($notSup7_categoria, "id", "lndd_noticia_categoria", $conexion);
$notSup7Cat_url=$fila_notsup7_cat["url"];
$notSup7Cat_titulo=$fila_notsup7_cat["categoria"];
$notSup7Cat_web=$web."seccion/".$notSup7Cat_url;

/*=================================================================================
===================================================================================*/

//NOTICIA SUPERIOR 8
$rst_not_sup8=mysql_query("SELECT * FROM lndd_noticia WHERE superior_8=1 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC, id DESC LIMIT 1", $conexion);
$fila_not_sup8=mysql_fetch_array($rst_not_sup8);

//VARIABLES
$notSup8_id=$fila_not_sup8["id"];
$notSup8_url=$fila_not_sup8["url"];
$notSup8_titulo=$fila_not_sup8["titulo"];
$notSup8_contenido=$fila_not_sup8["contenido_corto"];
$notSup8_imagen=$fila_not_sup8["imagen"];
$notSup8_imagen_carpeta=$fila_not_sup8["imagen_carpeta"];
$notSup8_categoria=$fila_not_sup8["categoria"];
$notSup8_web=$web."noticia/".$notSup8_id."-".$notSup8_url;
$notSup8_web_img=$web."imagenes/upload/".$notSup8_imagen_carpeta."thumb/".$notSup8_imagen;

//FECHA PUBLICACION
$notSup8_fecha=$fila_not_sup8["fecha_publicacion"];
if($notSup8_fecha=="0000-00-00 00:00:00"){
	$notSup8_fecha=$fila_not_sup8["fecha"];
}else{ $notSup8_fecha=notaTiempo($notSup8_fecha);} 

//CATEGORIA
$fila_notsup8_cat=seleccionTabla($notSup8_categoria, "id", "lndd_noticia_categoria", $conexion);
$notSup8Cat_url=$fila_notsup8_cat["url"];
$notSup8Cat_titulo=$fila_notsup8_cat["categoria"];
$notSup8Cat_web=$web."seccion/".$notSup8Cat_url;

/*=================================================================================
===================================================================================*/

//COLUMNISTAS
if(date("N")==1){ $rst_columselect=mysql_query("SELECT * FROM lndd_columnista WHERE dia_lunes=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==2){ $rst_columselect=mysql_query("SELECT * FROM lndd_columnista WHERE dia_martes=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==3){ $rst_columselect=mysql_query("SELECT * FROM lndd_columnista WHERE dia_miercoles=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==4){ $rst_columselect=mysql_query("SELECT * FROM lndd_columnista WHERE dia_jueves=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==5){ $rst_columselect=mysql_query("SELECT * FROM lndd_columnista WHERE dia_viernes=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==6){ $rst_columselect=mysql_query("SELECT * FROM lndd_columnista WHERE dia_sabado=1 AND publicar=1 ORDER BY id ASC;", $conexion);
}elseif(date("N")==7){ $rst_columselect=mysql_query("SELECT * FROM lndd_columnista WHERE dia_domingo=1 AND publicar=1 ORDER BY id ASC;", $conexion);}

/*=================================================================================
===================================================================================*/

//REPORTE CIUDADANO
$rst_reportCiud=mysql_query("SELECT * FROM lndd_noticia WHERE categoria=7 AND publicar=1 AND fecha_publicacion<='$fechaActual' ORDER BY fecha_publicacion DESC LIMIT 6", $conexion);
?>

<div class="posts col-lg-12 col-md-12 col-sm-12">

	<!-- NOTICIA SUPERIOR -->
	<div class="row">

		<!-- POST SLIDER -->
		<div class="post-slider designfour slider-home col-lg-12 col-md-12 col-sm-12">

			<div class="controls">
				<p class="prev"><i class="fa fa-angle-left"></i></p>
				<p class="next"><i class="fa fa-angle-right"></i></p>
			</div>

			<div class="slides">
				<?php while($fila_not_dest=mysql_fetch_array($rst_not_dest)){
						//VARIABLES
						$notDest_id=$fila_not_dest["id"];
						$notDest_url=$fila_not_dest["url"];
						$notDest_titulo=$fila_not_dest["titulo"];
						$notDest_contenido=$fila_not_dest["contenido_corto"];
						$notDest_imagen=$fila_not_dest["imagen"];
						$notDest_imagen_carpeta=$fila_not_dest["imagen_carpeta"];
						$notDest_categoria=$fila_not_dest["categoria"];

						//FECHA PUBLICACION
						$notDest_fecha=$fila_not_dest["fecha_publicacion"];
	                    if($notDest_fecha=="0000-00-00 00:00:00"){
	                        $notDest_fecha=$fila_not_dest["fecha"];
	                    }else{ $notDest_fecha=notaTiempo($notDest_fecha);} 

						//URLS
						$notDest_web=$web."noticia/".$notDest_id."-".$notDest_url;
						$notDest_web_img=$web."imagenes/upload/".$notDest_imagen_carpeta."thumb/".$notDest_imagen;

						//NOTICIA DESTACADA - CATEGORIA
						$rst_notdest_cat=mysql_query("SELECT * FROM lndd_noticia_categoria WHERE id=$notDest_categoria;", $conexion);
						$fila_notdest_cat=mysql_fetch_array($rst_notdest_cat);

						//VARIABLES
						$notDestCat_url=$fila_notdest_cat["url"];
						$notDestCat_titulo=$fila_notdest_cat["categoria"];
						$notDestCat_web=$web."seccion/".$fila_notdest_cat["url"];
				?>
				<article class="big clearfix">
					<img src="<?php echo $notDest_web_img; ?>" alt="<?php echo $notDest_titulo; ?>" width="800" height="500">
					<div class="info">
						<p class="tags">
							<a href="<?php echo $notDestCat_we; ?>"><?php echo $notDestCat_titulo; ?></a>
						</p>
						<h1><a href="<?php echo $notDest_web; ?>"><?php echo $notDest_titulo; ?></a></h1>
					</div>
				</article>
				<?php } ?>

			</div>

		</div>
		<!-- FIN POST SLIDER -->

	</div>
	<!-- FIN NOTICIA SUPERIOR -->

</div>

<!--CONTENT-->
<div class="posts col-lg-12 col-md-12 col-sm-12">

	<!-- NOTICIA CENTRAL -->
	<div class="row">

		<!-- PUBLICIDAD -->
		<article class="col-md-3 col-sm-3 mid">

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
		<article class="col-md-3 col-sm-3 mid">
			<?php if($notSup2_imagen<>""){ ?>
			<div class="img">
				<img src="<?php echo $notSup2_web_img; ?>" alt="<?php echo $notSup2Cat_titulo; ?>">
			</div>
			<?php } ?>
			<div class="info">
				<p class="tags">
					<?php if($notSup2_categoria==7){ ?>
					<a class="cat-rciud" href="<?php echo $notSup2Cat_web; ?>">
					<?php }else{ ?>
					<a href="<?php echo $notSup2Cat_web; ?>">
					<?php } ?>
						<?php echo $notSup2Cat_titulo; ?></a>
				</p>
				<h1><a href="<?php echo $notSup2_web; ?>"><?php echo $notSup2_titulo; ?></a></h1>
				<p class="details"><?php echo $notSup2_fecha ?></p>
				<p class="text">
					<?php echo $notSup2_contenido; ?>
				</p>
			</div>
		</article>
		<!-- FIN NOTICIA CENTRAL -->

		<!-- REPORTERO CUIDADANO -->
		<div class="most-discussed col-md-3 col-sm-3 columnistas">
			<h4>Reportero Ciudadano</h4>
				
			<?php while($fila_reportCiud=mysql_fetch_array($rst_reportCiud)){
		        $ReportCiud_id=$fila_reportCiud["id"];
		        $ReportCiud_url=$fila_reportCiud["url"];
		        $ReportCiud_titulo=$fila_reportCiud["titulo"];

		        $nota_fechaPub=$fila_reportCiud["fecha_publicacion"];
			    $nota_fechaPubNot=explode(" ", $nota_fechaPub);
			    $nota_fechaPubNotFi=explode("-", $nota_fechaPubNot[0]);
			    $nota_fechaTotal=nombreFechaTotal($nota_fechaPubNotFi[0],$nota_fechaPubNotFi[1],$nota_fechaPubNotFi[2]);
			    $nota_fechaFinal=$nota_fechaTotal;
		        
		        //URLS
		        $ReportCiud_webUrl=$web."noticia/".$ReportCiud_id."-".$ReportCiud_url;            
			?>
			<article class="small clearfix">
				<div class="info">
					<p class="details">
						<a href="<?php echo $ReportCiud_webUrl; ?>"><?php echo $ReportCiud_titulo; ?></a>					
					</p>
					<p class="details"><span><?php echo $nota_fechaFinal; ?></span></p>
				</div>
			</article>
			<?php } ?>

			<a href="seccion/reportero-ciudadano" class="btn btn-default">Ver todos</a>
		</div>
		<!-- FIN REPORTERO CUIDADANO -->

		<!-- COLUMNISTAS -->
		<div class="most-discussed col-md-3 col-sm-3 columnistas">
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

	</div>
	<!-- FIN NOTICIA CENTRAL -->

	<!-- NOTICIA INFERIOR -->
	<div class="row">

		<!-- NOTICIA CENTRAL -->
		<article class="col-md-3 col-sm-3 mid">
			<?php if($notSup3_imagen<>""){ ?>
			<div class="img">
				<img src="<?php echo $notSup3_web_img; ?>" alt="<?php echo $notSup3Cat_titulo; ?>">
			</div>
			<?php } ?>
			<div class="info">
				<p class="tags">
					<?php if($notSup3_categoria==7){ ?>
					<a class="cat-rciud" href="<?php echo $notSup3Cat_web; ?>">
					<?php }else{ ?>
					<a href="<?php echo $notSup3Cat_web; ?>">
					<?php } ?>
						<?php echo $notSup3Cat_titulo; ?></a>
				</p>
				<h1><a href="<?php echo $notSup3_web; ?>"><?php echo $notSup3_titulo; ?></a></h1>
				<p class="details"><?php echo $notSup3_fecha ?></p>
				<p class="text">
					<?php echo $notSup3_contenido; ?>
				</p>
			</div>
		</article>
		<!-- FIN NOTICIA CENTRAL -->

		<article class="col-md-6 col-sm-6 big">
			<div class="img">
				<img src="<?php echo $notSup5_web_img; ?>" alt="<?php echo $notSup5Cat_titulo; ?>">
			</div>
			<div class="info2">
				<p class="tags">
					<?php if($notSup5_categoria==7){ ?>
					<a class="cat-rciud" href="<?php echo $notSup5Cat_web; ?>">
					<?php }else{ ?>
					<a href="<?php echo $notSup5Cat_web; ?>">
					<?php } ?>
						<?php echo $notSup5Cat_titulo; ?></a>
				</p>
				<h1><a href="<?php echo $notSup5_web; ?>"><?php echo $notSup5_titulo; ?></a></h1>
			</div>
		</article>

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
		
	</div>
	<!-- FIN NOTICIA INFERIOR -->

	<!-- NOTICIA INFERIOR HORIZONTAL -->
	<div class="row">

		<article class="col-md-3 col-sm-3 mid">
			<?php if($notSup4_imagen<>""){ ?>
			<div class="img">
				<img src="<?php echo $notSup4_web_img; ?>" alt="<?php echo $notSup4Cat_titulo; ?>">
			</div>
			<?php } ?>
			<div class="info">
				<p class="tags">
					<?php if($notSup4_categoria==7){ ?>
					<a class="cat-rciud" href="<?php echo $notSup4Cat_web; ?>">
					<?php }else{ ?>
					<a href="<?php echo $notSup4Cat_web; ?>">
					<?php } ?>
						<?php echo $notSup4Cat_titulo; ?></a>
				</p>
				<h1><a href="<?php echo $notSup4_web; ?>"><?php echo $notSup4_titulo; ?></a></h1>
				<p class="details"><?php echo $notSup4_fecha ?></p>
				<p class="text">
					<?php echo $notSup4_contenido; ?>
				</p>
			</div>
		</article>
		
		<article class="col-md-3 col-sm-3 mid">
			<?php if($notSup6_imagen<>""){ ?>
			<div class="img">
				<img src="<?php echo $notSup6_web_img; ?>" alt="<?php echo $notSup6Cat_titulo; ?>">
			</div>
			<?php } ?>
			<div class="info">
				<p class="tags">
					<?php if($notSup6_categoria==7){ ?>
					<a class="cat-rciud" href="<?php echo $notSup6Cat_web; ?>">
					<?php }else{ ?>
					<a href="<?php echo $notSup6Cat_web; ?>">
					<?php } ?>
						<?php echo $notSup6Cat_titulo; ?></a>
				</p>
				<h1><a href="<?php echo $notSup6_web; ?>"><?php echo $notSup6_titulo; ?></a></h1>
				<p class="details"><?php echo $notSup6_fecha ?></p>
				<p class="text">
					<?php echo $notSup6_contenido; ?>
				</p>
			</div>
		</article>

		<article class="col-md-3 col-sm-3 mid">
			<?php if($notSup7_imagen<>""){ ?>
			<div class="img">
				<img src="<?php echo $notSup7_web_img; ?>" alt="<?php echo $notSup7Cat_titulo; ?>">
			</div>
			<?php } ?>
			<div class="info">
				<p class="tags">
					<?php if($notSup7_categoria==7){ ?>
					<a class="cat-rciud" href="<?php echo $notSup7Cat_web; ?>">
					<?php }else{ ?>
					<a href="<?php echo $notSup7Cat_web; ?>">
					<?php } ?>
						<?php echo $notSup7Cat_titulo; ?></a>
				</p>
				<h1><a href="<?php echo $notSup7_web; ?>"><?php echo $notSup7_titulo; ?></a></h1>
				<p class="details"><?php echo $notSup7_fecha ?></p>
				<p class="text">
					<?php echo $notSup7_contenido; ?>
				</p>
			</div>
		</article>

		<article class="col-md-3 col-sm-3 mid">
			<?php if($notSup8_imagen<>""){ ?>
			<div class="img">
				<img src="<?php echo $notSup8_web_img; ?>" alt="<?php echo $notSup8Cat_titulo; ?>">
			</div>
			<?php } ?>
			<div class="info">
				<p class="tags">
					<?php if($notSup8_categoria==7){ ?>
					<a class="cat-rciud" href="<?php echo $notSup8Cat_web; ?>">
					<?php }else{ ?>
					<a href="<?php echo $notSup8Cat_web; ?>">
					<?php } ?>
						<?php echo $notSup8Cat_titulo; ?></a>
				</p>
				<h1><a href="<?php echo $notSup8_web; ?>"><?php echo $notSup8_titulo; ?></a></h1>
				<p class="details"><?php echo $notSup8_fecha ?></p>
				<p class="text">
					<?php echo $notSup8_contenido; ?>
				</p>
			</div>
		</article>

	</div>
	<!-- FIN NOTICIA INFERIOR HORIZONTAL -->

</div>
<!--END CONTENT-->