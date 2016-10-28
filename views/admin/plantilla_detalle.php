<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Titulo</label>
					<input type="text" class="form-control" name="titulo" id="titulo" value="<?=$plantilla['titulo']?>" required>
				</div>			
				<div class="form-group">
					<label for="exampleInputEmail1">Asunto</label>
					<input type="text" class="form-control" name="asunto" id="asunto" value="<?=$plantilla['asunto']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Mensaje</label>
					<textarea name="mensaje" id="contenido" class="form-control"><?=$plantilla['mensaje']?></textarea>
					<p class="help-block">Etiquetas: [nombre_completo], [orden], [productos], [estado_pago], [email], [password]</p>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email</label>
					<input type="text" class="form-control" name="email" id="email" value="<?=$plantilla['email']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Estado</label>
					<select name="estado" id="estado" class="form-control" required>
						<option value="1" <?php if ($plantilla['estado']) echo 'selected'; ?>>Activo</option>
						<option value="0" <?php if (!$plantilla['estado']) echo 'selected'; ?>>Inactivo</option>
					</select>
				</div>
				<?php
				if (isset($idplantilla) && $idplantilla!='') {
				?>
					<button type="submit" name="actualizarPlantilla" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}
				?>
				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>