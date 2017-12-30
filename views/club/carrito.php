<?php include 'header.php'; ?>
<div class="divider"></div>
<div class="container">
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
					
						foreach ($itemsCarrito["id"] as $key => $iditem) {

				?>
				<tr>
					<td>
						<div class="col s1">
							<a class="eliminarPdtCarrito" idpdt="<?=$iditem?>"><i class="fa fa-times" aria-hidden="true"></i></a>
						</div>
						<div class="col s3">
							<img src="<?=$itemsCarrito["img_principal"][$key]?>" class="" style="max-width:100px;">
						</div>
						<div class="col s8">
							<span class="left">
								<?=$itemsCarrito["nombre"][$key]?><br>Código: <?=$itemsCarrito["codigo"][$key]?><br>Iva: <?=$itemsCarrito["iva"][$key]?>%
							</span>
						</div>
					</td>
					<td>
						<?=convertir_pesos($itemsCarrito["precio"][$key])?>
					</td>
					<td>
						<select name="cantidad" id="cantidad" class="cambiarCantidad" idpdt="<?=$iditem?>">
							<?php 
							for ($i=1; $i <= $itemsCarrito["cantidadstock"][$key]; $i++) {
								?>
								<option value="<?=$i?>" <?php if ($itemsCarrito["cantidad"][$key]==$i) { echo "selected"; } ?>><?=$i?></option>
								<?php
							}
							?>
						</select>
					</td>
					<td class="right-align">
						<?=convertir_pesos($itemsCarrito["subtotal"][$key])?>
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
	<div class="divider"></div><br>
	<div class="row">
		<div class="col s12 m8">
		<?php  if (isset($_SESSION["idusuario"])) { ?>
			<div class="card-panel">
				<h4>DIRECCIÓN DE ENVÍO</h4>			
	          	<span class="black-text">				 	
			 		Dirección: <?=$_SESSION["direccion"]?><br>
			 		Ciudad: <?=$_SESSION["ciudad"]?><br>
			 		Teléfono: <?=$_SESSION["telefono"]?><br>
			 		Teléfono Móvil: <?=$_SESSION["telefono_m"]?><br><br>
				 	
			 		<a href="<?=URL_CLUB."/".URL_CLUB_PERFIL?>" class="btn green">Cambiar Datos</a>
			 		
	          	</span>
	        </div>
	    <?php } ?>
		</div>
		<div class="col s12 m4" style="background-color: #f2f2f2; border-radius: 10px;padding: 1rem;">
			<div class="row">
				<div class="col s6 m8 right-align">Subtotal antes de IVA</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($subtotalAntesIva)?></div>
			
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
			
				<div class="col s6 m8 right-align">Descuento Cupón</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($descuentoCupon)?></div>
			
			
				<div class="col s6 m8 right-align">Subtotal Neto Antes de Iva</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($subtotalNetoAntesIva)?></div>
			
				<div class="col s6 m8 right-align">IVA</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($iva)?></div>				


				<?php if (isset($_SESSION["usar_puntos"]) && $_SESSION["usar_puntos"]==true) { ?>

		 			<form method="post" id="nousarpuntos">
			 			<input type="hidden" name="usar_puntos" value="0">
			 		</form>
			 		<div class="col s6 m8 right-align">Pago con puntos:</div>
					<div class="col s6 m4 right-align"><?=convertir_pesos($pagoPuntos["valor_pago"])?></div>					 	
				 	<div class="col s12 right-align">
					 	<div class="card-panel green lighten-5">
							<button class="btn green darken-1" onclick="javascript: document.getElementById('nousarpuntos').submit()"><i class="material-icons left">add</i>No Redimir Puntos</button>
						</div>				 		
					</div>
				 	<?php }else{ ?>

				 	<?php if (!empty($puntos_disponibles)) { ?>

				 		<form method="post" id="usarpuntos">
				 			<input type="hidden" name="usar_puntos" value="1">
				 		</form>
				 		<div class="col s6 m8 right-align">Puntos Disponibles:</div>
						<div class="col s6 m4 right-align"><?=round($puntos_disponibles["disponibles"])?></div>
					 	<div class="col s12 right-align">
						 	<div class="card-panel green lighten-5">
								<button class="btn green darken-1" onclick="javascript: document.getElementById('usarpuntos').submit()"><i class="material-icons left">add</i>Redimir Puntos</button>
							</div>	
						</div>
				 	<?php } ?>
			 	<?php } ?>

				<div class="col s6 m8 right-align">Costo de Envío</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($flete)?></div>
			
				<div class="col s6 m8 right-align">TOTAL A PAGAR</div>
				<div class="col s6 m4 right-align"><?=convertir_pesos($total)?></div>
			</div>
			<div class="divider"></div>
			<div class="row" style="margin-top: 1rem;">
				<div class="col s7 right-align">
					<a href="<?=URL_CLUB.'/'.URL_PRODUCTOS_CLUB?>" class="btn-large orange">SEGUIR COMPRANDO</a>
				</div>
				<div class="col s5 right-align ">
					<a href="<?=URL_CLUB.'/'.URL_RESUMEN_COMPRA_CLUB?>" class="btn-large green">ORDENAR YA!</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>