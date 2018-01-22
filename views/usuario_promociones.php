<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>
    <div class="contenPanel">			
	<div class="col-xs-12 titulo">
	<h1>Promociones</h1>
    <small>Aquí encontrarás las promociones exclusivas para ti.</small>	
	<div class="informacion">
		<!--<div class="col-xs-12">
			<img src="assets/img/promocion-julio.jpg" class="img-responsive">
		</div>-->
			<?php
			if (count($promociones)>0) {			
			
				foreach ($promociones as $promocion) {

					producto_bloque($promocion["img_principal"],$promocion["nombre"],$promocion["codigo"],$promocion["tipo"],$promocion["precio"],$promocion["precio_oferta"],$promocion["url"],"col-sm-4");
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
</div>
<br>
<br>
<?php include "footer.php"; ?>
