<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<ol class="breadcrumb">
			  <li><a href="#">Informe Usuarios</a></li>		  
			  <li class="active">Lista</li>
			</ol>			
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Identificación</th>
			  		<th>Nombre</th>
			  		<th>Apellido</th>		  		
			  		<th>Email</th>			  		
			  		<th>Teléfono</th>
			  		<th>Móvil</th>
			  		<th>Segmento</th>
			  		<th>Compras</th>
			  		<th>Ciudad</th>			  		
			  		<th>Zona</th>			  		
			  		<th>Región</th>			  		
			  		<th>Representante</th>
			  		<th>Director</th>

			  	</tr>
			  </thead>
			  <tbody>
			  	<?php
			  	foreach ($usuarios as $usuario) {
		  		?>
		  		<tr>
		  			<td><?=$usuario["num_identificacion"]?></td>
		  			<td><?=$usuario["nombre"]?></td>
		  			<td><?=$usuario["apellido"]?></td>	  			
		  			<td><?=$usuario["email"]?></td>
		  			<td><?=$usuario["telefono"]?></td>
		  			<td><?=$usuario["telefono_m"]?></td>
		  			<td></td>		  			
		  			<td><?=convertir_pesos($usuario["compras_netas"])?></td>
		  			<td><?=$usuario["ciudad"]?></td>
		  			<td><?=var_dump($usuario["zona"])?></td>
		  			<td><?=$usuario["region"]["region"]?></td>
		  			<td><?=$usuario["lider"]["nombre"]." ".$usuario["lider"]["apellido"]?></td>
		  			<td><?=$usuario["director"]["nombre"]." ".$usuario["director"]["apellido"]?></td>
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