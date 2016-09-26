<?php include "header.php"; ?>

<div class="container">	
	<div class="row">
		<div class="col-xs-12 col-md-3">
			<?php
			foreach ($banners as $banner) {
			?>
			<a href="<?=$banner['link']?>"><img src="<?=$banner['imagen']?>" class="img-responsive"></a><br>
			<?php
			}
			?>
		</div>
		<div class="col-xs-12 col-md-9">
			<?php
			foreach ($productosLista as $producto) {

				producto_bloque($producto["img_principal"],$producto["nombre"],$producto["codigo"],$producto["precio"],$producto["precio_oferta"],$producto["url"],"col-sm-4");
			}
			?>
		</div>
	</div>
</div>

<?php include "footer.php"; ?>