<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_PAGINAS."/Nuevo"?>">Nueva Página</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Título</th>
			  		<th>Menú</th>
			  		<th>Estado</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach ($paginasLista as $pagina) {
		  		?>
		  		<tr>
		  			<td><?=$pagina["titulo"]?></td>
		  			<td><?=$pagina["menu"]?></td>
		  			<td><?=$pagina["estado"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_PAGINAS."/".$pagina['idpagina']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
		  			<a class="eliminarEntidad" entidad="paginas" identidad="<?=$pagina['idpagina']?>?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
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