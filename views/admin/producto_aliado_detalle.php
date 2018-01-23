<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">		
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="<?=$producto['nombre']?>" required>
				</div>				
				<div class="col-xs-12 col-md-6">
					<div class="form-group">
						<label for="exampleInputEmail1">Imágen Principal</label>
						<input type="file" name="img_principal" class="form-control">
					</div>
				</div>
				<div class="col-xs-12 col-md-6">
					<?php
					if (!empty($producto['img_principal'])) {				
					
					?>
						<img src="<?=$producto['img_principal']?>" class="img-responsive" style="max-width: 300px;">
					<?php
					}	
					?>				
				</div>				
				<div class="form-group">
					<label for="exampleInputEmail1">Descripción</label>
					<textarea name="descripcion" id="descripcion" class="form-control"><?=$producto['descripcion']?></textarea>
				</div>				
				<div class="form-group">
					<label for="exampleInputEmail1">Más Información</label>
					<textarea name="mas_info" id="contenido" class="form-control contenido"><?=$producto['mas_info']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Organización</label>
					<select name="idorganizacion" class="form-control" required>
						<option value="">-Seleccione-</option>
						<?php
						foreach ($organizaciones as $key => $organizacion) {
							?>
							<option value="<?=$organizacion["idorganizacion"]?>" <?php if ($producto["organizaciones_idorganizacion"] == $organizacion["idorganizacion"]) echo "selected"; ?>><?=$organizacion["razon_social"]?></option>
							<?php
						}
						?>
					</select>
				</div>		
				<div class="form-group">
					<label for="exampleInputEmail1">Estado</label>
					<select name="estado" id="estado" class="form-control" required>
						<option value="1" <?php if ($producto['estado']) echo 'selected'; ?>>Activo</option>
						<option value="0" <?php if (!$producto['estado']) echo 'selected'; ?>>Inactivo</option>
					</select>
				</div>
				<?php
				if (isset($idproducto) && $idproducto!='') {
				?>
					<button type="submit" name="actualizarProducto" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearProducto" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>
				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>