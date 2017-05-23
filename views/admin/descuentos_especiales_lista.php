<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_DESCUENTOS_ESPECIALES."/Nuevo"?>">Nuevo Descuento</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Nombre</th>			  		
			  		<th>Monto Mínimo</th>		  		
			  		<th>Estado</th>		  		
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	foreach ($descuentos as $descuento) {
		  		?>
		  		<tr>
		  			<td><?=$descuento["nombre"]?></td>	  			
		  			<td><?=convertir_pesos($descuento["monto_minimo"])?></td>
		  			<td><?=$descuento["estado"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_DESCUENTOS_ESPECIALES."/".$descuento['iddescuento']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
		  				<a class="eliminarEntidad" entidad="campanas" identidad="<?=$descuento['iddescuento']?>?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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