<?php
require_once("panel@lndd/conexion/conexion.php");
require_once("panel@lndd/conexion/funciones.php");

//VARIABLES DE URL
$ReqId=$_REQUEST["id"];
$ReqUrl=$_REQUEST["url"];

//NOTICIA
$rst_nota=mysql_query("SELECT * FROM lndd_columnista_columna WHERE id=$ReqId;", $conexion);
$fila_nota=mysql_fetch_array($rst_nota);

//VARIABLES
$not_titulo=$fila_nota["titulo"];
$not_contenido=$fila_nota["contenido"];
$nota_fechaFinal=$fila_nota["fecha"];
$nota_columnista=$fila_nota["columnista"];

//COLUMNISTA
$rst_usuario=mysql_query("SELECT * FROM lndd_columnista WHERE id=$nota_columnista");
$fila_usuario=mysql_fetch_array($rst_usuario);

//VARIABLES
$user_nomCompleto=$fila_usuario["nombre"]." ".$fila_usuario["apellidos"];
$user_url=$fila_usuario["url"];
$user_UrlWeb=$web."columnista/".$user_url;

//URLS
$not_web=$web."columna/".$ReqId."-".$ReqUrl;
$not_web_img=$web."imagenes/upload/".$not_imagen_carpeta."".$not_imagen;

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $not_titulo; ?> | <?php echo $web_nombre; ?></title>
	
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
		<div class="main post-page">
			<div class="row">
				<!--CONTENT-->
				<div class="col-md-9 col-sm-12 clearfix author">
					
					<h2>Columnista: <a href="<?php echo $user_UrlWeb; ?>"><span><?php echo $user_nomCompleto; ?></span></a></h2>

					<!--POST-->
					<article class="post mid fullwidth">
					
						<div class="row">
							<div class="info col-md-12 col-sm-12">
								<div class="info">
									<h1><?php echo $not_titulo; ?></h1>
									<div class="data">
										<p class="details"><?php echo $nota_fechaFinal; ?></p>
									</div>
									<div class="text">
										<?php echo $not_contenido; ?>
									</div>
										
								</div>
							</div>
						</div>

					</article>
					<!--END POST-->
				
					<!-- COMENTARIOS -->
					<div class="row">
						<h3>Comentarios</h3>

						<div id="fb-root"></div>
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&appId=258988607636876";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>

						<div class="fb-comments" data-href="<?php echo $not_web; ?>" data-numposts="5" data-colorscheme="light"></div>
					</div>					
					<!-- FIN COMENTARIOS -->
					
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