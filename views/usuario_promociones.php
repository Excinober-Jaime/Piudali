<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>			
	<div class="col-xs-12">
	<h1>Promociones <small><small>Aquí encontrarás las promociones exclusivas para ti.</small></small></h1>
	<hr>	
	<div class="row">
		<!--<div class="col-xs-12">
			<img src="assets/img/promocion-julio.jpg" class="img-responsive">
		</div>-->
			<?php
			if (count($promociones)>0) {			
			
				foreach ($promociones as $promocion) {

					producto_bloque($promocion["img_principal"],$promocion["nombre"],$promocion["codigo"],$promocion["precio"],$promocion["precio_oferta"],$promocion["url"],"col-sm-4");
				}
			}else{
				?>
				<div class="col-xs-12"><p class="text-center">Actualmente no existen promociones.</p></div>
				<?php
			}
			?>
		</div>
	</div>	
</div>
<br>
<br>
<?php include "footer.php"; ?>
