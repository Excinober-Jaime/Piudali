<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<ol class="breadcrumb">
			  <li><a href="#">Usuarios</a></li>		  
			  <li class="active">Lista</li>
			</ol>
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_USUARIOS."/Nuevo"?>">Nuevo usuario</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Identificación</th>
			  		<th>Nombre</th>
			  		<th>Apellido</th>		  		
			  		<th>Email</th>
			  		<th>Teléfono</th>
			  		<th>Móvil</th>
			  		<th>Ciudad</th>
			  		<th>Tipo</th>
			  		<th>Fecha Registro</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach ($usuariosLista as $usuario) {
		  		?>
		  		<tr>
		  			<td><?=$usuario["num_identificacion"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_USUARIOS."/".$usuario['idusuario']?>"><?=$usuario["nombre"]?></a></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_USUARIOS."/".$usuario['idusuario']?>"><?=$usuario["apellido"]?></a></td>	  			
		  			<td><?=$usuario["email"]?></td>
		  			<td><?=$usuario["telefono"]?></td>
		  			<td><?=$usuario["telefono_m"]?></td>
		  			<td><?=$usuario["ciudad"]?></td>
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