<?php include 'header.php'; ?>

<div class="container-fluid text-center" style="max-width: 400px;">
	<img src="assets/img/logo-piudali.png" class="img-fluid">
	<hr>
	<div class="row">
		<div class="col-6 text-left">Número de Documento</div>
		<div class="col-6 text-left"><?=$cliente['num_identificacion']?></div>
		<div class="col-6 text-left">Nombre</div>
		<div class="col-6 text-left"><?=$cliente['nombre'].' '.$cliente['apellido']?></div>
		<div class="col-6 text-left">Puntos Disponibles</div>
		<div class="col-6 text-left"><?=number_format($puntos['disponibles'])?></div>
		<div class="col-6 text-left">Equivalencia en pesos</div>
		<div class="col-6 text-left"><?=convertir_pesos($equivalencia_pesos)?></div>
	</div>
	<hr>
	<h3 class="text-center">¿Cuánto vas a redimir?</h3>
	<div class="row">
		<div class="col-12 text-center">
			<form class="form" method="post" id="form-redimir" action="<?=URL_POS.'/'.URL_POS_REDIMIR?>">
				<div class="col-auto">
			      <label class="sr-only" for="inlineFormInputGroup">Puntos</label>
			      <div class="input-group mb-2">
			        <div class="input-group-prepend">
			          <div class="input-group-text">$</div>
			        </div>
			        <input type="text" class="form-control" id="valor" min="1" max="<?=$equivalencia_pesos?>" name="valor" placeholder="Ejemplo: $20000">
			      </div>
			    </div>
				<br>
				<input type="hidden" name="idcliente" value="<?=$cliente['idusuario']?>">
				<button type="button" id="redimirPuntos" name="redimirPuntos" class="btn btn-primary">Redimir</button>
			</form>
		</div>
	</div>
</div>

<?php include 'views/pos/footer.php'; ?>