<?php include "header.php"; ?>

<div class="container">
	<div class="col-xs-12">
		<a href="<?=$banners[0]['link']?>">
			<img src="<?=$banners[0]['imagen']?>" class="img-responsive">
		</a>
		<hr>
		<form method="post">
			<div class="form-group">
				<label for="exampleInputEmail1">Nombre</label>
				<input type="text" class="form-control" name="nombre" id="nombre" required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input type="email" class="form-control" name="email" id="email" required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Teléfono</label>
				<input type="text" class="form-control" name="telefono" id="telefono" required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Pregunta o Sugerencia</label>
				<textarea class="form-control" name="mensaje" id="mensaje" required></textarea>
			</div>
			<button type="submit" name="enviarMensaje" class="btn btn-lg btn-primary">Enviar</button>
		</form>
	</div>
</div>
<br>
<br>
<?php include "footer.php"; ?>