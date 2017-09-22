<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_MODELOS_NEGOCIO_DISTRIBUIDORES."/Nuevo"?>">Nuevo Modelo de Negocio</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Nombre</th>
			  		<th>Monto Mínimo</th>
			  		<th>Puntos</th>
			  		<th>Referidos</th>
			  		<th>Incentivos</th>
			  		<th>Estado</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	if (count($modelos)>0) {
			  		
			  	
				  	foreach ($modelos as $modelo) {
			  		?>
			  		<tr>
			  			<td><?=$modelo["nombre"]?></td>
			  			<td><?=$modelo["monto_minimo"]?></td>
			  			<td><?=$modelo["puntos"]?></td>
			  			<td><?=$modelo["referidos"]?></td>
			  			<td><?=$modelo["incentivos"]?></td>
			  			<td><?=$modelo["estado"]?></td>
			  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_MODELOS_NEGOCIO_DISTRIBUIDORES."/".$modelo['idmodelo']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
			  		</tr>
			  		<?php
				  	}
				}else{

					?>
					<tr><td colspan="7">No existen modelos de negocio parametrizados</td></tr>
					<?php
				}
			  	?>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>