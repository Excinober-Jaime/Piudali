<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="<?=$banner[0]['nombre']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Link</label>
					<input type="text" class="form-control" name="link" id="link" value="<?=$banner[0]['link']?>" required>
				</div>
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Imágen</label>
							<input type="file" name="imagen" class="form-control">
						</div>
					</div>
					<div class="col-xs-12 col-md-6">
						<?php
						if (!empty($banner[0]['imagen'])) {				
						
						?>
							<img src="<?=$banner[0]['imagen']?>" class="img-responsive">
						<?php
						}	
						?>				
					</div>			
				</div>					
				<div class="form-group">
					<label for="exampleInputEmail1">Posición</label>
					<select name="posicion" id="posicion" class="form-control" required>
						<option value="HOME" <?php if ($banner[0]['posicion']=='HOME') echo 'selected'; ?>>HOME</option>
						<option value="SIDEBAR" <?php if ($banner[0]['posicion']=='SIDEBAR') echo 'selected'; ?>>SIDEBAR</option>
						<option value="PANEL INTERNO" <?php if ($banner[0]['posicion']=='PANEL INTERNO') echo 'selected'; ?>>PANEL INTERNO</option>
						<option value="CONTACTO" <?php if ($banner[0]['posicion']=='CONTACTO') echo 'selected'; ?>>CONTÁCTO</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Estado</label>
					<select name="estado" id="estado" class="form-control" required>
						<option value="1" <?php if ($banner[0]['estado']) echo 'selected'; ?>>Activo</option>
						<option value="0" <?php if (!$banner[0]['estado']) echo 'selected'; ?>>Inactivo</option>
					</select>
				</div>
				<?php
				if (isset($idbanner) && $idbanner!='') {
				?>
					<button type="submit" name="actualizarBanner" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearBanner" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>
				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>