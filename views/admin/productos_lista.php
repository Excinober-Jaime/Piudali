<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_PRODUCTOS."/Nuevo"?>">Nuevo Producto</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Nombre</th>
			  		<th>Código</th>
			  		<th>Precio</th>
			  		<th>Estado</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach ($productosLista as $producto) {
		  		?>
		  		<tr>
		  			<td><?=$producto["nombre"]?></td>
		  			<td><?=$producto["codigo"]?></td>
		  			<td><?=convertir_pesos($producto["precio"])?></td>
		  			<td><?=$producto["estado"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_PRODUCTOS."/".$producto['idproducto']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
		  		</tr>
		  		<?php
			  	}
			  	?>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>