<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<ol class="breadcrumb">
			  <li><a href="#">Informe Ordenes</a></li>		  
			  <li class="active">Ordenes</li>
			</ol>			
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Número de Orden</th>
			  		<th>Fecha de Pedido</th>
			  		<th>Comprador</th>
			  		<th>Total Pagado</th>			  		
			  		<th>Representante</th>
			  		<th>Director</th>
			  		<th>Zona</th>
			  		<th>Región</th>
			  		<th>Estado</th>
			  		<th>Número de Factura</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach ($ordenes as $ordenes) {
		  		?>
		  		<tr>
		  			<td><?=$ordenes["num_orden"]?></td>
		  			<td><?=$ordenes["fecha_pedido"]?></td>
		  			<td><a href="<?=URL_SITIO.URL_ADMIN."/".URL_ADMIN_USUARIOS."/".$ordenes["comprador"]["idusuario"]?>"><?=$ordenes["nombre"]." ".$ordenes["apellido"]?></a></td>
		  			<td><?=convertir_pesos($ordenes["total"])?></td>	  			
		  			<td><?=$ordenes["lider"]["nombre"]." ".$ordenes["lider"]["apellido"]?></td>
		  			<td><?=$ordenes["director"]["nombre"]." ".$ordenes["director"]["apellido"]?></td>
		  			<td></td>
		  			<td></td>
		  			<td><?=$ordenes["estado"]?></td>
		  			<td><?=$ordenes["num_factura"]?></td>		  			
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