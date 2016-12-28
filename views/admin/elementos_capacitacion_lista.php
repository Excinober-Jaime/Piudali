<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_CAPACITACION_ELEMENTOS."/Nuevo"?>">Nuevo Elemento</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Título</th>
			  		<th>Tipo</th>
			  		<th>Perfil</th>
			  		<th>Estado</th>			  		
			  		<th>Categoría</th>			  		
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	if (count($elementos)>0) {
			  		
			  	
				  	foreach ($elementos as $elemento) {
			  		?>
			  		<tr>
			  			<td><?=$elemento["titulo"]?></td>
			  			<td><?=$elemento["tipo"]?></td>
			  			<td><?=$elemento["perfil"]?></td>
			  			<td><?=$elemento["estado"]?></td>
			  			<td><?=$elemento["categoria"]["titulo"]?></td>
			  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_CAPACITACION_ELEMENTOS."/".$elemento['idelemento']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
			  		</tr>
			  		<?php
				  	}
				}else{
					echo "<tr><td>Aún no existen elementos de capacitación</td></tr>";
				}
			  	?>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>