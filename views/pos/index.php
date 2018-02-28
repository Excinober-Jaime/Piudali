<?php include 'views/pos/header.php'; ?>

<div class="container-fluid text-center">
	<img src="assets/img/logo-piudali.png" class="img-fluid">
	<hr>
	<div class="container">
		<form method="post" action="<?=URL_POS.'/'.URL_POS_CONSULTA?>">
		  <div class="form-group">
		    <label>Por favor ingrese el número de documento del cliente</label>
		    <input class="form-control form-control-lg ml-auto mr-auto" type="text" placeholder="Ej: 1144178452" name="documento" required="required" style="max-width: 300px;"><br>
		    <button type="submit" name="consultar" class="btn btn-primary btn-lg">CONSULTAR</button>
		  </div>
		</form>
	</div>
</div>

<?php include 'views/pos/footer.php'; ?>
