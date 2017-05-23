<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_BANNERS."/Nuevo"?>">Nuevo Banner</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Nombre</th>
			  		<th>Posición</th>
			  		<th>Estado</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	foreach ($bannersLista as $banner) {
		  		?>
		  		<tr>
		  			<td><?=$banner["nombre"]?></td>
		  			<td><?=$banner["posicion"]?></td>
		  			<td><?=$banner["estado"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_BANNERS."/".$banner['idbanner']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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