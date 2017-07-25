<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12 print-code">			
			<?php
			if (count($codigos)>0) {
				foreach ($codigos as $key => $codigo) {
			?>
				<div class="col-xs-6 col-md-3">
					<?php if ($qr) { ?>
						<img src="<?=$imgsqr[$codigo]?>" class="img-responsive">
					<?php } ?>
					<h3 class="text-center"><?=$codigo?></h3>
				</div>
			<?php
				}
			}
			?>
		</div>
		<center>
			<button class="btn btn-primary btn-lg" onclick="jQuery('.print-code').print()">Imprimir</button>
		</center>
	</div>
</div>
<?php include "footer.php"; ?>