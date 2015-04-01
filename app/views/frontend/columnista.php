<?php
require_once("panel@lndd/conexion/conexion.php");
require_once("panel@lndd/conexion/funciones.php");

//VARIBALES DE URL
$ReqUrl=$_REQUEST["url"];

//COLUMNISTA SELECCIONADO
$rst_columnista=mysql_query("SELECT * FROM lndd_columnista WHERE url='$ReqUrl'", $conexion);
$fila_columnista=mysql_fetch_array($rst_columnista);

//VARIABLES
$Columista_id=$fila_columnista["id"];
$Columista_url=$fila_columnista["url"];
$Columista_nombre=$fila_columnista["nombre_completo"];
$Columnista_descripcion=soloDescripcion($fila_columnista["descripcion"]);
$Columnista_imagen=$fila_columnista["foto"];

//COLUMNAS
$rst_columnas=mysql_query("SELECT * FROM lndd_columnista_columna WHERE columnista=$Columista_id ORDER BY fecha DESC", $conexion);

//URLs
$Columnista_UrlImg=$web."imagenes/columnistas/".$Columnista_imagen;
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,width=device-width">
	<title>Columnista: <?php echo $Columista_nombre; ?> | <?php echo $web_nombre; ?></title>
	
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
					<h2>Columnista: <span><?php echo $Columista_nombre; ?></span></h2>
					<div class="row">
						<article class="col-md-4 col-sm-4 mid member">
							<div class="img">
								<img src="<?php echo $Columnista_UrlImg; ?>" alt="post2">
							</div>
							<div class="info">
								<h1><?php echo $Columista_nombre; ?></h1>
								<p class="text">
									<?php echo $Columnista_descripcion; ?>
								</p>
							</div>
							<ul class="social list-inline">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa  fa-tumblr"></i></a></li>
							</ul>
						</article>
						<!--POSTS-->	
						<div class="posts col-md-8 col-sm-8">
							<h3>Columnas</h3>

							<?php while($fila_columna=mysql_fetch_array($rst_columnas)){
									$columna_id=$fila_columna["id"];
									$columna_url=$fila_columna["url"];
									$columna_titulo=$fila_columna["titulo"];
									$columna_contenido=soloDescripcion($fila_columna["contenido"]);
									$columna_fecha=$fila_columna["fecha"];

									//URLs
									$Columna_UrlWeb=$web."columna/".$columna_id."-".$columna_url;
							?>
							<article class="row mid">

								<div class="info">
									<h1><a href="<?php echo $Columna_UrlWeb; ?>"><?php echo $columna_titulo; ?></a></h1>

									<p class="details"><?php echo $columna_fecha; ?></p>

									<p class="text">
										<?php echo $columna_contenido; ?>
									</p>
									<a href="<?php echo $Columna_UrlWeb; ?>" class="btn btn-default">Leer más...</a>
									
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