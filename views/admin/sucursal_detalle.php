<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="<?=$sucursal['nombre']?>" required>
				</div>				
				<div class="form-group">
					<label for="exampleInputEmail1">Dirección</label>
					<input type="text" class="form-control" name="direccion" id="direccion" value="<?=$sucursal['direccion']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Teléfono</label>
					<input type="text" class="form-control" name="telefono" id="telefono" value="<?=$sucursal['telefono']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email</label>
					<input type="text" class="form-control" name="email" id="email" value="<?=$sucursal['email']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Organización</label>
					<select name="idorganizacion" class="form-control" required>
						<option value="">-Seleccione-</option>
						<?php
						foreach ($organizaciones as $key => $organizacion) {
							?>
							<option value="<?=$organizacion["idorganizacion"]?>" <?php if ($sucursal["organizaciones_idorganizacion"] == $organizacion["idorganizacion"]) echo "selected"; ?>><?=$organizacion["razon_social"]?></option>
							<?php
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Ciudad</label>
					<select name="idciudad" class="form-control" required>
						<option value="">-Seleccione-</option>
						<?php
						foreach ($ciudades as $key => $ciudad) {
							?>
							<option value="<?=$ciudad["idciudad"]?>" <?php if ($sucursal["ciudades_idciudad"] == $ciudad["idciudad"]) echo "selected"; ?>><?=$ciudad["ciudad"]?></option>
							<?php
						}
						?>
					</select>
				</div>
				
				<?php
				if (isset($idsucursal) && $idsucursal!='') {
				?>
					<button type="submit" name="actualizarSucursal" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearSucursal" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>