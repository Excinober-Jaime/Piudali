<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_INGREDIENTES."/Nuevo"?>">Nuevo Ingrediente</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Nombre</th>
			  		<th>Descripción</th>		  		
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach ($ingredientes as $ingrediente) {
		  		?>
		  		<tr>
		  			<td><?=$ingrediente["nombre"]?></td>
		  			<td><?=substr(strip_tags($ingrediente["descripcion"]),0,200)?>...</td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_INGREDIENTES."/".$ingrediente['idingrediente']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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