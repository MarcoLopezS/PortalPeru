<?php
require_once("panel@lndd/conexion/conexion.php");
require_once("panel@lndd/conexion/funciones.php");

//VARIBALES DE URL
$ReqId=$_REQUEST["id"];
$ReqUrl=$_REQUEST["url"];

//REPORTERO SELECCIONADO
$rst_reportero=mysql_query("SELECT * FROM lndd_rciud_usuario_datos WHERE id='$ReqId' AND url='$ReqUrl'", $conexion);
$fila_reportero=mysql_fetch_array($rst_reportero);

//VARIABLES
$reportero_usuario=$fila_reportero["usuario"];
$reportero_nomCompleto=$fila_reportero["nombre"]." ".$fila_reportero["apellidos"];
$reportero_descripcion=$fila_reportero["descripcion"];
$reportero_imagen=$fila_reportero["foto"];
$reportero_imagen_carpeta=$fila_reportero["foto_carpeta"];

//SOCIAL MEDIA
$reportero_social_facebook=$fila_reportero["social_facebook"];
$reportero_social_twitter=$fila_reportero["social_twitter"];
$reportero_social_google=$fila_reportero["social_google"];
$reportero_social_youtube=$fila_reportero["social_youtube"];
$reportero_social_pinterest=$fila_reportero["social_pinterest"];
$reportero_social_linkedin=$fila_reportero["social_linkedin"];

//NOTICIAS
$rst_noticias=mysql_query("SELECT * FROM lndd_noticia WHERE usuario='$reportero_usuario' AND publicar=1 ORDER BY fecha DESC", $conexion);

//URLs
$reportero_UrlImg=$web."imagenes/rciud/".$reportero_imagen_carpeta."".$reportero_imagen;
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,width=device-width">
	<title>Reportero: <?php echo $reportero_nomCompleto; ?> | <?php echo $web_nombre; ?></title>
	
	<?php require_once("wg-header-script.php"); ?>

</head>
<body>

	<!--HEADER-->
	<?php require_once("wg-header.php"); ?>
	<!--END HEADER-->

	<!--CONTAINER-->
	<div class="container">
		<!--MENU-->
		<?php require_once("wg-header-menu.php"); ?>
		<!--END MENU-->

		<!--MAIN SECTION-->
		<div class="main">
			<div class="row">
				<!--CONTENT-->
				<div class="col-md-9 col-sm-12 author">
					<h2>Reportero: <span><?php echo $reportero_nomCompleto; ?></span></h2>
					<div class="row">
						<article class="col-md-4 col-sm-4 mid member">
							<div class="img">
								<img src="<?php echo $reportero_UrlImg; ?>" alt="post2">
							</div>
							<div class="info">
								<h1><?php echo $reportero_nomCompleto; ?></h1>
								<p class="text">
									<?php echo $reportero_descripcion; ?>
								</p>
							</div>
							<ul class="social list-inline">
								<?php if($reportero_social_facebook<>""){ ?> <li><a target="_blank" href="<?php echo $reportero_social_facebook; ?>"><i class="fa fa-facebook"></i></a></li> <?php } ?>
								<?php if($reportero_social_twitter<>""){ ?> <li><a target="_blank" href="<?php echo $reportero_social_twitter; ?>"><i class="fa fa-twitter"></i></a></li> <?php } ?>
								<?php if($reportero_social_google<>""){ ?> <li><a target="_blank" href="<?php echo $reportero_social_google; ?>"><i class="fa fa-google-plus"></i></a></li> <?php } ?>
								<?php if($reportero_social_youtube<>""){ ?> <li><a target="_blank" href="<?php echo $reportero_social_youtube; ?>"><i class="fa fa-youtube"></i></a></li> <?php } ?>
								<?php if($reportero_social_pinterest<>""){ ?> <li><a target="_blank" href="<?php echo $reportero_social_pinterest; ?>"><i class="fa fa-pinterest"></i></a></li> <?php } ?>
								<?php if($reportero_social_linkedin<>""){ ?> <li><a target="_blank" href="<?php echo $reportero_social_linkedin; ?>"><i class="fa fa-linkedin"></i></a></li> <?php } ?>
							</ul>
						</article>
						<!--POSTS-->	
						<div class="posts col-md-8 col-sm-8">
							<h3>Noticias</h3>

							<?php while($fila_noticias=mysql_fetch_array($rst_noticias)){
									$noticias_id=$fila_noticias["id"];
									$noticias_url=$fila_noticias["url"];
									$noticias_titulo=$fila_noticias["titulo"];
									$noticias_contenido=$fila_noticias["contenido_corto"];
								
									//FECHA	
									$nota_fechaPub=$fila_noticias["fecha_publicacion"];
								    $nota_fechaPubNot=explode(" ", $nota_fechaPub);
								    $nota_fechaPubNotFi=explode("-", $nota_fechaPubNot[0]);
								    $nota_fechaTotal=nombreFechaTotal($nota_fechaPubNotFi[0],$nota_fechaPubNotFi[1],$nota_fechaPubNotFi[2]);
								    $noticias_fecha=$nota_fechaTotal;
									
									//URLs
									$noticias_UrlWeb=$web."noticia/".$noticias_id."-".$noticias_url;
							?>
							<article class="row mid">

								<div class="info">
									<h1><a href="<?php echo $noticias_UrlWeb; ?>"><?php echo $noticias_titulo; ?></a></h1>

									<p class="details"><?php echo $noticias_fecha; ?></p>

									<p class="text">
										<?php echo $noticias_contenido; ?>
									</p>
									<a href="<?php echo $noticias_UrlWeb; ?>" class="btn btn-default">Leer más...</a>
									
								</div>
							</article>
							<?php } ?>

						  	<ul class="pagination">
						    	<li class="disabled"><span><i class="fa fa-long-arrow-left"></i></span></li>
						    	<li class="active"><span>1</span></li>
						    	<li><a href="#">2</a></li>
						    	<li><a href="#">3</a></li>
						    	<li><a href="#">...</a></li>
						    	<li><a href="#">15</a></li>
						    	<li><a href="#"><i class="fa fa-long-arrow-right"></i></a></li>
						 	</ul>
						</div>
						<!--END POSTS-->
					</div>
				</div>
				<!--END CONTENT-->

				<!--SIDEBAR-->
				<?php require_once("wg-sidebar.php"); ?>
				<!--END SIDEBAR-->

			</div>	
		</div>
		<!--END MAIN SECTION-->

		<!--FOOTER-->
		<?php require_once("wg-footer.php"); ?>
		<!--END FOOTER-->

	</div>
	<!--END CONTAINER-->

<?php require_once("wg-footer-script.php"); ?>

</body>
</html>