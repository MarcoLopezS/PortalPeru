<?php
require_once("panel@lndd/conexion/conexion.php");
require_once("panel@lndd/conexion/funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,width=device-width">
	<title>Nosotros | <?php echo $web_nombre; ?></title>
	
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
				<div class="col-md-9 col-sm-12">
					<h2>Nosotros</h2>
					<div class="row">
						<div class="about-us col-md-12 col-sm-12">
							<div class="info">
								<?php echo $web_nosotros; ?>
							</div>
						</div>
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