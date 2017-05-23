<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_GEOLOCALIZACION."/".URL_ADMIN_GEOLOCALIZACION_REGIONES."/Nuevo"?>">Nueva Región</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Región</th>		  		
			  		<th>Director</th>
			  		<th>Estado</th>			  		
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	foreach ($regiones as $region) {
		  		?>
		  		<tr>
		  			<td><?=$region["region"]?></td>	  			
		  			<td><?=$region["nombre"]?></td>
		  			<td><?=$region["estado"]?></td>		  			
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_GEOLOCALIZACION."/".URL_ADMIN_GEOLOCALIZACION_REGIONES."/".$region['idregion']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
		  			<a class="eliminarEntidad" entidad="regiones" identidad="<?=$region['idregion']?>?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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