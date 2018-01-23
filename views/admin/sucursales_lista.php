<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_SUCURSALES."/Nuevo"?>">Nueva Sucursal</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Nombre</th>			  		
			  		<th>Dirección</th>
			  		<th>Teléfono</th>
			  		<th>Email</th>
			  		<th>Organización</th>
			  		<th>Ciudad</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	foreach ($sucursales as $sucursal) {
		  		?>
		  		<tr>
		  			<td><?=$sucursal["nombre"]?></td>		  			
		  			<td><?=$sucursal["direccion"]?></td>
		  			<td><?=$sucursal["telefono"]?></td>
		  			<td><?=$sucursal["email"]?></td>
		  			<td><?=$sucursal["razon_social"]?></td>
		  			<td><?=$sucursal["ciudad"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_SUCURSALES."/".$sucursal['idsucursal']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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