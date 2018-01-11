<?php include 'header.php'; ?>
<div class="divider"></div>
<div class="container">
	<div class="row">
		<div class="col s12 m6">			
			<form class="col s12" method="post">
				<h4 class="center-align orange-text text-darken-2">Actualiza tus Datos</h4>
		      <div class="row">
		      	<div class="input-field col s12">
		          <input type="text" class="validate" name="num_identificacion" value="<?=$usuario['num_identificacion']?>" required>
		          <label for="num_identificacion">Número de Documento</label>
		        </div>
		        <div class="input-field col s6">
		          <input id="first_name" type="text" name="nombre" class="validate" value="<?=$usuario['nombre']?>" required>
		          <label for="first_name">Nombre</label>
		        </div>
		        <div class="input-field col s6">
		          <input id="last_name" type="text" name="apellido" class="validate" value="<?=$usuario['apellido']?>" required>
		          <label for="last_name">Apellido</label>
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          <input id="email" type="email" name="email" class="validate" value="<?=$usuario['email']?>" required>
		          <label for="email">Email</label>
		        </div>
		      </div>
		      <div class="row">
		      	<div class="input-field col s12">
		          <input id="telefono" type="text" name="telefono" class="validate" value="<?=$usuario['telefono']?>">
		          <label for="telefono">Teléfono</label>
		        </div>		      	
		      </div>
		      <div class="row">
		      	<div class="input-field col s12">
		          <input id="telefono_m" type="text" name="telefono_m" class="validate" value="<?=$usuario['telefono_m']?>" required>
		          <label for="telefono_m">Móvil</label>
		        </div>		      	
		      </div>
		      <div class="row">
		      	<div class="input-field col s12">
		          <input id="direccion" type="text" name="direccion" class="validate" value="<?=$usuario['direccion']?>" required>
		          <label for="direccion">Dirección</label>
		        </div>		      	
		      </div>
		      <div class="row">
		      	<div class="input-field col s12">		          
		          <select class="" id="ciudad" name="ciudad" required>        
	                  <option>Seleccione</option>
	                  <?php 
	                  foreach ($ciudades as $key => $ciudad) {
	                    ?>
	                    <option value="<?=$ciudad["idciudad"]?>" <?php if ($usuario["ciudades_idciudad"] == $ciudad["idciudad"]) echo "selected"; ?>><?=$ciudad["ciudad"]?></option>
	                    <?php
	                  }
	                  ?>
	              </select>		          
		          <label for="last_name">Ciudad</label>
		        </div>		      	
		      </div>
		      <button class="btn orange darken-2" name="actualizarPerfil">ACTUALIZAR PERFIL</button>
		    </form>			
		</div>
		<div class="col s12 m6">
			<h4 class="center-align orange-text text-darken-2">Cambiar contraseña</h4>
			<form method="post">
				<div class="row">
					<div class="input-field col s12">
						<input name="contrasena_actual" id="password" type="password" class="validate" required>
						<label for="password">Contraseña Actual</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input name="nueva_contrasena" id="password2" type="password" class="validate" required>
						<label for="password2">Confirma tu nueva contraseña</label>
					</div>
				</div>
				<button class="btn orange darken-2" name="cambiarPassword">CAMBIAR CONTRASEÑA</button>
			</form>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>