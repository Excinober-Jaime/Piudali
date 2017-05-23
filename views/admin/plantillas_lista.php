<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Titulo</th>
			  		<th>Asunto</th>
			  		<th>Estado</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody class="datos">
			  	<?php 
			  	foreach ($plantillasLista as $plantilla) {
		  		?>
		  		<tr>
		  			<td><?=$plantilla["titulo"]?></td>
		  			<td><?=$plantilla["asunto"]?></td>
		  			<td><?=$plantilla["estado"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_PLANTILLAS."/".$plantilla['idmensaje']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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