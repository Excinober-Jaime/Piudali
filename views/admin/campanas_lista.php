<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_CAMPANAS."/Nuevo"?>">Nueva Campaña</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Nombre</th>		  		
			  		<th>Fecha Inicio</th>
			  		<th>Fecha Fin</th>		  		
			  		<th>Estado</th>		  		
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach ($campanasLista as $campana) {
		  		?>
		  		<tr>
		  			<td><?=$campana["nombre"]?></td>	  			
		  			<td><?=$campana["fecha_ini"]?></td>
		  			<td><?=$campana["fecha_fin"]?></td>
		  			<td><?=$campana["estado"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_CAMPANAS."/".$campana['idcampana']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
		  				<a class="eliminarEntidad" entidad="campanas" identidad="<?=$campana['idcampana']?>?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
		  			</td>
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