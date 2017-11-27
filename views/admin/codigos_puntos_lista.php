<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_CODIGOS_PUNTOS."/Nuevo"?>">Crear Códigos</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Código</th>
			  		<th>Puntos</th>
			  		<th>Redimido</th>
			  		<th>QR</th>
			  		<th>Redentor</th>
			  		<th>Fecha Creación</th>
			  		<th>Fecha Vencimiento</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	foreach ($codigos as $codigo) {
		  		?>
		  		<tr>
		  			<td><?=$codigo["codigo"]?></td>
		  			<td><?=$codigo["puntos"]?></td>
		  			<td><?=$codigo["redimido"]?></td>
		  			<td><?=$codigo["qr"]?></td>
		  			<td><?php 

		  				if (empty($codigo["idredentor"])) {
		  					
		  					echo 'SIN REDIMIR';

		  				}else{

		  					echo $codigo["redentor"];

		  				}

		  			?></td>
		  			<td><?=$codigo["fecha_creacion"]?></td>
		  			<td><?=$codigo["fecha_vencimiento"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_CODIGOS_PUNTOS."/".$codigo['idcodigo']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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