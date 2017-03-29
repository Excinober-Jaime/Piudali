<?php include "header.php"; ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">			
			<div class="col-xs-12 col-md-6">
				<h2>INFORMACIÓN</h2>
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="exampleInputEmail1">Nombre</label>
						<input type="text" class="form-control" name="nombre" id="nombre" value="<?=$usuario['nombre']?>" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Apellido</label>
						<input type="text" class="form-control" name="apellido" id="apellido" value="<?=$usuario['apellido']?>" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Sexo</label>
						<select name="sexo" id="sexo" class="form-control" required>
							<option value="MASCULINO" <?php if ($usuario['sexo']=='MASCULINO') echo 'selected'; ?>>MASCULINO</option>
							<option value="FEMENINO" <?php if ($usuario['sexo']=='FEMENINO') echo 'selected'; ?>>FEMENINO</option>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Fecha de Nacimiento</label>
						<input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="<?=$usuario['fecha_nacimiento']?>">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<input type="email" class="form-control" name="email" id="email" value="<?=$usuario['email']?>" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Número de documento</label>
						<input type="text" class="form-control" name="num_identificacion" id="num_identificacion" value="<?=$usuario['num_identificacion']?>" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Dirección</label>
						<input type="text" class="form-control" name="direccion" id="direccion" value="<?=$usuario['direccion']?>" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Teléfono</label>
						<input type="text" class="form-control" name="telefono" id="telefono" value="<?=$usuario['telefono']?>">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Móvil</label>
						<input type="text" class="form-control" name="telefono_m" id="telefono_m" value="<?=$usuario['telefono_m']?>">
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
					<div class="form-group">
						<label for="exampleInputEmail1">Segmento</label>
						<select name="segmento" class="form-control" required>
							<option value="">Seleccione</option>
							<option value="Profesional de Belleza" <?php if ($usuario['segmento']=='Profesional de Belleza') echo 'selected'; ?>>Profesional de Belleza</option>
							<option value="SPA" <?php if ($usuario['segmento']=='SPA') echo 'selected'; ?>>SPA</option>
							<option value="Médico" <?php if ($usuario['segmento']=='Médico') echo 'selected'; ?>>Médico</option>
							<option value="Dermatólogo" <?php if ($usuario['segmento']=='Dermatólogo') echo 'selected'; ?>>Dermatólogo</option>
							<option value="Terapéuta" <?php if ($usuario['segmento']=='Terapéuta') echo 'selected'; ?>>Terapéuta</option>
							<option value="Comercializador" <?php if ($usuario['segmento']=='Comercializador') echo 'selected'; ?>>Comercializador</option>
							<option value="Otro" <?php if ($usuario['segmento']=='Otro') echo 'selected'; ?>>Otro</option>
						</select>
					</div>							
					<div class="form-group">
						<label for="exampleInputEmail1">Tipo</label>
						<select name="tipo" id="tipo" class="form-control" required>
							<option value="DISTRIBUIDOR DIRECTO" <?php if ($usuario['tipo']=='DISTRIBUIDOR DIRECTO') echo 'selected'; ?>>DISTRIBUIDOR DIRECTO</option>
							<option value="REPRESENTANTE COMERCIAL" <?php if ($usuario['tipo']=='REPRESENTANTE COMERCIAL') echo 'selected'; ?>>REPRESENTANTE COMERCIAL</option>
							<option value="DIRECTOR" <?php if ($usuario['tipo']=='DIRECTOR') echo 'selected'; ?>>DIRECTOR</option>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Código de Representante</label>
						<input type="text" class="form-control" name="cod_lider" id="cod_lider" value="<?=$usuario['cod_lider']?>" <?php if ($usuario['tipo']!='REPRESENTANTE COMERCIAL') { echo 'style="display:none;"'; } ?>>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Representante Comercial</label>
						<select name="lider" id="lider" class="form-control" <?php if ($usuario['tipo']!='DISTRIBUIDOR DIRECTO') { echo 'style="display:none;"'; } ?>>
							<option value="">Seleccione</option>
							<?php
							foreach ($lideres as $key => $lider) {
							?>
								<option value="<?=$lider["idusuario"]?>" <?php if ($usuario['lider']==$lider["idusuario"]) { echo "selected"; } ?>><?=$lider["nombre"]." ".$lider["apellido"]?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Estado</label>
						<select name="estado" id="estado" class="form-control" required>
							<option value="1" <?php if ($usuario['estado']) echo 'selected'; ?>>Activo</option>
							<option value="0" <?php if (!$usuario['estado']) echo 'selected'; ?>>Inactivo</option>
						</select>
					</div>
					<?php
					if (isset($idusuario) && $idusuario!='') {
					?>
						<button type="submit" name="actualizarUsuario" class="btn btn-lg btn-primary center-block">ACTUALIZAR</button>
					<?php
					}else{
					?>
						<button type="submit" name="crearUsuario" class="btn btn-lg btn-primary center-block">GUARDAR</button>
					<?php
					}
					?>
					
				</form>
			</div>
			<div class="col-xs-12 col-md-6">
			<?php if (isset($idusuario) && $idusuario!='') { ?>
				<h2>DOCUMENTOS</h2>
				<?php if ($documentos) { ?>
				<ul class="list-group">								
					<?php foreach ($documentos as $key => $documento) {
					?>
						<li class="list-group-item"><a href="<?="include/descargar.php?url=".$documento["url"]?>"><span class="glyphicon glyphicon-save-file" aria-hidden="true"></span> <?=$documento["nombre"]?></a></li>
					<?php } ?>	  
				</ul>
				<?php }else{ ?>	
				<p>El usuario no tiene documentos relacionados.</p>
				<?php }	?>				
				<hr>
				<h2>ACCIONES</h2>
				<hr>
				<form method="post" action="<?=URL_INGRESO_REMOTO?>">
					<input type="hidden" value="<?=$usuario["email"]?>" name="email">
					<input type="hidden" value="<?=$usuario["password"]?>" name="password">

					<button type="submit" name="ingresoRemoto" class="btn btn-primary" title="Ingresa como <?=$usuario["nombre"]." ".$usuario["apellido"]?>">Ingresar a Cuenta <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></button>
				</form>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>