<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_GEOLOCALIZACION."/".URL_ADMIN_GEOLOCALIZACION_ZONAS."/Nuevo"?>">Nueva Zona</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Zonas</th>		  		
			  		<th>Estado</th>
			  		<th>Lider</th>
			  		<th>Ciudad</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach ($zonas as $zona) {
		  		?>
		  		<tr>
		  			<td><?=$zona["zona"]?></td>	  			
		  			<td><?=$zona["estado"]?></td>
		  			<td><?=$zona["nombre"]?></td>
		  			<td><?=$zona["ciudad"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_GEOLOCALIZACION."/".URL_ADMIN_GEOLOCALIZACION_ZONAS."/".$zona['idzona']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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