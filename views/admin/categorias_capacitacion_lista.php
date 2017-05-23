<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_CAPACITACION_CATEGORIAS."/Nuevo"?>">Nueva Categoria</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Título</th>
			  		<th>Perfil</th>
			  		<th>Estado</th>			  		
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	if (count($categorias)>0) {
			  		
			  	
				  	foreach ($categorias as $categoria) {
			  		?>
			  		<tr>
			  			<td><?=$categoria["titulo"]?></td>
			  			<td><?=$categoria["perfil"]?></td>
			  			<td><?=$categoria["estado"]?></td>		  			
			  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_CAPACITACION_CATEGORIAS."/".$categoria['idcategoria']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
			  				<a class="eliminarEntidad" entidad="categoriascapacitacion" identidad="<?=$categoria['idcategoria']?>?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
			  		</td>
			  		</tr>
			  		<?php
				  	}
				}else{
					echo "<tr><td>Aún no existen categorías de capacitación</td></tr>";
				}
			  	?>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>