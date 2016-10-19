<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<ol class="breadcrumb">
			  <li><a href="#">Incentivo</a></li>		  
			  <li class="active">Detalle</li>
			</ol>

			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Incentivo</label>
					<input type="text" class="form-control" name="incentivo" id="incentivo" value="<?=$incentivo['incentivo']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Inicio</label>
					<input type="date" class="form-control" name="inicio" id="inicio" value="<?=$incentivo['inicio']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Fin</label>
					<input type="date" class="form-control" name="fin" id="fin" value="<?=$incentivo['fin']?>" required>
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
						if (!empty($incentivo['imagen'])) {				
						
						?>
							<img src="<?=$incentivo['imagen']?>" class="img-responsive">
						<?php
						}	
						?>				
					</div>			
				</div>					
				<div class="form-group">
					<label for="exampleInputEmail1">Meta</label>
					<input type="text" class="form-control" name="meta" id="meta" value="<?=$incentivo['meta']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Descripción</label>
					<textarea name="descripcion" class="form-control"><?=$incentivo['descripcion']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Usuario</label>
					<select name="usuario" id="usuario" class="form-control" required>
						<option value="DISTRIBUIDOR DIRECTO" <?php if ($incentivo['usuario']=='DISTRIBUIDOR DIRECTO') echo 'selected'; ?>>DISTRIBUIDOR DIRECTO</option>
						<option value="REPRESENTANTE COMERCIAL" <?php if ($incentivo['usuario']=='REPRESENTANTE COMERCIAL') echo 'selected'; ?>>REPRESENTANTE COMERCIAL</option>
					</select>
				</div>
				<?php
				if (isset($idincentivo) && $idincentivo!='') {
				?>
					<button type="submit" name="actualizarIncentivo" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearIncentivo" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>