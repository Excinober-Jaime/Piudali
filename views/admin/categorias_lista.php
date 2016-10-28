<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_CATEGORIAS."/Nuevo"?>">Nueva Categoría</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Nombre</th>		  		
			  		<th>Estado</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach ($categoriasLista as $categoria) {
		  		?>
		  		<tr>
		  			<td><?=$categoria["nombre"]?></td>	  			
		  			<td><?=$categoria["estado"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_CATEGORIAS."/".$categoria['idcategoria']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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