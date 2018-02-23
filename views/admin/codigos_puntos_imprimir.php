<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12 print-code">			
			<?php
			if (count($codigos)>0) {
				foreach ($codigos as $key => $codigo) {
			?>
				<div class="" style="width: 1.5cm;margin-left: 0.5cm;float: left;padding: 0px;">
					<?php if ($codigo['qr']) { ?>
						<img src="assets/img/codigosqrpuntos/<?=$codigo['codigo']?>.png" class="img-responsive">
					<?php } ?>
					<h4 class="text-center" style="color: #000;margin-top: 2px;margin-bottom: 0.5cm;font-size: 12px;"><?=$codigo['codigo']?></h4>
				</div>
			<?php
				}
			}
			?>
		</div>
		<center>
			<button class="btn btn-primary btn-lg" id="imprimirQR">Imprimir</button>
		</center>
	</div>
</div>
<?php include "footer.php"; ?>