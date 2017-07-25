<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-4">			
			<form method="post">
				<div class="form-group">
					<label for="exampleInputEmail1">Cantidad de Códigos a Generar</label>
					<input type="number" min="1" max="100" class="form-control" name="cantidad" id="cantidad" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Puntos</label>
					<input type="number" min="1" max="1000000" class="form-control" name="puntos" id="puntos" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Generar Códigos QR</label>
					<select class="form-control" name="qr" required>
						<option value="0">No</option>
						<option value="1">Si</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Fecha de Vencimiento</label>
					<input type="date" class="form-control" name="vencimiento" id="vencimiento" placeholder="AAAA-MM-DD" required>
				</div>
				<button name="generarCodigos" class="btn btn-primary btn-lg">GENERAR CÓDIGOS</button>
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>