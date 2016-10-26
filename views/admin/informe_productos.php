<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<ol class="breadcrumb">
			  <li><a href="#">Informes</a></li>		  
			  <li class="active">Informe Productos</li>
			</ol>			
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Código</th>
			  		<th>Nombre</th>
			  		<th>Unidades Inventario</th>
			  		<th>Unidades Vendidas</th>			  					  		
			  		<th>Zona</th>			  		
			  		<th>Región</th>			  		
			  		<th>Categoría</th>			  		
			  		<th>Estado</th>			  		
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach ($productos as $producto) {

			  		if ($producto["estado"]) {
			  			$estado = "ACTIVO";
			  		}else{
			  			$estado = "INACTIVO";
			  		}
		  		?>
		  		<tr>
		  			<td><?=$producto["codigo"]?></td>
		  			<td><?=$producto["nombre"]?></td>
		  			<td><?=$producto["cantidad"]?></td>
		  			<td><?=$producto["unidades_vendidas"]["cantidad"]?></td>		  			
		  			<td></td>
		  			<td></td>
		  			<td><?=$producto["categoria"]?></td>		  			
		  			<td><?=$estado?></td>		  			
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