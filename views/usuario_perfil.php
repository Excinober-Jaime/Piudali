<?php include "header.php"; ?>

<div class="container">
	<?php include "usuario/menu.php"; ?>		
	<div class="contenPanel">
	<div class="col-xs-12 titulo">
		<h1>Mi Perfil 
            <?php if (!empty($usuario["cod_lider"]) && $_SESSION['tipo'] == 'REPRESENTANTE COMERCIAL') { ?>
            <small class="pull-right">Código de representante: <?=$usuario["cod_lider"]?>
            <?php } ?>
            </small>
        </h1>
        <small>Aquí encontrarás tu información personal y podrás editarla, además de cambiar tu contraseña.</small>
	</div>
    <div class="clearfix"></div>
    <div class="informacion">
        <div class="col-xs-12 col-md-6">
            <h2>Información de la Cuenta</h2>
            <table class="table table-striped">
                <tbody>
                	<tr>
                    	<td scope="row">Nombre</td>
                        <td><?=$usuario["nombre"]?></td>
                    </tr>
                    <tr>
                    	<td scope="row">Apellido</td>
                        <td><?=$usuario["apellido"]?></td>
                    </tr>
                    <tr>
                    	<td scope="row">Número de Identificación</td>
                        <td><?=$usuario["num_identificacion"]?></td>
                    </tr>
                    <tr>
                    	<td scope="row">Sexo</td>
                        <td><?=$usuario["sexo"]?></td>
                    </tr>
                    <tr>
                    	<td scope="row">Fecha de Nacimiento</td>
                        <td><?=$usuario["Fecha de Nacimiento"]?></td>
                    </tr>
                    <tr>
                    	<td scope="row">Email</td>
                        <td><?=$usuario["email"]?></td>
                    </tr>
                    <tr>
                    	<td scope="row">Dirección</td>
                        <td><?=$usuario["direccion"]?></td>
                    </tr>
                    <tr>
                    	<td scope="row">Teléfono</td>
                        <td><?=$usuario["telefono"]?></td>
                    </tr>
                    <tr>
                    	<td scope="row">Teléfono Móvil</td>
                        <td><?=$usuario["telefono_m"]?></td>
                    </tr>
                    <tr>
                    	<td scope="row">Ciudad</td>
                        <td><?=$usuario["ciudad"]?></td>
                    </tr>
                </tbody>
            </table>
            <?php if ($organizacion) { ?>
                <h2>Información de la Organización</h2>
                <table class="table table-striped">
                <tbody>
                	<tr>
                    	<td scope="row">Razón Social</td>
                        <td><?=$organizacion["razon_social"]?></td>
                    </tr>
                    <tr>
                    	<td scope="row">Nit</td>
                        <td><?=$organizacion["nit"]?></td>
                    </tr>
                    <tr>
                    	<td scope="row">Teléfono</td>
                        <td><?=$organizacion["telefono"]?></td>
                    </tr>
                    <tr>
                    	<td scope="row">Dirección</td>
                        <td><?=$organizacion["direccion"]?></td>
                    </tr>
                    <tr>
                    	<td scope="row">Ciudad</td>
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
                    <a href="<?=URL_USUARIO."/".URL_USUARIO_CAMBIAR_DATOS?>" class="btn btn-default center-block">Cambiar Datos</a>
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
                        <h2>Información de Representante Comercial</h2>
                        <h3><?=$lider["nombre"]." ".$lider["apellido"]?></h3>
                        <p><strong>Teléfono(s):</strong></p>
           		  		<p><?=$lider["telefono"]." ".$lider["telefono_m"]?></p>
                        <p><strong>Email:</strong></p>
                  		<p><?=$lider["email"]?></p>
                        <!--<p><strong>Zona:</strong></p>
                        <p><?=$zona[0]["zona"]?></p>-->
                    <?php
                    }/*elseif ($zona) {
                    ?>
                    <h2>ZONA</h2>
                    <p><?=$zona["zona"]?></p>
                    <?php
                    }*/

                    if ($region) {
                    ?>
                     <h2>Información de Director Regional</h2>                    
                        <h3><?=$region[0]["nombre"]." ".$region[0]["apellido"]?></h3>
                        <p><strong>Región:</strong></p>
                        <p><?=$region[0]["region"]?></p>
                        <p><strong>Teléfono(s):</strong></p>
                        <p><?=$region[0]["telefono"]." ".$region[0]["telefono_m"]?></p>
                        <p><strong>Email:</strong></p>
                        <p><?=$region[0]["email"]?></p>                
                    <?php
                    }
                    ?>			
                </div>
                <div class="clearfix"></div>
            </div>
            <hr>
            <h2>Cuenta Bancaria</h2>
            <?php 
            if (!empty($cuenta_bancaria)) {
            ?>
                 <table class="table table-striped" id="datos-cuenta-bancaria">
                    <tbody>
                        <tr>
                            <td scope="row">ENTIDAD</td>
                            <td><?=$cuenta_bancaria["entidad"]?></td>
                        </tr>
                        <tr>
                            <td scope="row">TIPO</td>
                            <td><?=$cuenta_bancaria["tipo"]?></td>
                        </tr>
                        <tr>
                            <td scope="row">NÚMERO</td>
                            <td><?=$cuenta_bancaria["numero"]?></td>
                        </tr>
                        <tr>
                            <td scope="row">TITULAR</td>
                            <td><?=$cuenta_bancaria["titular"]?></td>
                        </tr>
                        <tr>
                            <td scope="row">NÚMERO DE IDENTIFICACIÓN DEL TITULAR</td>
                            <td><?=$cuenta_bancaria["num_identificacion"]?></td>
                        </tr>
                    </tbody>
                </table>
                <a class="btn btn-default btn-sm" id="actualizar-cuenta">Actualizar Cuenta</a>
            <?php
            }
            ?>
            <div class="box-destacar" <?php if (!empty($cuenta_bancaria)) { echo 'style="display:none"'; } ?> id="container-form-cuenta-bancaria">
                
                <?php if (empty($cuenta_bancaria)) { ?>
                <p>Aún no ha registrado una cuenta.</p>
                <a class="btn btn-default btn-sm" id="open-form-cuenta-bancaria">Agregar Cuenta Bancaria</a>
                <hr>
                <?php } ?>
                <form method="post" enctype="multipart/form-data" id="form-cuenta-bancaria" <?php if (empty($cuenta_bancaria)) { echo 'style="display: none;'; } ?>">
                    <div class="form-group">
                        <label for="Entidad">ENTIDAD</label>
                        <select name="entidad" required="required" class="form-control">
                            <option value="">--Seleccione--</option>
                            <option value="BANCO DE LA REPÚBLICA" <?php if ($cuenta_bancaria['entidad']=='BANCO DE LA REPÚBLICA') echo 'selected'; ?>>BANCO DE LA REPÚBLICA</option>
                            <option value="BANCO DE BOGOTÁ" <?php if ($cuenta_bancaria['entidad']=='BANCO DE BOGOTÁ') echo 'selected'; ?>>BANCO DE BOGOTÁ</option>
                            <option value="BANCO POPULAR" <?php if ($cuenta_bancaria['entidad']=='BANCO POPULAR') echo 'selected'; ?>>BANCO POPULAR</option>
                            <option value="BANCO CORPBANCA COLOMBIA S.A." <?php if ($cuenta_bancaria['entidad']=='BANCO CORPBANCA COLOMBIA S.A.') echo 'selected'; ?>>BANCO CORPBANCA COLOMBIA S.A.</option>
                            <option value="BANCOLOMBIA S.A." <?php if ($cuenta_bancaria['entidad']=='BANCOLOMBIA S.A.') echo 'selected'; ?>>BANCOLOMBIA S.A.</option>
                            <option value="CITIBANK COLOMBIA" <?php if ($cuenta_bancaria['entidad']=='CITIBANK COLOMBIA') echo 'selected'; ?>>CITIBANK COLOMBIA</option>
                            <option value="BANCO GNB COLOMBIA S.A." <?php if ($cuenta_bancaria['entidad']=='BANCO GNB COLOMBIA S.A.') echo 'selected'; ?>>BANCO GNB COLOMBIA S.A.</option>
                            <option value="BANCO GNB SUDAMERIS COLOMBIA" <?php if ($cuenta_bancaria['entidad']=='BANCO GNB SUDAMERIS COLOMBIA') echo 'selected'; ?>>BANCO GNB SUDAMERIS COLOMBIA</option>
                            <option value="BBVA COLOMBIA" <?php if ($cuenta_bancaria['entidad']=='BBVA COLOMBIA') echo 'selected'; ?>>BBVA COLOMBIA</option>
                            <option value="HELM BANK" <?php if ($cuenta_bancaria['entidad']=='HELM BANK') echo 'selected'; ?>>HELM BANK</option>
                            <option value="RED MULTIBANCA COLPATRIA S.A." <?php if ($cuenta_bancaria['entidad']=='RED MULTIBANCA COLPATRIA S.A.') echo 'selected'; ?>>RED MULTIBANCA COLPATRIA S.A.</option>
                            <option value="BANCO DE OCCIDENTE" <?php if ($cuenta_bancaria['entidad']=='BANCO DE OCCIDENTE') echo 'selected'; ?>>BANCO DE OCCIDENTE</option>
                            <option value="BANCOLDEX" <?php if ($cuenta_bancaria['entidad']=='BANCOLDEX') echo 'selected'; ?>>BANCOLDEX</option>
                            <option value="BANCO CAJA SOCIAL - BCSC S.A." <?php if ($cuenta_bancaria['entidad']=='BANCO CAJA SOCIAL - BCSC S.A.') echo 'selected'; ?>>BANCO CAJA SOCIAL - BCSC S.A.</option>
                            <option value="BANCO AGRARIO DE COLOMBIA S.A." <?php if ($cuenta_bancaria['entidad']=='BANCO AGRARIO DE COLOMBIA S.A.') echo 'selected'; ?>>BANCO AGRARIO DE COLOMBIA S.A.</option>
                            <option value="BANCO DAVIVIENDA S.A." <?php if ($cuenta_bancaria['entidad']=='BANCO DAVIVIENDA S.A.') echo 'selected'; ?>>BANCO DAVIVIENDA S.A.</option>
                            <option value="BANCO AV VILLAS" <?php if ($cuenta_bancaria['entidad']=='BANCO AV VILLAS') echo 'selected'; ?>>BANCO AV VILLAS</option>
                            <option value="BANCO WWB S.A." <?php if ($cuenta_bancaria['entidad']=='BANCO WWB S.A.') echo 'selected'; ?>>BANCO WWB S.A.</option>
                            <option value="BANCO PROCREDIT" <?php if ($cuenta_bancaria['entidad']=='BANCO PROCREDIT') echo 'selected'; ?>>BANCO PROCREDIT</option>
                            <option value="BANCAMIA" <?php if ($cuenta_bancaria['entidad']=='BANCAMIA') echo 'selected'; ?>>BANCAMIA</option>
                            <option value="BANCO PICHINCHA S.A." <?php if ($cuenta_bancaria['entidad']=='BANCO PICHINCHA S.A.') echo 'selected'; ?>>BANCO PICHINCHA S.A.</option>
                            <option value="BANCOOMEVA" <?php if ($cuenta_bancaria['entidad']=='BANCOOMEVA') echo 'selected'; ?>>BANCOOMEVA</option>
                            <option value="BANCO FALABELLA S.A." <?php if ($cuenta_bancaria['entidad']=='BANCO FALABELLA S.A.') echo 'selected'; ?>>BANCO FALABELLA S.A.</option>
                            <option value="BANCO FINANDINA S.A." <?php if ($cuenta_bancaria['entidad']=='BANCO FINANDINA S.A.') echo 'selected'; ?>>BANCO FINANDINA S.A.</option>
                            <option value="BANCO SANTANDER DE NEGOCIOS COLOMBIA S.A." <?php if ($cuenta_bancaria['entidad']=='BANCO SANTANDER DE NEGOCIOS COLOMBIA S.A.') echo 'selected'; ?>>BANCO SANTANDER DE NEGOCIOS COLOMBIA S.A.</option>
                            <option value="BANCO COOPERATIVO COOPCENTRAL" <?php if ($cuenta_bancaria['entidad']=='BANCO COOPERATIVO COOPCENTRAL') echo 'selected'; ?>>BANCO COOPERATIVO COOPCENTRAL</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Tipo">TIPO</label>                         
                        <select name="tipo" required="required" class="form-control">
                            <option value="">--Seleccione--</option>
                            <option value="AHORROS" <?php if ($cuenta_bancaria['tipo']=='AHORROS') echo 'selected'; ?>>AHORROS</option>
                            <option value="CORRIENTE" <?php if ($cuenta_bancaria['tipo']=='CORRIENTE') echo 'selected'; ?>>CORRIENTE</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Entidad">NÚMERO</label>
                        <input type="number" name="numero" class="form-control" id="" value="<?=$cuenta_bancaria['numero']?>" required="required">
                    </div>
                    <div class="form-group">
                        <label for="Titular">NOMBRE Y APELLIDO DEL TITULAR</label>
                        <input type="text" name="titular" class="form-control" id="" value="<?=$cuenta_bancaria['titular']?>" required="required">
                    </div>
                    <div class="form-group">
                        <label for="Número de Identificación">NÚMERO DE IDENTIFICACIÓN DEL TITULAR</label>
                        <input type="text" name="num_identificacion" class="form-control" id="" value="<?=$cuenta_bancaria['num_identificacion']?>" required="required">
                    </div>
                    <?php if (empty($cuenta_bancaria)) { ?>
                        <button type="submit" name="crearCuentaBancaria" class="btn btn-default">CREAR CUENTA</button>
                    <?php }else{ ?>
                        <input type="hidden" name="idcuenta" value="<?=$cuenta_bancaria['idcuenta']?>">
                        <button type="submit" name="actualizarCuentaBancaria" class="btn btn-default">ACTUALIZAR CUENTA</button>
                    <?php } ?>

                </form>
            </div>         
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>
<br>
<br>
<?php include "footer.php"; ?>
