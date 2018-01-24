<?php include 'header.php'; ?>
<div class="divider"></div>
<div class="container" id="productos">
	<h1 class="center-align" style="font-size: 40px;"><?=$entrada['titulo']?></h1>
	<div class="row">
		<div class="col s12 l4">
			<?php 
				if ($entrada['tipo'] == 'IMAGEN') {
			?>
					<img src="<?=$entrada['ruta']?>" class="responsive-img materialboxed">
			<?php
				}elseif ($entrada['tipo'] == 'VIDEO') {
			?>

					<div class="video-container">
						<iframe src="<?=$entrada['ruta']?>" frameborder="0" allowfullscreen></iframe>
					</div>        
			<?php
				}
			?>

		</div>
		<div class="col s12 l8">
			<?=$entrada['contenido']?>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>