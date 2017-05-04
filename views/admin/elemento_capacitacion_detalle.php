<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Titulo</label>
					<input type="text" class="form-control" name="titulo" id="titulo" value="<?=$elemento['titulo']?>" required>
				</div>				
				<div class="form-group">
					<label for="exampleInputEmail1">Tipo</label>
					<select name="tipo" id="tipo-elemento" class="form-control" required>
						<option value="ENTRADA" <?php if ($elemento['tipo']=='ENTRADA') echo 'selected'; ?>>ENTRADA</option>
						<option value="SLIDESHARE" <?php if ($elemento['tipo']=='SLIDESHARE') echo 'selected'; ?>>SLIDESHARE</option>
						<option value="YOUTUBE" <?php if ($elemento['tipo']=='YOUTUBE') echo 'selected'; ?>>YOUTUBE</option>
						<option value="HTML" <?php if ($elemento['tipo']=='HTML') echo 'selected'; ?>>HTML</option>
						<option value="VIDEO" <?php if ($elemento['tipo']=='VIDEO') echo 'selected'; ?>>VIDEO</option>
					</select>
				</div>
					
				<div class="row">
					<div class="col-xs-6">								
						<div class="form-group" id="img-field">
							<label for="exampleInputEmail1">Imágen</label>
							<input type="file" name="imagen" class="form-control">
						</div>
						</div>
					<div class="col-xs-6">								
						<?php
						if (!empty($elemento["imagen"])) {
						?>
							<img src="<?=$elemento['imagen']?>" class="img-responsive">
						<?php
						}
						 ?>
					</div>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Url o Contenido</label>
					<textarea name="contenido2" id="contenido" class="form-control"><?=$elemento['contenido']?></textarea>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Perfil</label>
					<select name="perfil" id="perfil" class="form-control" required>
						<option value="DISTRIBUIDOR DIRECTO" <?php if ($elemento['perfil']=='DISTRIBUIDOR DIRECTO') echo 'selected'; ?>>DISTRIBUIDOR DIRECTO</option>
						<option value="REPRESENTANTE COMERCIAL" <?php if ($elemento['perfil']=='REPRESENTANTE COMERCIAL') echo 'selected'; ?>>REPRESENTANTE COMERCIAL</option>
						<option value="TODOS" <?php if ($elemento['perfil']=='TODOS') echo 'selected'; ?>>TODOS</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Estado</label>
					<select name="estado" id="estado" class="form-control" required>
						<option value="1" <?php if ($elemento['estado']) echo 'selected'; ?>>Activo</option>
						<option value="0" <?php if (!$elemento['estado']) echo 'selected'; ?>>Inactivo</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Categoría</label>
					<select name="categoria" class="form-control" required>
						<option value="">--Seleccione--</option>
						<?php
						foreach ($categorias as $key => $categoria) {
							?>
							<option value="<?=$categoria['idcategoria']?>" <?php if ($categoria['idcategoria']==$elemento['categorias_capacitacion_idcategoria']) { echo "selected"; } ?>><?=$categoria["titulo"]?></option>
							<?php
						}
						?>
					</select>
				</div>
				<?php
				if (isset($elemento) && $elemento!='') {
				?>
					<button type="submit" name="actualizarElemento" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearElemento" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>