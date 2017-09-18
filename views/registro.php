<?php include "header.php"; ?>

<div class="container">	
	<div class="col-xs-12 col-md-12">
	<a href="<?=$banners[0]['link']?>">
		<img src="<?=$banners[0]['imagen']?>" class="img-responsive">
	</a>
	<hr>
	<?php
	if (isset($alerta) && !empty($alerta)) {
	?>
	<div class="alert alert-danger" role="alert"><?=$alerta?></div>
	<?php
	}
	?>
	<h1 class="text-center">REGISTRO</h1>
		<div class="row">
			<center>
				<div class="btn-group" role="group">
					<a href="#home" aria-controls="home" role="tab" data-toggle="tab" type="button" class="btn btn-success btn-lg">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Persona Natural
					</a>
					<a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" type="button" class="btn btn-lg " style="background-color: #ef7a00; color: #fff;">
						<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Persona Jurídica
					</a>
				</div>
			</center>
			<hr>
			<div>			  
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="home">
			    	<form method="post" id="formUsuarioNatural">
				    	<div class="col-xs-12 col-md-6 col-md-offset-3">
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
								<div class="row">
									<div class="col-sm-4">
										<input type="text" name="dia_nacimiento" class="form-control"  placeholder="DD" style="text-align:center;" maxlength="2">
									</div>
									<div class="col-sm-4">
										<input type="text" name="mes_nacimiento" class="form-control"  placeholder="MM" style="text-align:center;" maxlength="2">
									</div>
									<div class="col-sm-4">
										<input type="text" name="ano_nacimiento" class="form-control"  placeholder="AAAA" style="text-align:center;" maxlength="4">
									</div>
								</div>
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
								<label for="exampleInputEmail1">Tipo de Usuario</label>
								<select name="segmento" class="form-control" required>
									<option value="">Seleccione</option>
									<option value="Esteticista">Esteticista</option>
									<option value="Terapeuta">Terapeuta</option>
									<option value="Médico">Médico</option>
									<option value="Comercializador Independiente">Comercializador Independiente</option>
									<option value="Otro">Otro</option>
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
							<div class="row">
								<div class="col-xs-6">
									<label class="mr-sm-2" for="inlineFormCustomSelect">¿Tienes un código de representante?</label>
								</div>
								<div class="col-xs-6">
									<div class="form-check">
								      <label class="form-check-label">
								      	<input type="radio" name="codigo_representante" value="1" class="form-check-input">							        
								        SI
								      </label>
								    </div>
								    <div class="form-check">
								      <label class="form-check-label">
								      	<input type="radio" name="codigo_representante" value="0" class="form-check-input" checked>							        
								        NO
								      </label>
								    </div>								  
								</div>
								<div class="col-xs-12">
									<div class="panel panel-default box-cod-rep" style="display:none;">
	  									<div class="panel-body">
											<input name="cod_representante" class="form-control form-control-lg" type="text" placeholder="CÓDIGO DE REPRESENTANTE">
										</div>
									</div>
								</div>
							</div>
							<div class="checkbox">
							    <label>
							      <input type="checkbox" name="boletines" value="1"> Deseo recibir boletines informativos
							    </label>
							</div>
							<div class="checkbox">
							    <label>
							      <input type="checkbox" name="condiciones" value="1" required="required"><a class="open-modal" idpage="22">Autorización datos personales</a>
							    </label>
							</div>
							<input type="hidden" name="crearUsuario" value="1">
							<button type="button" id="crearUsuarioNatural" class="btn btn-default btn-lg center-block">CREAR CUENTA</button>		
						</div>
					</form>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="profile">
			    	<form method="post" id="formUsuarioJuridico">
				    	<div class="col-xs-12 col-md-6">
				
							<h3>DATOS DE USUARIO</h3>							
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
								<div class="row">
									<div class="col-sm-4">
										<input type="text" name="dia_nacimiento" class="form-control"  placeholder="DD" style="text-align:center;" maxlength="2">
									</div>
									<div class="col-sm-4">
										<input type="text" name="mes_nacimiento" class="form-control"  placeholder="MM" style="text-align:center;" maxlength="2">
									</div>
									<div class="col-sm-4">
										<input type="text" name="ano_nacimiento" class="form-control"  placeholder="AAAA" style="text-align:center;" maxlength="4">
									</div>
								</div>
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
							<hr>
							<div class="form-group">
								<label for="exampleInputEmail1">Contraseña</label>
								<input type="password" name="password" class="form-control" id="password" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Repita Contraseña</label>
								<input type="password" name="password2" class="form-control" id="password2" required>
							</div>														
						</div>
						<div class="col-xs-12 col-md-6">
							<h3>DATOS DE LA ORGANIZACIÓN</h3>							
							<div class="form-group">
								<label for="exampleInputEmail1">Razon Social</label>
								<input type="text" name="razon_social" class="form-control" id="razon_social" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Nit</label>
								<input type="text" name="nit" class="form-control" id="nit" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Teléfono</label>
								<input type="text" name="telefono_organizacion" class="form-control" id="telefono_organizacion">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Ciudad</label>
								<select name="ciudad_organizacion" class="form-control" required>
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
								<label for="exampleInputEmail1">Dirección</label>
								<input type="text" name="direccion_organizacion" class="form-control" id="direccion_organizacion">
							</div>														
							<div class="form-group">
								<label for="exampleInputEmail1">Segmento</label>
								<select name="segmento" class="form-control" required>
									<option value="">Seleccione</option>					
									<option value="SPA">SPA</option>
									<option value="Centro Médico">Centro Médico</option>
									<option value="Institución Especializada">Institución Especializada</option>
									<option value="Distribuidor Especializado">Distribuidor Especializado</option>
									<option value="Tienda Especializada">Tienda Especializada</option>
									<option value="Otro">Otro</option>
								</select>
							</div>
							<hr>
							<div class="row">
								<div class="col-xs-6">
									<label class="mr-sm-2" for="inlineFormCustomSelect">¿Tienes un código de representante?</label>
								</div>
								<div class="col-xs-6">
									<div class="form-check">
								      <label class="form-check-label">
								      	<input type="radio" name="codigo_representante" value="1" class="form-check-input">							        
								        SI
								      </label>
								    </div>
								    <div class="form-check">
								      <label class="form-check-label">
								      	<input type="radio" name="codigo_representante" value="0" class="form-check-input" checked>							        
								        NO
								      </label>
								    </div>								  
								</div>
								<div class="col-xs-12">
									<div class="panel panel-default box-cod-rep" style="display:none;">
	  									<div class="panel-body">
											<input class="form-control form-control-lg" type="text" placeholder="CÓDIGO DE REPRESENTANTE">
										</div>
									</div>
								</div>
							</div>
							<div class="checkbox">
							    <label>
							      <input type="checkbox" name="boletines" value="1"> Deseo recibir boletines informativos
							    </label>
							</div>
							<div class="checkbox">
							    <label>
							      <input type="checkbox" name="condiciones" value="1" required="required"> Acepto los <a class="open-modal" idpage="22">Autorización de datos personales</a>
							    </label>
							</div>		
						</div>
						<input type="hidden" name="crearUsuarioOrganizacion" value="1">
						<button type="button" id="crearCuentaJuridica" class="btn btn-default btn-lg center-block">CREAR CUENTA</button>
			   		</form>
			    </div>
			  </div>
			</div>			
		</div>		
		</form>
		<br>
	</div>

	<!--<div class="col-xs-12 col-md-3">
		<?php
		foreach ($banners as $banner) {
		?>
			<a href="<?=$banner['link']?>"><img src="<?=$banner['imagen']?>" class="img-responsive"></a><br>
		<?php
		}
		?>
	</div>-->
</div>
<br><br>
<?php include "footer.php"; ?>