<?php include "header.php"; ?>

<div class="container">
	<?php include "usuario/menu.php"; ?>		
	<div class="contenPanel">
	<div class="col-xs-12 titulo">
		<h1>Mi Perfil</h1>
        <small>Aquí encontrarás tu información personal y podrás editarla, además de cambiar tu contraseña.</small>
	</div>
    <div class="clearfix"></div>
    <div class="informacion">
        <div class="col-xs-12 col-md-6">
            <h2>Información de la Cuenta</h2>
            <table class="table table-striped">
                <tbody>
                	<tr>
                    	<th scope="row">Nombre</th>
                        <td><?=$usuario["nombre"]?></td>
                    </tr>
                    <tr>
                    	<th scope="row">Apellido</th>
                        <td><?=$usuario["apellido"]?></td>
                    </tr>
                    <tr>
                    	<th scope="row">Número de Identificación</th>
                        <td><?=$usuario["num_identificacion"]?></td>
                    </tr>
                    <tr>
                    	<th scope="row">Sexo</th>
                        <td><?=$usuario["sexo"]?></td>
                    </tr>
                    <tr>
                    	<th scope="row">Fecha de Nacimiento</th>
                        <td><?=$usuario["Fecha de Nacimiento"]?></td>
                    </tr>
                    <tr>
                    	<th scope="row">Email</th>
                        <td><?=$usuario["email"]?></td>
                    </tr>
                    <tr>
                    	<th scope="row">Dirección</th>
                        <td><?=$usuario["direccion"]?></td>
                    </tr>
                    <tr>
                    	<th scope="row">Teléfono</th>
                        <td><?=$usuario["telefono"]?></td>
                    </tr>
                    <tr>
                    	<th scope="row">Teléfono Móvil</th>
                        <td><?=$usuario["telefono_m"]?></td>
                    </tr>
                    <tr>
                    	<th scope="row">Ciudad</th>
                        <td><?=$usuario["ciudad"]?></td>
                    </tr>
                </tbody>
            </table>
            <?php /*?><div class="row">
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
            </div><?php */?>
            <?php if ($organizacion) { ?>
                <h2>Información de la Organización</h2>
                <table class="table table-striped">
                <tbody>
                	<tr>
                    	<th scope="row">Razón Social</th>
                        <td><?=$organizacion["razon_social"]?></td>
                    </tr>
                    <tr>
                    	<th scope="row">Nit</th>
                        <td><?=$organizacion["nit"]?></td>
                    </tr>
                    <tr>
                    	<th scope="row">Teléfono</th>
                        <td><?=$organizacion["telefono"]?></td>
                    </tr>
                    <tr>
                    	<th scope="row">Dirección</th>
                        <td><?=$organizacion["direccion"]?></td>
                    </tr>
                    <tr>
                    	<th scope="row">>Ciudad</th>
                        <td><?=$organizacion["ciudad"]?></td>
                    </tr>
                </tbody>
            </table>
                
                <?php /*?><div class="row">
                    <div class="col-xs-6">Razón Social</div><div class="col-xs-6"><?=$organizacion["razon_social"]?></div>
                    <div class="col-xs-6">Nit</div><div class="col-xs-6"><?=$organizacion["nit"]?></div>				
                    <div class="col-xs-6">Teléfono</div><div class="col-xs-6"><?=$organizacion["telefono"]?></div>
                    <div class="col-xs-6">Dirección</div><div class="col-xs-6"><?=$organizacion["direccion"]?></div>
                    <div class="col-xs-6">Ciudad</div><div class="col-xs-6"><?=$organizacion["ciudad"]?></div>
                </div><?php */?>
            <?php }	?>		
            <div class="row">
                <div class="col-xs-12">
                    <a href="<?=URL_USUARIO."/".URL_USUARIO_CAMBIAR_DATOS?>" class="btn btn-primary">Cambiar Datos</a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
        <div class="box-destacar">
            <div class="col-xs-12 col-md-4">
                
                    <center>
                        <?php 
                        if (!empty($usuario["foto"])) {
                        ?>
                            <img src="<?=$usuario["foto"]?>" class="img-responsive img-thumbnail">
                        <?php	
                        }else{
                        ?>
                            <span style="font-size:100px;"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <?php
                        }
                        ?>			
                    </center>
                
                
            </div>
            <div class="col-xs-12 col-md-8">
                <?php
                if ($lider) {
                ?>
                    <h2>Información de Líder</h2>
                    <h3><?=$lider["nombre"]." ".$lider["apellido"]?></h3>
                    <p><strong>Teléfono(s):</strong></p>
       		  		<p><?=$lider["telefono"]." ".$lider["telefono_m"]?></p>
                    <p><strong>Email:</strong></p>
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
            <div class="clearfix"></div>
            </div>
             
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>
<br>
<br>
<?php include "footer.php"; ?>
