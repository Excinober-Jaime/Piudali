<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_CODIGOS_PUNTOS."/Nuevo"?>">Crear Códigos</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Lote</th>
			  		<th>Producto</th>
			  		<th>Códigos</th>			  		
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	foreach ($lotes as $lote) {
		  		?>
		  		<tr>
		  			<td><?=$lote["idlote"]?></td>
		  			<td><?=$lote["nombre"]?></td>
		  			<td><?=$lote["codigos"]?></td>		  			
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_CODIGOS_PUNTOS_IMPRIMIR."/".$lote['idlote']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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