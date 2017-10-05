<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>
    <div class="contenPanel">		
	<div class="col-xs-12 titulo">
	<h1>Documentos</h1>
    <small></small>
	</div>
    <div class="clearfix"></div>
    <div class="informacion">
    <div class="col-xs-12">
	
		<ul class="list-group">		
			<li class="list-group-item"><a href="documentos/25ACUERDO DE REPRESENTANCIÓN COMERCIAL.pdf" target="_new"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> ACUERDO DE REPRESENTACIÓN COMERCIAL</a></li>
			<li class="list-group-item"><a href="documentos/25CAMARA DE COMERCIO LINK GRUPO MARKETING SAS.pdf" target="_new"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> CÁMARA DE COMERCIO LINK GRUPO MARKETING SAS</a></li>
			<li class="list-group-item"><a href="documentos/14377685652-2 RUT LINK.pdf" target="_new"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> RUT LINK GRUPO MARKETING SAS</a></li>

		<?php 

		if ($documentos) {

		 foreach ($documentos as $key => $documento) {

		?>
			<li class="list-group-item">
				<a href="<?=URL_SITIO.$documento["url"]?>" target="_new">
					<span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> 
					<?=$documento["nombre"]?>					
				</a>
				<a href="<?=URL_USUARIO."/".URL_USUARIO_DOCUMENTOS?>/?eliminarDocumento=<?=$documento["iddocumento"]?>">
					<span class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></span>
				</a></li>
		
		<?php }

		} else{ ?>

	<li class="list-unstyled">No ha subido ningún documento.</li>
	<?php }	?>	
	</ul>
	<hr>
	<h3 class="text-center">Subir Nuevo Documento</h3>
	<form method="post" enctype="multipart/form-data">
	<div class="row">
	  <div class="form-group col-xs-12 col-md-4 col-md-offset-4">
	    <label for="exampleInputEmail1">Nombre</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" name="nombre" placeholder="Nombre del Documento" required>
	  </div>	  
	  <div class="form-group col-xs-12 col-md-4 col-md-offset-4">
	    <label for="exampleInputFile">Seleeciona el documento</label>
	    <input type="file" name="documento" id="exampleInputFile" required>
	    <!--<p class="help-block">Example block-level help text here.</p>-->
	  </div>
	  </div>
	  <div class="row">
	  	<button type="submit" name="crearDocumento" class="btn btn-default center-block">SUBIR DOCUMENTO</button>
	  </div>
	</form>
	</div>	
    <div class="clearfix"></div>
    </div>
    </div>	
</div>
<br>
<br>
<?php include "footer.php"; ?>
