<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<ol class="breadcrumb">
			  <li><a href="#">Protocolos</a></li>		  
			  <li class="active">Lista</li>
			</ol>
			<a class="pull-right" href="<?=URL_ADMIN."/".URL_ADMIN_PROTOCOLOS."/Nuevo"?>">Nuevo Protocolo</a>
			<table class="table table-striped">
			  <thead>
			  	<tr>
			  		<th>Nombre</th>
			  		<th>Descripción</th>		  		
			  		<th>Estado</th>
			  		<th>Acciones</th>
			  	</tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	foreach ($protocolos as $protocolo) {
		  		?>
		  		<tr>
		  			<td><?=$protocolo["nombre"]?></td>
		  			<td><?=substr(strip_tags($protocolo["descripcion"]),0,200)?>...</td>
		  			<td><a href="<?=URL_ADMIN."/".URL_ADMIN_PROTOCOLOS."/".$protocolo['idprotocolo']?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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