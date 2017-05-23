<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Titulo</label>
					<input type="text" class="form-control" name="titulo" id="titulo" value="<?=$categoria['titulo']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Contenido</label>
					<textarea name="contenido" id="contenido" class="form-control"><?=$categoria['contenido']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Perfil</label>
					<select name="perfil" id="perfil" class="form-control" required>
						<option value="DISTRIBUIDOR DIRECTO" <?php if ($categoria['perfil']=='DISTRIBUIDOR DIRECTO') echo 'selected'; ?>>DISTRIBUIDOR DIRECTO</option>
						<option value="REPRESENTANTE COMERCIAL" <?php if ($categoria['perfil']=='REPRESENTANTE COMERCIAL') echo 'selected'; ?>>REPRESENTANTE COMERCIAL</option>
						<option value="TODOS" <?php if ($categoria['perfil']=='TODOS') echo 'selected'; ?>>TODOS</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Orden</label>
					<input type="text" class="form-control" name="orden" id="orden" value="<?=$categoria['orden']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Estado</label>
					<select name="estado" id="estado" class="form-control" required>
						<option value="1" <?php if ($categoria['estado']) echo 'selected'; ?>>Activo</option>
						<option value="0" <?php if (!$categoria['estado']) echo 'selected'; ?>>Inactivo</option>
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