<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
        	<form method="post" enctype="multipart/form-data">				
				<div class="col-xs-12 col-md-4">
					<h2>CONTÁCTO</h2>				
					<div class="form-group">
						<label for="exampleInputEmail1">Nombre</label>
						<input type="text" class="form-control" name="nombre" id="nombre" value="" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Apellido</label>
						<input type="text" class="form-control" name="apellido" id="apellido" value="" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Sexo</label>
						<select name="sexo" id="sexo" class="form-control" required>
							<option value="">--Seleccione--</option>
							<option value="MASCULINO">MASCULINO</option>
							<option value="FEMENINO">FEMENINO</option>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Fecha de Nacimiento</label>
						<input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" class="form-control" name="email" id="email" value="" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Número de documento</label>
						<input type="text" class="form-control" name="num_identificacion" id="num_identificacion" value="" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Dirección</label>
						<input type="text" class="form-control" name="direccion" id="direccion" value="">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Mostrar en Mapa</label>
						<select name="mapa" id="mapa" class="form-control">
							<option value="0">NO</option>
							<option value="1">SI</option>							
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Teléfono</label>
						<input type="text" class="form-control" name="telefono" id="telefono" value="">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Móvil</label>
						<input type="text" class="form-control" name="telefono_m" id="telefono_m" value="">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Ciudad</label>
						<select name="ciudad" class="form-control" required>
							<option value="">-Seleccione-</option>
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
						<label for="exampleInputEmail1">Segmento</label>
						<select name="segmento" class="form-control" required>
							<option value="">Seleccione</option>							
								
								<optgroup label="Perfiles Antiguos">
									
									<option value="Profesional de Belleza">Profesional de Belleza</option>

									<option value="Dermatólogo">Dermatólogo</option>
									
								</optgroup>
								
								<optgroup label="Perfiles Actuales">

									<option value="Esteticista">Esteticista</option>
									
									<option value="Médico">Médico</option>
									
									<option value="Terapeuta">Terapeuta</option>

									<option value="Comercializador Independiente">Comercializador Independiente</option>

									<option value="SPA">SPA</option>

									<option value="Centro Médico">Centro Médico</option>

									<option value="Institución Especializada">Institución Especializada</option>

									<option value="Distribuidor Especializado">Distribuidor Especializado</option>	

									<option value="Tienda Especializada">Tienda Especializada</option>

									<option value="Otro">Otro</option>
								</optgroup>
						</select>
					</div>							
					<div class="form-group">
						<label for="exampleInputEmail1">Tipo</label>
						<select name="tipo" id="tipo" class="form-control" required>
							<option value="DISTRIBUIDOR DIRECTO">DISTRIBUIDOR DIRECTO</option>
							<option value="REPRESENTANTE COMERCIAL">REPRESENTANTE COMERCIAL</option>
							<option value="DIRECTOR">DIRECTOR</option>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Código de Representante</label>
						<input type="text" class="form-control" name="cod_lider" id="cod_lider" value="">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Representante Comercial</label>
						<select name="lider" id="lider" class="form-control">
							<option value="">Seleccione</option>
							<?php
							foreach ($lideres as $key => $lider) {
							?>
								<option value="<?=$lider["idusuario"]?>"><?=$lider["nombre"]." ".$lider["apellido"]?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Estado</label>
						<select name="estado" id="estado" class="form-control" required>
							<option value="1">Activo</option>
							<option value="0">Inactivo</option>
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
				
				</div>
			
				<div class="col-xs-12 col-md-4">
					<h2>ORGANIZACIÓN</h2>
				
					<div class="form-group">
						<label for="exampleInputEmail1">Razón Social</label>
						<input type="text" class="form-control" name="razon_social" id="razon_social" value="" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Nit</label>
						<input type="text" class="form-control" name="nit" id="nit" value="" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Teléfono</label>
						<input type="text" class="form-control" name="telefono_organizacion" id="telefono_organizacion" value="" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Dirección</label>
						<input type="text" class="form-control" name="direccion_organizacion" id="direccion_organizacion" value="" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Ciudad</label>
						<select name="ciudad_organizacion" class="form-control" required>
							<option value="">-Seleccione-</option>
							<?php
							foreach ($ciudades as $key => $ciudad) {
								?>
								<option value="<?=$ciudad["idciudad"]?>"><?=$ciudad["ciudad"]?></option>
								<?php
							}
							?>
						</select>
					</div>
					<button type="submit" name="crearUsuario" class="btn btn-lg btn-primary center-block">GUARDAR</button>	
				</div>	
			</form>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>