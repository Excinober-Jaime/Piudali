<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_PERSONAL."/Nuevo"?>">Nuevo Personal</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Nombre</th>
			  		<th>Cargo</th>
			  		<th>Usuario</th>
			  		<th>Rol</th>
			  		<th>Estado</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	foreach ($personal as $persona) {
		  		?>
		  		<tr>
		  			<td><?=$persona["nombre"]?></td>
		  			<td><?=$persona["cargo"]?></td>
		  			<td><?=$persona["usuario"]?></td>
		  			<td><?=$persona["rol"]?></td>
		  			<td><?=$persona["estado"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_PERSONAL."/".$persona['idpersona']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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