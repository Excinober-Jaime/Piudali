<?php include "header.php"; ?>

<div class="container">		
	<?php include "usuario/menu.php"; ?>		
	<div class="col-xs-12">		
		<h1>Cambiar Datos</h1>
		<hr>
		<div class="row">
			<form method="post" enctype="multipart/form-data">
				<div class="col-xs-12 col-md-6">									
					<div class="form-group">
						<label for="exampleInputEmail1">Número de Identificación</label>
						<input type="text" name="num_identificacion" class="form-control" id="num_identificacion" value="<?=$usuario["num_identificacion"]?>" disabled>
					</div>	
					<div class="form-group">
						<label for="exampleInputEmail1">Nombre</label>
						<input type="text" name="nombre" class="form-control" id="nombre" value="<?=$usuario["nombre"]?>" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Apellido</label>
						<input type="text" name="apellido" class="form-control" id="apellido" value="<?=$usuario["apellido"]?>" required>
					</div>					
					<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" name="email" class="form-control" id="email" value="<?=$usuario["email"]?>" required>
					</div>	
					<div class="form-group">
						<label for="exampleInputEmail1">Sexo</label>
						<select name="sexo" class="form-control" required>
							<option value="">-Seleccione-</option>
							<option value="FEMENINO" <?php if ($usuario["sexo"]=="FEMENINO") echo "selected"; ?>>FEMENINO</option>
							<option value="MASCULINO" <?php if ($usuario["sexo"]=="MASCULINO") echo "selected"; ?>>MASCULINO</option>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Fecha de Nacimiento</label>
						<input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" value="<?=$usuario["fecha_nacimiento"]?>" placeholder="aaaa-mm-dd">
					</div>		
					<div class="form-group">
						<label for="exampleInputEmail1">Dirección</label>
						<input type="text" name="direccion" class="form-control" id="direccion" value="<?=$usuario["direccion"]?>" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Teléfono</label>
						<input type="text" name="telefono" class="form-control" id="telefono" value="<?=$usuario["telefono"]?>">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Teléfono Móvil</label>
						<input type="text" name="telefono_m" class="form-control" id="telefono_m" value="<?=$usuario["telefono_m"]?>">
					</div>		
					<div class="form-group">
						<label for="exampleInputEmail1">Ciudad</label>
						<select name="ciudad" class="form-control" required>
							<option value="">-Seleccione-</option>
							<?php 
							foreach ($ciudades as $key => $ciudad) {
								?>
								<option value="<?=$ciudad["idciudad"]?>" <?php if ($usuario["ciudades_idciudad"] == $ciudad["idciudad"]) echo "selected"; ?>><?=$ciudad["ciudad"]?></option>
								<?php
							}
							?>
						</select>
					</div>								
					<div class="checkbox">
					    <label>
					      <input type="checkbox" name="boletines" value="1" <?php if ($usuario["boletines"]) echo "checked"; ?>> Deseo recibir boletines informativos
					    </label>
					</div>
					<hr>
					<h3>Cambiar Contraseña <small>Si no deseas cambiar tu contraseña deja los campos en blanco</small></h3>
					<div class="form-group">
						<label for="exampleInputEmail1">Contraseña Actual</label>
						<input type="password" name="contrasena_actual" class="form-control" id="password">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Nueva Contraseña</label>
						<input type="password" name="nueva_contrasena" class="form-control" id="password2">
					</div>
					<button type="submit" name="cambiarDatos" class="btn btn-primary btn-lg center-block">GUARDAR CAMBIOS</button>				
				</div>
				<div class="col-xs-12 col-md-6">
				<?php if ($organizacion) { ?>					
					<input type="hidden" name="idorganizacion" value="<?=$organizacion["idorganizacion"]?>">
					<h3>DATOS DE LA ORGANIZACIÓN</h3>
					<div class="form-group">
						<label for="exampleInputEmail1">Nit</label>
						<input type="text" name="nit" class="form-control" id="nit" value="<?=$organizacion["nit"]?>" disabled>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Razon Social</label>
						<input type="text" name="razon_social" class="form-control" id="razon_social" value="<?=$organizacion["razon_social"]?>" required>
					</div>					
					<div class="form-group">
						<label for="exampleInputEmail1">Teléfono</label>
						<input type="text" name="telefono_organizacion" class="form-control" id="telefono_organizacion" value="<?=$organizacion["telefono"]?>">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Dirección</label>
						<input type="text" name="direccion_organizacion" class="form-control" id="direccion_organizacion" value="<?=$organizacion["direccion"]?>">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Ciudad</label>
						<select name="ciudad_organizacion" class="form-control" required>
							<option>Seleccione</option>
							<?php 
							foreach ($ciudades as $key => $ciudad) {
								?>
								<option value="<?=$ciudad["idciudad"]?>" <?php if ($organizacion["ciudades_idciudad"] == $ciudad["idciudad"]) { echo "selected"; } ?>><?=$ciudad["ciudad"]?></option>
								<?php
							}
							?>
						</select>
					</div>
					<hr>
				<?php }  ?>
					<?php 
					if (!empty($usuario["foto"])) {
					?>
						<img src="<?=$usuario["foto"]?>" class="img-responsive">
					<?php	
					}else{
					?>
						<span style="font-size:100px;"><i class="fa fa-user" aria-hidden="true"></i></span>
					<?php
					}
					?>			
					<div class="form-group">
						<label for="exampleInputFile">Cambiar Imágen</label>
						<input type="file" name="foto" id="exampleInputFile">
						<p class="help-block">Selecciona una foto que te identifique</p>
					</div>
				</div>
			</form>
		</div>
	</div>	
</div>
<br>
<br>
<?php include "footer.php"; ?>
