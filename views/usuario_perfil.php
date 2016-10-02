<?php include "header.php"; ?>

<div class="container">
	<?php include "usuario/menu.php"; ?>		
	
	<div class="col-xs-12">
		<h1>Mi Perfil <small><small>Aquí encontrarás tu información personal y podrás editarla, además de cambiar tu contraseña.</small></small></h1><hr>
	</div>
	<div class="col-xs-12 col-md-6">
		<h2>Información de la Cuenta</h2>
		<div class="row">
			<div class="col-xs-6">Nombre</div><div class="col-xs-6"><?=$usuario["nombre"]?></div>
			<div class="col-xs-6">Apellido</div><div class="col-xs-6"><?=$usuario["apellido"]?></div>
			<div class="col-xs-6">Número de Identificacion</div><div class="col-xs-6"><?=$usuario["num_identificacion"]?></div>
			<div class="col-xs-6">Sexo</div><div class="col-xs-6"><?=$usuario["sexo"]?></div>
			<div class="col-xs-6">Fecha de Nacimiento</div><div class="col-xs-6"><?=$usuario["fecha_nacimiento"]?></div>
			<div class="col-xs-6">Email</div><div class="col-xs-6"><?=$usuario["email"]?></div>
			<div class="col-xs-6">Dirección</div><div class="col-xs-6"><?=$usuario["direccion"]?></div>
			<div class="col-xs-6">Teléfono</div><div class="col-xs-6"><?=$usuario["telefono"]?></div>
			<div class="col-xs-6">Teléfono Móvil</div><div class="col-xs-6"><?=$usuario["telefono_m"]?></div>
			<div class="col-xs-6">Ciudad</div><div class="col-xs-6"><?=$usuario["ciudad"]?></div>		
		</div>
		<h2>Información de la Organización</h2>
		<div class="row">
			<div class="col-xs-6">Razón Social</div><div class="col-xs-6"><?=$organizacion["razon_social"]?></div>
			<div class="col-xs-6">Nit</div><div class="col-xs-6"><?=$organizacion["nit"]?></div>
			<div class="col-xs-6">Dirección</div><div class="col-xs-6"><?=$organizacion["direccion"]?></div>
			<div class="col-xs-6">Teléfono</div><div class="col-xs-6"><?=$organizacion["telefono"]?></div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<a href="<?=URL_USUARIO."/".URL_USUARIO_CAMBIAR_DATOS?>" class="btn btn-default">Cambiar Datos</a>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-3">
		<center>
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
		</center>
	</div>
	<div class="col-xs-12 col-md-3">
		<?php
		if ($lider) {
		?>
			<h4>Información de Líder</h4>
			<p><?=$lider["nombre"]." ".$lider["apellido"]?></p>
			<p><?=$lider["telefono"]." ".$lider["telefono_m"]?></p>
			<p><?=$lider["email"]?></p>
		<?php
		}elseif ($zona) {
		?>
		<h2>ZONA</h2>
		<p><?=$zona["zona"]?></p>
		<?php
		}
		?>			
	</div>
</div>
<br>
<br>
<?php include "footer.php"; ?>
