<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Nit</label>
					<input type="text" class="form-control" name="nit" id="nit" value="<?=$organizacion['nit']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Razón Social</label>
					<input type="text" class="form-control" name="razon_social" id="razon_social" value="<?=$organizacion['razon_social']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Dirección</label>
					<input type="text" class="form-control" name="direccion" id="direccion" value="<?=$organizacion['direccion']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Teléfono</label>
					<input type="text" class="form-control" name="telefono" id="telefono" value="<?=$organizacion['telefono']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Ciudad</label>
					<select name="idciudad" class="form-control" required>
						<option value="">-Seleccione-</option>
						<?php
						foreach ($ciudades as $key => $ciudad) {
							?>
							<option value="<?=$ciudad["idciudad"]?>" <?php if ($organizacion["ciudades_idciudad"] == $ciudad["idciudad"]) echo "selected"; ?>><?=$ciudad["ciudad"]?></option>
							<?php
						}
						?>
					</select>
				</div>
				
				<?php
				if (isset($idorganizacion) && $idorganizacion!='') {
				?>
					<button type="submit" name="actualizarOrganizacion" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearOrganizacion" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>