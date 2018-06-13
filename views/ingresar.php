<?php include "header.php"; ?>

<div class="container">			
	<h1 class="text-center">Iniciar Sesión</h1>
	<center>
	<div class="col-md-3 hidden-xs">	</div>
	<div class="col-xs-12 col-md-6 center-block">
		<div class="panel panel-default">
			<div class="panel-body">
			<form method="post" id="form-login">
			  <div class="form-group">
			    <label for="Email">Email</label>
			    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
			  </div>
			  <div class="form-group">
			    <label for="Password">Password</label>
			    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>			    
			  </div>
			  <!--<button type="submit" name="ingresar" class="btn btn-default btn-lg">ENTRAR</button>-->
			  <input type="hidden" name="ingresar" value="1">
			  <input type="hidden" name="return" value="<?=$_GET['return']?>">
			  <button type="button" name="ingresarUsuario" id="ingresarUsuario" class="btn btn-default btn-lg">ENTRAR</button>
			  <a class="help-block" href="<?=URL_RESTAURAR_CONTRASENA?>">¿Olvidaste tu contraseña?</a>
			</form>
			</div>
		</div>
	</div>
	</center>
</div>

<?php include "footer.php"; ?>