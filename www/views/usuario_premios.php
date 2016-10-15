<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>			
	<div class="col-xs-12">
	<h1>Premios <small><small>Adquierelos pagando con tus puntos o cualquier otro medio de pago</small></small></h1>
	<hr>
	<div class="row">
			<?php
			foreach ($premios as $premio) {

				producto_bloque($premio["img_principal"],$premio["nombre"],$premio["codigo"],$premio["precio"],$premio["precio_oferta"],$premio["url"],"col-sm-4");
			}
			?>
		</div>
	</div>	
</div>
<br>
<br>
<?php include "footer.php"; ?>
