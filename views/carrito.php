<?php include "header.php"; ?>

<div class="container">		
	<div class="row">
	<div class="col-xs-12">
		<?php
		if (isset($alerta) && !empty($alerta)) {
		?>
		<div class="alert alert-danger" role="alert"><?=$alerta?></div>
		<?php
		}
		?>
		<table class="table table-striped">
				<thead>
					<th colspan="2" class="text-center">DESCRIPCIÓN</th>
					<th class="text-center">PRECIO</th>
					<th class="text-center">CANTIDAD</th>
					<th class="text-center">SUBTOTAL</th>
				</thead>
				<tbody>
					<?php
					if (isset($itemsCarrito) && count($itemsCarrito)>0) {
					
						foreach ($itemsCarrito as $key => $item) {

						?>
						<tr>
							<td width="15%">
								<div class="row">
									<div class="col-xs-12 col-md-2"><br>
										<a class="eliminarPdtCarrito" idpdt="<?=$item['id']?>"><i class="fa fa-times" aria-hidden="true"></i></a>
									</div>
									<div class="col-xs-12 col-md-10">
										<img src="<?=$item["img_principal"]?>" class="img-responsive" style="max-width:100px;">
									</div>
								</div>
							</td>
							<td class="text-left"><?=$item["nombre"]?><br>Código: <?=$item["codigo"]?><br>Iva: <?=$item["iva"]?>%</td>
							<td class="text-center">$<?=number_format($item["precio"])?></td>
							<td class="text-center">
								<select name="cantidad" id="cantidad" class="form-control input-sm cambiarCantidad" idpdt="<?=$item['id']?>">
									<?php 
									for ($i=1; $i <= $item["cantidadstock"]; $i++) {
										?>
										<option value="<?=$i?>" <?php if ($item["cantidad"]==$i) { echo "selected"; } ?>><?=$i?></option>
										<?php
									}
									?>
								</select>
							</td>
							<td class="text-center">$<?=number_format($item["subtotal"])?></td>
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
	<hr>
	<div class="row">
	 <div class="col-xs-12 col-md-7">
	 	<?php 
 		if (isset($_SESSION["idusuario"])) {
	 	?>
	 	<h3>¿A dónde quieres que enviemos tu pedido?</h3>
	 	<div class="radio">
		  <label>
		    <input type="radio" name="modalidad" value="NORMAL" <?php if ($_SESSION['modalidad_compra'] == 'NORMAL') { echo 'checked'; } ?>>
		   Quiero que lo envien a mi dirección. (Venta Directa)
		  </label>
		</div>
		<div class="panel panel-default" id="panel-metodologia-normal" <?php if ($_SESSION['modalidad_compra'] != 'NORMAL') { echo 'style="display: none;"'; } ?>>
			<div class="well well-sm" style="background-color: #dff0d8;color: #000;font-size:13px;">
					
						Compra, abastécete y vende a tus clientes. Te despacharemos directamente a tu dirección. Pedido mínimo de $500.000.
				</div>
			<div class="panel-body">
			 	<h2>Dirección de envío</h2>
			 	<p> Dirección: <?=$_SESSION["direccion"]?><br>
			 		Ciudad: <?=$_SESSION["ciudad"]?><br>
			 		Teléfono: <?=$_SESSION["telefono"]?><br>
			 		Teléfono Móvil: <?=$_SESSION["telefono_m"]?><br>
			 	</p>
		 		<a href="<?=URL_USUARIO."/".URL_USUARIO_CAMBIAR_DATOS."/".URL_CARRITO?>" class="btn btn-sm btn-primary">Cambiar Datos</a>
		 	</div>
		</div>
		<div class="radio">
		  <label>
		    <input type="radio" name="modalidad" value="DROPSHIPPING" <?php if ($_SESSION['modalidad_compra'] == 'DROPSHIPPING') { echo 'checked'; } ?>>
		    Quiero que lo envien directamente a mi cliente. (Dropshipping).
		  </label>
		</div>
		<div class="panel panel-default" id="panel-metodologia-dropshipping" <?php if ($_SESSION['modalidad_compra'] != 'DROPSHIPPING') { echo 'style="display: none;"'; } ?>>
			
			<div class="panel-body">
				<div class="well well-sm" style="background-color: #dff0d8;color: #000;font-size:13px;">
					
						Dropshipping es una modalidad en la que tú vendes, recaudas  y nosotros le despachamos el pedido directamente a tu cliente. Comercializa sin inventarios ni logística. Sin pedidos mínimos.
				</div>
				<form method="post" id="form-modalidad-dropshipping">
					<div class="form-group col-md-6">
					    <label for="Nombre">Nombre completo de tu cliente</label>
					    <input type="text" class="form-control" name="nombre_dp" id="nombre_dp" value="<?=$_SESSION['nombre_dp']?>" required="required">
					</div>
					<div class="form-group col-md-6">
					    <label for="Email">Email de tu cliente</label>
					    <input type="email" name="email_dp" id="email_dp" class="form-control" value="<?=$_SESSION['email_dp']?>">
					</div>
					<div class="form-group col-md-6">
					    <label for="Teléfono">Teléfono de tu cliente</label>
					    <input type="phone" class="form-control" id="telefono_dp" name="telefono_dp" value="<?=$_SESSION['telefono_dp']?>">
					</div>
					<div class="form-group col-md-6">
					    <label for="Teléfono Móvil">Teléfono Móvil de tu cliente</label>
					    <input type="phone" class="form-control" id="telefono_m_dp" name="telefono_m_dp" value="<?=$_SESSION['telefono_m_dp']?>">
					</div>
					<div class="form-group col-md-6">
					    <label for="Dirección">Dirección de tu cliente</label>
					    <input type="text" class="form-control" id="direccion_dp" name="direccion_dp" required="required" value="<?=$_SESSION['direccion_dp']?>">
					</div>
					<div class="form-group col-md-6">
						<label for="Ciudad">Ciudad de tu cliente</label>
						<select name="ciudad_dp" id="ciudad_dp" class="form-control" required="required">
							<option value="">Seleccione</option>
							<?php 
							foreach ($ciudades as $key => $ciudad) {
								?>
								<option value="<?=$ciudad["idciudad"]?>"
									<?php 
									if ($_SESSION['idciudad_dp'] == $ciudad["idciudad"]) {
										echo 'selected';
									}
									?>
									><?=$ciudad["ciudad"]?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="col-xs-12">
						<div class="checkbox">
						    <label>
						      <input type="checkbox" name="autorizacion_datos" id="autorizacion_datos_dp" required="required"> Autorización de datos personales
						    </label>
						</div>
					</div>
					<input type="hidden" name="guardarDropshipping" value="1">
					<button type="button" id="guardarDropshipping" class="btn btn-default center-block">GUARDAR</button>
				</form>
			</div>
		</div>
	 	<?php } ?>
	 </div>
	 <div class="col-xs-12 col-md-5">
	 	<div class="col-xs-8 text-right">Subtotal antes de IVA</div><div class="col-xs-4 text-right">$<?=number_format($subtotalAntesIva)?></div>
	 	<div class="col-xs-12 text-right" style="padding:10px;">
	 		<button class="btn btn-primary" onclick="javascript: document.getElementById('campo_cupon').style.display='block';">+Cupón de Descuento</button>
	 		<div id="campo_cupon" style="display:none;padding:10px;">
	 			<form method="post">
		 			Ingresa el cupón: <input type="text" name="cupon_descuento" id="cupon_descuento"  size="10" required><br><br>
		 			<button type="submit" name="redimirCupon" class="btn btn-sm btn-default">Usar Cupón</button>
		 		</form>
	 		</div>
	 	</div>
	 	<div class="col-xs-8 text-right">Descuento Cupón</div><div class="col-xs-4 text-right">$<?=number_format($descuentoCupon)?></div>
	 	<div class="col-xs-8 text-right">Subtotal Neto Antes de Iva</div><div class="col-xs-4 text-right">$<?=number_format($subtotalNetoAntesIva)?></div>
	 	<div class="col-xs-8 text-right">Descuento por Escala %</div><div class="col-xs-4 text-right"><?=$porcDescuentoEscala?>%</div>
	 	<div class="col-xs-8 text-right">Descuento por Escala $</div><div class="col-xs-4 text-right">$<?=number_format($descuentoEscala)?></div>
	 	<div class="col-xs-8 text-right">Total Neto antes de IVA</div><div class="col-xs-4 text-right">$<?=number_format($totalNetoAntesIva)?></div>
	 	<div class="col-xs-8 text-right">Subtotal Premios</div><div class="col-xs-4 text-right">$<?=number_format($subtotalAntesIvaPremios)?></div>
	 	<div class="col-xs-8 text-right">Retención</div><div class="col-xs-4 text-right">$<?=number_format($retencion)?></div>
	 	<div class="col-xs-8 text-right">IVA</div><div class="col-xs-4 text-right">$<?=number_format($iva)?></div>
	 	<?php if (isset($_SESSION["usar_puntos"]) && $_SESSION["usar_puntos"]==true) { ?>

	 		<form method="post" id="nousarpuntos">
		 			<input type="hidden" name="usar_puntos" value="0">
		 		</form>
		 		<div class="col-xs-12"><br></div>
			 	<div class="col-xs-8 text-right">Pago con puntos:</div>
			 	<div class="col-xs-4 text-right">$<?=number_format($pagoPuntos["valor_pago"])?></div>
			 	<div class="col-xs-12 text-right">
			 		<a class="btn btn-primary btn-sm" onclick="javascript: document.getElementById('nousarpuntos').submit()">No Redimir Puntos</a>
			 	</div>	 	
			 	<div class="col-xs-12"><br></div>


	 	<?php }else{ ?>
		 	<?php if (!empty($puntos_disponibles)) { ?>
		 		<form method="post" id="usarpuntos">
		 			<input type="hidden" name="usar_puntos" value="1">
		 		</form>
		 		<div class="col-xs-12"><br></div>
			 	<div class="col-xs-8 text-right">Puntos Disponibles:</div>
			 	<div class="col-xs-4 text-right">
			 		<?=round($puntos_disponibles["disponibles"])?>
			 	</div>
			 	<div class="col-xs-12 text-right">
			 		<a class="btn btn-primary" onclick="javascript: document.getElementById('usarpuntos').submit()">Redimir Puntos</a>
			 	</div>	 	
			 	<div class="col-xs-12"><br></div>		
		 	<?php } ?>
	 	<?php } ?>
	 	<div class="col-xs-8 text-right">Costo de Envío</div><div class="col-xs-4 text-right">$<?=number_format($flete)?></div>
	 	<div class="col-xs-8 text-right"><b>TOTAL A PAGAR</b></div><div class="col-xs-4 text-right"><b>$<?=number_format($total)?></b></div>
	 	<div class="col-xs-12"><br><div class="well well-sm text-center">TU RENTABILIDAD ES DE: $<?=number_format($rentabilidad)?></div></div>
	 </div>
	 <div class="col-xs-12 text-right">
	 	<a href="<?=URL_PRODUCTOS?>" class="btn btn-lg btn-default">SEGUIR COMPRANDO</a>
	 	
	 	<?php

	 	if (count($itemsCarrito)>0) {

	 		
 			if (($_SESSION['modalidad_compra']=='DROPSHIPPING') || ($subtotalAntesIvaPremios > 0) || ($_SESSION['modalidad_compra']!='DROPSHIPPING' && isset($campana_actual["monto_minimo"]) && $campana_actual["monto_minimo"]<=$subtotalNetoAntesIva)) {
	 	?>
 				<a href="<?=URL_RESUMEN_COMPRA?>" class="btn btn-lg btn-primary">ORDENAR YA!</a>	 	
	 	<?php
	 		}
	 	}
	 	?>	 	
	 </div>
	 <div class="col-xs-12">
	 	<img src="assets/img/medios-de-pago.png" class="img-responsive">
	 </div>
	</div>
</div>
<br>
<br>
<?php include "footer.php"; ?>