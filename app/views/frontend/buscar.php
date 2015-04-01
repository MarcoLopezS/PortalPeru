<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0,width=device-width">
	<title>Buscar: <?php echo $urlBuscar; ?> | <?php echo $web_nombre; ?></title>
	
	<?php require_once("wg-header-script.php"); ?>

	<!-- PAGINACION -->
    <link rel="stylesheet" href="/libs/pagination/pagination.css" media="screen">

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
					<h2>Buscar: <?php echo $urlBuscar; ?></h2>			
					
					<div class="buscador-resultados">
						<script>
						  (function() {
						    var cx = '018282985496243368695:hzzjbqgus9q';
						    var gcse = document.createElement('script');
						    gcse.type = 'text/javascript';
						    gcse.async = true;
						    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
						        '//www.google.com/cse/cse.js?cx=' + cx;
						    var s = document.getElementsByTagName('script')[0];
						    s.parentNode.insertBefore(gcse, s);
						  })();
						</script>
						<gcse:searchresults-only></gcse:searchresults-only>
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