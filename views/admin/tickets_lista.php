<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<!--<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_TICKETS."/Nuevo"?>">Nuevo Banner</a>-->
			<table class="table table-striped">
			  <thead>
			  	<tr>			  		
			  		<th>Código</th>
			  		<th>Tipo</th>
			  		<th>Descripción</th>
			  		<th>Estado</th>
			  		<th>Fecha</th>
			  		<th>Usuario</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach ($tickets as $ticket) {
		  		?>
		  		<tr>
		  			<td><?=$ticket["codigo"]?></td>
		  			<td><?=$ticket["tipo"]?></td>
		  			<td><?=$ticket["descripcion"]?></td>		  			
		  			<td><?=$ticket["estado"]?></td>
		  			<td><?=$ticket["fecha_registro"]?></td>
		  			<td><?=$ticket["usuario"]["nombre"]." ".$ticket["usuario"]["apellido"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_TICKETS."/".$ticket['idticket']?>"><i class="fa fa-eye" aria-hidden="true" title="Ver"></i></a></td>
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