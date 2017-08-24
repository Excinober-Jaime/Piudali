<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
        	<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_EXPORT."/".URL_ADMIN_USUARIOS?>">Exportar</a>
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_USUARIOS."/Nuevo"?>"><i class="fa fa-user-plus" aria-hidden="true"></i> | </a>			
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Cliente</th>
			  		<th>Segmento</th>
			  		<th>Ciudad</th>
			  		<th>Teléfono</th>
			  		<th>Contácto</th>
			  		<th>Tipo</th>
			  		<th>Fecha Registro</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	foreach ($usuariosLista as $usuario) {

			  		if (count($usuario['organizacion'])>0) {
			  			
			  			$cliente = $usuario['organizacion']['razon_social'];
			  			$ciudad = $usuario['organizacion']['ciudad'];
			  			$telefono = $usuario['organizacion']['telefono'];

			  		}else{

			  			$cliente = $usuario['nombre'].' '.$usuario['apellido'];
			  			$ciudad = $usuario['ciudad'];
			  			$telefono = $usuario['telefono'];

			  		}
		  		?>
		  		<tr>
		  			<td><?=$cliente?></td>
		  			<td><?=$usuario['segmento']?></td>
		  			<td><?=$ciudad?></td>
		  			<td><?=$telefono?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_USUARIOS."/".$usuario['idusuario']?>"><?=$usuario["nombre"].' '.$usuario["apellido"]?></a></td>	  			
		  			<td><?=$usuario["tipo"]?></td>
		  			<td><?=$usuario["fecha_registro"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_USUARIOS."/".$usuario['idusuario']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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