<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_CUPONES."/Nuevo"?>">Nuevo Cupón</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Título</th>
			  		<th>Código</th>			  		
			  		<th>Descuento</th>
			  		<th>Monto Mínimo</th>
			  		<th>Estado</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach ($cupones as $cupon) {
		  		?>
		  		<tr>
		  			<td><?=$cupon["titulo"]?></td>
		  			<td><?=$cupon["num_codigo_desc"]?></td>
		  			<td><?=$cupon["val_descuento"]?></td>
		  			<td><?=convertir_pesos($cupon["monto_minimo"])?></td>
		  			<td><?=$cupon["estado"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_CUPONES."/".$cupon['idcodigo']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
		  			<a class="eliminarCupon" idcupon="<?=$cupon['idcodigo']?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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