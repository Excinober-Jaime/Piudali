<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_CANALES_DISTRIBUCION."/Nuevo"?>">Nuevo Canal de Distribución</a>
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
			  	if (count($canales)>0) {
			  		
			  	
				  	foreach ($canales as $canal) {
			  		?>
			  		<tr>
			  			<td><?=$canal["nombre"]?></td>
			  			<td><?=$canal["monto_minimo"]?></td>
			  			<td><?=$canal["puntos"]?></td>
			  			<td><?=$canal["referidos"]?></td>
			  			<td><?=$canal["incentivos"]?></td>
			  			<td><?=$canal["estado"]?></td>
			  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_CANALES_DISTRIBUCION."/".$canal['idcanal']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
			  		</tr>
			  		<?php
				  	}
				}else{

					?>
					<tr><td colspan="7">No existen canales de distribución parametrizados</td></tr>
					<?php
				}
			  	?>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>