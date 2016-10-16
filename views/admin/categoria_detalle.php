<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<ol class="breadcrumb">
			  <li><a href="#">Categoría</a></li>		  
			  <li class="active">Detalle</li>
			</ol>

			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Nombre</label>
					<input type="text" class="form-control" name="nombre" id="nombre" value="<?=$categoria[0]['nombre']?>" required>
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
						if (!empty($categoria[0]['imagen'])) {				
						
						?>
							<img src="<?=$categoria[0]['imagen']?>" class="img-responsive">
						<?php
						}	
						?>				
					</div>			
				</div>								
				<div class="form-group">
					<label for="exampleInputEmail1">Estado</label>
					<select name="estado" id="estado" class="form-control" required>
						<option value="1" <?php if ($categoria[0]['estado']) echo 'selected'; ?>>Activo</option>
						<option value="0" <?php if (!$categoria[0]['estado']) echo 'selected'; ?>>Inactivo</option>
					</select>
				</div>
				<?php
				if (isset($idcategoria) && $idcategoria!='') {
				?>
					<button type="submit" name="actualizarCategoria" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearCategoria" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>
				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>