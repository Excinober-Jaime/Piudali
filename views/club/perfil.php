<?php include 'header.php'; ?>
<div class="divider"></div>
<div class="container">
	<div class="row">
		<div class="col s12 m6">			
			<form class="col s12" method="post">
				<h4 class="center-align orange-text text-darken-2">Actualiza tus Datos</h4>
		      <div class="row">
		      	<div class="input-field col s12">
		          <input type="text" class="validate" value="<?=$usuario['num_identificacion']?>" disabled>
		          <label for="first_name">Número de Documento</label>
		        </div>
		        <div class="input-field col s6">
		          <input id="first_name" type="text" class="validate" value="<?=$usuario['nombre']?>">
		          <label for="first_name">Nombre</label>
		        </div>
		        <div class="input-field col s6">
		          <input id="last_name" type="text" class="validate" value="<?=$usuario['apellido']?>">
		          <label for="last_name">Apellido</label>
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          <input id="email" type="email" class="validate" value="<?=$usuario['email']?>">
		          <label for="email">Email</label>
		        </div>
		      </div>
		      <div class="row">
		      	<div class="input-field col s12">
		          <input id="last_name" type="text" class="validate" value="<?=$usuario['telefono']?>">
		          <label for="last_name">Teléfono</label>
		        </div>		      	
		      </div>
		      <div class="row">
		      	<div class="input-field col s12">
		          <input id="last_name" type="text" class="validate" value="<?=$usuario['telefono_m']?>">
		          <label for="last_name">Móvil</label>
		        </div>		      	
		      </div>
		      <div class="row">
		      	<div class="input-field col s12">
		          <input id="last_name" type="text" class="validate" value="<?=$usuario['direccion']?>">
		          <label for="last_name">Dirección</label>
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
		      <button class="btn orange darken-2">ACTUALIZAR PERFIL</button>
		    </form>			
		</div>
		<div class="col s12 m6">
			<h4 class="center-align orange-text text-darken-2">Cambiar contraseña</h4>
			<form method="post">
				<div class="row">
					<div class="input-field col s12">
						<input name="password" id="password" type="password" class="validate">
						<label for="password">Nueva Contraseña</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input name="password2" id="password2" type="password" class="validate">
						<label for="password2">Confirma tu nueva contraseña</label>
					</div>
				</div>
				<button class="btn orange darken-2" name="cambiarPassword">CAMBIAR CONTRASEÑA</button>
			</form>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>