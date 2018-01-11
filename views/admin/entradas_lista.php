<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_ENTRADAS_CLUB."/Nuevo"?>">Nueva Entrada</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Título</th>
			  		<th>Tipo</th>
			  		<th>Estado</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	foreach ($entradas as $entrada) {
		  		?>
		  		<tr>
		  			<td><?=$entrada["titulo"]?></td>
		  			<td><?=$entrada["tipo"]?></td>
		  			<td><?=$entrada["estado"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_ENTRADAS_CLUB."/".$entrada['identrada']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
		  			<a class="eliminarEntidad" entidad="entradas" identidad="<?=$entrada['idpagina']?>?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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