<?php include "header.php"; ?>

<div class="container">	
	<div class="row">	
		<?php
		if (count($productosLista)>0) {			
		
			foreach ($productosLista as $producto) {

				producto_bloque($producto["img_principal"],$producto["nombre"],$producto["codigo"],$producto["precio"],$producto["precio_oferta"],$producto["url"],"col-sm-4");
			}
		}else{
			?>
			<h3 class="text-center">No se encontraron productos.</h3>
			<?php
		}
		?>		
	</div>
	<div class="row">
		<?php
		foreach ($banners as $banner) {
		?>
		<div class="col-md-3">
		<br>
		<a href="<?=$banner['link']?>"><img src="<?=$banner['imagen']?>" class="img-responsive"></a>
		</div>
		<?php
		}
		?>
	</div>
</div>
<br><br>
<?php include "footer.php"; ?>