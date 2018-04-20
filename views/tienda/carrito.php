<?php include 'header.php'; ?>
<div class="divider"></div>
<div class="container">
	<div class="padding-full">
	<div class="row">
		<table class="">
			<thead>
				<tr>
					<th class="center-align">DESCRIPCIÓN</th>
					<th>PRECIO</th>
					<th width="50px">CANTIDAD</th>
					<th class="right-align">SUBTOTAL</th>
				</tr>
			</thead>
			<tbody>
				<?php
					
					if (isset($itemsCarrito) && count($itemsCarrito)>0) {
					
						foreach ($itemsCarrito as $key => $item) {

				?>
				<tr>
					<td>
						<div class="col s1">
							<a class="eliminarPdtCarrito" idpdt="<?=$item['id']?>"><i class="fa fa-times" aria-hidden="true"></i></a>
						</div>
						<div class="col s3">
							<img src="<?=$item["img_principal"]?>" class="" style="max-width:130px;">
						</div>
						<div class="col s8">
							<span class="left">
								<?=$item["nombre"]?><br>Código: <?=$item["codigo"]?><br>Iva: <?=$item["iva"]?>%
							</span>
						</div>
					</td>
					<td>
						<?=convertir_pesos($item["precio"])?>
					</td>
					<td>
						<select name="cantidad" id="cantidad" class="cambiarCantidad browser-default" idpdt="<?=$item['id']?>">
							<?php 
							for ($i=1; $i <= $item["cantidadstock"]; $i++) {
								?>
								<option value="<?=$i?>" <?php if ($item["cantidad"]==$i) { echo "selected"; } ?>><?=$i?></option>
								<?php
							}
							?>
						</select>
					</td>
					<td class="right-align">
						<?=convertir_pesos($item["subtotal"])?>
					</td>
				</tr>
				<?php
					}
				}else{
				?>
					<tr>
						<td colspan="4">No tienes productos en el carrito!</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
	</div>
	<?php 
	if ($subtotalAntesIva <= 200000) {
	?>

	
	<?php
	}
	?>
	<div class="divider"></div><br>
	<div class="row">
		<div class="col s12 m7">     

		<?php if (!empty($this->alerta)) { ?>
			<div class="card-panel teal">
	          <span class="white-text"><?=$this->alerta?></span>
	        </div>
		<?php } ?>

		<?php  if (isset($_SESSION["idusuario"])) { ?>
			<div>
				<h4 style="color: #6d1e3f; font-size: 1.9em">DIRECCIÓN DE ENVÍO</h4>			
	          	<span class="black-text">				 	
			 		Dirección: <?=$_SESSION["direccion"]?><br>
			 		Ciudad: <?=$_SESSION["ciudad"]?><br>
			 		Teléfono: <?=$_SESSION["telefono"]?><br>
			 		Teléfono Móvil: <?=$_SESSION["telefono_m"]?><br><br>
				 	
			 		<a href="<?=URL_TIENDA."/".URL_TIENDA_PERFIL?>?return=<?=URL_SITIO.URL_TIENDA.'/'.URL_TIENDA_CARRITO?>" class="btn green">Cambiar Datos</a>
			 		
	          	</span>
	        </div>
	    <?php } else { ?>
	    	<center>Para continuar con tu compra, <a class="open-iniciar" return="<?=URL_SITIO.URL_CLUB.'/'.URL_CLUB_CARRITO?>" style="cursor: pointer;">Iniciar sesión</a> o ingresa tus datos.</center>
	    	<div class="row">
		        <form class="" method="post">
            <div class="container">
              <div class="row">
              <div class="input-field col s12 m6">
                <input id="num_identificacion" name="num_identificacion" type="text" class="validate" required="required">
                <label for="num_identificacion">Número de identificación</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="nombre" name="nombre" type="text" class="validate" required="required">
                <label for="nombre">Nombre</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="apellido" name="apellido" type="text" class="validate" required="required">
                <label for="apellido">Apellido</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="email" name="email" type="email" class="validate" required="required">
                <label for="email">Email</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="telefono_m" name="telefono_m" type="text" class="validate" required="required">
                <label for="apellido">Celular</label>
              </div>
              <div class="input-field col s12 m6">
                <input id="direccion" name="direccion" type="text" class="validate" required="required">
                <label for="apellido">Dirección</label>
              </div>
              <div class="input-field col s12 m6">
                <select class="" id="ciudad" name="ciudad" required="required">        
                  <option value="">Seleccione</option>
                  <?php 
                  foreach ($ciudades as $key => $ciudad) {
                    ?>
                    <option value="<?=$ciudad["idciudad"]?>"><?=$ciudad["ciudad"]?></option>
                    <?php
                  }
                  ?>
                </select>
                <label for="ciudad">Ciudad</label>
              </div>
              <!--<div class="input-field col s12 m6">
                <input id="telefono" name="telefono" type="text" class="validate" required="required">
                <label for="telefono">Teléfono</label>
              </div>-->
              <div class="input-field col s12 m6">
                <input id="password" name="password" type="password" class="validate" required="required">
                <label for="password">Contraseña</label>
              </div>
              <div class="col s12">
                <button type="submit" name="registrarUsuario" class="waves-effect waves-light green darken-1 btn-large">CONTINUAR</button><br><br>
                <a class="closeRegistroOpenLog" style="cursor: pointer;">¿Ya tienes una cuenta?</a>
              </div>
              </div>
            </div>
          </form>
		      </div>
		<!--
	    	<h5>Por favor ingresa o registrate para cargar tu dirección</h5>
	    	<a class="open-iniciar btn orange" return="<?=URL_SITIO.URL_CLUB.'/'.URL_CLUB_CARRITO?>">Iniciar sesión</a>
	    	<a class="open-registro btn green">Regístrarse</a>-->
	 
	    <?php } ?>
		</div>
		<div class="col s12 m5" style="background-color: #f2f2f2; border-radius: 10px;padding: 1rem;">
			<div class="row">
				<div class="col s6 m8 right-align">Subtotal antes de IVA</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($subtotalAntesIva)?></div>
			<!--
				<div class="col s12 right-align">

					<div class="card-panel green lighten-5">
						<button type="submit" name="redimirCodigo" class="btn green darken-1" onclick="$('#campo_cupon').toggle();"><i class="material-icons left">add</i>Cupón de Descuento</button>
						<div id="campo_cupon" style="display:none;padding:10px 0px;">
				 			<form method="post">
				 				<div class="input-field">
						          <input type="text" name="cupon_descuento" id="cupon_descuento" class="validate" required>
						          <label for="cupon">Ingresa el Cupón</label>
						        </div>				 			
					 			<button type="submit" name="redimirCupon" class="btn orange">Usar Cupón</button>
					 		</form>
				 		</div>
				 	</div>
				</div>				
			-->
				<div class="col s6 m8 right-align">Descuento Cupón</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($descuentoCupon)?></div>
			
			
				<div class="col s6 m8 right-align">Subtotal Neto Antes de Iva</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($subtotalNetoAntesIva)?></div>
			
				<div class="col s6 m8 right-align">IVA</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($iva)?></div>

				<div class="col s6 m8 right-align">Costo de Envío</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($flete)?></div>
			
				<div class="col s6 m8 right-align"><b>TOTAL A PAGAR</b></div>
				<div class="col s6 m4 right-align"><b><?=convertir_pesos($total)?></b></div>
			</div>
			<div class="divider"></div>
			<div class="row" style="margin-top: 1rem;">
				<div class="col s7 right-align">
					<a href="<?=URL_TIENDA.'/'.URL_TIENDA_PRODUCTOS?>" class="btn-large orange">AGREGAR OTRO PRODUCTO</a>
				</div>
				<div class="col s5 right-align ">
					
					<?php if (isset($_SESSION["idusuario"]) && !empty($_SESSION["idusuario"]) && $_SESSION["tipo"]== 'CONSUMIDOR')  { ?>
					
					<?php if ($total>0) { ?>

							<a href="<?=URL_TIENDA.'/'.URL_TIENDA_RESUMEN_COMPRA?>" class="btn-large green">ORDENAR YA!</a>

						<?php } else { ?>
							
					
						<?php }  ?>

					<?php } else { ?>

						<a class="btn-large open-iniciar green" return="<?=URL_SITIO.URL_CLUB.'/'.URL_CLUB_CARRITO?>">ORDENAR YA!</a>
						
					<?php }  ?>
				</div>
			</div>
		</div>
	</div>
	<div class="divider"></div>
    <div class="row valign-wrapper">
    	
    	<div class="col s12 m7">
    		<h3 class="center-align" style="margin-bottom: 0; font-size: 1.9em; color: #009330">MÁS PRODUCTOS DE LA LÍNEA <?=strtoupper($producto_1[0]['categoria'])?>
    		</h3>
				<p class="center-align">Agrega el producto que más se adapte a tu necesidad.</p>
				
			<div class="carousel center-align">

				<?php 
				foreach ($productos as $key => $pdt) {

					$nombre_es = explode('-', $pdt['nombre']);
					$nombre_es = $nombre_es[1];
				?>
					<a class="carousel-item" href="<?=URL_SITIO.URL_TIENDA.'/'.URL_TIENDA_PRODUCTO.'/'.$pdt['url']?>">
						<img src="assets/tienda/img/<?=$this->img_pdt_png($pdt['codigo'])?>" style='max-height: 200px;width: auto;'>
						<h6 class="center-align" style="color: #000;"><?=$nombre_es?></h6>
						<span style="color: #6D1E3F;">VER</span>
					</a>
				<?php
				}
				?>
			</div>
		</div>
		<div class="col s12 m5"> 
    		<p class="flow-text center-align">
		      	<?php 
		      	/*switch ($subtotalAntesIva) {

		      		case $subtotalAntesIva <= 100000:

		      			echo $_SESSION['nombre'].', si tu compra es igual o mayor a $100.000 el envío te saldrá <b>GRATIS!</b>.';
		      			break;

		      		case $subtotalAntesIva > 100000 && $subtotalAntesIva <= 200000:

		      			echo $_SESSION['nombre'].', si tu compra es igual o mayor a $100.000 el envío te saldrá <b>GRATIS!</b>.';
		      			break;
		      		
		      		default:
		      			# code...
		      			break;
		      	}*/

		      	//Ajustar al terminar mes mujer

		      	if (isset($_SESSION['idusuario'])) {

		      		echo $_SESSION['nombre'].', si tu compra es igual o mayor a $200.000 el envío te saldrá <b>GRATIS!</b>.';	

		      	}else{
		      		
		      		echo 'Si tu compra es igual o mayor a $200.000 el envío te saldrá <b>GRATIS!</b>.';
		      	}
		      	
		      	?>

		    </p>
		    <center>
				<span><h6>Envío a toda Colombia, Todos los medios de pago</h6></span>          
        		<img src="<?=URL_SITIO?>assets/img/medios-de-pago.png" class="responsive-img">
    		</center>
    	</div>
	</div>
</div>
<?php include 'footer.php'; ?>