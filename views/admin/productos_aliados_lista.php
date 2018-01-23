<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_PRODUCTOS_ALIADOS."/Nuevo"?>">Nuevo Producto Aliado</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Nombre</th>			  		
			  		<th>Descripcion</th>
			  		<th>Estado</th>			  		
			  		<th>Organización</th>			  		
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	foreach ($productos as $producto) {
		  		?>
		  		<tr>
		  			<td><?=$producto["nombre"]?></td>		  			
		  			<td><?=$producto["descripcion"]?></td>
		  			<td><?=$producto["estado"]?></td>
		  			<td><?=$producto["razon_social"]?></td>		  			
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_PRODUCTOS_ALIADOS."/".$producto['idproducto']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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