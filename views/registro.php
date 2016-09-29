<?php include "header.php"; ?>

<div class="container">	
	<div class="col-xs-12 col-md-9">
	<h1 class="text-center">REGISTRO</h1>
		<form method="post">
		<div class="row">
			<div class="col-xs-12 col-md-6">
			
				<h3>DATOS DE LA CUENTA</h3>
				<hr>
				<div class="form-group">
					<label for="exampleInputEmail1">Nombre</label>
					<input type="text" name="nombre" class="form-control" id="nombre" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Apellido</label>
					<input type="text" name="apellido" class="form-control" id="apellido" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Número de Identificación</label>
					<input type="text" name="num_identificacion" class="form-control" id="num_identificacion" required>
				</div>	
				<div class="form-group">
					<label for="exampleInputEmail1">Email</label>
					<input type="email" name="email" class="form-control" id="email" required>
				</div>	
				<div class="form-group">
					<label for="exampleInputEmail1">Sexo</label>
					<select name="sexo" class="form-control" required>
						<option value="FEMENINO">FEMENINO</option>
						<option value="MASCULINO">MASCULINO</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Fecha de Nacimiento</label>
					<input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" placeholder="aaaa-mm-dd">
				</div>		
				<div class="form-group">
					<label for="exampleInputEmail1">Dirección</label>
					<input type="text" name="direccion" class="form-control" id="direccion" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Teléfono</label>
					<input type="text" name="telefono" class="form-control" id="telefono">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Teléfono Móvil</label>
					<input type="text" name="telefono_m" class="form-control" id="telefono_m">
				</div>		
				<div class="form-group">
					<label for="exampleInputEmail1">Ciudad</label>
					<select name="ciudad" class="form-control" required>				
						<option>Seleccione</option>
						<?php 
						foreach ($ciudades as $key => $ciudad) {
							?>
							<option value="<?=$ciudad["idciudad"]?>"><?=$ciudad["ciudad"]?></option>
							<?php
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Contraseña</label>
					<input type="password" name="password" class="form-control" id="password" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Repita Contraseña</label>
					<input type="password" name="password2" class="form-control" id="password2" required>
				</div>
				<div class="checkbox">
				    <label>
				      <input type="checkbox" name="boletines" value="1"> Deseo recibir boletines informativos
				    </label>
				</div>
				<div class="checkbox">
				    <label>
				      <input type="checkbox" name="condiciones" value="1" required> Acepto los <a class="open-modal" idpage="14">términos y condiciones</a>
				    </label>
				</div>			
			</div>
			<div class="col-xs-12 col-md-6">
				<h3>DATOS DE LA ORGANIZACIÓN</h3>
				<hr>
				<div class="form-group">
					<label for="exampleInputEmail1">Razon Social</label>
					<input type="text" name="razon_social" class="form-control" id="razon_social" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Nit</label>
					<input type="text" name="nit" class="form-control" id="nit" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Dirección</label>
					<input type="text" name="direccion_organizacion" class="form-control" id="direccion_organizacion">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Teléfono</label>
					<input type="text" name="telefono_organizacion" class="form-control" id="telefono_organizacion">
				</div>
			</div>
		</div>
		<button type="submit" name="crearUsuario" class="btn btn-default btn-lg center-block">CREAR CUENTA</button>
		</form>
	</div>

	<div class="col-xs-12 col-md-3">
		<?php
		foreach ($banners as $banner) {
		?>
			<a href="<?=$banner['link']?>"><img src="<?=$banner['imagen']?>" class="img-responsive"></a><br>
		<?php
		}
		?>
	</div>
</div>
<br><br>
<?php include "footer.php"; ?>