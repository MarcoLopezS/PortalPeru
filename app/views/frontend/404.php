<?php
require_once("panel@lndd/conexion/conexion.php");
require_once("panel@lndd/conexion/funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,width=device-width">
	<title><?php echo $web_nombre; ?></title>
	
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
		<div class="main-404 clearfix">
			<img src="img/404.jpg" alt="404">
			<div class="info-404">
				<h1>
					<span>404.</span>
					<small>ESO ES UN ERROR.</small>
				</h1>
				<p>
					La URL solicitada no fue encontrada. Eso es todo lo que sé.
				</p>
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


