<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Título</label>
					<input type="text" class="form-control" name="titulo" id="titulo" value="<?=$entrada['titulo']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Tipo</label>
					<select name="tipo" id="tipo" class="form-control" required>
						<option value="">-Seleccione-</option>
						<option value="IMAGEN" <?php if ($entrada['tipo']=='IMAGEN') echo 'selected'; ?>>IMÁGEN</option>
						<option value="VIDEO" <?php if ($entrada['tipo']=='VIDEO') echo 'selected'; ?>>VIDEO</option>						
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Url Video</label>
					<input type="text" class="form-control" name="url_video" id="url_video" value="<?php if ($entrada['tipo'] == 'VIDEO') echo $entrada['ruta'] ?>">
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
						if (!empty($entrada['ruta']) && $entrada['tipo'] == 'IMAGEN') {
						
						?>
							<img src="<?=$entrada['ruta']?>" class="img-responsive">
						<?php
						}	
						?>				
					</div>			
				</div>		
				<div class="form-group">
					<label for="exampleInputEmail1">Contenido</label>
					<textarea name="contenido" id="contenido" class="form-control"><?=$entrada['contenido']?></textarea>
				</div>							
				<div class="form-group">
					<label for="exampleInputEmail1">Estado</label>
					<select name="estado" id="estado" class="form-control" required>
						<option value="1" <?php if ($entrada['estado']) echo 'selected'; ?>>Activo</option>
						<option value="0" <?php if (!$entrada['estado']) echo 'selected'; ?>>Inactivo</option>
					</select>
				</div>
				<?php
				if (isset($identrada) && $identrada!='') {
				?>
					<button type="submit" name="actualizarEntrada" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearEntrada" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>
				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>