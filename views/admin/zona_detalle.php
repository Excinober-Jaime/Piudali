<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<ol class="breadcrumb">
			  <li><a href="#">Zona</a></li>		  
			  <li class="active">Detalle</li>
			</ol>

			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Zona</label>
					<input type="text" class="form-control" name="zona" id="zona" value="<?=$zona['zona']?>" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Lider</label>
					<select class="form-control" name="lider">
						<?php
						foreach ($lideres as $key => $lider) {
						?>
							<option value="<?=$lider["idusuario"]?>" <?php if ($lider["idusuario"]==$zona['lider']) echo "selected"; ?>><?=$lider["nombre"]." ".$lider["apellido"]?></option>
						<?php
						}
						?>
					</select>
				</div>	
				<div class="form-group">
					<label for="exampleInputEmail1">Ciudad</label>
					<select class="form-control" name="ciudad">
						<?php
						foreach ($ciudades as $key => $ciudad) {
						?>
							<option value="<?=$ciudad["idciudad"]?>" <?php if ($ciudad["idciudad"]==$zona['ciudades_idciudad']) echo "selected"; ?>><?=$ciudad["ciudad"]?></option>
						<?php
						}
						?>
					</select>
				</div>	
				<div class="form-group">
					<label for="exampleInputEmail1">Estado</label>
					<select name="estado" id="estado" class="form-control" required>
						<option value="1" <?php if ($zona['estado']) echo 'selected'; ?>>Activo</option>
						<option value="0" <?php if (!$zona['estado']) echo 'selected'; ?>>Inactivo</option>
					</select>
				</div>
				<?php
				if (isset($idzona) && $idzona!='') {
				?>
					<button type="submit" name="actualizarZona" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
				<?php
				}else{
				?>
					<button type="submit" name="crearZona" class="btn btn-lg btn-primary center-block">GUARDAR</button>
				<?php
				}
				?>				
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>