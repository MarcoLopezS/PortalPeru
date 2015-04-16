<!--CONTENT-->
<div class="posts col-lg-9 col-md-9 col-sm-12">

	<!-- NOTICIA SUPERIOR -->
	<div class="row">

		<!-- POST SLIDER -->
		<div class="post-slider slider-home col-lg-8 col-md-8 col-sm-8">

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

		<!-- REPORTERO CUIDADANO -->
		<div class="most-discussed col-md-4 col-sm-6 columnistas">
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

		<!-- NOTICIA CENTRAL -->
		<article class="col-md-4 col-sm-4 mid">
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

	</div>
	<!-- FIN NOTICIA CENTRAL -->

	<!-- NOTICIA INFERIOR -->
	<div class="row">

		<article class="col-md-4 col-sm-4 mid">
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

		<article class="col-md-8 col-sm-8 big">
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
		
	</div>
	<!-- FIN NOTICIA INFERIOR -->

	<!-- NOTICIA INFERIOR HORIZONTAL -->
	<div class="row">
		
		<article class="col-md-4 col-sm-4 mid">
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

		<article class="col-md-4 col-sm-4 mid">
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

		<article class="col-md-4 col-sm-4 mid">
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

<!-- SIDEBAR -->
<aside class="col-lg-3 col-md-3 col-sm-12">

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

</aside>
<!-- END SIDEBAR -->