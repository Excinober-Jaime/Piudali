<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Título</label>
					<input type="text" class="form-control" name="titulo" id="titulo" value="<?=$cupon['titulo']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Aplicación</label>
					<select name="aplicacion" class="form-control">
						<option value="0" <?php if ($cupon['aplicacion']==0) { echo "selected"; } ?>>Porcentaje</option>
						<option value="1" <?php if ($cupon['aplicacion']==1) { echo "selected"; } ?>>Pesos</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Valor Descuento</label>
					<input type="text" class="form-control" name="val_descuento" id="val_descuento" value="<?=$cupon['val_descuento']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Fecha Expiración</label>
					<input type="date" class="form-control" name="fecha_expiracion" id="fecha_expiracion" value="<?=$cupon['fecha_expiracion']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Código</label>
					<input type="text" class="form-control" name="num_codigo_desc" id="num_codigo_desc" value="<?=$cupon['num_codigo_desc']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Monto Mínimo</label>
					<input type="text" class="form-control" name="monto_minimo" id="monto_minimo" value="<?=$cupon['monto_minimo']?>">
				</div>											
				<div class="form-group">
					<label for="exampleInputEmail1">Estado</label>
					<select name="estado" id="estado" class="form-control" required>
						<option value="1" <?php if ($cupon['estado']) echo 'selected'; ?>>Activo</option>
						<option value="0" <?php if (!$cupon['estado']) echo 'selected'; ?>>Inactivo</option>
					</select>
				</div>
				<?php
				if (isset($idcupon) && $idcupon!='') {
				?>
					<button type="submit" name="actualizarCupon" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearCupon" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>