<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<ol class="breadcrumb">
			  <li><a href="#">Suscriptores</a></li>		  
			  <li class="active">Lista</li>
			</ol>
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_SUSCRIPTORES."/Nuevo"?>">Nuevo Suscriptor</a>		
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Nombre</th>
			  		<th>Email</th>
			  		<th>Fecha Registro</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach ($suscriptores as $suscriptor) {
		  		?>
		  		<tr>
		  			<td><?=$suscriptor["nombre"]?></td>
		  			<td><?=$suscriptor["email"]?></td>
		  			<td><?=$suscriptor["fecha"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_SUSCRIPTORES."/".$suscriptor['id']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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