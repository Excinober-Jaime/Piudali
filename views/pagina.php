<?php include "header.php"; ?>

<div class="container">
	<div class="col-xs-12">
		<?php 
		if (!empty($pagina_detalle["banner"])) {
			?>
			<img src="<?=$pagina_detalle['banner']?>" class="img-responsive">
			<hr>
			<?php
		}
		//var_dump($pagina_detalle);
		?>		
		<?=$pagina_detalle["contenido"]?>
	</div>
</div>
<br>
<br>
<?php include "footer.php"; ?>