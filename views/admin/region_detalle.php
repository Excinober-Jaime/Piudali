<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Región</label>
					<input type="text" class="form-control" name="region" id="region" value="<?=$region['region']?>" required>
				</div>
				<div class="form-group">
					<label>Director</label>
					<select class="form-control" name="director" required>
						<option value="">--Seleccione--</option>
						<?php
						foreach ($directores as $key => $director) {
						?>
							<option value="<?=$director["idusuario"]?>" <?php if ($director["idusuario"]==$region['director']) echo "selected"; ?>><?=$director["nombre"]." ".$director["apellido"]?></option>
						<?php
						}
						?>
					</select>
				</div>					
				<div class="form-group">
					<label>Estado</label>
					<select name="estado" id="estado" class="form-control" required>
						<option value="1" <?php if ($region['estado']) echo 'selected'; ?>>Activo</option>
						<option value="0" <?php if (!$region['estado']) echo 'selected'; ?>>Inactivo</option>
					</select>
				</div>
				<div class="form-group">
	                <label>Ciudades</label>
	                <div class="input-group">
	                <select name="ciudades[]" data-placeholder="Seleccione ciudades..." class="chosen-select" multiple style="width:350px;" tabindex="2" value="8">
		                <option value="">Select</option>
		                <?php 
		                foreach ($ciudades as $key => $ciudad) {

		                	if(in_array($ciudad["idciudad"], $ciudades_region)){
		                		$selected = "selected";
		                	}else{
		                		$selected = "";
		                	}
		                ?>
		                	<option value="<?=$ciudad["idciudad"]?>" <?=$selected?>><?=$ciudad["ciudad"]?></option>
		                <?php
		                }
		                ?>
	                </select>
	                </div>
                </div>
				<?php
				if (isset($idregion) && $idregion!='') {
				?>
					<button type="submit" name="actualizarRegion" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearRegion" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>