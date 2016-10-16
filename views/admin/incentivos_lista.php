<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<ol class="breadcrumb">
			  <li><a href="#">Incentivos</a></li>		  
			  <li class="active">Lista</li>
			</ol>
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_INCENTIVOS."/Nuevo"?>">Nuevo Incentivo</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Incentivo</th>
			  		<th>Inicio</th>
			  		<th>Fin</th>
			  		<th>Meta</th>
			  		<th>Usuario</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach ($incentivos as $incentivo) {
		  		?>
		  		<tr>
		  			<td><?=$incentivo["incentivo"]?></td>
		  			<td><?=$incentivo["inicio"]?></td>
		  			<td><?=$incentivo["fin"]?></td>
		  			<td><?=$incentivo["meta"]?></td>
		  			<td><?=$incentivo["usuario"]?></td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_INCENTIVOS."/".$incentivo['idincentivo']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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