<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<!--<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_ORDENES."/Nuevo"?>">Nueva Orden</a>-->
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Número de Orden</th>
			  		<th>Fecha Pedido</th>
			  		<th>Total</th>
			  		<th>Comprador</th>
			  		<th>Estado</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php
			  	if (count($ordenesLista)>0) {		  		
			  	
				  	foreach ($ordenesLista as $orden) {
			  		?>
			  		<tr>
			  			<td><?=$orden["num_orden"]?></td>
			  			<td><?=$orden["fecha_pedido"]?></td>
			  			<td><?=$orden["total"]?></td>
			  			<td><?=$orden["nombre"]." ".$orden["apellido"]?></td>
			  			<td><?=$orden["estado"]?></td>
			  			<td>
			  				<a href="<?=URL_ADMIN."/".URL_ADMIN_ORDENES."/".$orden['idorden']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
			  				<a class="eliminarEntidad" entidad="ordenes" identidad="<?=$orden['idorden']?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
			  			</td>
			  		</tr>
			  		<?php
				  	}
				}else{
					?>
					<td colspan="6">No hay ordenes.</td>
					<?php
			  	}
			  	?>
			  </tbody>
			</table>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>