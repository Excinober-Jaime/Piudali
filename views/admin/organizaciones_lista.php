<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_ORGANIZACIONES."/Nuevo"?>">Nueva Organización</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Nit</th>
			  		<th>Razón Social</th>
			  		<th>Dirección</th>
			  		<th>Teléfono</th>
			  		<th>Ciudad</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	foreach ($organizaciones as $organizacion) {
		  		?>
		  		<tr>
		  			<td><?=$organizacion["nit"]?></td>
		  			<td><?=$organizacion["razon_social"]?></td>
		  			<td><?=$organizacion["direccion"]?></td>
		  			<td><?=$organizacion["telefono"]?></td>
		  			<td><?=$organizacion["ciudad"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_ORGANIZACIONES."/".$organizacion['idorganizacion']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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