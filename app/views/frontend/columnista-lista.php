<?php
require_once("panel@lndd/conexion/conexion.php");
require_once("panel@lndd/conexion/funciones.php");

//CATEGORIA
$rst_Columnista=mysql_query("SELECT * FROM lndd_columnista ORDER BY nombre_completo ASC", $conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,width=device-width">
	<title>Columnistas | <?php echo $web_nombre; ?></title>
	
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
				<div class="col-md-9 col-md-12 list-page clearfix">
					<h2>Columnistas</h2>			
					
					<?php while($fila_Columnista=mysql_fetch_array($rst_Columnista)){
							$Columnista_id=$fila_Columnista["id"];
							$Columnista_url=$fila_Columnista["url"];
							$Columnista_titulo=$fila_Columnista["nombre_completo"];
							$Columnista_contenido=$fila_Columnista["descripcion"];
							$Columnista_imagen=$fila_Columnista["imagen_portada"];

							//URLS
							$nota_UrlWeb=$web."columnista/".$Columnista_url;
							$nota_UrlImg=$web."imagenes/columnistas/".$Columnista_imagen;
					?>
					<article class="row mid">
						<img src="<?php echo $nota_UrlImg; ?>" alt="post">
						<div class="info">
							<h1><a href="<?php echo $nota_UrlWeb; ?>"><?php echo $Columnista_titulo; ?></a></h1>
							<p class="text">
								<?php echo $Columnista_contenido; ?>
							</p>
							<a href="<?php echo $nota_UrlWeb; ?>" class="btn btn-default">Ver columnas</a>
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