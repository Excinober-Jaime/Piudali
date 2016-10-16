<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>			
	<div class="col-xs-12">
	<h1>Documentos <small><small></small></small></h1>
	<hr>
	<?php 
	if ($documentos) {
	?>
		<ul class="list-group">		
			<li class="list-group-item"><a href="documentos/FORMATO-AFILIACION-LIDER-COMERCIAL-PIUDALI.pdf" target="_new"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> FORMATO DE AFILIACION LIDER COMERCIAL PIUDALI</a></li>
		<?php foreach ($documentos as $key => $documento) {
		?>
			<li class="list-group-item"><a href="<?="include/descargar.php?url=".$documento["url"]?>"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> <?=$documento["nombre"]?></a></li>
		<?php } ?>	  
		</ul>
	<?php }else{ ?>	
	<p>No ha subido ningún documento.</p>
	<?php }	?>	
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
</div>
<br>
<br>
<?php include "footer.php"; ?>
